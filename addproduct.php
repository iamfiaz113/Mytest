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
$productName = isset($_POST['name']) ? $_POST['name'] : 'Premium Quality';
$productDescription = isset($_POST['description']) ? $_POST['description'] : 'Default description';
$productCategory = isset($_POST['category']) ? $_POST['category'] : 9;
$regularPrice = isset($_POST['regular_price']) ? $_POST['regular_price'] : '21.99';
$saleprice = isset($_POST['sale_price']) ? $_POST['sale_price'] : '21.99';
$shortDescription = isset($_POST['short_description']) ? $_POST['short_description'] : '';
$image1 = isset($_POST['images'][0]['src']) ? $_POST['images'][0]['src'] : '';

$data = [
    'name' => $productName,
    'regular_price' => $regularPrice,
    'sale_price' => $saleprice,
    'description' => $productDescription,
    'short_description' => $shortDescription,
    'categories' => [
        [
            'id' => $productCategory
        ]
    ],
    'images' => [
        [
            'src' => $image1
        ],
    ]
];

$response = $woocommerce->post('products', $data);

echo json_encode($response);
?>
