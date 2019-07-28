<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>

    <!-- TODO customize transformation rules 
         syntax recommendation http://www.w3.org/TR/xslt 
    -->
    <xsl:template match="/">
        <html>
            <head>
                <title>Admin</title>
            </head>
            <body>
                <h3>Admin</h3>
                <hr />
                <table border="1">
                    <tr bgcolor="#9acd32">
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
