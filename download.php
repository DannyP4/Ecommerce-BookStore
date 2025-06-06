<?php require "includes/header.php"; ?>  
<?php require "config/config.php"; ?>  

<?php

    if(!isset($_SERVER['HTTP_REFERER'])) {
        header("Location: index.php");
        exit;
    }

    $select = $conn->query("SELECT * FROM cart WHERE user_id = '$_SESSION[user_id]'");
    $select->execute();
    $allProduct = $select->fetchAll(PDO::FETCH_OBJ);

    $path = "admin-panel/products-admins/books";

    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'src/Exception.php';
    require 'src/PHPMailer.php';
    require 'src/SMTP.php';

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'pdlong1911@gmail.com';                 //SMTP username
        $mail->Password   = 'teoy swlb yrrr yzat';                  //SMTP password
        //$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Sender
        $mail->setFrom('pdlong1911@gmail.com', 'Bookstore');

        //Add a recipient
        $mail->addAddress($_SESSION['email'], 'Long');   

        foreach ($allProduct as $product) {
            $filePath = $path . "/" . $product->pro_file;
            if (file_exists($filePath)) {
                $mail->addAttachment($filePath);
            }
        }

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'The books you bought from Bookstore';
        $mail->Body    = 'Here are your books you paid '.$_SESSION['price'].'$ <b>Thanks for buying from Bookstore</b>';
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();

        // Delete all products from the cart after sending the email
        $select = $conn->query("DELETE FROM cart WHERE user_id = '$_SESSION[user_id]'");
        $select->execute();

        header("location: success.php");
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
?>