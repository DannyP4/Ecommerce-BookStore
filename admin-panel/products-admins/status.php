<?php require "../layouts/header.php"; ?>  
<?php require "../../config/config.php"; ?> 
<?php
    if(isset($_GET['id']) && isset($_GET['status'])) {
        $id = $_GET['id'];
        $status = $_GET['status'];

        if($status > 0) {
            $update = $conn->prepare("UPDATE products SET status = 0 WHERE id = '$id'");
            $update->execute();
        } else {
            $update = $conn->prepare("UPDATE products SET status = 1 WHERE id = '$id'");
            $update->execute();
        }
        header("location: ".ADMINURL."/products-admins/show-products.php");
    } else {
        echo "<script>alert('Invalid request');</script>";
    }

?>

<?php require "../layouts/footer.php"; ?>