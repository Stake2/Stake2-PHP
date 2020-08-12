<?php 

#English texts for all websites
if (in_array($lang, $en_langs)) {
	$andtxt = 'and';
	$newtxt = 'New';
	$ortxt = 'or';
	$numbertxt = 'number';
	$langreadtext = 'Read';
	$imglinktxt = 'image link';
	$siteicon = '🇺🇸';
	$btnmenutxt = 'Mobile button menu: ';
	$editbtntxt1 = 'Edit text';
	$editbtntxt2 = 'Activate';
	$editbtntxt3 = 'Deactivate';
	$copybtntxt1 = 'Copy HTML';
	$copybtntxt2 = 'Copy text';
	$redondodesc = 'Round revolution ahead!';
	$covertxt = 'Cover';
	$cannotfindfiletxt = 'This file could not be found, sorry';
	$month_text = 'month';
	$day_text = 'day';
	$months_text = 'months';
	$days_text = 'days';

	if ($newdesign == true) {
		$newdesigntxts = array(
		'Story menu',
		'Chapter menu',
		);
	}
}

#Brazilian Portuguese texts for all websites
if (in_array($lang, $pt_langs)) {
	$andtxt = 'e';
	$newtxt = 'Novo';
	$newtxt2 = 'Nova';
	$ortxt = 'ou';
	$numbertxt = 'número';
	$langreadtext = 'Ler';
	$imglinktxt = 'link da imagem';
	$siteicon = '🇧🇷';
	$btnmenutxt = 'Menu de botões mobile: ';
	$editbtntxt1 = 'Editar texto';
	$editbtntxt2 = 'Ativar';
	$editbtntxt3 = 'Desativar';
	$copybtntxt1 = 'Copiar HTML';
	$copybtntxt2 = 'Copiar texto';
	$redondodesc = 'Revolução redonda avante!';
	$covertxt = 'Capa';
	$cannotfindfiletxt = 'Não foi possível encontrar este arquivo, desculpe';
	$month_text = 'mês';
	$day_text = 'dia';
	$months_text = 'meses';
	$days_text = 'dias';

	if ($newdesign == true) {
		$newdesigntxts = array(
		'Menu de histórias',
		'Menu de capítulos',
		);
	}
}

$langreadtext2 = strtolower($langreadtext);

?>