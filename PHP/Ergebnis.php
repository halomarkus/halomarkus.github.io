<?php
include_once 'HEADER.php';
include_once 'MENU.php';
//Bei der GET-Methode spricht man von Variablenwerten, die mittels der URL übergeben werden.
//$_POST-Variablen nicht per URL, sondern per Formular übertragen (mehr Infos zu HTML-Formulare).
 ?>
<center>HELLO WORLD</center>
<?php
error_reporting(0);// Turn off all error reporting
//*****HTML/CSS/PHP******//
$tricky="HELLO WORLD";
echo "<table><tr><th>VARIABEL</th><th>TYP</th></tr>";
echo "<tr><td>\$tricky</td>";//slash
echo "<td>".gettype($tricky)."</td></tr>";//bekomme typ
echo "<tr><td colspan=2><center><b>ÄNDERUNG</b></center></td></tr>";
echo "<tr><td>$tricky</td>";
settype($tricky,"boolean");//setze typ
echo "<td>".gettype($tricky)."</td></tr>";
echo "</table>";

//********INCLUDE*********//
include ('INCLUDE.php');

if(isset($_GET["zahl"]))
	$zahl=($_GET["zahl"]);
else
	$zahl=3;


if($zahl=="eins")
	echo "<tr><td>eins</td></tr><br/>";
else if($zahl=="zwei")
	echo "<tr><td>zwei</td></tr><br/>";
else if($zahl=="drei")
	echo "<tr><td>drei</td></tr><br/>";

/*------SCHLEIFE------*/
$test=$_GET["test"];
if(isset($test))//test in include getragen
{
	echo "Das ".$test."er einmaleins: <br><br>";
	$i=1;

	while($i<=$zahl)
	{
		echo $i*$test."<br>";
		$i++;
	}
}
/*------SCHLÜSSEL+WERT------*/
$trick['WORLD']="HELLO";
$trick['HELLO']="WORLD";//array
$trick['STOPP1']="STOPP2";

$rest=count($trick);//zähle
ksort($trick);//sortiere nach schlüssel key
foreach($trick as $key =>$value) {
	echo "Schlüssel: ".$key." Wert: ".$value."<br>";
	echo "Rest: ".--$rest."<br>";
}
/*------FUNKTION------*/

function ändern($x,$y,$z,$m)//ersetze werte
{
	echo "      $x      <br>";
	echo "     $y$m$z     <br>";
	echo "    $y$m$m$m$z    <br>";
	echo "   $y$m$m$m$m$m$z   <br>";
	echo "  $y$m$m$m$m$m$m$m$z  <br>";
	echo " $y$m$m$m$m$m$m$m$m$m$z <br>";
	echo "$y$m$m$m$m$m$m$m$m$m$m$m$z<br>";
}
ändern("|","/","\\","-");
/*------DATEIVERARBEITUNG-------*/
include ('DATAFILE.php');
/*------COOKIE-------*/
include ('COOKIE.php');
/*-------OBJEKT-------*/
class Klasse1{ //Klasse
	public $ki="Mark";
	public $ku="Markus";
	public $kl="Marku";//öffentlich
	protected $a1="schild";//innerhalb des ordners
	private $a2="privat";//privat

	public function hello(){
		echo 'HELLO WORLD';
	}
}
class Klasse2 extends Klasse1 {//klasse1 kriegt von Klasse2
	public function getki(){
		echo $this->ki;
	}
	function sprint(){
		foreach($this as $key => $value){
			print "$key=> $value<br>";
		}
	}
}
$ein=new Klasse1;
$zwei=new Klasse2;
//hier test von oben
$ein->hello();
echo "<br/>";
echo $zwei->ki;//zwei mal Mark
foreach($ein as $key => $value){
	echo "$key => $value\n<br>";//oben wurde schon gezählt beginnt bei ku
}
?>
<?php
include_once 'FOOTER.php'; ?>
