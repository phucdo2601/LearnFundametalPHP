<?php
/* Smarty version 4.2.1, created on 2023-03-04 08:51:40
  from 'C:\xampp\htdocs\learn_smarty_php_crud_b01\templates\edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6402f88c577842_52736978',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '303fcc522c8eb26dd30e08ad878875d5aa273a0d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\learn_smarty_php_crud_b01\\templates\\edit.tpl',
      1 => 1677916031,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6402f88c577842_52736978 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<form method="post" action="edit.php">
    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['users']->value['id'];?>
"/>
    <table width="550" border="1">
        <tr>
            <td colspan="2" align="center"><strong>Edit Record</strong></td>

        </tr>
        <tr>
            <td>Name</td>
            <td>
                <input type="text" name="name" value="<?php echo $_smarty_tpl->tpl_vars['users']->value['name'];?>
"/>
            </td>
        </tr>
        <tr>
            <td>City</td>
            <td>
                <input type="text" name="city" value="<?php echo $_smarty_tpl->tpl_vars['users']->value['city'];?>
"/>
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
