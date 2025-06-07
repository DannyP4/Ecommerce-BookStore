<?php require "includes/header.php"; ?>  
<?php require "config/config.php"; ?>  

<?php
    $row = $conn->query("SELECT * FROM products WHERE status = 1");
    $row->execute();

    $allRow = $row->fetchAll(PDO::FETCH_OBJ);
?>  

<style>
    .product-container .card {
        height: 100%;
        margin-bottom: 20px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .product-container .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    
    .product-description {
        height: 100px; 
        overflow-y: auto; 
        padding-right: 5px; 
        margin-bottom: 15px;
    }
    
    .product-description::-webkit-scrollbar {
        width: 5px;
    }
    
    .product-description::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }
    
    .product-description::-webkit-scrollbar-thumb {
        background: #c1c1c1;
        border-radius: 10px;
    }
    
    .product-description::-webkit-scrollbar-thumb:hover {
        background: #a8a8a8;
    }
    
    .product-title-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }
    
    .product-title {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 70%;
        margin-bottom: 0;
    }
    
    .product-price {
        font-weight: 600;
        color: #28a745;
        white-space: nowrap;
    }
    
    .scroll-indicator {
        font-size: 12px;
        color: #6c757d;
        text-align: right;
        margin-top: -12px;
        margin-bottom: 8px;
        opacity: 0;
        transition: opacity 0.3s;
    }
    
    .card:hover .scroll-indicator {
        opacity: 1;
    }
</style>

<div class="row mt-5 product-container">
    <?php foreach ($allRow as $product): ?>
        <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1 mb-4">
            <div class="card">
                <img height="213px" class="card-img-top" src="admin-panel/products-admins/images/<?php echo $product->image; ?>">
                <div class="card-body d-flex flex-column">
                    <div class="product-title-container">
                        <h5 class="product-title"><b><?php echo $product->name; ?></b></h5>
                        <span class="product-price"><?php echo $product->price; ?>$</span>
                    </div>
                    <div class="product-description" data-bs-toggle="tooltip" title="Scroll to read more">
                        <?php echo $product->description; ?>
                    </div>
                    <div class="scroll-indicator">
                        <i class="fas fa-arrows-alt-v"></i> Scroll to read more
                    </div>
                    <a href="<?php echo APPURL; ?>/shopping/single.php?id=<?php echo $product->id; ?>" class="btn btn-primary w-100 rounded my-2 mt-auto">More <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
        
        const descriptions = document.querySelectorAll('.product-description');
        descriptions.forEach(desc => {
            if (desc.scrollHeight > desc.clientHeight) {
                desc.closest('.card').querySelector('.scroll-indicator').style.opacity = '0.7';
            } else {
                desc.closest('.card').querySelector('.scroll-indicator').style.display = 'none';
            }
        });
    });
</script>

<?php require "includes/footer.php"; ?>