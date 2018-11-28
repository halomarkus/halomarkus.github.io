<?php
require"fpdf.php";
include "CONNECT.php";
class myPDF extends FPDF{
  //Kopfzeile
  function header(){
    //Logo
    $this->Image('mimi.jpg',10, 2,30,30);
    //Arial fett 15
    $this->SetFont('Arial','B',14);
    //nach rechts gehen
    $this->Cell(100);
    //Titel - Schrift zu große für die Zelle
    $this->Cell(70,10,'REGISTER DOKUMENT',1,0,'C');
    //Zeilenumbruch
    $this->Ln();
    $this->SetFont('Times','',12);
    //SetFont(string family [Name der Schriftart], string style[Legt die Textformatierung fest]
    // , float size[Gibt die Größe der Schriftart an])
    $this->Cell(276,10,'Name, Alter, Email,...',0,0,'C');
    $this->Ln(20);
  }
  //Fusszeile
  function footer(){
    //Position 2,0 cm von unten
    $this->SetY(-15);
    //Arial kursiv 8
    $this->SetFont('Arial','I',8);
    //Seitenzahl
    $this->Cell(0,10,'Page'.$this->PageNo().'/{nb}',0,0,'C');
  }
}

$pdf=new myPDF();
//Defines an alias for the total number of pages. It will be substituted as the document is closed
$pdf->AliasNbPages();
//Adds a new page to the document. If a page is already present, the Footer() method is called first to output the footer.
$pdf->AddPage('L','A4',0);
//([string orientation][Legt das Seitenlayout für die neue zu erstellende Seite fest][Gibt das Papierformat an.])
//P or Portrait / Hochformat
//L or Landscape / Querformat
//A3 A4 A5 Letter Legal
//	integer	Legt die Rotation der Seite in Grad fest. Standardmäßig 0.
if(class_exists('FPDF'))
{
  //die klasse existiert, installation ok
  $pdf->Cell(60,10,"Die Installation war erfolgreich. Die Klasse FPDF existiert.",10,10,'L');
} else {
  //die klasse existiert nicht
  $pdf->Cell(60,10,"die Klasse FPDF existiert nicht.
  Prüfen Sie, ob die Datei  '".FPDF_INSTALLDIR."/fpdf.php' vorhanden ist.",10,10,'L');
}

$pdf->SetFont('Times','B',12);
// Allows to center or align the text. Possible values are:
// L or empty string: left align (default value)
 // C: center R: right align
$pdf->Cell(20,10,'ID',1,0,'C');
// Indicates if borders must be drawn around the cell. The value can be either a number:
// 0: no border
// 1: frame
$pdf->Cell(40,10,'Username',1,0,'C');
$pdf->Cell(40,10,'EMAIL',1,0,'C');
// Indicates where the current position should go after the call. Possible values are:
// 0: to the right
// 1: to the beginning of the next line
// 2: below
// Putting 1 is equivalent to putting 0 and calling Ln() just after. Default value: 0.
$pdf->Cell(60,10,'Firstname',1,0,'C');
$pdf->Cell(50,10,'Lastname',1,0,'C');
$pdf->Cell(36,10,'Age',1,0,'C');
$pdf->Ln();

$pdf->SetFont('Times','',12);
$stmt=$newcon->query('select * from tprojekt_2');
while($data=$stmt->fetch(PDO::FETCH_OBJ)){
  $pdf->Cell(20,10,$data->id,1,0,'C');
  $pdf->Cell(40,10,$data->username,1,0,'L');
  $pdf->Cell(40,10,$data->email,1,0,'L');
  $pdf->Cell(60,10,$data->firstname,1,0,'L');
  $pdf->Cell(50,10,$data->secondname,1,0,'L');
  $pdf->Cell(36,10,$data->age,1,0,'L');
  $pdf->Ln();
}


$pdf->Output("PDF.pdf","I");
//I: send the file inline to the browser. The PDF viewer is used if available.
//D: send to the browser and force a file download with the name given by name.
//F: save to a local file with the name given by name (may include a path).
//S: return the document as a string.

?>
