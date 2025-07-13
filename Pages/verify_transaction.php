<?php
if (!isset($_GET['reference'])) {
    die('No reference supplied');
}

$reference = $_GET['reference'];
$secret_key = "sk_test_8be6505308a1c7bee599af73cc3da8eec6d49259"; // Replace with your secret key

$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($reference),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        "Authorization: Bearer $secret_key",
        "Cache-Control: no-cache",
    ],
]);

$response = curl_exec($curl);
curl_close($curl);

$result = json_decode($response);

if ($result && $result->status && $result->data->status === 'success') {
    // Payment was successful
    // You can save transaction details in your database here
    echo "Payment successful. Reference: " . htmlspecialchars($reference);
} else {
    // Payment failed or invalid
    echo "Payment verification failed.";
}
?>
