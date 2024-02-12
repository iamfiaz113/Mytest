</div>
</div>
<!-- content  End-->
</div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script>
      function submitForm() {
        document.getElementById('submitbtn').disabled = true;
        var productName = $('#productName').val();
        var productDescription = $('#productDescription').val();
        var productCategory = $('#productCategory').val();
        var regularPrice = $('#regularPrice').val();
        var saleprice = $('#saleprice').val();
        var shortDescription = $('#shortDescription').val();
        var image1 = $('#image1').val();
    
        $.ajax({
          type: 'POST',
          url: 'addproduct.php',
          data: {
            name: productName,
            description: productDescription,
            category: productCategory,
            regular_price: regularPrice,
            sale_price: saleprice,
            short_description: shortDescription,
            images: [
              { 'src': image1 },
            ]
          },
          success: function(response) {
            location.href="/restapi";
          },
          error: function(error) {
            document.getElementById('submitbtn').disabled = false;
            $('#responseMessage').html('<div class="alert alert-danger">Error: ' + error.responseText + '</div>');
          }
        });
      }

      function updateForm() {
        document.getElementById('submitbtn').disabled = true;
        var productName = $('#productName').val();
        var productDescription = $('#productDescription').val();
        var productCategory = $('#productCategory').val();
        var regularPrice = $('#regularPrice').val();
        var saleprice = $('#saleprice').val();
        var shortDescription = $('#shortDescription').val();
        var image1 = $('#image1').val();
        var productid = $('#productid').val();
        $.ajax({
          type: 'GET', // Use 'GET' method
          url: 'updateproduct.php',
          data: {
              id: productid,
              name: productName,
              description: productDescription,
              category: productCategory,
              regular_price: regularPrice,
              sale_price: saleprice,
              short_description: shortDescription,
              images: [
                  { 'src': image1 },
              ]
          },
          contentType: 'application/json',
          success: function(response) {
              console.log(response);
              location.href="/restapi";
          },
          error: function(error) {
              console.log(error);
              document.getElementById('submitbtn').disabled = false;
              $('#responseMessage').html('<div class="alert alert-danger">Error: ' + error.responseText + '</div>');
          }
});

      }


      function deleteProduct(id) {
        var productid=id;
        $.ajax({
          type: 'get',
          url: 'delete.php',
          data: {
            id: productid,
          },
          dataType: 'json',
          error: function(error) {
            $('#product-' + productid).remove();
          }
        });
      }
    </script>
  
    <!-- End custom js for this page -->
  </body>
</html>