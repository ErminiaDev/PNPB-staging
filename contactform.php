<?php

    $message_result = function (){
        if($GLOBALS['result']){
        echo '<div class="alert alert-success">Thank You! I will be in touch</div>';
        header("Location: contact.php#success-message");
        } else {
        echo  '<div class="alert alert-danger">Unable to send message...</div>';
        header("Location: contact.php#success-message");
        }
    };

   if ((isset($_POST['typeOfContact'])) && $_POST['typeOfContact'] === 'contact')
   {
        if(isset($_POST['submit']))
        {
            header('Content-type: text/html; charset=utf-8');
            $name = $_POST['fullName'];
            $mailFrom = $_POST['mail'];
            $subject = $_POST['typeOfContact'];
            $message = $_POST['message'];

            // $mailTo = "contact@painnoir-painblanc.fr";
            $mailTo = "melmexus@gmail.com";
            $headers = 'Content-Type: text/plain; charset=utf-8' . "\r\n";
            $headers .= "From: ".$mailFrom;
            $txt = "Vous avez reçu une demande de prise de contact de " . $name . ".\n\n" . $message;

            $GLOBALS['result'] = mail($mailTo, $subject, $txt, $headers);
            
        };
   } elseif ((isset($_POST['typeOfContact'])) && $_POST['typeOfContact'] === 'reservation') {

        if(isset($_POST['submit']))
        {
            header('Content-type: text/html; charset=utf-8');
            $name = $_POST['fullName'];
            $mailFrom = $_POST['mail'];
            $subject = $_POST['typeOfContact'];
            $message = $_POST['message'];
            $tel = $_POST['tel'];

            // $mailTo = "contact@painnoir-painblanc.fr";
            $mailTo = "melmexus@gmail.com";
            $headers = 'Content-Type: text/plain; charset=utf-8' . "\r\n";
            $headers .= 'From: ' . $mailFrom;
            $txt = "Vous avez reçu une demande de réservation de " . $name . ".\n\n" . "Numéro de téléphone: " . $tel . ".\n\n" . $message;

            $GLOBALS['result'] = mail($mailTo, $subject, $txt, $headers);
        }       
    } 
    
    // else {
    //     print_r($_POST);
    //     var_dump(isset($_POST['contact']));
    //     echo "\n";
    //     var_dump(isset($_POST['reservation']));
    //     echo "\n";
    //     var_dump(isset($_POST['submit'])); 
    // };
?>
