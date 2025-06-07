<?php require "../includes/header.php"; ?>  
<?php require "../config/config.php"; ?>
<?php
    $select = $conn->prepare("SELECT * FROM categories");
    $select->execute();

    $categories = $select->fetchAll(PDO::FETCH_OBJ);
?>

<style>
    .category-container .card {
        height: 100%;
        margin-bottom: 20px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .category-container .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    
    .description-box {
        height: 100px; 
        overflow-y: auto; 
        padding-right: 5px; 
        margin-bottom: 15px;
    }
    
    .description-box::-webkit-scrollbar {
        width: 5px;
    }
    
    .description-box::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }
    
    .description-box::-webkit-scrollbar-thumb {
        background: #c1c1c1;
        border-radius: 10px;
    }
    
    .description-box::-webkit-scrollbar-thumb:hover {
        background: #a8a8a8;
    }
    
    .category-title {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 100%;
        margin-bottom: 10px;
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

<div class="row mt-5 category-container">
    <?php foreach($categories as $category) : ?>
        <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1 mb-4">
            <div class="card">
                <img height="213px" class="card-img-top" src="../admin-panel/categories-admins/images/<?php echo $category->image; ?>">
                <div class="card-body d-flex flex-column">
                    <h5 class="category-title"><b><?php echo $category->name; ?></b></h5>
                    <div class="description-box" data-bs-toggle="tooltip" title="Scroll to read more">
                        <?php echo $category->description; ?>
                    </div>
                    <div class="scroll-indicator">
                        <i class="fas fa-arrows-alt-v"></i> Scroll to read more
                    </div>
                    <a href="<?php echo APPURL; ?>/categories/single-category.php?id=<?php echo $category->id ?>" class="btn btn-primary w-100 rounded my-2 mt-auto">Discover Products</a>      
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
        
        const descriptions = document.querySelectorAll('.description-box');
        descriptions.forEach(desc => {
            if (desc.scrollHeight > desc.clientHeight) {
                desc.closest('.card').querySelector('.scroll-indicator').style.opacity = '0.7';
            } else {
                desc.closest('.card').querySelector('.scroll-indicator').style.display = 'none';
            }
        });
    });
</script>

<?php require "../includes/footer.php"; ?>