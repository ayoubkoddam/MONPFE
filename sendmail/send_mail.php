<?php
    
   require 'PHPMailer-master/PHPMailerAutoload.php';
   $mail = new PHPMailer();
   $mail ->isSmtp();
   $mail ->SMTPDebug = 0;
   $mail ->SMTPAuth = true;
   $mail ->SMTPSecure = 'ssl';
   $mail ->Host = 'smtp.gmail.com';
   $mail ->Port = 465; // or 587
   $mail ->isHTML(true);
   $mail ->Username = "naoualelmahmoudi08@gmail.com";
   $mail ->Password = "missnawal123";
   $mail ->SetFrom("naoualelmahmoudi1996@gmail.com","monPFE");
   $mail ->Subject = 'Here is the subject';
   $mail ->Body = 'bonjour ' ;
   $mail ->AddAddress('naoualelmahmoudi1996@gmail.com');

   if(!$mail->Send())
   {
       echo 'Eroor '.$mail->ErrorInfo ;
       echo "Mail Not Sent";
   }
   else
   {
       echo "Mail Sent";
   }





   

