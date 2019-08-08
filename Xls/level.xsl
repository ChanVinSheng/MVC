
<?xml version="1.0" encoding="UTF-8"?>
<!-- Author: Leek Hon Lun (18WMR08344) RSD3G2 -->
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>

    <xsl:template match="/">
        <html>
            <head>
                <title>level.xsl</title>
            </head>
            <body>
                <table border="1">
                    <xsl:for-each select="levelofstudys/levelofstudy">
                    <tr class ="head">
                        <th><xsl:value-of select="type"/></th>
                    </tr>
                    <tr>
                        <td><xsl:value-of select="description"/></td>
                    </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
