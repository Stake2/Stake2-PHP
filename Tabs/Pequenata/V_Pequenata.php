<?php 

# Pequenata CSS Pack file includer
require $css_pack_pequenata;

# Folder variables
$selected_website_url = $main_website_url.$website_folder.'/';
$selected_website_folder = ${"website_folder_".$website_names_array[$selected_website_number]};
$story_name_folder = $littletato_story_folder;

$story_name = $littletato_story_name;

# Form code for the comment and read forms
$formcode = 'pequenata';

$no_language_story_folder = $notepad_stories_folder_variable.$story_name_folder.'/';

$single_cover_folder = 'Capas/Kids/';
$cover_folder = $cdn_image_stories_pequenata.$single_cover_folder;

# Defines the folder for the chapter text files that are going to be read and the cover folder on the CDN
require $cover_images_displayer_php_variable;

# Story name definer
$story_name_variable = $littletato_story_name;

# Story status
$story_status = $status_reviewing_and_editing;

# Website image vars
$website_image = 'pequenata';

# Defines the website image if the website has book covers or not
if ($website_story_has_bookcovers_setting == True) {
	$story_name_cover_image_filename = '1';

	$website_image = $online_cover_subfolder.$story_name_cover_image_filename.'.png';
	$website_image_size_computer = 60;
	$website_image_size_mobile = 88;
}

else {
	$website_image = $cdnimg.$website_image.'.jpg';

	$website_image_size_computer = 30;
	$website_image_size_mobile = 77;
}

$website_image_link = $website_image;

# Website numbers
$crossover_chapter_number = 26;
$comments_number = 11;
$comments_number_text = $comments_number + 1;
$website_comments_number = 8;
$website_comments_number_to_show = $website_comments_number - 1;
$number_of_chapter_comments = $comments_number_text - $website_comments_number;
$readed_number = 12;

# Non-language dependent texts
#$commentsbtn = '<a href="#'.$tabcode[6].'"><button class="w3-btn '.$first_button_style.' '.$computer_variable.'" onclick="openCity('."'".$tabcode[6]."')".'">'.$comments_number.' '.$icons[12].'</button></a>'."\n";
#$commentsbtnm = '<a href="#'.$tabcodem[6].'"><button class="w3-btn '.$first_button_style.' '.$mobile_variable.'" onclick="openCity('."'".$tabcodem[6]."')".'">'.$comments_number.' '.$icons[12].'</button></a>'."\n";

# TextFileReader.php File Includer
include $text_file_reader_file_php;

# Story date definer using story date text file
$story_creation_date = $story_creation_date[0];

# The chapter that I want to write
if ($website_chapter_to_write_setting == false) {
	$story_name_website_chapter_to_write = '';
}

else {
	$story_name_website_chapter_to_write = (int)$website_chapter_to_write_setting;
}

# Re-include of the VStories.php file to set the story name
include $story_variables_php_variable;

# Reviewed chapter number
$reviewed_chapter = 16;

# Website descriptions
$website_descriptions_array = array(
'Website about my story, '.$story_name.', made by stake2', 
'Website sobre a minha história, '.$story_name.', feito por stake2',
);

# Synopsis text definer using the $synopsis that is generated from TextFileReader.php
$website_html_descriptions_array = array(
'Synopsis: <i class="fas fa-scroll"></i> "'.$story_synopsis[0].'"<br />',
'Sinopse: <i class="fas fa-scroll"></i> "'.$story_synopsis[1].'"<br />',
);

# Reads the book cover image directory if the website has book covers
if ($website_story_has_bookcovers_setting == True) {
	require $cover_images_generator_php_variable;
}

# English texts for Pequenata website
if (in_array($website_language, $en_languages_array)) {
	$read_texts_array = array(
	$reading_text = "You're reading",
	$reading_text.': '.ucwords($story_name),
	'I Read It ✓',
	'I read the Chapter',
	'Read the Chapter',
	'Readings',
	'Readers',
	'Reader',
	);

	$write_texts_array = array(
	'Write',
	'Write the Chapter',
	substr($reading_text, 0, -8).' '.strtolower('Writing').': '.ucwords($story_name),
	);
}

# Brazilian Portuguese texts for Pequenata website
if (in_array($website_language, $pt_languages_array)) {
	$read_texts_array = array(
	$reading_text = "Você está lendo",
	$reading_text.': '.ucwords($story_name),
	'Eu li ✓',
	'Eu li o Capítulo',
	'Leu o Capítulo',
	'Leituras',
	'Leitores',
	'Leitor',
	);

	$write_texts_array = array(
	'Escrever',
	'Escreva o capítulo',
	substr($reading_text, 0, -6).' '.strtolower('Escrevendo').': '.ucwords($story_name),
	);
}

# Status text definer, that sets the status text with [] around it
$statustxt = '['.ucfirst($story_status).']';

# Website name, title, URL and description setter, by language
if ($website_language == $languages_array[0]) {
	$website_language = $languages_array[1];

	$hyphen_separated_website_language = strtoupper($website_language);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);
	$website_name = $selected_website;

	$website_language = $languages_array[0];
	
	$website_title = $story_name_folder;
	$website_title_html = $story_name_folder.': '.$icons[11];
	$website_link = $website_pequenata_link;
	$website_meta_description = $website_descriptions_array[0];
	$website_header_description = $website_html_descriptions_array[0];

	$website_language = $languages_array[0];
}

if ($website_language == $languages_array[1]) {
	$hyphen_separated_website_language = strtoupper($website_language);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);
	$website_name = $selected_website;
	
	$website_title = $story_name_variable;
	$website_title_html = $story_name_variable.': '.$icons[11];
	$website_link = $website_pequenata_link.strtolower($hyphen_separated_website_language).'/';
	$website_meta_description = $website_descriptions_array[0];
	$website_header_description = $website_html_descriptions_array[0];
}

if (in_array($website_language, $pt_languages_array)) {
	$hyphen_separated_website_language = strtoupper($website_language);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);
	$website_name = $selected_website;

	if ($website_language == $ptpt_language) {
		$website_title = $story_name_variable.' '.strtoupper($hyphen_separated_website_language);
	}

	else {
		$website_title = $story_name_variable;
	}

	$website_title_html = $story_name_variable.': '.$icons[11];
	$website_link = $website_pequenata_link.strtolower($hyphen_separated_website_language).'/';
	$website_meta_description = $website_descriptions_array[1];
	$website_header_description = $website_html_descriptions_array[1];
}

# Buttons and tabs definer
#  Tab names replacer for languages_array
if (in_array($website_language, $en_languages_array)) {
	$tabnames[5] = substr_replace($tabnames[5], '-', 6, 0);
	$tabnames[5] = strtr($tabnames[5], "l", strtoupper("l"));;
}

if ($website_writing_pack_setting == True) {
	$tabnames[0] = str_replace('Read', 'Write', $tabnames[0]);
	$tabnames[0] = str_replace('Ler', 'Escrever', $tabnames[0]);
}

#str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", ${"$filetextarraynames[$i]"});

# Button names
$citiestxts = array(
$tabnames[0].': '.$icons[21].' '.'<span class="w3-text-yellow"> ['.$newtxt.' '.$chapters.']</span>',
$tabnames[1].': '.$icons[20].' ❤️ 😊',
$tabnames[2].': '.$icons[12],
$tabnames[3].': '.$icons[10],
$tabnames[4].': '.$icons[11],
$icons[13],
'',
);

# Website Style.php File Includer
require $website_style_file;

# TabGenerator.php File Includer
include $website_tabs_generator;

# Website notification variables if the website notification setting is True
if ($website_has_notifications == True) {
	# Reviewed chapter title
	$reviewed_chaptercode = $chapter_buttons[$reviewed_chapter];
	$reviewed_chapter_button_mobile = $chapter_buttons[$reviewed_chapter];
}

?>