<?php require "../includes/header.php"; ?>  
<?php require "../config/config.php"; ?>  

<?php
    $row = $conn->query("SELECT * FROM wishlist WHERE user_id = '$_SESSION[user_id]'");
    $row->execute();

    $allRow = $row->fetchAll(PDO::FETCH_OBJ);
?>  

<style>
    .wishlist-container .card {
        height: 100%;
        margin-bottom: 20px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .wishlist-container .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    
    .wishlist-title-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }
    
    .wishlist-title {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 70%;
        margin-bottom: 0;
    }
    
    .wishlist-price {
        font-weight: 600;
        color: #28a745;
        white-space: nowrap;
    }
    
    .alert-success.text-white {
        color: white !important;
    }
    
    .alert-success.text-white a {
        color: white;
        text-decoration: underline;
    }
    
    .alert-success.text-white a:hover {
        color: #f8f9fa;
    }
</style>

<div class="container">
    <h2 class="my-4">My Wishlist</h2>
    
    <div class="row mt-3 wishlist-container">
        <?php if(count($allRow) > 0) : ?>
            <?php foreach ($allRow as $product): ?>
                <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1 mb-4">
                    <div class="card">
                        <img height="213px" class="card-img-top" src="../admin-panel/products-admins/images/<?php echo $product->pro_image; ?>">
                        <div class="card-body d-flex flex-column">
                            <div class="wishlist-title-container">
                                <h5 class="wishlist-title"><b><?php echo $product->pro_name; ?></b></h5>
                                <span class="wishlist-price"><?php echo $product->pro_price; ?>$</span>
                            </div>
                            
                            <div class="mt-auto">
                                <a href="<?php echo APPURL; ?>/shopping/single.php?id=<?php echo $product->pro_id; ?>" class="btn btn-primary w-100 rounded my-2">
                                    <i class="fas fa-eye"></i> View Product
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12">
                <div class="alert alert-success text-white bg-success">
                    <h4 class="alert-heading">No Products in Wishlist</h4>
                    <p>You can add products to your wishlist from the product page.</p>
                    <hr>
                    <p class="mb-0">Click <a href="<?php echo APPURL; ?>/index.php" class="text-white">here</a> to view products.</p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php require "../includes/footer.php"; ?>