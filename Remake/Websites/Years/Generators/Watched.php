<?php 

# Watched

# Generate "watched things" tab content
$website["tab_content"]["watched_things"] = [
	"string" => "",
	"number" => 0,
];

# Define Watch History array
$watch_history = [
	"folders" => [
		"per_media_type" => [
			"files" => [
				"root" => $folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["audiovisual_media_network"]["watch_history"]["watched"][$website["data"]["title"]]["per_media_type"]["files"]["root"],
			],
		],
	],
	"files" => [
		"texts" => $folders["apps"]["app_text_files"]["watch_history"]["texts"],
	],
];

$watch_history["texts"] = [
	"texts" => File::JSON($watch_history["files"]["texts"]),
];

$names = [
	"Episodes",
	"Number",
	"Times",
];

# Define files and texts
$i = 0;
foreach ($watch_history["texts"]["texts"]["plural_media_types, type: list, en - pt"] as $mixed_media_type) {
	$plural_media_type = $watch_history["texts"]["texts"]["plural_media_types, type: list"][$language][$i];

	$watch_history["folders"]["per_media_type"]["files"][$plural_media_type] = $watch_history["folders"]["per_media_type"]["files"]["root"].$mixed_media_type."/";

	# Define file names
	$file_names = $names;

	if ($mixed_media_type == "Videos - Vídeos") {
		array_push($file_names, "YouTube IDs");
	}

	$watch_history["files"][$plural_media_type] = [];
	$watch_history["texts"][$plural_media_type] = [];

	# Define media type files and texts
	foreach ($file_names as $item) {
		$key = str_replace(" ", "_", strtolower($item));

		# Define item file
		$watch_history["files"][$plural_media_type][$key] = $watch_history["folders"]["per_media_type"]["files"][$plural_media_type].$item.".txt";

		# Get contents from item file
		$watch_history["texts"][$plural_media_type][$key] = File::Contents($watch_history["files"][$plural_media_type][$key]);
	}

	# Add episode number to watched things number
	$website["tab_content"]["watched_things"]["number"] += $watch_history["texts"][$plural_media_type][$key]["length"];

	$i++;
}

$website["tab_content"]["watched_things"]["string"] .= "<!-- Media type headers -->"."\n"."\t\t";

# Add plural media type header to watched things text
$i = 0;
foreach ($watch_history["texts"]["texts"]["plural_media_types, type: list, en - pt"] as $mixed_media_type) {
	$plural_media_type = $watch_history["texts"]["texts"]["plural_media_types, type: list"][$language][$i];

	$span = HTML::Element("span", $watch_history["texts"][$plural_media_type]["episodes"]["length"], "", $website["style"]["text_highlight"]);

	$b = HTML::Element("b", $plural_media_type.": ".$span);

	# Anchor element to go to media type list
	$a = HTML::Element("a", $b, 'href="#'.$website["language_texts"]["watched_things"].": ".$plural_media_type.'"');

	$website["tab_content"]["watched_things"]["string"] .= $a."<br />"."\n\t\t";

	$i++;
}

$website["tab_content"]["watched_things"]["string"] .= "\n"."\t\t"."<br />"."\n\n";

# Define episode texts to replace
$replace = [];

if ($language == "en") {
	$replace["list"] = [
		"Dublado",
		"Deixe Sua Marca",
		"Parte",
		"FINAL",
		"Capítulo",
	];

	$replace["with"] = [
		"Portuguese dub",
		"Make Your Mark",
		"Part",
		"ENDING",
		"Chapter",
	];
}

if ($language == "pt") {
	$replace["list"] = [
		"The Final Season",
		"Season",
		"Part ",
		"1st",
		"First",
		"2nd",
		"Second",
		"3rd",
		"Third",
		"Fourth",
		"S0",
		"S1",
		"Friendship Is Magic",
		"Make Your Mark",
		"Star vs. the Forces of Evil",
		"Squid Game",
		"Chapter",
	];

	$replace["with"] = [
		"A Temporada Final",
		"Temporada",
		"Parte ",
		"Primeira",
		"Primeira",
		"Segunda",
		"Segunda",
		"Terceira",
		"Terceira",
		"Quarta",
		"T0",
		"T1",
		"A Amizade É Mágica",
		"Deixe Sua Marca",
		"Star vs. As Forças do Mal",
		"Round 6 (Squid Game)",
		"Capítulo",
	];
}

# Add plural media type header and episodes to watched things text
$i = 0;
foreach ($watch_history["texts"]["texts"]["plural_media_types, type: list, en - pt"] as $mixed_media_type) {
	$plural_media_type = $watch_history["texts"]["texts"]["plural_media_types, type: list"][$language][$i];

	$span = HTML::Element("span", $watch_history["texts"][$plural_media_type]["episodes"]["length"], "", $website["style"]["text_highlight"]);

	$b = HTML::Element("b", $plural_media_type.": ".$span);

	# Plural media type header with anchor href to go to media type episodes part
	$a = HTML::Element("a", $b, 'name="'.$website["language_texts"]["watched_things"].": ".$plural_media_type.'"')."<br />";

	$website["tab_content"]["watched_things"]["string"] .= "\t\t".'<!-- "'.$plural_media_type.'" media type header -->'."\n".
	"\t\t".$a."\n";

	# Add episodes to watched things text
	$e = 0;
	foreach ($watch_history["texts"][$plural_media_type]["episodes"]["lines"] as $episode) {
		$time = $watch_history["texts"][$plural_media_type]["times"]["lines"][$e];

		if ($mixed_media_type == "Videos - Vídeos") {
			$youtube_id = $watch_history["texts"][$plural_media_type]["youtube_ids"]["lines"][$e];
		}

		# Format watched time in local date time format ("d/m/Y" for Portuguese and "m/d/Y" for English)
		if ($time != "Unknown Watched Time - Horário Assistido Desconhecido") {
			$format = "date_time_format";

			if (strstr($time, ":") == False) {
				$format = "date_format";
			}

			$time = Date::Now($time, $website["texts"][$format]["pt"])[$website["language_texts"][$format]];
		}

		else {
			$time = $website["language_texts"]["unknown_watched_time"];
		}

		# Translate episode texts
		$episode = str_replace($replace["list"], $replace["with"], $episode);

		# Check if the mixed "Re-Watched" text is in episode, if it is, replace it with the language re-watched text
		if (strstr($episode, "Re-Watched") == True) {
			$re_watched_number = explode("x ", preg_split("/Re-Watched /i", $episode)[1])[0];

			$regex = "/Re-Watched [0-9]{1,}x - Re-Assistido [0-9]{1,}x/i";
			$episode = preg_replace($regex, $watch_history["texts"]["texts"]["re_watched, title()"][$language]." ".$re_watched_number."x", $episode);
		}

		$number = HTML::Element("span", ($e + 1), "", $website["style"]["text_highlight"]);

		$time = HTML::Element("span", "(".$time.")", "", $website["style"]["text_highlight"]);

		$span = HTML::Element("span", "\n"."\t\t\t".$number." - ".$episode." ".$time."\n"."\t\t", 'style="margin-left: 3%;"', "text_hover_white");

		$website["tab_content"]["watched_things"]["string"] .= "\t\t".$span;

		if ($e != count($watch_history["texts"][$plural_media_type]["episodes"]["lines"]) - 1) {
			$website["tab_content"]["watched_things"]["string"] .= "<br />"."\n\n";
		}

		$e++;
	}

	if ($mixed_media_type != array_reverse($watch_history["texts"]["texts"]["plural_media_types, type: list, en - pt"])[0]) {
		$website["tab_content"]["watched_things"]["string"] .= "\t\t"."<br /><br />"."\n\n";
	}

	$i++;
}

$website["tab_content"]["watched_things"]["string"] .= "<br /><br />";

# Add tab to tab templates
$website["tabs"]["templates"]["watched_things"] = [
	"name" => $website["language_texts"]["watched_things"],
	"add" => " ".HTML::Element("span", $website["tab_content"]["watched_things"]["number"], "", $website["style"]["text_highlight"]),
	"text_style" => "text-align: left;",
	"content" => $website["tab_content"]["watched_things"]["string"],
	"icon" => "eye",
];

?>