<?php
$xml=new PDO('mysql:host=localhost;dbname=xml','root','');//neue Verbindung

if(isset($_POST['button']))//File-Upload ist nur mit POST möglich
{
  //Kopiert Datei source nach dest.
  //Der temporäre Dateiname, unter dem die hochgeladene Datei auf dem Server gespeichert wurde.
  //Der ursprüngliche Dateiname auf dem Computer des Benutzers.
  copy($_FILES['xmlFile']['tmp_name'],$_FILES['xmlFile']['name']);
  $xmlobjekt= simplexml_load_file($_FILES['xmlFile']['name']);//Die Funktion wandelt das übergebene wohlgeformte XML-Dokument in ein Objekt um.
  foreach ($xmlobjekt as $produkte)
   {
    $stmt= $xml->prepare('insert into produkt(Id, Name, Preis)
    values(:Id, :Name, :Preis)');
    //Bei der Verwendung von bindParam wird nur eine Referenz auf die Variable an das Statement gebunden.
    //Das spätere ändern des Variablenwertes führt dazu, dass auch das ausgeführte Statement einen anderen Wert bekommt
    //bindValue () ist die Variable als reference gebunden und wird nur zu dem timepunkt ausgewertet,
    $stmt->bindValue('Id',$produkte->Id);
    $stmt->bindValue('Name', $produkte->Name);
    $stmt->bindValue('Preis', $produkte->Preis);
    $stmt->execute();
  }
}
$stmt =$xml->prepare('select * from produkt');//suche die liste raus
$stmt->execute();
 ?>
<!-- Um Dateieuploads zu ermöglichen -->
 <form method="post" enctype="multipart/form-data">
   XML File <input type="file" name="xmlFile">
   <br>
   <input type="submit" value="Import" name="button">
 </form>
 <br>
 <h3>Produkt Liste</h3>
 <table cellpadding="2" cellspacing="2" border="1">
   <tr>
     <th>Id</th>
     <th>Name</th>
     <th>Preis</th>
   </tr>
   <?php while($produkte =$stmt->fetch(PDO::FETCH_OBJ))//optionale Parameter modifizieren
   //holt ein Objekt, Properties sind gleich Spaltennamen
   {
     ?>
     <tr>
       <td><?php echo $produkte->Id; ?></td>
       <td><?php echo $produkte->Name; ?></td>
       <td><?php echo $produkte->Preis; ?></td>
     </tr>
     <?php
   }?>
 </table>
