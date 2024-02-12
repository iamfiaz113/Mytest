<?php
include 'assets/header.php';
?>
  <h3 class="p-3">Add Products</h3>
<div class="container mt-4">
    <form id="productForm">
      <div class="form-group">
        <label for="productName">Product Name:</label>
        <input type="text" required autofocus class="form-control" id="productName" value="T-shirt" required>
      </div>
      <div class="form-group">
        <label for="productDescription">Product Description:</label>
        <textarea class="form-control" id="productDescription" rows="10">Product Description</textarea>
      </div>
      <div class="form-group">
        <label for="productCategory">Product Type:</label>
        <select class="form-control text-light" id="producttype" required>
          <option value="simple">Simple</option>
          <option selected value="grouped">Grouped</option>
          <option value="external">External</option>
          <option value="variable">Variable</option>
        </select>
      </div>
      <div class="form-group">
        <label for="regularPrice">Regular Price:</label>
        <input type="number" class="form-control" id="regularPrice" value="200" required>
      </div>
      <div class="form-group">
        <label for="saleprice">Sale Price:</label>
        <input type="number" class="form-control" id="saleprice" value="100" required>
      </div>
      <div class="form-group">
        <label for="shortDescription">Short Description:</label>
        <textarea class="form-control" id="shortDescription" rows="5">short Description</textarea>
      </div>
      <div class="form-group">
        <label for="image1">Image 1 URL:</label>
        <input type="url" class="form-control" id="image1" value="http://demo.woothemes.com/woocommerce/wp-content/uploads/sites/56/2013/06/T_2_front.jpg" required>
      </div>
      <button type="button" class="btn btn-primary" id="submitbtn" onclick="submitForm()">Submit</button>
    </form>
  
    <div id="responseMessage" class="mt-3"></div>
  </div>
  



<?php
include 'assets/footer.php';
?>