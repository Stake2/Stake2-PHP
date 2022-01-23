<?php

$hard_drive_letter = "C";
$mega_folder = $hard_drive_letter.":/Mega/";

if (!file_exists($mega_folder)) {
	$hard_drive_letter = "D";
	$mega_folder = $hard_drive_letter.":/Mega/";
}

$mega_folder_stake2_website = $mega_folder."Stake2 Website/";
$main_php_folder = $mega_folder."PHP/";

$php_folder_websites = "Websites";
$variables_folder_variable = "Variables";
$global_variable = "Global";

$php_folder_variables = $main_php_folder.$variables_folder_variable."/";
$global_files_folder = $php_folder_variables.$global_variable." Files/";
$global_files_folder = $global_files_folder;
$main_arrays_php = $global_files_folder."Main Arrays.php";

$index_php = $main_php_folder."Index.php";

require $main_arrays_php;

$host_text_selector = (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] === "on" ? "https" : "http")."://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$selected_language_parameter = "selected_language";
$selected_website_parameter = "selected_website";

if (strpos ($host_text_selector, $selected_language_parameter.'=') == True) {
	$selected_language = str_replace((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === "on" ? "https" : "http")."://$_SERVER[HTTP_HOST]/Website%20HTML%20File%20Generator.php?no-redirect=true&".$selected_language_parameter."=", "", $host_text_selector);
	$selected_language = preg_replace("/&selected_website=.*/", "", $selected_language);
}

if (strpos ($host_text_selector, $selected_website_parameter.'=') == True) {
	$selected_website = str_replace((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === "on" ? "https" : "http")."://$_SERVER[HTTP_HOST]/Website%20HTML%20File%20Generator.php?no-redirect=true&".$selected_language_parameter."=".$selected_language."&".$selected_website_parameter."=", "", $host_text_selector);
}

$selected_language = str_replace("&".$selected_website_parameter."=".$selected_website, "", $selected_language);

$host_text = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === "on" ? "https" : "http")."://$_SERVER[HTTP_HOST]/?no-redirect=true&website_language=".$selected_language."&website=".$selected_website;

ob_start();

require_once $index_php;

$website = ob_get_clean();

$website_title_text_backup = $website_info["english_title"];

if ($selected_language != $language_geral) {
	if (explode(" ", $website_title_text)[0] == "SpaceLiving") {
		$website_title_text_backup = "New_World/SpaceLiving";
	}
}

else {
	if ($website_title_text == "SpaceLiving") {
		$website_title_text_backup = "New_World/SpaceLiving";
	}
}

$root_html_folder = $mega_folder_stake2_website.Remove_Non_File_Characters($website_title_text_backup)."/";

if (file_exists($root_html_folder) == False) {
	mkdir($root_html_folder);
}

if ($selected_language != $language_geral) {
	$html_folder = $root_html_folder.$website_title_language."/";
}

else {
	$html_folder = $root_html_folder;
}

$html_folder = str_replace("%20", " ", $html_folder);

if (file_exists($html_folder) == False) {
	mkdir($html_folder);
}

$html_index_file = $html_folder."Index.html";

$update_two_html_files = False;

if ($website_info["type"] == $story_website_type or $website_settings["has_two_website_titles"] == True) {
	$update_two_html_files = True;

	if ($website_info["type"] == $story_website_type) {
		$story_html_folder = $mega_folder_stake2_website;

		if ($selected_language != $language_geral) {
			if (explode(" ", $website_title_text)[0] == "SpaceLiving") {
				$story_html_folder .= "New_World/";
			}
		}

		else {
			if ($website_title_text == "SpaceLiving") {
				$story_html_folder .= "New_World/";
			}
		}

		$story_html_folder .= Language_Item_Definer($portuguese_story_name, $english_story_name);

		if ($portuguese_story_name != "") {
			$story_html_folder .= "/";
		}
	}

	else {
		$story_html_folder = $mega_folder_stake2_website.Remove_Non_File_Characters(Language_Item_Definer($website_portuguese_titles[$selected_website_title], $website_titles[$selected_website_title]))."/";
	}

	if (file_exists($story_html_folder) == False) {
		mkdir($story_html_folder);
	}

	if ($selected_language != $language_geral) {
		$second_html_folder = $story_html_folder.$website_title_language."/";
	}

	if ($selected_language == $language_geral) {
		$second_html_folder = $story_html_folder;
	}

	$second_html_index_file = $second_html_folder."Index.html";
}

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

if ($update_two_html_files == True) {
	Update_HTML_File($second_html_folder, $second_html_index_file);
}

$local_website_title = Language_Item_Definer("Website HTML File Generator", "Gerador de Arquivos HTML de Sites").": ".$website_title_text;
$website_link = "";
$website_image = "";
$website_meta_description = Language_Item_Definer("Generator of HTML files for the selected website", "Gerador de arquivos HTMl para o site selecionado").": ".$website_title_text;
$image_format = "png";
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
<link rel="icon" type="image/'.$image_format.'" href="'.$website_image.'" />
<link rel="image_src" type="image/'.$image_format.'" href="'.$website_image.'" />
<meta name="description" content="'.$website_meta_description.'" />
<meta name="revised" content="'."Stake's Enterprise TM".', '.$data.'" />
<meta name="author" content="Stake Ferreira" />
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, user-scalable=yes" />
<meta charset="UTF-8" />
</head>
<body>'."\n";

echo $website_head;

echo "<center>"."\n";

echo "\n"."<h1>"."\n".
$website_title_text."<br />"."\n"
."</h1>"."\n";

$show_text = Language_Item_Definer("This is the name of the website", "Esse é o nome do site");

echo "\n"."<h2>"."\n".
$show_text.": <br />"."\n".
$website_title_text."\n"
."</h2>"."\n"."\n";

$show_text = Language_Item_Definer("This is the folder where the selected website is", "Essa é a pasta onde o site selecionado está");

echo "<h2>"."\n".
$show_text.": <br />"."\n".
Make_Link("file:///".$html_folder, $html_folder, $target = "_blank")."\n"
."</h2>"."\n"."\n";

if ($update_two_html_files == True) {
	$show_text = Language_Item_Definer("This is the folder where the selected website with another title is", "Essa é a pasta onde o site selecionado com outro título está");

	echo "<h2>"."\n".
	$show_text.": <br />"."\n".
	Make_Link("file:///".$second_html_folder, $second_html_folder, $target = "_blank")."\n"
	."</h2>"."\n"."\n";
}

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