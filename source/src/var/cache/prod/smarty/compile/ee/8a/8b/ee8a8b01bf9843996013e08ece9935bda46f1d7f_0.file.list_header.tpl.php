<?php
/* Smarty version 3.1.48, created on 2023-12-02 01:09:17
  from '/var/www/html/admin123/themes/default/template/controllers/referrers/helpers/list/list_header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_656a75ad623597_75711939',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ee8a8b01bf9843996013e08ece9935bda46f1d7f' => 
    array (
      0 => '/var/www/html/admin123/themes/default/template/controllers/referrers/helpers/list/list_header.tpl',
      1 => 1701187713,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_656a75ad623597_75711939 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1912139204656a75ad621e11_53833037', "override_header");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "helpers/list/list_header.tpl");
}
/* {block "override_header"} */
class Block_1912139204656a75ad621e11_53833037 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'override_header' => 
  array (
    0 => 'Block_1912139204656a75ad621e11_53833037',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<?php echo '<script'; ?>
 type="text/javascript">
		$(function() {
			var btn_save_calendar = $('span[class~="process-icon-save-calendar"]').parent();
			var btn_submit_calendar = $('#submitDatePicker');

			if (btn_save_calendar.length > 0 && btn_submit_calendar.length > 0)
			{
				btn_submit_calendar.hide();
				btn_save_calendar.click(function() {
					btn_submit_calendar.before('<input type="hidden" name="'+btn_submit_calendar.attr("name")+'" value="1" />');
					$('#calendar_form').submit();
				});
			}

			var btn_save_settings = $('span[class~="process-icon-save-settings"]').parent();
			var btn_submit_settings = $('#submitSettings');

			if (btn_save_settings.length > 0 && btn_submit_settings.length > 0)
			{
				btn_submit_settings.hide();
				btn_save_settings.click(function() {
					btn_submit_settings.before('<input type="hidden" name="'+btn_submit_settings.attr("name")+'" value="1" />');
					$('#settings_form').submit();
				});
			}

			var btn_save_refresh_index = $('span[class~="process-icon-refresh-index"]').parent();
			var btn_submit_refresh_index = $('#submitRefreshIndex');

			if (btn_save_refresh_index.length > 0 && btn_submit_refresh_index.length > 0)
			{
				btn_submit_refresh_index.hide();
				btn_save_refresh_index.click(function() {
					btn_submit_refresh_index.before('<input type="hidden" name="'+btn_submit_refresh_index.attr("name")+'" value="1" />');
					$('#refresh_index_form').submit();
				});
			}

			var btn_save_refresh_cache = $('span[class~="process-icon-refresh-cache"]').parent();
			var btn_submit_refresh_cache = $('#submitRefreshCache');

			if (btn_save_refresh_cache.length > 0 && btn_submit_refresh_cache.length > 0)
			{
				btn_submit_refresh_cache.hide();
				btn_save_refresh_cache.click(function() {
					btn_submit_refresh_cache.before('<input type="hidden" name="'+btn_submit_refresh_cache.attr("name")+'" value="1" />');
					$('#refresh_cache_form').submit();
				});
			}
		});
	<?php echo '</script'; ?>
>
	<?php if ($_smarty_tpl->tpl_vars['enable_calendar']->value) {?>
		<?php echo $_smarty_tpl->tpl_vars['calendar_form']->value;?>

		<?php echo $_smarty_tpl->tpl_vars['settings_form']->value;?>

	<?php }
}
}
/* {/block "override_header"} */
}
