{include file="header.tpl" }

<form method="post" action="edit.php">
    <input type="hidden" name="id" value="{$users.id}"/>
    <table width="550" border="1">
        <tr>
            <td colspan="2" align="center"><strong>Edit Record</strong></td>

        </tr>
        <tr>
            <td>Name</td>
            <td>
                <input type="text" name="name" value="{$users.name}"/>
            </td>
        </tr>
        <tr>
            <td>City</td>
            <td>
                <input type="text" name="city" value="{$users.city}"/>
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>
                <input type="submit" name="submit" value="Add Record" />
            </td>
        </tr>
    </table>
</form>
{include file="footer.tpl" }