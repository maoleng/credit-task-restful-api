<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Libraries\Request\Request;

class MainController extends Controller
{

    public function index(Request $request)
    {
        $category_id = $request->get('category_id');
        $categories = (new Category)->get();
        $sql = "
            SELECT Item0504.*, Category0504.name as `category_name` FROM Item0504
            LEFT JOIN Category0504 ON Item0504.category_id = Category0504.id
        ";
        if ($category_id !== null) {
            $sql .= "WHERE categories.id = '$category_id'";
        }
        $items = (new Item)->raw($sql);

        return view('index', [
            'categories' => $categories,
            'items' => $items,
        ]);
    }

    public function searchByCategory(Request $request): void
    {
        $category = $this->getCategoryOrFail($request->get('category_id'));
        $items = (new Item)->where('category_id', $category->id)->get();

        $data = [];
        foreach ($items as $item) {
            $data[] = [
                'id' => $item->id,
                'name' => $item->name,
                'size' => $item->size,
                'price' => (float) $item->price,
                'category_name' => $category->name,
            ];
        }

        response()->json([
            'status' => true,
            'data' => $data,
        ]);
    }

    public function searchByName(Request $request): void
    {
        $q = $request->get('q');
        $items = (new Item)->raw("
            SELECT Item0504.*, Category0504.name as `category_name` FROM Item0504
            LEFT JOIN Category0504 ON Item0504.category_id = Category0504.id
            WHERE Item0504.name LIKE '%$q%'
        ");

        $data = [];
        foreach ($items as $item) {
            $data[] = [
                'id' => $item->id,
                'name' => $item->name,
                'size' => $item->size,
                'price' => (float) $item->price,
                'category_name' => $item->category_name,
            ];
        }

        response()->json([
            'status' => true,
            'data' => $data,
        ]);
    }

    private function getCategoryOrFail($category_id): Category
    {
        $category = (new Category)->find($category_id);
        if ($category === null) {
            response()->json([
                'status' => false,
                'data' => [
                    'message' => 'Not found category',
                ],
            ]);
        }

        return $category;
    }
}