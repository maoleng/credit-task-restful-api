<?php

# GET /categories

require 'Client.php';
$client = new Client;

$data = $client->get('http://127.0.0.1:8000/category')->toArray();

echo json_encode($data);
