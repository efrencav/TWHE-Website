<?php
    use PHPMailer\PHPMailer\PHPMailer;

        $name = $_POST['contact-name'];
        $email = $_POST['contact-email'];
        $phone = $_POST['contact-phone'];
        $website = $_POST['website'];
        $message = $_POST['contact-messgae'];



        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";

        $mail = new PHPMailer();

        //SMTP Settings
        //$mail->SMTPDebug = true;
        $mail->isSMTP();
        $mail->Host = "twhe.org";
        $mail->SMTPAuth = true;
        $mail->Username = "info@twhe.org"; //enter you email address
        $mail->Password = 'TWHE@2015'; //enter you email password
        $mail->Port = 465;
        $mail->SMTPSecure = "ssl";

        //Email Settings
        $mail->isHTML(true);
        $mail->setFrom($email, 'twhe');
        $mail->addAddress("info@twhe.org"); //enter you email address

        // $mail->From = 'noreply@twhe.org';
        // $mail->Sender = 'info@twhe.org';
// Add a recipient 
        // $mail->addAddress($email); 
        $mail->Subject = ("$email");
        // $mail->Body = $body;
        
        // Email body content 
$mailContent = ' 
    <h2>Contact Query</h2>
    Name   : '.$name.'<br>
    Email : '.$email.'<br>
    Phone : '.$phone.'<br>
    Website   : '.$website.'<br>
    Message : '.$message.'';
    
    
    $mail->Body = $mailContent; 
        

        

        if ($mail->send()) {
            $status = "success";
            $response = "Email is sent!";


        } else {
            $status = "failed";
            $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
        }

        header('location: thank-you.html');

?>
