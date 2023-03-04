{include file="header.tpl" }
<a href="insert.php">Add</a>
<table width="550" border="1">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        {section name=i loop=$user}
      <tr>
        <th scope="row">{$smarty.section.i.rownum}</th>
        <td>{$user[i].name}</td>
        <td>{$user[i].city}</td>
        <td>
            <a href="view.php?del={$user[i].id}">Delete</a> |
            <a href="edit.php?id={$user[i].id}">Update</a> 
        </td>
      </tr>
      {/section}
    </tbody>
  </table>

{include file="footer.tpl" }
