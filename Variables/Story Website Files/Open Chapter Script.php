<?php 

echo 'var chapter_text = "'.$chapter_div_text.'";'."\n"."\n";

echo "function Open_Chapter(chapter_title, chapter_number) {"."\n";
echo "	var new_chapter_text = chapter_text + chapter_number;"."\n";
echo "	openCity(new_chapter_text);"."\n";
echo "	document.getElementById(new_chapter_text).scrollIntoView();"."\n";
echo "	Chapter_Number = chapter_number;"."\n";
echo "	Define_Chapter(Chapter_Number);"."\n";
echo "	Add_To_Website_Title(chapter_title, \"notification\");"."\n";
echo "	Hide_Computer_Buttons();"."\n";

if ($website_settings["notifications"] == True) {
	echo "	Hide_Computer_Notification();"."\n";
	echo "	Hide_Mobile_Notification();"."\n";
}

echo "}"."\n";

echo '
function Check_Chapter_Number_On_Link() {'."\n".
	'	var first_website_url = window.location;'."\n".
	'	var second_website_url = String(first_website_url);'."\n".
	'	var user_language = navigator.language || navigator.userLanguage;'."\n".
	'
	if (user_language == "pt-BR" || user_language == "pt-PT") {
		var read_chapter_text = "ler-capitulo-";
	}

	else {
		var read_chapter_text = "read-chapter-";
	}

	var chapter_number = '.$i2.';'."\n";

$i = 0;
while ($i < $chapters) {
	$i2 = $i + 1;

	if ($website_info["english_title"] != $website_titles["Diary Slim"]) {
		echo '
	var first_check_'.$i2.' = second_website_url.includes(read_chapter_text + chapter_number);
	var second_check_'.$i2.' = second_website_url.includes(read_chapter_text + "['.$i2.']");
	var third_check_'.$i2.' = second_website_url.includes(read_chapter_text + '."'".'"'."'"." + ".$i2." + "."'".'"'."'".');
	var fourth_check_'.$i2.' = second_website_url.includes(read_chapter_text + "%22'.$i2.'%22");
	var fifth_check_'.$i2.' = second_website_url.includes("('.$i2.')");';
	}

	echo 
'	var sixth_check_'.$i2.' = second_website_url.includes("['.$i2.']");';

	$i++;
}

echo "\n"."\n";

$i = 0;
while ($i < $chapters) {
	$i2 = $i + 1;

	if ($website_info["english_title"] != $website_titles["Diary Slim"]) {
		echo '	if (first_check_'.$i2.' === true || second_check_'.$i2.' === true || third_check_'.$i2.' === true || fourth_check_'.$i2.' === true || fifth_check_'.$i2.' === true || sixth_check_'.$i2.' == true) {'."\n";
	}

	if ($website_info["english_title"] == $website_titles["Diary Slim"]) {
		echo '	if (sixth_check_'.$i2.' == true) {'."\n";
	}

	echo '		var chapter_title = "'." - ".ucwords($chapter_text). ": ".$i2." - ".$chapter_titles[$i2 - 1].'";'."\n";
	echo '		var current_chapter_number = '.$i2.';'."\n";
	echo '		Open_Chapter(chapter_title, current_chapter_number);'."\n";
	echo '	}'."\n";

	if ($i != $chapters) {
		echo "\n";
	}

	$i++;
}

echo "}"."\n".
'console.log("Open Chapter Script was loaded.");'."\n";

echo "\n";
echo "Check_Chapter_Number_On_Link();"."\n";
echo "\n";
echo "var local_website_url = String(window.location);"."\n";
echo "\n";
echo 'var last_chapter_texts = [
"Last_Chapter",
"Last Chapter",
"last_chapter",
"last chapter",

"Último_Capítulo",
"Último Capítulo",
"último_capítulo",
"último capítulo",

"%C3%9Altimo_Capítulo",
"%C3%9Altimo Capítulo",
"%C3%BAltimo_cap%C3%ADtulo",
"%C3%BAltimo cap%C3%ADtulo",
"%C3%9Altimo%20Cap%C3%ADtulo",
"%C3%9Altimo Cap%C3%ADtulo",

"Ultimo_Capítulo",
"Ultimo Capítulo",
"ultimo_capítulo",
"ultimo capítulo",
];

var parameter_text = local_website_url.split("?")[local_website_url.split("?").length - 1];
var parameter_text_replaced = parameter_text.replace("[", "").replace("]", "").replace("(", "").replace(")", "").replace("%20", " ").replace("#", " ");

parameter_text_replaced = parameter_text_replaced.split("&")[parameter_text_replaced.split("&").length - 1];

console.log("Parameter Text: " + parameter_text);
console.log("Replaced Parameter Text: " + parameter_text_replaced);

if (last_chapter_texts.indexOf(parameter_text_replaced) != -1) {
	console.log("Website URL includes last chapter text.");
	Open_Chapter(Last_Chapter_Title, Last_Chapter);
}'."\n";

?>