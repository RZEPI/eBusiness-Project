<?php
/* Smarty version 3.1.48, created on 2023-12-02 00:52:05
  from '/var/www/html/admin123/themes/new-theme/template/footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_656a71a5b4d384_19116107',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '63480928b834bc063360bd9bef1f4a42e092e107' => 
    array (
      0 => '/var/www/html/admin123/themes/new-theme/template/footer.tpl',
      1 => 1701187713,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_656a71a5b4d384_19116107 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="footer" class="bootstrap">
    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>"displayBackOfficeFooter"),$_smarty_tpl ) );?>

</div>
<?php }
}
