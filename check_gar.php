<?php
$debugging=false;
//ну тут всё ясно
$discount = 0.3;
$ip=$_SERVER['REMOTE_ADDR'];
function csv_in_array($url, $delm = ";", $encl = "\"", $head = false, $wid, $heig) {
	$csvxrow = file ( $url );
	$csvxrow [0] = chop ( $csvxrow [0] );
	$csvxrow [0] = str_replace ( $encl, '', $csvxrow [0] );
	$keydata = explode ( $delm, $csvxrow [0] );
	$keynumb = count ( $keydata );
	
	$i = 0;
	$old = 0;
	foreach ( $csvxrow as $item ) {
		$item = chop ( $item );
		$item = str_replace ( $encl, '', $item );
		$csv_data = explode ( $delm, $item );
		for($y = 0; $y < $keynumb; $y ++) {
			if ($csv_data [$y] == "") {
				$out [$i] [$y] = 0;
			} else {
				$out [$i] [$y] = $csv_data [$y];
			}
			if (($i == 1) && ($y > 0)) {
				echo "\r\n";
			}
		}
		$i ++;
	}
	print_r ( "<br>" );
	// print_r("<br>");
	echo "\r\n";
	$y = 0;
	$flag = 0;
	while ( $out [0] [$y] < $wid ) {
		// echo"<br>".$out[0][$y];
		$y ++;
	}
	// echo"--".$y."--";
	// print_r("<br>");
	// echo"Ширина ".$out[0][$y];
	
	$i = 0;
	while ( $out [$i] [0] < $heig ) {
		// echo"<br>".$out[$i][0];
		$i ++;
	}
	// echo"<br>".$i."--";
	// print_r("<br>");
	// echo"Высота ".$out[$i][0];
	// print_r("<br>");
	// print_r("<br>");
	
	$price = $out [$i] [$y];
	// $square=$out[0][$y]*$out[$i][0]/1000000;
	$height_near = $out [0] [$y];
	$width_near = $out [$i] [0];
	$price_near = $out [$i] [$y];
	
	// echo "Площадь равна =".$square;
	// echo "<br>";
	// echo"Цена изделия ".$price."--";
	return array (
			$out,
			$price,
			$height_near,
			$width_near,
			$price_near
	);
}

//$door="no";
$yourcsvfile="vor_gar_classic.csv";
//maintype, poltype, width, height, selected_color, montazh, dostavka, km, upr, mount_type, antikor, zamok, windows, kalitka
$maintype = $_REQUEST['maintype'];
//echo "--------".$maintype;
$poltype = $_REQUEST['poltype'];
$width = $_REQUEST['width'];
$height = $_REQUEST['height'];
//echo "--------".$height;
$selected_color = $_REQUEST['selected_color'];
$montazh = $_REQUEST['montazh'];
$dostavka = $_REQUEST['dostavka'];
$km = $_REQUEST['km'];
$upr = $_REQUEST['upr'];
$mount_type = $_REQUEST['mount_type'];
//$antikor = $_REQUEST['antikor'];
$zamok = $_REQUEST['zamok'];
$windows = $_REQUEST['windows'];
$door = $_REQUEST['kalitka'];
//$reductor= $_REQUEST['reductor'];
$aqua=$_REQUEST['aqua'];
$csx=$_REQUEST['csx'];
$price=0;
$price_door=0;
$price_aqua=0;
$price_windows=0;
$price_zamok=0;
$price_dostavka=0;
$price_upr=0;
$price_multi=0;
$price_mounttype=0;
$yourcsvfile="";
if ($maintype == "Classic") {
	if ($door != "none") {
		$price_door = 32860;
		// $price=$price+32860;
	}
	if ($zamok != "none") {
		$price_zamok = 3755;
		// $price=$price+3755;
	}
	if ($windows != 0) {
		$price_windows = $windows * 4147;
		// $price=$price+$windows*4147;
	}
	if ($aqua != "none") {
		if ($height < 3000) {
			$price_aqua = 14318;
			//echo "!!!!!".$height."!!!!!";
			// $price=$price+14318;
		} else {
			//echo "!!!!!".$height."!!!!!";
			$price_aqua = 20499;
			// $price=$price+20499;
		}
	}
}
if ($maintype == "Trend") {
	if ($door != "none") {
		$price_door = 26576;
		// $price=$price+26576;
	}
	if ($zamok != "none") {
		$price_zamok = 3596;
		// $price=$price+3596;
	}
	if ($windows != 0) {
		$price_windows = 3971;
		// $price=$price+$windows*3971;
	}
}
if ($montazh != "none") {
	if ($upr == "manual") {
		$price_upr = 6000;
		// $price=$price+6000;
	} else {
		$price_upr = 7500;
		// $price=$price+7500;
	}
}


if ($upr == "automatic") {
	if (($csvdata [2]*$csvdata [3] <= 8400000) & ($csvdata [3]<=2700))  {
		$price_automatic=7350;
		$price_automatic_text="ASG600/3KIT-L Электропривод со встроенным блоком управления, встроенный радиоприемник, два четырехканальных пульта, рейка с цепью 3,5м., 24В, тяговое усилие 600Н";
	}
	if (($csvdata [2]*$csvdata [3] <= 13500000) & ($csvdata [2]*$csvdata [3] > 8400000) & ($csvdata [3]<=2700)){
		$price_automatic=8200;
		$price_automatic_text="ASG1000/3KIT-L Электропривод со встроенным блоком управления, встроенный радиоприемник, два четырехканальных пульта, рейка с цепью 3,5м., 24В, тяговое усилие 1000Н";
	}
	if (($csvdata [2]*$csvdata [3] <= 16000000) & ($csvdata [2]*$csvdata [3] > 13500000) & ($csvdata [3]>2700) & ($csvdata [3]<=3400)){
		$price_automatic=9450;
		$price_automatic_text="ASG1000/4KIT Электропривод со встроенным блоком управления, встроенный радиоприемник, два четырехканальных пульта, рейка с цепью 4,2м., 24В, тяговое усилие 1000Н";
	}
}

if ($dostavka<>"none"){
	if ($dostavka<>"city"){
		$price_dostavka=700+$km*30;
		//$price=$price+700+$km*30;
	}
	else {
		$price_dostavka=1000;
		//$price=$price+1000;
	}
}

if ($csx=="podves_cs2"){
	$price_csx=225;
	$price_csx_text="Телескопическое подвешение типа CS-2";
}
if ($csx=="podves_cs3"){
	$price_csx=300;
	$price_csx_text="Телескопическое подвешение типа CS-3";
}
if ($csx=="podves_cs4"){
	$price_csx=450;
	$price_csx_text="Телескопическое подвешение типа CS-4";
}
if ($csx=="podves_cs5"){
	$price_csx=824;
	$price_csx_text="Телескопическое подвешение типа CS-5";
}

echo '<input id="back" type="submit" value="Назад" onclick="javascript:Back()" />
<script type="text/javascript">
function Back(){
	document.getElementById("parameters").style= "display: inline-block;";
	document.getElementById("kp").style= "display: none;";
}
</script>';

if ($maintype == "classic") {
	//if ($poltype == "s_gofr") {
	if (($selected_color == "golddub") or ($selected_color == "darkdub") or ($selected_color == "vishnya")) {
		// только эти три цвета
		$yourcsvfile = "vor_gar_classic_gd_dd_v.csv";
	} else {
		// оставшиеся цвета
		$yourcsvfile = "vor_gar_classic.csv";
	}
	//}
} else {
	//echo("111111111111");
	//if ($poltype == "s_gofr") {
	if (($selected_color == "golddub") or ($selected_color == "darkdub") or ($selected_color == "vishnya")) {
		// только эти три цвета
		$yourcsvfile = "vor_gar_trend_gd_dd_v.csv";
	} else {
		// оставшиеся цвета
		$yourcsvfile = "vor_gar_trend.csv";
	}
	//}
}

$csvdata = csv_in_array( $yourcsvfile, ";", "\"", false, $width, $height);

if ($door<>"none"){
	$multi=false;
	//$price=0;
	$wid=$csvdata[2];
	$heig=$csvdata[3];
	if ($type=="classic"){
		//CLASSIC TYPE
		if (($heig>=1960) and ($heig<2085)){
			if (($wid>1875) and ($wid<3625)){$multi=true;}
		}
		if (($heig>=2085) and ($heig<2210)){
			if (($wid>1750) and ($wid<3625)){$multi=true;}
		}
		if (($heig>=2210) and ($heig<2335)){
			if (($wid>1749) and ($wid<3625)){$multi=true;}
		}
		if (($heig>=2335) and ($heig<2460)){
			if (($wid>1749) and ($wid<3500)){$multi=true;}
		}
		if (($heig>=2460) and ($heig<2585)){
			if (($wid>1749) and ($wid<3375)){$multi=true;}
		}
		if (($heig>=2585) and ($heig<2710)){
			if (($wid>1749) and ($wid<3250)){$multi=true;}
		}
		if (($heig>=2710) and ($heig<2835)){
			if (($wid>1749) and ($wid<3125)){$multi=true;}
		}
		if (($heig>=2835) and ($heig<2960)){
			if (($wid>1749) and ($wid<2875)){$multi=true;}
		}
		if (($heig>=2960) and ($heig<3085)){
			if (($wid>1749) and ($wid<2750)){$multi=true;}
		}
		if ($heig=3085){
			if (($wid>1749) and ($wid<2625)){$multi=true;}
		}
	}
	else {
		//TREND TYPE
		if (($heig>=1875) and ($heig<2000)){
			if (($wid > 1875) and ($wid < 3625)) {$multi = true;}
		}
		if (($heig>=2000) and ($heig<2125)){
			if (($wid > 1750) and ($wid < 3625)) {$multi = true;}
		}
		if (($heig>=2125) and ($heig<2250)){
			if (($wid > 1749) and ($wid < 3500)) {$multi = true;}
		}
		if (($heig>=2250) and ($heig<2375)){
			if (($wid > 1749) and ($wid < 3375)) {$multi = true;}
		}
		if (($heig>=2375) and ($heig<2500)){
			if (($wid > 1749) and ($wid < 3250)) {$multi = true;}
		}
		if (($heig>=2500) and ($heig<3125)){
			if (($wid>1749) and ($wid<3000)){$multi=true;}
		}
		if (($heig>=2750) and ($heig<2875)){
			if (($wid>1749) and ($wid<2875)){$multi=true;}
		}
		if (($heig>=2875) and ($heig<3000)){
			if (($wid>1749) and ($wid<2750)){$multi=true;}
		}
		if ($heig=3000){
			if (($wid>1749) and ($wid<2625)){$multi=true;}
		}
	}
}
//if ($multi) {$price_multi=$csvdata[4]*1.05;}
if (($door<>"none") and ($multi)) {$price=$csvdata[4]*1.05;}
else {$price=$csvdata[4];}
if ($mount_type=="low_mount"){$price_mounttype=$csvdata[4]*0.05;}
if ($mount_type=="high_mount"){$price_mounttype=$csvdata[4]*0.08;}

echo "<br>";
$orderNumber=uniqid();

echo '<img width="60%" src="images/kp.png">';
echo "<br>";
echo"Предлагаем вам рассмотреть вариант гаражных ворот следующей спецификации:";
echo "<br>";
echo '<table border="1">';
echo '<tr>';
echo "<th> Коммерческое предложение  №".$orderNumber." от ".date("d.m.y")."</th>";
echo '<td>';
echo 'Сумма';
echo '</td>';
echo '<td>';
$discount_percent=$discount*100;
echo 'с учетом скидки '.$discount_percent.' %';
echo '</td>';
echo '</tr>';
echo '<tr>';
echo '<td>';
echo 'Гаражные ворота ';
echo 'Тип '.$maintype.', ';
echo "ширина = " . $csvdata [2]."мм., высота = " . $csvdata [3]."мм.".'(профиль '.$maintype.', полотно '.$poltype.', ';
echo 'цвет ='.$selected_color.",";
if ($mount_type=="std_mount") { echo '<br>';echo 'выбран стандартный тип монтажа';}
echo ' )';
echo '</td>';
echo '<td>';
//echo $csvdata[4].' руб.';
echo $price.' руб.';
echo '</td>';
$price_discount=$price*(1-$discount);
echo '<td>';
echo $price_discount.' руб.';
echo '</td>';


echo '</tr>';
echo '<tr>';
if ($mount_type=='low_mount' ) {echo '<td>'; echo"Выбран низкий монтаж";
echo '</td>';
echo '<td>';
echo $price_mounttype;
echo '</td>';}
if ($mount_type=='high_mount' ) {echo '<td>'; echo"Выбран высокий монтаж";
echo '</td>';
echo '<td>';
echo $price_mounttype;
echo '</td>';
}
echo '</tr>';

$door_txt=", комплект калитки включает: контакт калитки, усиливающий корпус замка, врезной замок, комплект ключей (2 шт.), комплект алюминиевых ручек, линейный доводчик.";
if ($door=="door_std") {
	echo '<tr>';
	echo '<td>';
	echo 'Встроенная калитка (стандартная)'.$door_txt;
	echo '</td>';
	echo '<td>';
	echo $price_door.' руб.';
	echo '</td>';
	$price_door_discount=$price_door*(1-$discount);
	echo '<td>';
	echo $price_door_discount.' руб.';
	echo '</td>';
	echo '</tr>';
}

if ($door=="door_low") {
	echo '<tr>';
	echo '<td>';
	echo 'Встроенная калитка (с низким порогом)'.$door_txt;
	echo '</td>';
	echo '<td>';
	echo $price_door.' руб.';
	echo '</td>';
	$price_door_discount=$price_door*(1-$discount);
	echo '<td>';
	echo $price_door_discount.' руб.';
	echo '</td>';
	echo '</tr>';
}

if ($dostavka<>"none"){
	echo '<tr>';
	echo '<td>';
	if ($dostavka<>"city"){
		$price_dostavka=700+$km*30;
		echo "Стоимость доставки за ".$km." км. от города ";
		echo '</td>';
		echo '<td>';
		echo $price_dostavka.' руб.';
	}
	else {
		echo "Стоимость доставки в черте города ";
		echo '</td>';
		echo '<td>';
		echo $price_dostavka.' руб.';
	}
	echo '</td>';
	echo '</tr>';
}

if ($montazh<>"none") {
	echo '<tr>';
	echo '<td>';
	if ($upr=="manual") {
		echo "Стоимость монтажа ворот с ручным управлением ";
		echo '</td>';
		echo '<td>';
		echo $price_upr.' руб.';
	}
	else{
		echo "Стоимость монтажа ворот с электроприводом ";
		echo '</td>';
		echo '<td>';
		echo $price_upr.' руб.';
		echo "<br>";
	}
	echo '</td>';
	echo '</tr>';
	
}

if ($windows!=0) {
	echo '<tr>';
	echo '<td>';
	echo "Стоимость окон, за ".$windows." шт.";
	echo '</td>';
	echo '<td>';
	echo $price_windows." руб.";
	echo '</td>';
	$price_windows_discount=$price_windows*(1-$discount);
	echo '<td>';
	echo $price_windows_discount.' руб.';
	echo '</td>';
	echo '</tr>';
}

if ($aqua !="none") {
	echo '<tr>';
	echo '<td>';
	echo "Стоимость коплекта для влажных помещений";
	echo '</td>';
	echo '<td>';
	echo $price_aqua." руб.";
	echo '</td>';
	echo '</tr>';
}

if ($zamok !="none") {
	echo '<tr>';
	echo '<td>';
	echo "Стоимость ригельного замка";
	echo '</td>';
	echo '<td>';
	echo $price_zamok." руб.";
	echo '</td>';
	echo '</tr>';
}

	echo '<tr>';
	echo '<td>';
	echo $price_csx_text;
	echo '</td>';
	echo '<td>';
	echo $price_csx." руб.";
	echo '</td>';
	echo '</tr>';

if ($upr == "automatic") {
	echo '<tr>';
	echo '<td>';
	echo $price_automatic_text;
	echo '</td>';
	echo '<td>';
	echo $price_automatic." руб.";
	echo '</td>';
	if ($door !="none"){
		$price_automatic_dop=2850;
		$price_automatic_dop_dicount=$price_automatic_dop*(1-$discount);
		echo '<tr>';
		echo '<td>';
		echo "Коммутационный набор для подключения к системам управления электроприводами датчиков безопасности";
		echo "(датчика калитки и датчиков ослабления тяговых тросов)";
		echo '</td>';
		echo '<td>';
		echo $price_automatic_dop." руб.";
		echo '</td>';
		echo '<td>';
//		echo $price_automatic_dop_dicount." руб.";
		echo '</td>';
	}
	echo '</tr>';
}


echo '<tr>';
echo '<td>';
echo 'Итого';
echo '</td>';
echo '<td>';
echo $price+$price_mounttype+$price_door+$price_dostavka+$price_upr+$price_windows+$price_aqua+$price_zamok+$price_csx+$price_automatic.' руб.';
echo '</td>';
echo '<td>';
echo $price_discount+$price_poddom_discount+$price_springs_discount+$price_mtype_discount+$price_door_discount+$price_aqua_discount+$price_zamok_discount;
echo '</td>';

echo '</tr>';
echo '</table>';

echo "<br>";

echo "<br>";


if ($debugging){
	echo "<br>";
	echo "Файл для расчетов =".$yourcsvfile;
	echo "<br>";	
	echo"Высота =".$height;
	echo "<br>";
	echo"Ширина =".$width;
	echo "<br>";
	echo 'цвет ='.$selected_color;
	echo "<br>";
	echo 'полотно '.$poltype;
	echo "<br>";
	echo 'aqua ='.$aqua;
	echo "<br>";
	echo"Монтаж =".$montazh;
	echo "<br>";
	echo"Доставка =".$dostavka;
	echo "<br>";
	echo"км =".$km;
	echo "<br>";
	echo"Управление =".$upr;
	echo "<br>";
	echo"Тип установки =".$mtype;
	echo "<br>";
	//echo"Антикор =".$antikor;
	//echo "<br>";
	echo"Редуктор =".$reductor;
	echo "<br>";
	echo"Замок =".$zamok;
	echo "<br>";
	echo"Окна =".$windows;
	echo "<br>";
	echo"Калитка =".$door;
	echo "<br>";
	echo"Аква =".$aqua;
	
	echo "<br>";
	echo"springs =".$springs;
	
	echo "<br>";
	echo"csx =".$csx;
	echo "<br>";
	echo"price_poddom_discount =".$price_poddom_discount;
	echo "<br>";
	echo"poddom =".$poddom;
	echo "<br>";
	
	//echo "Ширина =" . $csvdata [2];
	//echo "<br>";
	//echo "Высота =" . $csvdata [3];
	echo "<br>";
	echo 'IP='; echo $ip;
}
?>