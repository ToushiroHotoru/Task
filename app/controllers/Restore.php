<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    Class Restore extends Controller
    {
        function index() 
        {


            if(isset($_POST['email'])){
                
                if(empty($_POST['email'])){
                    $error = 'An email is required';
                } else{
                    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                        $error = 'Email must be a valid email address';
                    }
                }
            }

            if(!empty($errors)){
                $data['error'] = $error;
            } else {
                if(isset($_POST['email']))
                {
                    $user = $this->loadModel('user');
                    setcookie("email", $_POST['email'], time()+86400);
                    setcookie("restore_key",  get_random_string_max(20), time()+86400);
                    $message = 'Click this link to change your password: ' . ROOT . 'password/' . $_COOKIE['restore_key'];
                   
                    $mail = new PHPMailer();

                    $mail->isSMTP();

                    $mail->SMTPDebug = SMTP::DEBUG_SERVER;

                    $mail->Host = "smtp.gmail.com";

                    $mail->SMTPAuth = "true";

                    $mail->SMTPSecure = "tls";

                    $mail->Port = "587";

                    $mail->Username = "toushirohotoru@gmail.com";

                    $mail->Password = "4yT2VvG3tNnDq99rdJm3XFsP6xu2l3";

                    $mail->Subject = "Test just some test";

                    $mail->setFrom("toushirohotoru@gmail.com");

                    $mail->Body = $message;

                    $mail->SMTPOptions = array(
                        'ssl' => array(
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                            'allow_self_signed' => true
                        )
                    );

                    $mail->addAddress($_POST['email']);
                    show($_POST['email']);

                    if($mail->Send())
                    {
                        $data['message'] = "email sent successfully";
                    } else {
                        $data['message'] = "Sorry, filed while sending email: " . $mail->ErrorInfo;
                        
                    }
                    $mail->smtpClose();
                } 
            }
            $data['page_title'] = "Restore password";
            $this->view("restore", $data);
        }

    }
