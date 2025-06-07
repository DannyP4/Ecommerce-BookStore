<?php
    require "../includes/header.php"; ?>  
<?php
    require "../config/config.php"; ?>  

<?php
    $row = $conn->query("SELECT * FROM wishlist WHERE user_id = '$_SESSION[user_id]'");
    $row->execute();

    $allRow = $row->fetchAll(PDO::FETCH_OBJ);
    
?>  

    <div class="row mt-5">
        <?php if(count($allRow) > 0) : ?>
            <?php foreach ($allRow as $product): ?>
                <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1">
                    <div class="card" >
                        <img height="213px" class="card-img-top" src="../admin-panel/products-admins/images/<?php echo $product->pro_image; ?>">
                        <div class="card-body" >
                            <h5 class="d-inline"><b><?php echo $product->pro_name; ?></b> </h5>
                            <h5 class="d-inline"><div class="text-muted d-inline">(<?php echo $product->pro_price; ?>$)</div></h5>
                            <p><?php //echo substr($product->pro_description, 0, 120); ?> </p>
                            <a href="<?php echo APPURL; ?>/shopping/single.php?id=<?php echo $product->pro_id; ?>"  class="btn btn-primary w-100 rounded my-2">More <i class="fas fa-arrow-right"></i> </a>      
                        </div>
                    </div>
                    <br>
                </div> 
            <br>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="alert alert-success text-white bg-success">
                <h4 class="alert-heading">No Products in Wishlist</h4>
                <p>You can add products to your wishlist from the product page.</p>
                <hr>
                <p class="mb-0">Click <a href="<?php echo APPURL; ?>/index.php" class="text-white">here</a> to view products.</p>
            </div>
        <?php endif; ?>
    </div>

<?php
    require "../includes/footer.php"; ?>