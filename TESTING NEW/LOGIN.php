<?php
session_start();
require 'CONNECT.php';
//Sollte die Funktion die Datei in keinem der Pfade finden,
// wird ein FATAL ERROR erzeugt. Das Skript wird abgebrochen.
//include_once (Manual) sorgt dafür,
// dass eine Datei nur einmal eingebunden wird.
if(isset($_POST["buttonLogin"]))//Prüft, ob eine Variable existiert und ob sie nicht NULL ist
{
  if(empty($_POST["username"]) || empty($_POST["password"]))//Prüft, ob eine Variable leer ist. Eine Variable ist leer, wenn sie nicht existiert oder wenn ihr Wert gleich FALSE ist.
  {
    $error='<label>All fields are required</label>';
  }
  else {
$qry=$newcon->prepare("select * from tprojekt_2 where username = :username AND password = :password")
or die($newcon->errorInfo()[2]);//query vorbereiten
//Ein Array kann durch das Sprachkonstrukt array() erzeugt werden. Dies nimmt eine beliebige Anzahl kommaseparierter Schlüssel => Wert- Paare als Parameter entgegen.
$qry->execute(array('username'=>$_POST["username"],'password'=>$_POST["password"]));
$count=$qry->rowCount();////Die Anzahl der betroffenen Zeilen
if($count>0)//fängt bei 1 an
{
  $_SESSION["username"]=$_POST["username"];//Möchten wir einen Wert / eine Variable über mehrere Seitenaufrufe hinweg in der Session speichern
  header('location:welcome.php');//Es wird nicht nur der Header an den Browser geschickt, sondern auch ein REDIRECT (302) Statuscode, wenn nicht bereits der 201- oder ein 3xx-Statuscode gesendet wurde.
}
else {
  $error="Wrong data";
}
}
}?>
<?php if(isset($error)){
echo $error;
}?>
<form method="post">
  <fieldset>
    <legend>Login</legend>
    <table cellpadding="2" cellspacing="2">
      <tr>
        <td>Username</td>
        <td><input type="text" placeholder="Enter Username" name="username" autocomplete="off" required></td>
      </tr>
      <tr>
        <td>Password</td>
        <td><input type="password" placeholder="Enter Password" name="password" autocomplete="off" required></td><!--required muss gefüllt sein-->
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>
          <input type="submit" value="Login" name="buttonLogin">
          <input type="reset" value="Reset" name="Resetten">
          <br>
          <a href="REGISTER.php">Sign up</a></td>
      </tr>
    </table>
  </form>
