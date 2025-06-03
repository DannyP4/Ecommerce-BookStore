<?php require "includes/header.php"; ?>  
<?php require "config/config.php"; ?>  

<?php

    $select = $conn->query("SELECT * FROM cart WHERE user_id = '$_SESSION[user_id]'");
    $select->execute();
    $allProduct = $select->fetchAll(PDO::FETCH_OBJ);

    //$files = array('readme.txt', 'test.html', 'image.gif');
    $zipname = 'bookstore.zip';
    $zip = new ZipArchive;
    $zip->open($zipname, ZipArchive::CREATE);
    foreach ($allProduct as $product) {
        $zip->addFile("books/" . $product->pro_file);
    }
    $zip->close();

    header('Content-Type: application/zip');
    header('Content-disposition: attachment; filename='.$zipname);
    //header('Content-Length: ' . filesize($zipname));
    readfile($zipname);
?>