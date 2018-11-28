<html>
<body>
<h3><a href="EXTRA.php?numb1">Anzahl NUTZER</a></h3>
<h3><a href="EXTRA.php?last">Letzter Nutzer</a></h3>
<?php

include "CONNECT.php";
//include (Manual) versucht eine Datei wie oben beschrieben einzubinden.
//keinem der Pfade gefunden werden konnte, dann wird eine Warnung ausgegeben
if(isset($_GET['numb1'])){
//ANZAHL NUTZER
$sql="select * from tprojekt_2";
$result=$newcon->query($sql) or die($newcon->errorInfo()[2]);//mysql_query
$count= $result->rowCount();//Die Anzahl der betroffenen Zeilen
echo "Es wurden ".$count." User gefunden<br/>";//ANZAHL NUTZER
}
if(isset($_GET['last'])){
//Letzter NUTZER
$neu_id=$newcon->lastInsertId();//Die vergebene ID einer Auto Increment-Spalte
echo "Letzter Nutzer angelegt mit der ID= $neu_id";//Letzter NUTZER
}

?>
</body>
</html>
