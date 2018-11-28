<body>
<style>
center{
	font-weight:bold;
	color:red;
}

table {
	border:2px solid blue;
}


</style>
<table> <tr><th><a href=Ergebnis.php?zahl=eins>Zahl &lt;1&gt;</a></th>
<th><a href=Ergebnis.php?zahl=zwei>Zahl &lt;2&gt;</a></th>
<th><a href=Ergebnis.php?zahl=drei>Zahl &lt;3&gt;</a></th>
</tr>
<tr><td colspan=3></td>
</tr>
</table>
<!--Informationen über Server und Ausführungsumgebung-->
<form method=get action='<?php echo $_SERVER["PHP_SELF"]; ?>'>
<input type=number size=6 name="test" value="0-100">
<input type=submit value="Testen">
</form>
<pre>
