<?php /*Author: Chan Vin Sheng (18WMR08274) RSD3G2*/ ?>

<div class="container h-100"  >
    <br/>
    <div  style="text-align:center">
        <h2><strong>Add New User</strong></h2>
    </div>
    <br/>
    <form action="adminaddcontroller/add" method="post" >
        <table class="form" align="center" cellpadding="7" cellspacing="7">
            <tr>
                <th><label for="email"><strong>Email:</strong></label></th>
                <td><input placeholder="e.g. example@gmail.com" required autofocus class="form-control" name="email" type="text"/></td>
            </tr>
            <tr>
                <th><label for="username"><strong>Username</strong></label></th>
                <td><input placeholder="Username" required class="form-control" name="username" type="text"  /></td>
            </tr>
            <tr>
                <th><label for="ic"><strong>ic</strong></label></th>
                <td><input placeholder="e.g XXXX-XX-XXXX" required class="form-control" name="ic" type="text"  /></td>
            </tr>
            <tr>
                <th><label for="password"><strong>Password:</strong></label></th>
                <td><input placeholder="Password" required class="form-control" name="password" type="password"  /></td>
            </tr>
            <tr>
                <th><label for="comfirmedpassword"><strong>Comfirmed Password:</strong></label></th>
                <td><input placeholder="Comfirmed Password" required class="form-control" name="comfirmedpassword" type="password"  /></td>
            </tr>
            <tr>
                <th><label for="roles"><strong>Role</strong></label></th>
                <td>     
                    <select class="form-control mr-sm-2" name="roles">
                        <option>Admin</option>
                        <option>Admin Faculty</option>
                        <option>Faculty</option>
                        <option>Department</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td class="submit-button-right">
                    <input class="btn btn-info" type="submit" value="Submit" title="Submit" />                      
            </tr>
        </table>
    </form>
</div>