</pre>
<?php
$id=$_GET["id"];
$name=$_GET["namen"];
$geschlecht=$_GET["geschlecht"];
$alter=$_GET["alter"];
$passwort=$_GET["passwort"];
$hallo=$_GET["hallo"];
$maxsp=$_GET["Bild"];//VARIABEL die man bekommt

echo "Name: $name<br>";
if(isset($name))
{
	// echo "Hallo $name <br>";
	$path="TEXT.txt";//dateischreib
	if($alter<=18)
			{
		$inhalt=$hallo." ".$name."\r\n";
			}
			else{
	$inhalt=$hallo." ".$geschlecht." ".$name."\r\n";
			}
	if(is_writable($path))//überprüfe
	{
		if(!$offnen=fopen($path,"a"))
		{
			echo "Datei $path nicht öffnen";
			exit;
		}
		if(!fwrite($offnen,$inhalt))
		{
			echo "Datei $path nicht schreiben";
			exit;
		}

		echo "in $path drin geschrieben: $inhalt<br/>";
		fclose($offnen);//function closes an open file
	} else {
		echo "$path nicht schreibbar";
	}
	echo "Register: $name<br>";//doppelt
if(is_file($path))//Prüft, ob der Dateiname eine reguläre Datei ist
{
	$anzahl=file($path);
	foreach($anzahl as $nummer =>$linie)
	{
		//Key =>Value
		echo "Linie NR. <b>".$nummer.":</b> ".$linie."<br>";
	}
}
echo "Bild hochladen <br>";
	$dateityp=$_FILES['probild']['type'];//type
	$up='ump/';//Pfad
	if($_FILES['probild']['size']<=$maxsp)//grösse
	{
		echo "<br>OK<br>";
	if($dateityp =="image/jpeg" ||$dateityp =="image/png")//überprüfe type
	{
		if(move_uploaded_file($_FILES['probild']['tmp_name'],$up.$_FILES['probild']['name']))//Verschiebt eine hochgeladene Datei an einen neuen Ort
		{
print "Bild ERFOLG!!!<br>\n";
print_r($_FILES);
		}
else {
print "Upload FEHLER!!!<br>\n";
print_r($_FILES);
}
	}
else {
echo "FEHLER TYP <br><br>";
}
	}
	else {
		echo "FEHLER<br>";
	}
	}
?>
<br><br><br>
<table><tr>
PHP_SELF: <?php echo $_SERVER['PHP_SELF']; ?><!--Pfad Informationen-->
<form method='get' action='<?php echo $_SERVER['PHP_SELF']; ?>' ><!--Informationen über Server und Ausführungsumgebung-->
<tr><td>Name:<td>
<input TYPE=TEXT size='20' maxlength='20' name="namen">
<tr><td>Password:<td>
<input TYPE=password size='20' maxlength='20' name="passwort">
<tr><td>Geschlecht:<td>
<input type='radio' size='20' name="geschlecht" value="Herr." >
<label for="Herr.">Männlich</label>
<input type='radio' size='20' name="geschlecht" value="Frau." >
<label for="Frau.">Weiblich</label>
<tr><td>Alter:<td>
<input type='number' size='2' maxlength='2' name="alter">
<tr><td>Bild:</td>
<input type='file' size='20' maxlength='2' name='probild'>
<input type="hidden" name="Bild" value="10000000"><!--Erst beim klicken erfolgt-->
<input type="hidden" value="Willkommen" name="hallo">
<input type="hidden" name="id">
<tr><td><td>
<input type=submit  value="Eintragen">
</table>
</form><br><br>
