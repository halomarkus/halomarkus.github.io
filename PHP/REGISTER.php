<?php
require 'CONNECT.php';//externe PHP Dateien über HTTP einbinden
//Sollte die Funktion die Datei in keinem der Pfade finden,
// wird ein FATAL ERROR erzeugt. Das Skript wird abgebrochen
if(isset($_POST['save']))//Prüft, ob eine Variable existiert und ob sie nicht NULL ist
{
if($_POST['password']===$_POST['password2'])
  {
  echo 'Password ist gleich <br/>';
}
else
{
  die('Password nicht gleich<br/>');
}
if(($_POST['username']===$_POST['firstname']) &&($_POST['username']===$_POST['secondname'])&&($_POST['firstname']===$_POST['secondname']))
{
  die('ok alle namen gleich<br/>');//Dieses Sprachkonstrukt entspricht exit.
}
//EMAIL prüfen
$emailtest=$_POST['email'];
$muster="/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9.-]+.[a-zA-Z]+$/";
if(preg_match($muster, $emailtest)){//Führt eine Suche mit einem regulären Ausdruck durch
  echo "Eingabe enthält gültige Email<br/>";
} else {
  echo "Eingabe enthält nicht gültige Email";
}//EMAIL prüfen

//CHeck if username exist
$sql="SELECT COUNT(username) AS user FROM tprojekt_2 WHERE username = :username";//überprüft die tabelle
$sql1="SELECT COUNT(username) AS mail FROM tprojekt_2 WHERE email = :email";
$check= $newcon->prepare($sql)or die($newcon->errorInfo()[2]);
$check1= $newcon->prepare($sql1)or die($newcon->errorInfo()[2]);
//bind the provided username to our prepared statement.
$check->bindValue('username',$_POST['username']);//bindValue () ist die Variable als reference gebunden und wird nur zu dem timepunkt ausgewertet,
$check1->bindValue('email',$_POST['email']);

$check->execute();
$check1->execute();

//Fetch the row.
$row=$check->fetch(PDO::FETCH_ASSOC);
if($row['user']>0){
  die('That username already exists!');
                  }
$row1=$check1->fetch(PDO::FETCH_ASSOC);
if($row1['mail']>0){
  die('That email already exists!');
                   }
  $qry=$newcon->prepare('insert into tprojekt_2 (username, password, email, age, firstname, secondname)
  values(:username, :password, :email, :age, :firstname, :secondname)')or die($newcon->errorInfo()[2]);
  //Bei der Verwendung von bindParam wird nur eine Referenz auf die Variable an das Statement gebunden.
  //Das spätere ändern des Variablenwertes führt dazu, dass auch das ausgeführte Statement einen anderen Wert bekommt
  $qry->bindParam('username',$_POST['username']);
  $qry->bindParam('password',password_hash($_POST['password'],PASSWORD_BCRYPT));
  //erstellt einen neuen Passwort-Hash und benutzt dabei einen starken Einweg-Hashing-Algorithmus
  $qry->bindParam('email',$_POST['email']);
  $qry->bindParam('age',$_POST['age']);
  $qry->bindParam('firstname',$_POST['firstname']);
  $qry->bindParam('secondname',$_POST['secondname']);
  $qry->execute();
  if($qry){
    echo 'Thank you for registering with our website.';
          }
   header('location:LOGIN.php');//Es wird nicht nur der Header an den Browser geschickt, sondern auch ein REDIRECT (302) Statuscode, wenn nicht bereits der 201- oder ein 3xx-Statuscode gesendet wurde
}
?>
<form method="post">
  <fieldset>
    <legend>Account Information</legend>
    <table cellpadding="2" cellspacing="2">
      <tr>
        <td>Username</td>
        <td><input type="text" name="username" required></td>
      </tr>
      <tr>
        <td>Password</td>
        <td><input type="password" name="password" autocomplete="off" required></td>
      </tr>
      <tr>
        <td>Reenterpassword</td>
        <td><input type="password" name="password2"></td>
      </tr>
      <tr>
        <td>Email</td>
        <td><input type="text" name="email" required></td>
      </tr>
      <tr>
        <td>Age</td>
        <td><input type="number" name="age"></td>
      </tr>
      <tr>
        <td>Firstname</td>
        <td><input type="text" name="firstname"></td>
      </tr>
      <tr>
        <td>Lastname</td>
        <td><input type="text" name="secondname"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="submit" name="save" value="Save"></td>
      </tr>
    </table>
  </fieldset>
</form>
