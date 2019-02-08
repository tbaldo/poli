<?php

function getValue($value) {
    return isset($_POST[$value]) ? $_POST[$value] : '';
}

$email_site = "contato@psicologapoliana.com.br";
$to = "contato@psicologapoliana.com.br";
$from = getValue("email");
$message = getValue("message");
$subject = getValue("subject");
$name = getValue("name");
$page = getValue("page");

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= "From: $name <$email_site> \r\n";
$headers .= "Reply-To: $from";
  
$send = mail($to, $subject, $message, $headers);

if ($send) {
    $redir = $page . ".html?sucesso=true";
    echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$redir.'">';
} else {
    $redir = $page . ".html?sucesso=false";
    echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$redir.'">';
}

?>
<html>
    <script src="js/google-analytics.js"></script>
    <script>
        ga('send', {
            hitType: 'pageview',
            page: location.pathname
        });
    </script>
</html>