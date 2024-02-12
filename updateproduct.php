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

$productName = isset($_GET['name']) ? $_GET['name'] : 'Premium Quality';
$productDescription = isset($_GET['description']) ? $_GET['description'] : 'Default description';
$productCategory = isset($_GET['category']) ? $_GET['category'] : 9;
$regularPrice = isset($_GET['regular_price']) ? $_GET['regular_price'] : '21.99';
$saleprice = isset($_GET['sale_price']) ? $_GET['sale_price'] : '21.99';
$shortDescription = isset($_GET['short_description']) ? $_GET['short_description'] : '';
$image1 = isset($_GET['images'][0]['src']) ? $_GET['images'][0]['src'] : '';
$productid = $_GET['id'];

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
$response = $woocommerce->put('products/'.$productid, $data);
echo json_encode($response);
?>
