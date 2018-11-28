<HTML>
<HEAD>
   <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
   <TITLE>XML-Transformator</TITLE>
</head>
<?php
 //Um eine Option in der Konfiguration von PHP zu ändern, müssen der ini_set() Funktion zwei Parameter übergeben werden: "Name" und "Wert".
 //"Name" wird bestimmt, welche Option in der Konfiguration geändert werden soll
 //"Wert" wird der neue Wert übergeben
ini_set( 'track_errors', 1);
ini_set('error_reporting', E_ALL | E_STRICT);  // gibt große Fehlermeldungen aus

      $xml= new DOMDocument('1.0','utf-8');//Document Object Model
      $xml->load('XML.xml');
     // die xml und die xsl-Datei werden (da beide in XML-Syntax) in ein DOM-Dokument geladen
      $xsl= new DOMDocument('1.0','utf-8');
      $xsl->load('XSLtest.xsl');
     // ein XSLT-Prozessor wird erzeugt und das XSL-Dokuement in diesen geladen
     //Ein XSLT-Prozessor ist eine Software zum Umwandeln von Dokumenten mittels eines XSLT-Stylesheets.
     $proc = new XSLTProcessor();
     $proc->importStyleSheet($xsl);
     // jetzt wird das XML-Dokument geladen und transformiert
      echo $proc->transformToXML($xml);

?>
