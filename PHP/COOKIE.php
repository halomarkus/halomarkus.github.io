<?php
    $_SESSION['wert1'] = 1234599;
        $_SESSION['wert2'] = "abcd11";
if(!$_COOKIE['olga'])
{
  //bool setcookie ( string $name [, string $value = "" [, int $expire = 0 [, string $path = "" [, string $domain = "" [, bool $secure = FALSE [, bool $httponly = FALSE ]]]]]] )
	setcookie('$tricky','inhalt',time()+1000,"/findmich/:D","",FALSE,TRUE);
	echo "COOKie olga gesetzt";
}
else{
	setcookie('$tricky','inhalt',time()+1000,"/findmich/:D","",FALSE,TRUE);
	echo "COOKie olga vorhanden";
}


echo "<br>1. Cookie hat den Wert: ".$_COOKIE['olga'];
//cookie wert
$mySess=$_SESSION;
echo "<br>Anzahl der Werte im Array SeSSION: ".count($mySess);
//gibt due werte einer session

foreach($_COOKIE as $indexsess =>$wertsess)
{
	echo "<br>Index: ".$indexsess." Wert: ".$wertsess;
}
?>
<html>
<head>
<meta charset="utf-8"/>
<title>Cookie Seite 1</title>
</head>
<body>
<h1>COOKIE SEITE 1</h1>
<br><br>
<br><br>
