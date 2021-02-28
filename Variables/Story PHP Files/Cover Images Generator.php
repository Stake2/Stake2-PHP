<?php 

#Sets the local Cover folder and lists the files inside it
$dir = $local_cover_folder;
$x2 = 0;
$zz2 = 0;

$number_of_files = 0;

if (is_dir($dir)) {
	if ($dh = opendir($dir)) {
		while (($file = readdir($dh)) !== false) {
			$files[$zz2] = $online_cover_folder.$file;
			$x2++;
			$zz2++;

			$number_of_files++;
		}

		closedir($dh);
	}
}

$i = 1;
$cover_number = count($files) - 3;
while ($i <= $cover_number) {
	$chapter_number_and_text = "Add_To_Website_Title('"." - ".ucwords($chapter_text). ": ".$i." - ".$chapter_titles[$i - 1]."');";

	if ($new_write_style == True) {
		$on_click_script = 'openCity('."'".$chapter_div_text.$i."'".');DefineChapter('.$i.');'.$chapter_number_and_text;
	}

	else if ($new_write_style == false) {
		$on_click_script = 'openCity('."'".$chapter_div_text.$i."'".');'.$chapter_number_and_text;
	}

	$online_image_link = $online_cover_folder.$i.'.png';

	$coverimages[$i] = '<div class="'.$computer_variable.'">'.'<img src="'.$online_image_link.'" width="60%" height="60%" style="border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle3.'height: auto;max-width: 4000px;" onclick="'.$on_click_script.'" />'."\n".$div_close.'<br class="'.$computer_variable.'" />'."\n";

	$coverimagesm[$i] = '<div class="'.$mobile_variable.'">'.'<img src="'.$online_image_link.'" width="99%" height="99%" style="border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle3.'height: auto;max-width: 4000px;" onclick="'.$on_click_script.'" />'."\n".$div_close.'<br class="'.$mobile_variable.'" />'."\n";

	$i++;
}

/*
#Cover image array creator
$a = 1;
$i = 3;
$z = 1;
$c = 1;
while ($c <= (count($files))) {
	$on_click_script = 'openCity('."'".$chapter_div_text.$z."'".');DefineChapter('.$z.');';

	$online_image_link = $online_cover_folder.$z.'.png';

	$coverimages[$a] = '<div class="'.$computer_variable.'">'.'<img src="'.$online_image_link.'" width="60%" height="60%" style="border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle3.'height: auto;max-width: 4000px;" onclick="'.$on_click_script.'" />'."\n".$div_close.'<br class="'.$computer_variable.'" />'."\n";

	$coverimagesm[$a] = '<div class="'.$mobile_variable.'">'.'<img src="'.$online_image_link.'" width="99%" height="99%" style="border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle3.'height: auto;max-width: 4000px;" onclick="'.$on_click_script.'" />'."\n".$div_close.'<br class="'.$mobile_variable.'" />'."\n";

	$a++;
	$i++;
	$z++;
	$c++;

/*
	if (isset($files[$a]) == True) {
		if ($c == 3) {
			$z--;
			$on_click_script = 'openCity('."'".$chapter_div_text.$z."'".');DefineChapter('.$z.');';

			$online_image_link = $online_cover_folder.$i.' '.ucwords($chapter_text).'.png';

			$coverimages[$a] = '<div class="'.$computer_variable.'">'.'<img src="'.$files[$i].'" width="60%" height="60%" style="border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle3.'height: auto;max-width: 4000px;" onclick="'.$on_click_script.'" />'."\n".$div_close.'<br class="'.$computer_variable.'" />'."\n";

			$coverimagesm[$a] = '<div class="'.$mobile_variable.'">'.'<img src="'.$files[$i].'" width="99%" height="99%" style="border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle3.'height: auto;max-width: 4000px;" onclick="'.$on_click_script.'" />'."\n".$div_close.'<br class="'.$mobile_variable.'" />'."\n";
		}

		if ($c == 2) {
			$on_click_script = 'openCity('."'".$chapter_div_text.($z + 8)."'".');DefineChapter('.($z + 8).');';

			$coverimages[$a] = '<div class="'.$computer_variable.'">'.'<img src="'.$files[$i].'" width="60%" height="60%" style="border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle3.'height: auto;max-width: 4000px;" onclick="'.$on_click_script.'" />'."\n".$div_close.'<br class="'.$computer_variable.'" />'."\n";

			$coverimagesm[$a] = '<div class="'.$mobile_variable.'">'.'<img src="'.$files[$i].'" width="99%" height="99%" style="border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle3.'height: auto;max-width: 4000px;" onclick="'.$on_click_script.'" />'."\n".$div_close.'<br class="'.$mobile_variable.'" />'."\n";
		}

		else {
			$coverimages[$a] = '<div class="'.$computer_variable.'">'.'<img src="'.$files[$i].'" width="60%" height="60%" style="border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle3.'height: auto;max-width: 4000px;" onclick="'.$on_click_script.'" />'."\n".$div_close.'<br class="'.$computer_variable.'" />'."\n";

			$coverimagesm[$a] = '<div class="'.$mobile_variable.'">'.'<img src="'.$files[$i].'" width="99%" height="99%" style="border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle3.'height: auto;max-width: 4000px;" onclick="'.$on_click_script.'" />'."\n".$div_close.'<br class="'.$mobile_variable.'" />'."\n";
		}


		$a++;
		$i++;
		$z++;
		$c++;
	}

	else {
		$c++;
	}
*/
/*}*/

?>