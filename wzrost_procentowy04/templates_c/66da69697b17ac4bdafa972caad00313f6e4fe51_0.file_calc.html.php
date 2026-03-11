<?php
/* Smarty version 5.4.2, created on 2026-03-11 12:18:22
  from 'file:C:\xampp\htdocs\php_04_uproszczony_new\php_04_uproszczony/app/calc.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_69b14f7e6467b8_19522467',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '66da69697b17ac4bdafa972caad00313f6e4fe51' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php_04_uproszczony_new\\php_04_uproszczony/app/calc.html',
      1 => 1773227867,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_69b14f7e6467b8_19522467 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\php_04_uproszczony_new\\php_04_uproszczony\\app';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_126408803169b14f7d9d8449_00964441', 'footer');
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_174464716269b14f7dc76382_62926409', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "../templates/main.html", $_smarty_current_dir);
}
/* {block 'footer'} */
class Block_126408803169b14f7d9d8449_00964441 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\php_04_uproszczony_new\\php_04_uproszczony\\app';
?>
Stopka: Kalkulator wzrostu procentowego<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_174464716269b14f7dc76382_62926409 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\php_04_uproszczony_new\\php_04_uproszczony\\app';
?>


<h2 class="content-head multi-column-center">Kalkulator wzrostu procentowego</h2>

<div class="pure-g">
<div class="l-box-lrg pure-u-1 pure-u-med-2-5">
	<form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->getValue('app_url');?>
/app/calc.php" method="post">
		<fieldset>
			<label for="v1">Wartość początkowa</label>
			<input id="v1" type="text" placeholder="np. 100" name="v1" value="<?php echo $_smarty_tpl->getValue('form')['v1'];?>
">
			
			<label for="v2">Wartość końcowa</label>
			<input id="v2" type="text" placeholder="np. 120" name="v2" value="<?php echo $_smarty_tpl->getValue('form')['v2'];?>
">
		</fieldset>
		<button type="submit" class="pure-button pure-button-primary">Oblicz wzrost</button>
	</form>
</div>

<div class="l-box-lrg pure-u-1 pure-u-med-3-5">
<div class="messages">

<?php if ((null !== ($_smarty_tpl->getValue('messages') ?? null))) {?>
	<?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('messages')) > 0) {?> 
		<h4>Wystąpiły błędy: </h4>
		<ol class="err">
		<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('messages'), 'msg');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('msg')->value) {
$foreach0DoElse = false;
?>
		<li><?php echo $_smarty_tpl->getValue('msg');?>
</li>
		<?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
		</ol>
	<?php }
}?>

<?php if ((null !== ($_smarty_tpl->getValue('infos') ?? null))) {?>
	<?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('infos')) > 0) {?> 
		<h4>Informacje: </h4>
		<ol class="inf">
		<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('infos'), 'msg');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('msg')->value) {
$foreach1DoElse = false;
?>
		<li><?php echo $_smarty_tpl->getValue('msg');?>
</li>
		<?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
		</ol>
	<?php }
}?>

<?php if ((null !== ($_smarty_tpl->getValue('result') ?? null))) {?>
	<h4>Wynik wzrostu:</h4>
	<p class="res">
	Zmiana wynosi: <strong><?php echo $_smarty_tpl->getValue('result');?>
%</strong>
	</p>
<?php }?>

</div>
</div>
</div>

<?php
}
}
/* {/block 'content'} */
}
