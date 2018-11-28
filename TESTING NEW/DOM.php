<?php
//Wie man ein DOM-Baum erstellt und das als XMl ausgibt

    //aufbau der XML-Datei
    //wurzelknoten
    $dom=new DomDocument('1.0','utf-8');//Document Object Model
    $wurzel=$dom->createElement('ProduktListe');//wird wurzelknoten angelegt
    $dom->appendChild($wurzel);
    //hängen als erste wurzel an den root

    //Eintrag als root
    $wurzel->appendChild($firstproduct=$dom->createElement("Produkt"));
    //Methode Node.appendChild hängt einen zuvor neu erzeugten Knoten in die bestehende Knotenstruktur ein
    //This function creates a new instance of class DOMElement.
    $firstproduct->appendChild($dom->createElement("Id","1"));
    $firstproduct->appendChild($dom->createElement("Name","Cola"));
    $firstproduct->appendChild($dom->createElement("Preis","2.50"));
    //kommentar
    $newComm=$dom->createComment('Hier ist ein KOMMENTAR');
    $wurzel->appendChild($secondproduct=$dom->createElement("Produkt"));
    $secondproduct->appendChild($dom->createElement("Id","2"));
    $secondproduct->appendChild($dom->createElement("Name","Fanta"));
    $secondproduct->appendChild($dom->createElement("Preis","2.75"));
      header('Content-type: text/xml; charset=utf-8');
      //Wollen Sie den Benutzer auffordern, die von Ihnen gesendeten Daten wie z.B. eine generierte PDF Datei zu speichern, können Sie den Header » Content-Disposition verwenden
      echo $dom->saveXML();//ausgabe
      $dom->save('XML.xml') or die('Nicht mögloch datei zu kreiieren');
//Creates an XML document from the DOM representation.
?>
