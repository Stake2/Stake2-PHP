<?php 

# Insert_Variables

function Create_Chapter_Link_And_Button($numbers, $website_title) {
	global $website;
	global $language;

	# Define chapter links
	$number_names = [
		"9" => "nine",
		"10" => "ten",
		"26" => "twenty_six",
	];

	$key = str_replace(" ", "_", $website_title);

	$i = 0;
	foreach ($numbers as $number) {
		$number = (string)$number;

		$number_name = $number_names[$number];

		$website_data = $website["dictionary"][$website_title];

		$title = $website_data["titles"]["language"];

		$text = $website["language_texts"][$number_name];

		$link = $website_data["links"]["element"];
		$link = str_replace($language."/", $language."/?chapter=".$number."#", $link);
		$link = str_replace('"'.$title.'"', $text, $link);

		$website["variable_inserter"][$key]["chapter_".$number] = $link;

		$chapter_title = $website_data["story"]["Information"]["Chapter titles"][$language][$number - 1];

		$link = $website_data["links"]["language"];
		$link .= "?chapter=".$number."#";

		$website["variable_inserter"][$key]["chapter_".$number."_button"] = '<div style="padding-top: 1%;">'.HTML::Element("a", "\n\t".$title." - ".$website["language_texts"]["chapter, title()"].": ".$number." - ".$chapter_title."\n\t", 'href="'.$link.'" target="_blank" style="max-width: 50%; font-weight: bold;"', "w3-btn ".$website_data["style"]["button"]["theme"]["light"]." animation_shake_side")."</div>"."\n";

		$i++;
	}
}

# Define Variable Inserter array
$website["variable_inserter"] = [];

# Define songs of Variable Inserter
$website["variable_inserter"]["songs"] = [];

$songs = [
	"Porter_Robinson_Madeon_Shelter_Official_Video_Link" => [
		"text" => [
			"en" => "Porter Robinson & Madeon - Shelter (Official Video) (Short Film with A-1 Pictures & Crunchyroll)",
			"pt" => "Porter Robinson & Madeon - Shelter (Vídeo Oficial) (Filme curto com A-1 Pictures & Crunchyroll)",
		],
		"id" => "fzQ6gRAEoy0",
	],
	"God's_Warrior_-_Still_Got_Something" => [
		"text" => [
			"en" => "'Still Got Something' from God's Warrior",
			"pt" => "'Still Got Something' do God's Warrior",
		],
		"id" => "8WYMQbWUxGM",
	],
	"Skybreak_&_Mizu_-_Aurora" => [
		"id" => "J2P1_v9aFV8",
	],
	"Panda_Eyes_-_Take_My_Hand_Ft._Azuria_Sky_(Z∆NE_Remix)" => [
		"id" => "OCIEd71mViM",
	],
	"Tom_&_Jerry_(2021)_Soundtrack_Playlist" => [
		"text" => [
			"en" => 'the soundtrack of the "Tom & Jerry" movie from 2021',
			"pt" => 'a trilha sonora do filme "Tom e Jerry" de 2021',
		],
		"id" => "PLDisKgcnAC4TkSDGxuPm1DeohG8FMEMNa",
		"embed" => True,
	],
	"Tom_&_Jerry_-_Married_In_The_Park" => [
		"id" => "cAlTw8szj6Q",
	],
	"Tom_&_Jerry_-_The_Wedding's_Off" => [
		"id" => "SCxnA10GOMA",
	],
	"Among_Us_Trap_Remix_By_Leonz" => [
		"text" => [
			"en" => "Among Us Drip Theme Song Original (Among Us Trap Remix / Amogus Meme Music) by Leonz",
			"pt" => "Tema musical original drip do Among Us (Remix de Trap do Among Us / Música de Meme do Amogus) por Leonz",
		],
		"id" => "fzQ6gRAEoy0",
	],
];

foreach (array_keys($songs) as $key) {
	$song = $songs[$key];

	$text = str_replace("_", " ", $key);

	if (isset($song["text"]) == True) {
		$text = $Language -> Item($song["text"]);
	}

	$link = "https://www.youtube.com/";

	if (isset($song["embed"]) == True) {
		$link = "https://www.youtube.com/embed/";
	}

	if (strstr($key, "Playlist") == False) {
		$text = '"'.$text.'"';
		$link .= $song["id"];
	}

	if (strstr($key, "Playlist") == True) {
		if (isset($song["embed"]) == True) {
			$link .= "videoseries";
		}

		if (isset($song["embed"]) == False) {
			$link .= "playlist?";
		}
	}

	if (isset($song["embed"]) == True) {
		$link .= "?autoplay=0&fs=1&iv_load_policy=1&showinfo=1&rel=0&cc_load_policy=1&start=0&end=0&";
	}

	if (strstr($key, "Playlist") == True) {
		$link .= "list=".$song["id"];
	}

	if (isset($song["embed"]) == False) {
		$website["variable_inserter"]["songs"][$key] = HTML::Element("a", $text, 'href="'.$link.'" target="_blank"');

		$website["variable_inserter"]["songs"][$key."_no_quote"] = HTML::Element("a", str_replace('"', "", $text), 'href="'.$link.'" target="_blank"');
	}

	if (isset($song["embed"]) == True) {
		$website["variable_inserter"]["songs"][$key] = $text."<br />"."\n".'<div class="video-container" style="margin-top: 1%; margin-bottom: -6%;"><iframe type="text/html" width="560" height="315" frameborder="0" class="border_radius_5_cent '.$website["style"]["border_4px"]["secondary_theme"]["light"].'" src="'.$link.'" title="YouTube video player"></iframe></div><br />';
	}
}

# Define "The Life of Littletato" key of Variable Inserter array
$website["variable_inserter"]["The_Life_of_Littletato"] = [
	"images" => [],
];

# Define "The Life of Littletato" images
$links = [
	"Not_Littletato" => $website["data"]["folders"]["website"]["images"]["images"]["root"]."Not Littletato.jpg",

	"Littletato" => $website["data"]["folders"]["website"]["images"]["images"]["root"]."Littletato.jpg",

	"Mansion_of_Littletato_and_Friends" => $website["data"]["folders"]["website"]["images"]["images"]["root"]."Mansion of Littletato and Friends.png",
];

foreach (array_keys($links) as $key) {
	$website["variable_inserter"]["The_Life_of_Littletato"]["images"][$key] = "<br />".HTML::Element("img", "", 'src="'.$links[$key].'" style="max-width: 50%;"', $website["data"]["style"]["img"]["secondary_theme"]["light"]." ".$website["data"]["style"]["box_shadow"]["black"])."<br />";
}

# Define "The Life of Littletato" songs
$songs = [
	"Yuru_Camp_Solo_Camp" => [
		"text" => "Yuru Camp",
		"link" => "https://www.youtube.com/watch?v=xZIqgCHrhRM",
	],
	"Yuru_Camp_Solo_Camp_Title" => [
		"text" => "Yuru Camp △ - OST - ソロキャン△のすすめ - Solo Camp 10 Hours",
		"link" => "https://www.youtube.com/watch?v=xZIqgCHrhRM",
	],
	"Folk_Songs" => [
		"text" => [
			"en" => "folk songs",
			"pt" => "músicas do gênero folk",
		],
		"link" => "https://www.youtube.com/watch?v=gRejhGxr69Y",
	],
	"Take_That_By_RIOT" => [
		"text" => [
			"en" => '"Take That" by RIOT',
			"pt" => '"Take That" por RIOT',
		],
		"link" => "https://www.youtube.com/watch?v=NpNYYkXxT-A",
	],
];

foreach (array_keys($songs) as $key) {
	$song = $songs[$key];

	if (is_array($song["text"]) == True) {
		$song["text"] = $Language -> Item($song["text"]);
	}

	$website["variable_inserter"]["The_Life_of_Littletato"]["songs"][$key] = HTML::Element("a", $song["text"], 'href="'.$song["link"].'" target="_blank"');
}

# Define "The Life of Littletato" chapter links and buttons
$numbers = [
	26,
];

Create_Chapter_Link_And_Button($numbers, "The Life of Littletato");

# Define SpaceLiving key of Variable Inserter array
$website["variable_inserter"]["SpaceLiving"] = [
	"images" => [],
];

# Define SpaceLiving chapter links
$numbers = [
	9,
	10,
];

Create_Chapter_Link_And_Button($numbers, "SpaceLiving");

# Define SpaceLiving images
$links = [
	"Lisa" => $website["dictionary"]["SpaceLiving"]["folders"]["website"]["images"]["images"]["root"]."Lisa.jpg".'"', $website["data"]["style"]["img"]["secondary_theme"]["light"],

	"LonelyShip_Story_Cover" => $website["dictionary"]["SpaceLiving"]["folders"]["website"]["images"]["images"]["root"]."LonelyShip Story Cover.png",

	"LonelyShip_Story_Cover_Front_Signboards" => $website["dictionary"]["SpaceLiving"]["folders"]["website"]["images"]["images"]["root"]."LonelyShip Story Cover Front Signboards.png",

	"Audacity_Blue_Bass_Waveform" => $website["dictionary"]["SpaceLiving"]["folders"]["website"]["images"]["images"]["root"]."Audacity Blue Bass Waveform.png",

	"Original_Sharks_-_FROG_PARTY_Song_Cover" => $website["dictionary"]["SpaceLiving"]["folders"]["website"]["images"]["images"]["root"]."Orignal Sharks - FROG PARTY Song Cover.jpg",

	"Funky_Black_Cat_Original_Profile_Picture" => $website["dictionary"]["SpaceLiving"]["folders"]["website"]["images"]["images"]["root"]."Funky Black Cat Original Profile Picture.png",

	"Edited_Sharks_-_FROG_PARTY_Song_Cover" => $website["dictionary"]["SpaceLiving"]["folders"]["website"]["images"]["images"]["root"]."Edited Sharks - FROG PARTY Song Cover.jpg",
];

foreach (array_keys($links) as $key) {
	$website["variable_inserter"]["SpaceLiving"]["images"][$key] = "<br />".HTML::Element("img", "", 'src="'.$links[$key].'" style="max-width: 50%;"', $website["data"]["style"]["img"]["secondary_theme"]["light"]." ".$website["data"]["style"]["box_shadow"]["black"])."<br />";
}

# Define SpaceLiving Discord server join link
$texts = [
	"en" => "Discord server of the SpaceLiving Network",
	"pt" => "Servidor do Discord da Rede SpaceLiving",
];

$text = $Language -> Item($texts);

$website["variable_inserter"]["SpaceLiving"]["Discord_Server"] = HTML::Element("a", '"'.$text.'"', 'href="https://discord.com/invite/NYN4CCu" target="_blank"');

$link = [
	"en" => "https://en.wikipedia.org/wiki/My_Little_Pony:_Friendship_Is_Magic",
	"pt" => "https://pt.wikipedia.org/wiki/My_Little_Pony:_A_Amizade_%C3%89_M%C3%A1gica",
];

$link = $Language -> Item($link);

$website["variable_inserter"]["my_little_pony_fim_wikipedia_title"] = HTML::Element("a", '"'.$website["language_texts"]["my_little_pony_friendship_is_magic"].'"', 'href="'.$link.'" target="_blank"');

$website["variable_inserter"]["my_little_pony_fim_wikipedia_link"] = HTML::Element("a", '"'.$website["language_texts"]["my_little_pony_friendship_is_magic"].'" '.$website["language_texts"]["on_wikipedia"], 'href="'.$link.'" target="_blank"');

?>