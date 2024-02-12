<?php
header('Content-Type: application/json');

require __DIR__ . '/vendor/autoload.php';

use Automattic\WooCommerce\Client;
use Automattic\WooCommerce\HttpClient\HttpClientException;

$consumerKey = "ck_de43e51076ee9c732b7dbe1c076b2248626fade2";
$consumerSecret = "cs_81850facd2d651876574a3646b7b010fb2123d55";

$woocommerce = new Client(
    'https://as.envisionai.art/',
    $consumerKey,
    $consumerSecret,
    [
        'version' => 'wc/v3',
    ]
);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = isset($_POST['email']) ? $_POST['email'] : 'dummy data';
    $firstName = isset($_POST['first_name']) ? $_POST['first_name'] : 'dummy data';
    $lastName = isset($_POST['last_name']) ? $_POST['last_name'] : 'dummy data';
    $billingAddress1 = isset($_POST['billing_address_1']) ? $_POST['billing_address_1'] : 'dummy data';
    $billingAddress2 = isset($_POST['billing_address_2']) ? $_POST['billing_address_2'] : 'dummy data';
    $billingCity = isset($_POST['billing_city']) ? $_POST['billing_city'] : 'dummy data';
    $billingState = isset($_POST['billing_state']) ? $_POST['billing_state'] : 'dummy data';
    $billingPostcode = isset($_POST['billing_postcode']) ? $_POST['billing_postcode'] : 'dummy data';
    $billingCountry = isset($_POST['billing_country']) ? $_POST['billing_country'] : 'dummy data';
    $billingPhone = isset($_POST['billing_phone']) ? $_POST['billing_phone'] : 'dummy data';

    // Check if the email already exists
    try {
        $existingCustomer = $woocommerce->get('customers', ['email' => $email]);
        if (!empty($existingCustomer)) {
            // Email already exists, handle accordingly (display error, redirect, etc.)
            echo json_encode(['error' => 'Email already exists.']);
            exit;
        }
    } catch (HttpClientException $e) {
        // Handle exception if needed
        echo json_encode(['error' => 'Error checking existing email.']);
        exit;
    }

    // If email doesn't exist, proceed to add the customer
    $data = [
        'email' => $email,
        'first_name' => $firstName,
        'last_name' => $lastName,
        'billing' => [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'company' => '',
            'address_1' => $billingAddress1,
            'address_2' => $billingAddress2,
            'city' => $billingCity,
            'state' => $billingState,
            'postcode' => $billingPostcode,
            'country' => $billingCountry,
            'email' => $email,
            'phone' => $billingPhone,
        ],
        'shipping' => [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'company' => '',
            'address_1' => $billingAddress1, // You can modify this based on your needs
            'address_2' => $billingAddress2, // You can modify this based on your needs
            'city' => $billingCity, // You can modify this based on your needs
            'state' => $billingState, // You can modify this based on your needs
            'postcode' => $billingPostcode, // You can modify this based on your needs
            'country' => $billingCountry, // You can modify this based on your needs
        ],
    ];

    // Attempt to add the customer
    try {
        $response = $woocommerce->post('customers', $data);
        echo json_encode($response);
    } catch (HttpClientException $e) {
        // Handle exception if needed
        echo json_encode(['error' => 'Error adding customer.']);
    }
} else {
    // Handle invalid request method if needed
    echo json_encode(['error' => 'Invalid request method.']);
}
?>
