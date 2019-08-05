<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>

    <!-- TODO customize transformation rules 
         syntax recommendation http://www.w3.org/TR/xslt 
    -->
    <xsl:template match="/">

        <xsl:for-each select="minEntrys/minEntry" >
            <xsl:if test="starts-with(minentryname, 'Diploma')"> 
                <td align="left">
                    <?php
                    foreach ($this->rowMinEntry as $minEntries) {
                        if($minEntries->status == "active"){
                        ?>
                        <input type="checkbox" name="MinEntryChk[]" class="MinEntryGrouped" id="<?php echo $minEntries->minentryid ?>" value="<?php echo $minEntries->minentryid ?>"> <?php echo $minEntries->minentryname ?>
                        <br/>
                        <?php
                        }
                    }
                    ?>
                </td>
            </xsl:if>
        </xsl:for-each>

    </xsl:template>

</xsl:stylesheet>
