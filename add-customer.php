<?php include 'assets/header.php'; ?>

<h3 class="p-3">Add Customers</h3>
<div class="container mt-4">
  <form method="POST" action="addcustomer.php">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" name="email" id="email" value="dummy data" required>
    </div>
    <div class="form-group">
      <label for="first_name">First Name:</label>
      <input type="text" class="form-control" name="first_name" id="first_name" value="dummy data" required>
    </div>
    <div class="form-group">
      <label for="last_name">Last Name:</label>
      <input type="text" class="form-control" name="last_name" id="last_name" value="dummy data" required>
    </div>
    <!-- Billing Address -->
    <div class="form-group">
      <label for="billing_address_1">Billing Address 1:</label>
      <input type="text" class="form-control" name="billing_address_1" id="billing_address_1" value="dummy data" required>
    </div>
    <div class="form-group">
      <label for="billing_address_2">Billing Address 2:</label>
      <input type="text" class="form-control" name="billing_address_2" id="billing_address_2" value="dummy data">
    </div>
    <div class="form-group">
      <label for="billing_city">Billing City:</label>
      <input type="text" class="form-control" name="billing_city" id="billing_city" value="dummy data" required>
    </div>
    <div class="form-group">
      <label for="billing_state">Billing State:</label>
      <input type="text" class="form-control" name="billing_state" id="billing_state" value="dummy data" required>
    </div>
    <div class="form-group">
      <label for="billing_postcode">Billing Postcode:</label>
      <input type="text" class="form-control" name="billing_postcode" id="billing_postcode" value="dummy data" required>
    </div>
    <div class="form-group">
      <label for="billing_country">Billing Country:</label>
      <input type="text" class="form-control" name="billing_country" id="billing_country" value="dummy data" required>
    </div>
    <div class="form-group">
      <label for="billing_phone">Billing Phone:</label>
      <input type="tel" class="form-control" name="billing_phone" id="billing_phone" value="dummy data" required>
    </div>
    <!-- Shipping Address -->
    <!-- Add similar fields for shipping address if needed -->

    <button type="submit" class="btn btn-primary" id="submitBtn">Submit</button>
  </form>

  <div id="responseMessage" class="mt-3"></div>
</div>

<?php include 'assets/footer.php'; ?>
