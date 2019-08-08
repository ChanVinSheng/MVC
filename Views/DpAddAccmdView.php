<?php /*Author: Low Ee Hui (18WMR08374) RSD3G2*/ ?>

<div class="container h-100" style="text-align:center">
    <br/>
    <h2><strong>Add Accommodation</strong></h2>
    <br/>
    <form action="DpAddAccmdCtrl" method="post" enctype="multipart/form-data" id="Accmd">

        <table class="form" align="center" cellpadding="7" cellspacing="7">
            <tr>
                <th><label for="branch"><strong>Branch: </strong></label></th>
                <td><input name="branch" type="text" class="form-control" placeholder="e.g. FOCS..." style="width: 350px;" required  /></td>
            </tr>
            <tr>
                <th><label for="type"><strong>Type: </strong></label></th>
                <td>
                    <select name="type" class="form-control" required="">
                        <option>Condominium</option>
                        <option>Apartment</option>
                        <option>Bungalow</option>
                        <option>Mansion</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th><label for="fee"><strong>Fee(RM): </strong></label></th>
                <td><input name="fee" type="number" step="0.01" class="form-control" placeholder="15000" style="width: 350px;" required  /></td>
            </tr>
            <tr>
                <th><label for="description"><strong>Description: </strong></label></th>
                <td>
                    <textarea rows="4" cols="30" class="form-control" name="description" form="Accmd" required></textarea>
                </td>

            </tr>
            <tr>
                <th><label for="picture"><strong>Picture: </strong></label></th>
                <td><input name="picture" type="file" class="form-control" style="width: 350px;" required></td>
            </tr>
            <tr>
                <th><label for="location"><strong>Location: </strong></label></th>
                <td><input name="location" type="text" class="form-control" placeholder="16000" style="width: 350px;" required  /></td>
            </tr>


            <tr>
                <td></td>
                <td class="submit-button-right">
                    <input class="send_btn btn-info" type="submit" value="Submit" title="Submit" />                      
            </tr>
        </table>
    </form>
</div>