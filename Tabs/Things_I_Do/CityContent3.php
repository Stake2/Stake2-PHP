<?php 

$i = 3;
echo $computer_div."\n";
echo '<a class="link" href="#'.$tabcodes[$i].'" style="float:right;"><button class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="openCity('."'".$tabcodes[$i]."')".'">'.$icons[29].'</button></a>'."\n";
echo '<a class="link" href="#'.$citycodes[0].'"><button class="w3-btn '.$first_button_style.'" style="float:left;margin-left:15px;'.$rounded_border_style_2.'" onclick="openCity('."'".$citycodes[0]."')".'"><h3>'.$icons[16].'</h3></button></a>'."\n";
echo $div_close."\n";

echo '<div class="'.$mobile_variable.'">';
echo '<a class="link" href="#'.$tabcodesm[$i].'" style="float:right;"><button class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="openCity('."'".$tabcodesm[$i]."')".'">'.$icons[29].'</button></a>'."\n";
echo '<a class="link" href="#'.$citycodes[0].'"><button class="w3-btn '.$first_button_style.'" style="float:left;margin-left:15px;'.$rounded_border_style_2.'" onclick="openCity('."'".$citycodes[0]."')".'"><h3>'.$icons[16].'</h3></button></a>'."\n";
echo $div_close."\n";

echo '<br /><br />'."\n";

echo $computer_div."\n";
echo $margin."\n";
echo '<div class="'.$textstyle2.'" style="border-color:'.$bordercolor.';border-style:solid;'.$rounded_border_style_2.'">'."\n";
echo $margin."\n";
echo '<p style="margin-top:2%;">'.'<b>'.$tabsubdescs[0].': '.'</b>'.$pc."\n";
echo '<p style="margin-bottom:1%;">'.$tabdescriptions[1].$pc."\n";
echo $div_close."\n";
echo $div_close."\n";
echo $div_close."\n";

echo $margin."\n";
echo $margin."\n";
echo '<div class="'.$textstyle2.'" style="border-color:'.$bordercolor.';border-style:solid;'.$rounded_border_style_2.'">';
echo '<p style="margin-bottom:3%;">'.'<b>'.$tabsubdescs[1].': '.'</b>'.$pc."\n";
echo $div_close."\n";
echo $div_close."\n";
echo $div_close."\n";

require $stories_tab_php;

echo $div_close."\n";

echo $mobile_div."\n";
echo $margin."\n";
echo '<div class="'.$textstyle2.'" style="border-color:'.$bordercolor.';border-style:solid;'.$rounded_border_style_2.'">'."\n";
echo $margin."\n";
echo '<p style="margin-top:2%;">'.'<b>'.$tabsubdescs[0].': '.'</b>'.$pc."\n";
echo '<p style="margin-bottom:7%;">'.$tabdescriptions[1].$pc."\n";
echo $div_close."\n";
echo $div_close."\n";
echo $div_close."\n";


echo $margin."\n";
echo '<div class="'.$textstyle2.'" style="border-color:'.$bordercolor.';border-style:solid;'.$rounded_border_style_2.'">';
echo $margin."\n";
echo '<p style="margin-bottom:7%;">'.'<b>'.$tabsubdescs[1].': '.'</b>'.$pc."\n";
echo $div_close."\n";
echo $div_close."\n";
echo $div_close."\n";

require $stories_tab_php;

echo $div_close."\n";

?>