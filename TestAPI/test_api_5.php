<?php

# DELETE /categories/{category}/products/{pid}

require 'Client.php';
$client = new Client;

$data = $client->delete('http://127.0.0.1:8000/categories/chair/products/30')->toArray();

echo json_encode($data);
