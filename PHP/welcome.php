<?php
session_start();
//Sollte die Funktion die Datei in keinem der Pfade finden,
// wird ein FATAL ERROR erzeugt. Das Skript wird abgebrochen.
//include_once (Manual) sorgt dafür,
// dass eine Datei nur einmal eingebunden wird.
require_once "CONNECT.php";
if(!isset($_SESSION['username'])){//Möchten wir einen Wert / eine Variable über mehrere Seitenaufrufe hinweg in der Session speichern
  die("Bitte erst einloggen"); //Mit die beenden wir
  //den weiteren Scriptablauf
}

//In $name den Wert der Session speichern
$name=$_SESSION['username'];
if(isset($_SESSION["username"]))
{
  echo '<h3>Login Success, welcome - '.$_SESSION["username"].'</h3>';
  echo '<br/><br/><a href="LOGOUT.php"></a>';
}
else {
  header("location:LOGIN.php");//Es wird nicht nur der Header an den Browser geschickt, sondern auch ein REDIRECT (302) Statuscode, wenn nicht bereits der 201- oder ein 3xx-Statuscode gesendet wurde
}
//Text ausgeben
echo "Hallo: $name<br/>
<a href=\"LOGOUT.php\">Logout</a>";
?>
