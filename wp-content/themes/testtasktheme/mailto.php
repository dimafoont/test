<?php

if ( isset( $_POST['name'] ) && isset($_POST['email'])) {
    $name  = substr( $_POST['name'], 0, 64 );
    $email   = $_POST['email'];
    $text = $_POST['text'];
    if(isset($_POST['title'])){
        $title = $_POST['title'];
    } else {
        $title = "Message from John Doe";
    }

    $to = 'dzinoviev@ukr.net';

    if ( !empty( $_FILES['file']['tmp_name'] ) and $_FILES['file']['error'] == 0 ) {
        $filepath = $_FILES['file']['tmp_name'];
        $filename = $_FILES['file']['name'];
    } else {
        $filepath = '';
        $filename = '';
    }

    $body = "Name:\r\n".$name."\r\n\r\n";

    if(isset($_POST['title']))  {
        $body .= "Title:\r\n".$title."\r\n\r\n";
    }

    $body .= "Name:\r\n".$_POST["name"]."\r\n";
	$body .= "Email:\r\n".$_POST['email']."\r\n";
    $body .= "Text:\r\n".$_POST['text']."\r\n";	

    send_mail($to, $body, $filepath, $filename, $title);

}

// Common function for sending mail message with attachment
function send_mail($to, $body, $filepath, $filename, $title)
{
    $subject = $title;
    $boundary = "--".md5(uniqid(time()));
    $headers = "From: " . "John Doe" . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .="Content-Type: multipart/mixed; boundary=\"".$boundary."\"\r\n";
    $multipart = "--".$boundary."\r\n";
    $multipart .= "Content-type: text/plain; charset=\"utf-8\"\r\n";
    $multipart .= "Content-Transfer-Encoding: quoted-printable\r\n\r\n";

    $body = $body."\r\n\r\n";

    $multipart .= $body;

    $file = '';
    if ( !empty( $filepath ) ) {
    $fp = fopen($filepath, "r");
    if ( $fp ) {
      $content = fread($fp, filesize($filepath));
      fclose($fp);
      $file .= "--".$boundary."\r\n";
      $file .= "Content-Type: application/octet-stream\r\n";
      $file .= "Content-Transfer-Encoding: base64\r\n";
      $file .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
      $file .= chunk_split(base64_encode($content))."\r\n";
    }
    }
    $multipart .= $file."--".$boundary."--\r\n";
    mail($to, $subject, $multipart, $headers);
}
