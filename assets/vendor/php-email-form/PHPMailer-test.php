  <?php
    /* You need to add your variables $_POST in your PHPmailer script :*/

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'src/Exception.php';
    require 'src/PHPMailer.php';
    require 'src/SMTP.php';

    $mail = new PHPMailer(true);   // Passing `true` enables exceptions
    try {
        //Server settings
        $mail->SMTPDebug = 0;          // Enable verbose debug output
        $mail->isSMTP();               // Set mailer to use SMTP
        $mail->Host = 'smtp.test.de';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;        // Enable SMTP authentication
        $mail->Username = 'MY EMAIL';      // SMTP username
        $mail->Password = 'MY PASSWORT!';  // SMTP password
        $mail->SMTPSecure = 'ssl';         // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                 // TCP port to connect to

        //Recipients
        $mail->setFrom('MY EMAIL');
        $mail->addAddress($_POST['mail']);     // Add a recipient



        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $_POST['subject'];
        $mail->Body    = $_POST['text'];

        $mail->send();
        echo 'Message has been sent';
        // i changed the code, at the end i added an redirection to example.com/contact.php, 
        // so change this url with the page that you want see after sending message 
        // header('Location: http://www.example.com/contact.php');
        exit();
    } catch (Exception $e) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
    ?>