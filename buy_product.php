<?php include 'assets/header.php'; ?>

<h3 class="p-3">Buy Product</h3>
<div class="container mt-4">
    <form method="POST" action="addproduct.php">
        <div class="form-group">
            <label for="productName">Product Name:</label>
            <input type="text" readonly class="form-control" id="productName" name="productName" value="T-shirt">
        </div>
        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="number" class="form-control" id="quantity" name="quantity" value="1" required>
        </div>
        <button type="submit" class="btn btn-primary">Buy Now</button>
    </form>

    <div id="responseMessage" class="mt-3"></div>
</div>

<?php include 'assets/footer.php'; ?>
