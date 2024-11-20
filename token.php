<?php
$serverKey = 'Mid-server-cQRaChmHYB-nq34_JlG8pfKe';
$url = 'https://api.midtrans.com/v2/charge';

// Data for the transaction request
$data = [
    'payment_type' => 'credit_card',
    'transaction_details' => [
        'order_id' => 'order-id-' . time(),
        'gross_amount' => 50000 // Example amount in IDR
    ]
];

// cURL to make the API request
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Basic ' . base64_encode($serverKey . ':'),
    'Content-Type: application/json'
]);

$response = curl_exec($ch);
curl_close($ch);

$response = json_decode($response, true);
echo json_encode(['token' => $response['token']]);
?>
