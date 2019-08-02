


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
                <td><input name="email" type="text"/></td>
            </tr>
            <tr>
                <th><label for="username"><strong>Username</strong></label></th>
                <td><input name="username" type="text"  /></td>
            </tr>
            <tr>
                <th><label for="ic"><strong>ic</strong></label></th>
                <td><input name="ic" type="text"  /></td>
            </tr>
            <tr>
                <th><label for="password"><strong>Password:</strong></label></th>
                <td><input name="password" type="text"  /></td>
            </tr>
            <tr>
                <th><label for="comfirmedpassword"><strong>Comfirmed Password:</strong></label></th>
                <td><input name="comfirmedpassword" type="text"  /></td>
            </tr>
            <tr>
                <th><label for="roles"><strong>Role</strong></label></th>
                <td>     
                    <select name="roles">
                        <option>Admin</option>
                        <option>Faculty</option>
                        <option>Department</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td class="submit-button-right">
                    <input class="send_btn" type="submit" value="Submit" title="Submit" />                      
            </tr>
        </table>
    </form>
</div>