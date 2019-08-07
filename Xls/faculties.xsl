<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>

    <xsl:template match="/facultiess">
        <html>
            <head>
                <title>Faculties XSLT</title>
                <meta charset="utf-8"/>
                <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
                <meta name="viewport" content="width=device-width, initial-scale=1"/>
                <link href="http://localhost/MVC/public/css/bootstrap.min.css" rel="stylesheet"/>
            </head>
            <body>
                <h3>Faculties XSLT</h3>
                <hr />
                <table class="table" >
                    <tr bgcolor="33C7FF">
                        <th>Faculty ID</th>
                        <th>Faculty Name</th>
                        <th>Description</th>
                        <th>FeeMin</th>
                        <th>FeeMax</th>
                        <th>Status</th>
                    </tr>
                    <xsl:for-each select="faculties" >
                            <tr>
                                <td>
                                    <xsl:value-of select="facultyid"/>
                                </td>
                                <td>
                                    <xsl:value-of select="facultyname"/>
                                </td>
                                <td>
                                    <xsl:value-of select="facultydescription"/>
                                </td>
                                <td>
                                    <xsl:value-of select="feeMin"/>
                                </td>
                                <td>
                                    <xsl:value-of select="feeMax"/>
                                </td>        
                                <td>
                                    <xsl:value-of select="status"/>
                                </td>                          
                            </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
