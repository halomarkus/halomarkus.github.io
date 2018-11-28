<?xml version="1.0" encoding="UTF-8"?><!--Unterricht-->
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html"/>
<!-- oben steht der Kopf aller XSL-Stylesheets -->
<!--zuerst wird der Root-Knoten des XML-Dokuments angewählt -->
<xsl:template match="/"><!-- Das template-Tag stets ein Match-Attributhier wird mit / das Wurzelelement des XML-Dokuments angesprochen -->
<!-- dann werden diverse HTML-Tags ausgegeben -->
  <html>
  <body>
<h2>Mein kollektion</h2>
<table border="1">
  <tr bgcolor="yellow">
    <th>Id</th>
    <th>Name</th>
    <th>Preis</th>
  </tr>
  <xsl:for-each select="ProduktListe/Produkt"><!--für jedes untergeordnete Element eintrag bestimmt-->
    <tr>
      <td><xsl:value-of select="Id"/></td><!--Bei der gespeicherten Zeichenkette kann es sich z.B. um den Inhalt eines Knotens der XML-Daten handeln-->
      <td><xsl:value-of select="Name"/></td>
      <td><xsl:value-of select="Preis"/></td>
    </tr>
  </xsl:for-each>
</table>
</body>
</html>
</xsl:template>
</xsl:stylesheet>
