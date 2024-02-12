<?php
header('Content-Type: application/json');

require __DIR__ . '/vendor/autoload.php';

use Automattic\WooCommerce\Client;

$Consumer_key = "ck_de43e51076ee9c732b7dbe1c076b2248626fade2";
$Consumer_secret = "cs_81850facd2d651876574a3646b7b010fb2123d55";

$woocommerce = new Client(
  'https://as.envisionai.art/',
  $Consumer_key,
  $Consumer_secret,
  [
    'version' => 'wc/v3',
  ]
);
$data = [
    'payment_method' => 'bacs',
    'payment_method_title' => 'Direct Bank Transfer',
    'set_paid' => true,
    'billing' => [
        'first_name' => 'John',
        'last_name' => 'Doe',
        'address_1' => '969 Market',
        'address_2' => '',
        'city' => 'San Francisco',
        'state' => 'CA',
        'postcode' => '94103',
        'country' => 'US',
        'email' => 'john.doe@example.com',
        'phone' => '(555) 555-5555'
    ],
    'shipping' => [
        'first_name' => 'John',
        'last_name' => 'Doe',
        'address_1' => '969 Market',
        'address_2' => '',
        'city' => 'San Francisco',
        'state' => 'CA',
        'postcode' => '94103',
        'country' => 'US'
    ],
    'line_items' => [
        [
            'product_id' => 93,
            'quantity' => 2
        ],
        [
            'product_id' => 22,
            'variation_id' => 23,
            'quantity' => 1
        ]
    ],
    'shipping_lines' => [
        [
            'method_id' => 'flat_rate',
            'method_title' => 'Flat Rate',
            'total' => '10.00'
        ]
    ]
];
print_r($woocommerce->post('orders', $data));
?>
