<?xml version="1.0" encoding="ISO-8859-1"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2"
                xmlns:xsd="http://www.w3.org/2001/XMLSchema">
    <xsl:template match="/">
        <xsl:for-each select="xsd:schema/xsd:sequence/xsd:element">
            #[SerializedName("<xsl:value-of select="replace(@ref, 'c.?c:','')"/>")]
            protected <xsl:choose>
            <xsl:when test="@maxOccurs = 'unbounded'">array $<xsl:value-of select="replace(@ref, 'c.?c:','')"/>s = []</xsl:when>
            <xsl:otherwise>?<xsl:value-of select="replace(@ref, 'c.?c:','')"/>Type $<xsl:value-of select="replace(@ref, 'c.?c:','')"/> = null</xsl:otherwise>
        </xsl:choose>,</xsl:for-each>
    </xsl:template>
</xsl:stylesheet>