<a name="<?php echo $movieenus; ?>"></a>
<div id="<?php echo $movieenus; ?>" class="city <?php echo $mobile0; ?>" style="display:none;"><?php echo "\n"; ?>
<div class="mobileHide"><br /><br /><br /></div><?php echo "\n"; ?>
<?php echo $margin2; ?><?php echo "\n"; ?>
<br /><?php echo "\n"; ?>
<?php echo $everybtnwatchedenusy2; ?><?php echo "\n"; ?>
<div class="w3-black"><?php echo "\n"; ?>
<<?php echo $n3; ?> class="w3-text-blue w3-black"><hr class="<?php echo $sitehr; ?>" /><br /><?php echo $movietextenus; ?>: <span class="w3-text-yellow">[<?php echo $moviesnumb; ?>]</span><br /><br /><hr class="<?php echo $sitehr; ?>" /></<?php echo $n3; ?>><?php echo "\n"; ?>
<<?php echo $m3; ?> class="w3-black w3-text-blue" style="text-align:left;margin:2%;"><?php echo "\n"; ?>
<?php

$i = 0;
$a = 0;

while ($i <= $watchedmoviesnumbfile) {
	$i2 = $i + 1;
	if (in_array($i, $watchedmovietimenumbarray)) {
		if (in_array($i, $watchedmoviecommentarray)) {
			echo '<span class="w3-text-white">'.$i2." - ".'('.$moviestextenus.') - </span> '.$watchedmoviestext[$i].'<span class="w3-text-white"> - '.$watchedmoviestime[$a]." - </span> ".$comments[$a]."<br />"."\n";
			$a++;
		}

		if (!in_array($i, $watchedmoviecommentarray)) {
			echo '<span class="w3-text-white">'.$i2." - ".'('.$moviestextenus.') - </span> '.$watchedmoviestext[$i].'<span class="w3-text-white"> - '.$watchedmoviestime[$a]."</span><br />"."\n";
			$a++;
		}
	}

	if (!in_array($i, $watchedmovietimenumbarray)) {
		echo '<span class="w3-text-white">'.$i2." - ".'('.$moviestextenus.') - </span> '.$watchedmoviestext[$i].' - <span class="w3-text-white">'.$notimeenus."</span><br />"."\n";
	}

    $i++;
}

?>
</<?php echo $m3; ?>>
</div>
<?php echo $divc; ?><?php echo "\n"; ?>
</div>