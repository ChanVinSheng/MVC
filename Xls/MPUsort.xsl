<?xml version="1.0" encoding="UTF-8"?>
<!-- Author: Low Wei Yin (18WMR08375) RSD3G2 -->
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>

    <!-- TODO customize transformation rules 
         syntax recommendation http://www.w3.org/TR/xslt 
    -->
    <xsl:template match="/">
        <html>
            <head>
                <title>MPU Courses</title>
                <meta charset="utf-8"/>
                <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
                <meta name="viewport" content="width=device-width, initial-scale=1"/>
                <link href="http://localhost/MVC/public/css/bootstrap.min.css" rel="stylesheet"/>
            </head>
            <body>
                <h3 style='font-weight: bold;'>MPU Courses</h3>
                <hr />
                <form action="FacultyViewCourseController/modify" method="post" >
                    <table class="table" >
                        <tr bgcolor="E6E6FA">
                            <th>Course ID</th>
                            <th>Course Code</th>
                            <th>Course Name</th>
                            <th>Course Info</th>
                            <th>Credit Hour(s)</th>
                            <th>Actions</th>
                            <th></th>
                        </tr>
                        <xsl:for-each select="coursess/courses" >
                            <xsl:if test="starts-with(coursecode, 'MPU')">   
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
                                    <td>
                                        <button class="btn btn-info" type="submit" value="{@courseid}/>" name="edit">Edit</button>
                                    </td>
                                    <td>
                                        <xsl:if test="status='active'">
                                            <button class="btn btn-danger" type="submit" value="{@courseid}" name="deactivateSort">Deactivate</button>
                                        </xsl:if>
                                        <xsl:if test="status='inactive'">
                                            <button class="btn btn-success" type="submit" value="{@courseid}" name="activateSort">Activate</button>
                                        </xsl:if>
                                    </td>                                 
                                </tr>
                            </xsl:if>
                        </xsl:for-each>
                    </table>
                </form>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
