<?php
/* Smarty version 4.2.1, created on 2023-03-04 07:48:42
  from 'C:\xampp\htdocs\learn_smarty_php_crud_b01\templates\insert.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6402e9caea9537_46902620',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd3c386869f7eb2da9fc4a504ead407e1a619c9b3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\learn_smarty_php_crud_b01\\templates\\insert.tpl',
      1 => 1677912520,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6402e9caea9537_46902620 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<form method="post" action="insert.php">
    <table width="550" border="1">
        <tr>
            <td colspan="2" align="center"><strong>Insert Record</strong></td>

        </tr>
        <tr>
            <td>Name</td>
            <td>
                <input type="text" name="name" />
            </td>
        </tr>
        <tr>
            <td>City</td>
            <td>
                <input type="text" name="city"/>
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
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
