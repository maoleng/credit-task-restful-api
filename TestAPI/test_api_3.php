<?php

# GET /categories/{category}/products/{pid}

require 'Client.php';
$client = new Client;

$data = $client->get('http://127.0.0.1:8000/categories/chair/products/3')->toArray();

echo json_encode($data);
