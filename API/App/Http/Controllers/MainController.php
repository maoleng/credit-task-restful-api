<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Models\Category;
use App\Models\Item;
use Libraries\Request\Request;

class MainController extends Controller
{

    public function getCategories(): void
    {
        $categories = (new Category)->get();
        $data = [];
        foreach ($categories as $category) {
            $data[] = [
                'id' => $category->id,
                'name' => $category->name,
                'description' => $category->description,
            ];
        }

        response()->json([
            'status' => true,
            'data' => $data,
        ]);
    }

    public function getProducts(Request $request, $category_name): void
    {
        $category = $this->getCategoryOrFail($category_name);
        $items = (new Item)->where('category_id', $category->id)->get();

        $data = [];
        foreach ($items as $item) {
            $data[] = [
                'id' => $item->id,
                'name' => $item->name,
                'size' => $item->size,
                'price' => (float) $item->price,
            ];
        }

        response()->json([
            'status' => true,
            'data' => $data,
        ]);
    }

    public function showProduct(Request $request, $category_name, $product_id): void
    {
        $category = $this->getCategoryOrFail($category_name);
        $item = (new Item)->where('category_id', $category->id)->find($product_id);
        if ($item === null) {
            response()->json([
                'status' => false,
                'data' => [
                    'message' => 'Product not found',
                ],
            ]);
        }

        response()->json([
            'status' => true,
            'data' => [
                'id' => $item->id,
                'name' => $item->name,
                'size' => $item->size,
                'price' => (float) $item->price,
            ],
        ]);
    }

    public function createProduct(CreateProductRequest $request, $category_name): void
    {
        $category = $this->getCategoryOrFail($category_name);

        $data = $request->validated();
        $data['category_id'] = $category->id;

        $item = (new Item)->create($data);

        response()->json([
            'status' => true,
            'data' => [
                'id' => $item->id,
                'name' => $item->name,
                'size' => $item->size,
                'price' => (float) $item->price,
            ],
        ]);
    }

    public function deleteProduct(Request $request, $category_name, $product_id): void
    {
        $category = $this->getCategoryOrFail($category_name);
        $item = (new Item)->where('category_id', $category->id)->find($product_id);
        if ($item === null) {
            response()->json([
                'status' => false,
                'data' => [
                    'message' => 'Product not found',
                ],
            ]);
        }

        try {
            $item->delete();
        } catch (\Exception) {
            response()->json([
                'status' => false,
                'data' => [
                    'message' => 'Product is in another order',
                ],
            ]);
        }

        response()->json([
            'status' => true,
            'data' => [
                'message' => 'Product deleted successfully',
            ],
        ]);
    }

    private function getCategoryOrFail($category_name): Category
    {
        $category = (new Category)->where('name', $category_name)->first();
        if ($category === null) {
            response()->json([
                'status' => false,
                'data' => [
                    'message' => 'Not fail category',
                ],
            ]);
        }

        return $category;
    }
}