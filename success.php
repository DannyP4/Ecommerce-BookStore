<?php require "includes/header.php"; ?>
<?php 
    if(!isset($_SERVER['HTTP_REFERER'])) {
        header("Location: index.php");
        exit;
    }
?>
<?php header("refresh:10; url=index.php"); ?>
        <div class="d-flex align-items-center justify-content-center vh-100">
            <div class="text-center">
                <h1 class="display-1 fw-bold">Payment Success</h1>
                <p class="lead">
                    Your payment was successful. Please go check your email account for the book.<br>
                    You will be redirected to Home page shortly.<br>
                  </p>
                <a href="index.php" class="btn btn-primary">Go Home</a>
            </div>
        </div>
        
<?php require "includes/footer.php"; ?>
