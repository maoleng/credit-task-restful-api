<?php

# POST /categories/{category}/products

require 'Client.php';
$client = new Client;

$data = $client->post('http://127.0.0.1:8000/categories/chair/products', [
    'headers' => [
        'Content-Type: application/json'
    ],
    'json' => [
        'name' => 'cai ghe huyen thoai',
        'size' => 'Size S',
        'price' => 50.5
    ],
])->toArray();

echo json_encode($data);
