<?php
include 'assets/header.php';
$products = $woocommerce->get('products');
?>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Products</h4>
            <!-- Opening tag for the table -->
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th> image </th>
                            <th> Product Name </th>
                            <th> Regular price </th>
                            <th> Sale Price </th>
                            <th> Type </th>
                            <th> Date created </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Loop through each product -->
                        <?php foreach ($products as $product) : ?>
                            <tr id="product-<?= $product->id ?>">
                              <td class="p-0 pt-1 pb-1">
                                <img style="height:80px" class="w-100 rounded" src="<?= $product->images[0]->src ?>" alt="product" />
                              </td>
                                <td><?= $product->name; ?></td>
                                <td>$<?= $product->regular_price; ?></td>
                                <td>$<?= $product->sale_price; ?></td>
                                <td><?= $product->type; ?></td>
                                <td><?= (new DateTime($product->date_created))->format('M d, Y H:i:s'); ?></td>
                                <td>
                                <button class="btn p-0" onclick="location.href='edit.php?id=<?= $product->id ?>'">
                                  <i class="mdi mdi-pencil"></i>
                                </button>
                                <button class="btn p-0" onclick="if(confirm('Are you sure you want to delete this product?')) { deleteProduct(<?= $product->id ?>); }">
                                  <i class="mdi mdi-delete"></i>
                                </button>
                                <button class="btn p-0">
                                  <a href="<?= $product->permalink ?>"><i class="mdi mdi-eye text-light"></i></a>
                                </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <!-- ... -->
                    </tbody>
                </table>
            </div>
            <!-- Closing tag for the table -->
        </div>
    </div>
</div>

<?php
include 'assets/footer.php';
?>
