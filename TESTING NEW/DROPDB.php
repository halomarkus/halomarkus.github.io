<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>PROJEKT 2</title>
</head>
<body>
<?php
include 'CONNECT.php';
// DB aufmachen Reihenfolge der Parameter: Server, User, Passwort,
//Fehlernummer mysqli
       if ($newcon->connect_errno)
	   {
       //Fehlertext
             echo "Failed to connect to MySQL: " . $newcon->connect_error;
			 die();
        }
        // sql vorbereiten

        $dbString = "DROP TABLE IF EXISTS tprojekt_2";
		$ergebnis1 = $newcon->query($dbString);
    //Simple Datenabfragen an die Datenbank gesendet

    $dbString = "DROP DATABASE IF EXISTS dbprojekt_2";
		$ergebnis2 = $newcon->query($dbString);
    echo "Tabelle und Datenbank gelöscht";
    ?>
    </body>
</html>
