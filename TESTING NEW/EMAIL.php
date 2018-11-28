<?php
$empfaenger="tring.malt7742@gmail.com";
$betreff="Die Mail-Funktion";
//r folgt php-Dokementation Windows
$from="From: Markus <tring.malt7742@gmail.com>\r\n";//am Ende muss zeilenumbruch sonst fehler im header nicht lesen
//das Punkt hängt das am oberen Teil an
$from .="Reply-To: tring.malt7742@gmail.com\r\n";//Wo soll antwort hingesendet werden
$from .="Content-Type: text/html\r\n";//HTML emails bearbeiten
$text="Hallo, die <b>PHP</b> MAil wurde verschickt";

mail($empfaenger, $betreff, $text ,$from);//könnt Ihr die Mails verschicken

//bei meinem Anbieter ist es versperrt.
 ?>
