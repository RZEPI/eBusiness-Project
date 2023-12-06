<?php
/* Smarty version 3.1.48, created on 2023-12-02 00:52:05
  from '/var/www/html/admin123/themes/new-theme/template/content.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_656a71a5ad5e86_81115714',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '59ef4ff3f9da13ba0b5cec7d21c85e8a9f427d55' => 
    array (
      0 => '/var/www/html/admin123/themes/new-theme/template/content.tpl',
      1 => 1701187713,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_656a71a5ad5e86_81115714 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="ajax_confirmation" class="alert alert-success" style="display: none;"></div>


<?php if ((isset($_smarty_tpl->tpl_vars['content']->value))) {?>
  <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

<?php }
}
}
