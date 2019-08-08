<?xml version="1.0" encoding="UTF-8"?>
<!-- Author: Chan Vin Sheng (18WMR08274) RSD3G2 -->
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>
    <xsl:template match="/">
        <html>
            <head>
                <title>Department</title>
                <meta charset="utf-8"/>
                <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
                <meta name="viewport" content="width=device-width, initial-scale=1"/>
                <link href="http://localhost/MVC/public/css/bootstrap.min.css" rel="stylesheet"/>
            </head>
            <body>
                <h3>Department</h3>
                <hr />
                <table class="table" >
                    <tr bgcolor="FF9333">
                        <th>Uesr id</th>
                        <th>User Name</th>
                        <th>Password</th>
                        <th>Email</th>
                        <th>Role</th>
                    </tr>
                    <xsl:for-each select="users/user" >
                        <xsl:if test="role='Department'">   
                            <tr>
                                <td>
                                    <xsl:value-of select="userid"/>
                                </td>
                                <td>
                                    <xsl:value-of select="username"/>
                                </td>
                                <td>
                                    <xsl:value-of select="password"/>
                                </td>
                                <td>
                                    <xsl:value-of select="email"/>
                                </td>
                                <td>
                                    <xsl:value-of select="role"/>
                                </td>                               
                            </tr>
                        </xsl:if>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>
