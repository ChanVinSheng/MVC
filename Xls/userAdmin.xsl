<!-- Author: Chan Vin Sheng (18WMR08274) RSD3G2 -->

<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>
    <xsl:template match="/">
        <html>
            <head>
                <title>Admin</title>
                <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
                <meta name="viewport" content="width=device-width, initial-scale=1"/>
                <link href="http://localhost/MVC/public/css/bootstrap.min.css" rel="stylesheet"/>
            </head>
            <body>
                <h3>Admin</h3>
                <hr />
                <table class="table" >
                    <tr bgcolor="33C7FF">
                        <th>Uesr id</th>
                        <th>User Name</th>
                        <th>Password</th>
                        <th>Email</th>
                        <th>Role</th>
                    </tr>
                    <xsl:for-each select="users/user" >
                        <xsl:if test="role='Admin'">   
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
