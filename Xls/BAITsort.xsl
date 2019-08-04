<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>

    <!-- TODO customize transformation rules 
         syntax recommendation http://www.w3.org/TR/xslt 
    -->
    <xsl:template match="/">
        <html>
            <head>
                <title>BAIT Courses</title>
                <meta charset="utf-8"/>
                <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
                <meta name="viewport" content="width=device-width, initial-scale=1"/>
                <link href="http://localhost/MVC/public/css/bootstrap.min.css" rel="stylesheet"/>
            </head>
            <body>
                <h3>BAIT Courses</h3>
                <hr />
                <table class="table" >
                    <tr bgcolor="E6E6FA">
                        <th>Course ID</th>
                        <th>Course Code</th>
                        <th>Course Name</th>
                        <th>Course Info</th>
                        <th>Credit Hour(s)</th>
                    </tr>
                    <xsl:for-each select="coursess/courses" >
                        <xsl:if test="starts-with(coursecode, 'BAIT')">   
                            <tr>
                                <td>
                                    <xsl:value-of select="@courseid" />
                                </td>
                                <td>
                                    <xsl:value-of select="coursecode"/>
                                </td>
                                <td>
                                    <xsl:value-of select="coursename"/>
                                </td>
                                <td>
                                    <xsl:value-of select="courseinfo"/>
                                </td>
                                <td>
                                    <xsl:value-of select="credithour"/>
                                </td>                               
                            </tr>
                        </xsl:if>
                    </xsl:for-each>
 
      
                </table>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
