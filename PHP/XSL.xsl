<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html"/>
<!-- oben steht der Kopf aller XSL-Stylesheets -->
<!--zuerst wird der Root-Knoten des XML-Dokuments angewählt -->
<xsl:template match="/ProduktListe"><!-- Das template-Tag stets ein Match-Attributhier wird mit / das Wurzelelement des XML-Dokuments angesprochen -->
<xsl:apply-templates select="Produkt"/>
</xsl:template>
<!--von dort aus der Knoten gruss (genauer gesagt der erste Knoten, falls mehrere vorhanden sind ) -->

<xsl:template match="Produkt">
<h1>
  <xsl:apply-templates select="Id"/>
  <xsl:apply-templates select="Name"/>
  <xsl:apply-templates select="Preis"/>
</h1>
</xsl:template>
<!-- dann werden diverse HTML-Tags ausgegeben -->
<html>
<body>
<!-- <xsl:for-each select="PrduktListe/Produkt/Preis">
  <xsl:sort select="." order="ascending"/>
  <xsl:value-of select="."/>
</xsl:for-each> -->
<xsl:template match="Id">
<h1>
<font size="20px" color="red">
<!-- und der Inhalt des aktell positionierten Tags (also gruss - s.o.) ausgegeben -->
<xsl:value-of select="."/>
</font>
<!-- jetzt kommen - abschliessende wieder ein paar HTML-Tags -->
</h1>
</xsl:template>
<xsl:template match="Name">
  <h1>
    <font size="25px" color="yellow">
  <xsl:text>
    <xsl:value-of select="."/>
  </xsl:text>
  </font>
  </h1>
</xsl:template>
<xsl:template match="Preis">
  <h1>
    <font size="30px" color="blue">
    <xsl:value-of select="."/>
  </font>
  </h1>
</xsl:template>
</body>
</html>
</xsl:stylesheet>
