<?php

   $db_HOST="localhost";
   $db_DATABASE="doc";
   $db_USER="root";
   $db_PASSWORD="";

 $db_TABLE="";

   $db_id="id";
   $db_username="username";
   $db_pass="password";
   $db_check="checkpass";
   $db_email="email";
   $db_age="age";
   $db_fname="firstname";
   $db_sname="secondname";

    try {
          $con=new PDO("mysql:host=$db_HOST;dbname=$db_DATABASE",$db_USER,$db_PASSWORD);//Verbindung erstellt
          $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          //Error reporting. || Throw exceptions.
        } catch (PDOException $e) {//exceptions abfangen
          echo $e->getMessage();
          die('Sorry, database problem.');
        }

if(!$con){
  die('Can not connect: '.PDO::errorInfo());//Fetch extended error information associated with the last operation on the database handle
} else {
  $db_DATABASE2="dbprojekt_2";
  $sql="create database IF NOT exists ".$db_DATABASE2;
  $anfrage=$con->prepare($sql); //query vorbereiten
  if($anfrage==TRUE)
  {
    $erstellt=$anfrage->execute(); //querry ausführen
    echo "Database $db_DATABASE2 created <br/>";
    $newcon=new PDO("mysql:host=$db_HOST;dbname=$db_DATABASE2",$db_USER,$db_PASSWORD);
    //erstelle Tabelle
    $db_TABLE="tprojekt_2";
    $sql="create table IF NOT exists ".$db_TABLE.
    "(
      $db_id int(11) NOT NULL AUTO_INCREMENT,
      PRIMARY KEY($db_id),
      $db_username varchar(50) NOT NULL,
      $db_pass varchar(50) NOT NULL,
      $db_email varchar(250) NOT NULL,
      $db_age int(3),
      $db_fname varchar(50),
      $db_sname varchar(50)
      )";
      $tabelle=$newcon->prepare($sql);
if($tabelle==TRUE)
{
      $erstellt2=$tabelle->execute();
      echo "Table $db_TABLE created<br/>";
      //Füge information ein
      $werte=$newcon->prepare("insert into ".$db_TABLE." ($db_username, $db_pass, $db_email) VALUES (?,?,?)");
      $werte->execute(array('markus','pass','markus@example.com'));
      if($werte==TRUE){
        echo "Insert data in $db_TABLE";
      }
      else {
        echo "USER already exist";
      }
}
else {
  echo "Table $db_TABLE already exist";
}
  }
  else {
    echo "Database already exists";
  }
}

?>
