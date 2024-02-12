<?php
include 'assets/header.php';
$product_id = $_GET['id'];
$product=$woocommerce->get('products/'.$product_id);
?>

<h3 class="p-3">Edit Product </h3><br>
<div class="container mt-4">
  <img src="<?= $product->images[0]->src ?>" alt="Product Image" class="img-fluid mb-3 rounded" style="max-width: 200px;">
    <form id="productForm">
      <input type="hidden"  id="productid" value="<?= $product->id ?>">
      <div class="form-group">
        <label for="productName">Product Name:</label>
        <input type="text" required  class="form-control" id="productName" value="<?= $product->name ?>" required>
      </div>
      <div class="form-group">
        <label for="productDescription">Product Description:</label>
        <textarea class="form-control" id="productDescription" rows="10"><?= $product->description ?></textarea>
      </div>
      <div class="form-group">
        <label for="productCategory">Product Type:</label>
        <select class="form-control text-light" id="producttype" required>
          <option value="simple">Simple</option>
          <option selected value="grouped">Grouped</option>
          <option value="external">External</option>
          <option value="variable">Variable</option>
          <!-- Add more categories as needed -->
        </select>
      </div>
      <div class="form-group">
        <label for="regularPrice">Regular Price:</label>
        <input type="number" class="form-control" id="regularPrice" value="<?= $product->regular_price ?>" required>
      </div>
      <div class="form-group">
        <label for="saleprice">Sale Price:</label>
        <input type="number" class="form-control" id="saleprice" value="<?= $product->sale_price ?>" required>
      </div>
      <div class="form-group">
        <label for="shortDescription">Short Description:</label>
        <textarea class="form-control" id="shortDescription" rows="5"><?= $product->short_description ?></textarea>
      </div>
      <div class="form-group">
        <label for="image1">Image 1 URL:</label>
        <input type="url" class="form-control" id="image1" value="<?= $product->images[0]->src ?>" required>
      </div>
      <button type="button" class="btn btn-primary" id="submitbtn" onclick="updateForm()">Update</button>
    </form>
  
    <div id="responseMessage" class="mt-3"></div>
  </div>
  



<?php
include 'assets/footer.php';
?>