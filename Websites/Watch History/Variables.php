<?php 

# Watch PHP files
$watched_media_generator = $website_php_folders["Watch History"]."Watched Media Generator.php";
$archived_media_machine_php = $website_php_folders["Watch History"]."Archived Media Machine.php";

# Comment links
$watched_movie_comment_links = array(
	$cdn_text_movie_comments.'Hoje, Sexta (Vingadores Guerra Infinita).txt', 
	$cdn_text_movie_comments.'Hoje, Segunda (Power Rangers 2017).txt', 
	$cdn_text_movie_comments.'Hoje, Sabado (Detona Ralph 2 Ralph Quebra a Internet).txt', 
	$cdn_text_movie_comments.'Hoje, Domingo (Equestria Girls Spring Breakdown).txt', 
	$cdn_text_movie_comments.'Hoje, Sabado 2 (Os Vingadores Ultimato).txt',
	$cdn_text_movie_comments.'Homem-Aranha no Aranhaverso (2019, Sony Pictures Animation, Marvel Entertainment).txt',
);

# Comments buttons
$watched_movie_comments = array(
	'<a class="'.$text_hover_white_css_class.'" onclick="window.open('."'".$watched_movie_comment_links[0]."'".');" style="cursor:pointer;"><i class="fas fa-comments"></i></a>', 
	'<a class="'.$text_hover_white_css_class.'" onclick="window.open('."'".$watched_movie_comment_links[1]."'".');" style="cursor:pointer;"><i class="fas fa-comments"></i></a>', 
	'<a class="'.$text_hover_white_css_class.'" onclick="window.open('."'".$watched_movie_comment_links[2]."'".');" style="cursor:pointer;"><i class="fas fa-comments"></i></a>', 
	'<a class="'.$text_hover_white_css_class.'" onclick="window.open('."'".$watched_movie_comment_links[3]."'".');" style="cursor:pointer;"><i class="fas fa-comments"></i></a>', 
	'<a class="'.$text_hover_white_css_class.'" onclick="window.open('."'".$watched_movie_comment_links[4]."'".');" style="cursor:pointer;"><i class="fas fa-comments"></i></a>',
	'<a class="'.$text_hover_white_css_class.'" onclick="window.open('."'".$watched_movie_comment_links[5]."'".');" style="cursor:pointer;"><i class="fas fa-comments"></i></a>',
);

# Website image link and image size
$website_info["image_format"] = "png";
$website_info["image_link"] = $website_media_images_website_icons.$website_info["english_title"].".".$website_info["image_format"];

$website_image_size_computer = 31;
$website_image_size_mobile = 52;

$span_second_text_color = '<span class="'.$second_text_color.'">';

#Website descriptions
$website_descriptions = array(
Null,
"Website to show Animes, Cartoons, Series, Movies, and Videos that I watched, and medias that I will watch, made by Stake2.", 
"Site para mostrar Animes, Desenhos, Séries, Filmes, e Vídeos que assisti, e mídias que eu vou assistir, feito por Stake2.",
);

$text = "Website to show {}, {}, {}, {}, and {} that I watched.<br />And {} that I will watch, made by ".Create_Element("span", $text_orange_css_class, "Stake2").".";

$local_array = array(
	"Animes",
	"Cartoons",
	"Series",
	"Movies",
	"Videos",
	"Medias",
);

$replacer_array_one = array();

foreach ($local_array as $item) {
	array_push($replacer_array_one, str_replace($item, $span_second_text_color.$item.$spanc, $item));
}

$replacer_one = format($text, $replacer_array_one);

$text = "Site para mostrar {}, {}, {}, {}, e {} que assisti.<br />E {} que eu vou assistir, feito por ".Create_Element("span", $text_orange_css_class, "Stake2").".";

$local_array = array(
	"Animes",
	"Desenhos",
	"Séries",
	"Filmes",
	"Vídeos",
	"Mídias",
);

$replacer_array_two = array();

foreach ($local_array as $item) {
	array_push($replacer_array_two, str_replace($item, $span_second_text_color.$item.$spanc, $item));
}

$replacer_two = format($text, $replacer_array_two);

$website_header_descriptions = array(
	Null,
	$replacer_one,
	$replacer_two,
);

#Media links for the Links tab
$media_links_array = array(
	"https://www.baixarseriesmp4.com/baixar-the-walking-dead-6a-temporada-dublado-e-legendado-mega/", 
	"https://www.baixarseriesmp4.org/baixar-the-walking-dead-7a-temporada-dublado-e-legendado/", 
	"https://www.baixarseriesmp4.org/baixar-the-walking-dead-8a-temporada-dublado-e-legendado/", 
	"https://www.baixarseriesmp4.org/baixar-the-walking-dead-9a-temporada-mp4-dublado-e-legendado/",
	"https://pt.wikipedia.org/wiki/Lista_de_epis%C3%B3dios_de_The_Walking_Dead", 
	"https://mlp.fandom.com/pt/wiki/A_Amizade_é_Mágica_mídia_de_animação", 
	"http://www.itunesmaxhd.com/2015/08/ben-10-forca-alienigena-s01-completa.html",
	"http://www.itunesmaxhd.com/2015/08/ben-10-forca-alienigenas02.html",
	"http://www.itunesmaxhd.com/2016/03/ben-10-alien-force-3-temporada-completa.html",
	"https://www.youtube.com/user/ElectronicDesireGE/videos/",
	"https://www.superanimes.website/anime/sword-art-online-alicization/",
	"https://www.superanimes.website/anime/bang-dream-2/",
	"https://bandori.fandom.com/wiki/BanG_Dream!_2nd_Season/",
);

# Image links for the Links tab
$media_image_links_array = array(
	$cdnimg.'twd.jpg', 
	$cdnimg.'mlp.png', 
	$cdnimg.'ben10.jpg', 
	$cdnimg.'alan.jpg', 
	$cdnimg.'saoa.jpg', 
	$cdnimg.'bg.jpg',
);

$media_links_number = count($media_image_links_array);

# Text File Reader.php file includer
require $text_file_reader_file_php;

$tab_titles_without_html = array();

$current_variable_year = 2018;
$archived_medias_number = 0;

while ($current_variable_year <= $local_current_year - 1) {
	array_push($tab_titles_without_html, $archived_media_text." ".$current_variable_year.": [".${"watched_number_".$current_variable_year}."]");

    $current_variable_year++;
	$archived_medias_number++;
}

#Tabtexts array
$tab_texts = array(
	$tab_names[0]." [".$current_year_watched_number_text."]".": ".$icons_array["eye"],
	$tab_names[1]." [".$watching_medias_number."]".": ".$icons[6],
	$tab_names[2]." [".$watched_movies_number."]".": ".$icons[19],
	$tab_names[3]." [".$archived_medias_number."]".": ".$icons[8],
);

$archived_media_texts = array();

$current_variable_year = 2018;

while ($current_variable_year <= $local_current_year - 1) {
	array_push($archived_media_texts, $archived_media_text." ".$current_variable_year.": [".${"watched_number_".$current_variable_year}."]".": ".$icons[8]);

    $current_variable_year++;
}

#Tabtexts array
$tab_titles_without_html = array(
	$tab_names[0]." [".$current_year_watched_number_text."]",
	$tab_names[1]." [".$watching_medias_number."]",
	$tab_names[2]." [".$watched_movies_number."]",
	$tab_names[3]." [".$archived_medias_number."]",
);

$website_custom_button_bar_numbers = array(
0,
1,
2,
4,
);

$title_header_addon = ": ".$icons_array["eye"]." ".'<span class="'.$second_text_color.'">'."[".$every_year_watched_number." ".$watched_media_text."]".$spanc;

# Website name, title, URL and description setter, by language
$website_info["language_title"] = $website_info["english_title"];
$website_info["language_title_with_icon"] = $website_info["language_title"].": ".$title_header_addon;

$website_info["meta_description"] = $website_descriptions[$language_number];
$website_info["header_description"] = $website_header_descriptions[$language_number];

?>