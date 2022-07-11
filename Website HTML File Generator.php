<?php

$hard_drive_letter = "C";
$mega_folder = $hard_drive_letter.":/Mega/";

if (!file_exists($mega_folder)) {
	$hard_drive_letter = "D";
	$mega_folder = $hard_drive_letter.":/Mega/";
}

$mega_folder_stake2_website = $mega_folder."Stake2 Website/";
$main_php_folder = $mega_folder."PHP/";

$index_variables_php_file = $hard_drive_letter.":/Mega/PHP/Variables/Index Variables.php";

require $index_variables_php_file;

$php_folder_websites = "Websites";
$variables_folder_variable = "Variables";
$global_variable = "Global";

$php_folder_variables = $main_php_folder.$variables_folder_variable."/";
$global_files_folder = $php_folder_variables.$global_variable." Files/";
$global_files_folder = $global_files_folder;
$main_arrays_php = $global_files_folder."Main Arrays.php";

$index_php = $main_php_folder."Index.php";

# "Main PHP Folders" PHP File Loader
require $main_folders_and_files;

require $main_arrays_php;

$slim_php = $raintpl_folder."Slim.php";

require_once $slim_php;

ob_start();

require_once $index_php;

$website = ob_get_clean();

if (isset($website_info["website_folder_name"]) == True) {
	$local_website_title = $website_info["website_folder_name"];
}

if (isset($website_info["website_folder_name"]) == False) {
	$local_website_title = $website_info["english_title"];
}

$root_html_folder = $mega_folder_stake2_website.Remove_Non_File_Characters($local_website_title)."/";

if (file_exists($root_html_folder) == False) {
	mkdir($root_html_folder);
}

if (isset($website_info["language"]) == False) {
	exit;
}

if ($website_info["language"] != $language_geral) {
	$html_folder = $root_html_folder.$website_info["title_language"]."/";
}

else {
	$html_folder = $root_html_folder;
}

$html_folder = str_replace("%20", " ", $html_folder);

if (file_exists($html_folder) == False) {
	mkdir($html_folder);
}

$html_index_file = $html_folder."Index.html";

function Update_HTML_File($folder, $file) {
	global $website;
	global $file_exists;

	if (file_exists($folder) == False) {
		mkdir($folder);
	}

	if (file_exists($file) == True) {
		$file_exists = True;
	}

	if (file_exists($file) == False) {
		$file_exists = False;
	}

	$file_open = fopen($file, 'w');
	fwrite($file_open, $website);
	fclose($file_open);
}

Update_HTML_File($html_folder, $html_index_file);

$local_website_title_backup = $website_info["language_title"];
$local_website_title = Language_Item_Definer("Website HTML File Generator", "Gerador de Arquivos HTML de Sites").": ".$local_website_title_backup;
$website_link = "";
$website_image = "";
$website_meta_description = Language_Item_Definer("Generator of HTML files for the selected website", "Gerador de arquivos HTMl para o site selecionado").": ".$local_website_title_backup;
$website_info["image_format"] = "png";
$data = date("d/m/Y");

$website_head = '<!DOCTYPE html>
<head>
<title>'.$local_website_title.'</title>
<meta property="og:type" content="website" />
<meta property="og:title" content="'.$local_website_title.'" />
<meta property="og:site_name" content="'.$local_website_title.'" />
<meta property="og:url" content="'.$website_link.'" />
<meta property="og:image" content="'.$website_image.'" />
<meta property="og:description" content="'.$website_meta_description.'" />
<meta property="og:locale" content="en_US" />
<meta property="og:locale:alternate" content="pt_BR" />
<meta property="og:locale:alternate" content="pt_PT" />
<link rel="canonical" href="'.$website_link.'" />
<link rel="icon" type="image/'.$website_info["image_format"].'" href="'.$website_image.'" />
<link rel="image_src" type="image/'.$website_info["image_format"].'" href="'.$website_image.'" />
<meta name="description" content="'.$website_meta_description.'" />
<meta name="revised" content="'."Stake2's Enterprise TM".', '.$data.'" />
<meta name="author" content="Stake Ferreira" />
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, user-scalable=yes" />
<meta charset="UTF-8" />
</head>
<body>'."\n";

echo $website_head;

echo "<center>"."\n";

echo "\n"."<h1>"."\n".
$website_info["language_title"]."<br />"."\n"
."</h1>"."\n";

$show_text = Language_Item_Definer("This is the name of the website", "Esse é o nome do site");

echo "\n"."<h2>"."\n".
$show_text.": <br />"."\n".
$website_info["language_title"]."\n"
."</h2>"."\n"."\n";

$show_text = Language_Item_Definer("This is the folder where the selected website is", "Essa é a pasta onde o site selecionado está");

echo "<h2>"."\n".
$show_text.": <br />"."\n".
Make_Link("file:///".$html_folder, $html_folder, $target = "_blank")."\n"
."</h2>"."\n"."\n";

$show_text = Language_Item_Definer("This is the path to the website HTML file", "Esse é o caminho para o arquivo HTML do site");

echo format("<h2>"."\n".
"{}: <br />"."\n".
"{}"."\n"
."</h2>"."\n", array($show_text, Make_Link("file:///".$html_index_file, $html_index_file, $target = "_blank")))."\n";

if ($file_exists == True) {
	$text = Language_Item_Definer("updated with new contents", "atualizado com novos conteúdos");
}

if ($file_exists == False) {
	$text = Language_Item_Definer("created", "criado");
}

$show_text = Language_Item_Definer("The file of the website was {}", "O arquivo do site foi {}");

echo "<h2>"."\n".
format($show_text, $text)."."."\n"
."</h2><br />"."\n";

echo "\n"."</center>";

echo "\n".'</body>'."\n".
'</html>';

?>