<?php

include_once "DataBase.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';
class Mail
{
    public function Sentmail($recipent, $u_id, $account){
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';
            // Specify main and backup SMTP servers
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'ai3482507@gmail.com';                 // SMTP username
            $mail->Password = '00112233';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('from@example.com', 'Mailer');
            $mail->addAddress($recipent);     // Add a recipient
            // Name is optional
            if ($account == "Student"){
                header("Location: ../view/Admin/Student/add_student.php");
            }
            elseif ($account == "Teacher"){
                header("Location: ../view/Admin/Teacher/add_teacher.php");
            }
            $mail->addReplyTo('info@example.com', 'Information');
            $mail->addCC('cc@example.com');
            $mail->addBCC('bcc@example.com');

            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Here is the subject';
            $mail->Body    = $u_id;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            if (!$mail->send()){
                echo "Error ".$mail->ErrorInfo;
            }
            else{
                $mail->clearAddresses();
            }
        }
        catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }


    public function showemailid($borrow_id){
        $obj = new DataBase();
        $DBH=$obj->DBconnection();

        $sql = "SELECT * FROM `show_borrow_books` WHERE `borrow_id`='$borrow_id' ";
        $conn= $DBH->query($sql);
        //$conn->execute();
        $all=$conn->fetch(PDO::FETCH_OBJ);
        return $all;
    }



    public function forReturnBook($recipent, $message){
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';
            // Specify main and backup SMTP servers
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'ai3482507@gmail.com';                 // SMTP username
            $mail->Password = '00112233';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('from@example.com', 'Mailer');
            $mail->addAddress($recipent);     // Add a recipient
            header("Location: ../view/Admin/Return_book/return_book_list.php");
            $mail->addReplyTo('info@example.com', 'Information');
            $mail->addCC('cc@example.com');
            $mail->addBCC('bcc@example.com');

            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Here is the subject';
            $mail->Body    = $message;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            if (!$mail->send()){
                echo "Error ".$mail->ErrorInfo;
            }
            else{
                $mail->clearAddresses();
            }
        }
        catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }
}