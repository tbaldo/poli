<?php

function getValue($value) {
    return isset($_POST[$value]) ? $_POST[$value] : '';
}

function validaEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function send($from, $subject, $message, $to, $email_reply, $name) {
    $headers = "From: $email_reply\r\n" .
               "Reply-To: $from\r\n" .
               "X-Mailer: PHP/" . phpversion() . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
  
  mail($to, $subject, nl2br($name"\r\n". $message), $headers);
}

$email_reply = "email@reply.com";
$to = "tiago.b.baldo@gmail.com";
$from = getValue("email");
$message = getValue("message");
$subject = getValue("subject");
$name = getValue("name");
$page = getValue("page");

if (validaEmail($from) && $message && $subject && $name) {
    enviaEmail($from, $subject, $message, $to, $email_reply, $name);
    $redir = $page . "html?sucesso=true";
} else {
    $redir = $page . "html?sucesso=false";
}

header("location:$redir");

?>