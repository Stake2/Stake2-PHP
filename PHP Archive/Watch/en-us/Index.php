<?php

$site = 'Watch';
$enus = 'enus';
$global = 'Global';

include "C:/Mega/Diario/PHP/".$site."/Variables/V".$site.".php";
include "C:/Mega/Diario/PHP/".$site."/Variables/Files".$enus.".php";

 ?>
<!DOCTYPE html>
<head><?php echo $siteheadenus; ?>
</head>
<body>
<?php echo $sitejs; ?>
<center>

<?php echo $sidemenubtnsenus."\n"; ?>
<?php echo "\n"; ?>
<div id="myDIV" class="w3-bar mobileHide" style="position:fixed;">
<?php echo $everybtnenus; ?><?php echo "\n"; ?>
<?php echo $pcbtn1."\n"; ?>
</div><?php echo "\n"; ?>
<?php echo $pcbtn2."\n"; ?>


<div class="mobileHide"><br /><br /><br /><br /><br /><br /><br /><br /></div>
<div style="background-color:black;<?php echo $margincss3.$border; ?>">
<<?php echo $n3; ?> class="w3-black w3-text-blue <?php echo $mobile0; ?>"><br /><?php echo "".$sitetituloenus.': <span class="w3-text-yellow">['.$everywatchednumb." ".$mediasenus.']</span>'."<br />"; ?><br /><hr class="<?php echo $sitehr; ?>" /></<?php echo $n3; ?>><?php echo "\n"; ?>
<<?php echo $m3; ?> class="w3-black w3-text-blue <?php echo $mobile1; ?>"><br /><?php echo "".$sitetituloenus.': <span class="w3-text-yellow">['.$everywatchednumb." ".$mediasenus.']</span>'."<br />"; ?><br /><hr class="<?php echo $sitehr; ?>" /></<?php echo $m3; ?>><?php echo "\n"; ?>
<img src="<?php echo $siteimg; ?>" class="<?php echo $mobile0; ?>" width="27%" style="background-color:black;<?php echo $border; ?>"><br /><br /><?php echo "\n"; ?>
<img src="<?php echo $siteimg; ?>" class="<?php echo $mobile1; ?>" width="61%" style="background-color:black;<?php echo $border; ?>"><br /><br /><?php echo "\n"; ?>
<<?php echo $n3; ?> class="w3-black w3-text-blue <?php echo $mobile0; ?>">
<?php echo $sitedescenus; ?>
</<?php echo $n3; ?>><?php echo "\n"; ?>
<<?php echo $m3; ?> class="w3-black w3-text-blue <?php echo $mobile1; ?>">
<?php echo $sitedescenus; ?>
</<?php echo $m3; ?>><?php echo "\n"; ?>
<br /><?php echo "\n"; ?>
</div><?php echo "\n"; ?>

</center>

<?php

include $tabsphp;
echo "\n";

?>

<?php echo $sitebtn."\n"; ?>

<?php

include $sitesbtnphp;

?>
</center>
</body>
</html>