<?php

function strip_crlf($string)
{
    return str_replace("\r\n", "", $string);
}

if (! empty($_POST["send"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $content = $_POST["content"];

    $toEmail = "tmehar158@gmail.com";
    // CRLF Injection attack protection
    $name = strip_crlf($name);
    $email = strip_crlf($email);
    if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "The email address is invalid.";
    } else {
        // appending \r\n at the end of mailheaders for end
        $mailHeaders = "From: " . $name . "<" . $email . ">\r\n";
        if ($email !=NULL) {
            mail($toEmail, $phone, $content, $mailHeaders);
            $message = "Your contact information is received successfully.";
            $type = "success";
        }
    }
}
require_once "contact_me.php";
?>