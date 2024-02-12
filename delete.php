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


if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $response = $woocommerce->delete('products/' . $product_id, ['force' => true]);
} else {
    echo "Error: Product ID is not provided.";
}

?>