<?php

# DELETE /pay/{order_id}/{bank_code}

require 'Client.php';
$client = new Client;

$data = $client->post('http://127.0.0.1:8000/pay/1/VNBANK')->toArray();

echo json_encode($data);
