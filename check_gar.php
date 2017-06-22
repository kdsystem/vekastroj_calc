<?php
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
if ($maintype == "classic") {
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
if ($maintype == "trend") {
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

if ($csx=="csx2"){
	$price=$price+225;
}
if ($csx=="csx3"){
	$price=$price+300;
}
if ($csx=="csx4"){
	$price=$price+450;
}
if ($csx=="csx5"){
	$price=$price+824;
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
echo '</tr>';
echo '<tr>';
echo '<td>';
echo 'Гаражные ворота ';
echo "ширина = " . $csvdata [2]."мм., высота = " . $csvdata [3]."мм.".'(профиль '.$maintype.', полотно '.$poltype.', ';
echo 'цвет ='.$selected_color.",";
if ($mount_type=="std_mount") { echo '<br>';echo 'выбран стандартный тип монтажа';}
echo ' )';
echo '</td>';
echo '<td>';
//echo $csvdata[4].' руб.';
echo $price.' руб.';
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

if ($door=="door_std") {
	echo '<tr>';
	echo '<td>';
	echo 'Встроенная калитка (стандартная)';
	echo '</td>';
	echo '<td>';
	echo $price_door.' руб.';
	echo '</td>';
	echo '</tr>';
}

if ($door=="door_low") {
	echo '<tr>';
	echo '<td>';
	echo 'Встроенная калитка (с низким порогом)';
	echo '</td>';
	echo '<td>';
	echo $price_door.' руб.';
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
echo 'Итого';
echo '<t/d>';
echo '<td>';
echo $price+$price_mounttype+$price_door+$price_dostavka+$price_upr+$price_windows+$price_aqua+$price_zamok.' руб.';
echo '<t/d>';

echo '</tr>';
echo '</table>';

echo "<br>";

echo "<br>";
//echo"Монтаж =".$montazh;
//echo "<br>";
//echo"Доставка =".$dostavka;
//echo "<br>";
//echo"км =".$km;
//echo "<br>";
//echo"Управление =".$upr;
//echo "<br>";
//echo"Тип установки =".$mount_type;
//echo "<br>";
//echo"Антикор =".$antikor;
//echo "<br>";
//echo"Редуктор =".$reductor;
//echo "<br>";
//echo"Замок =".$zamok;
//echo "<br>";
//echo"Окна =".$windows;
//echo "<br>";
//echo"Калитка =".$door;

echo "<br>";
echo "Файл для расчетов =".$yourcsvfile;
echo "<br>";
//$price = $price + $csvdata [4];
//echo "Цена изделия " . $price_multi;
//echo "<br>";
//echo "Цена за дверь " . $price_door;
//echo "<br>";
//echo "Цена за антикор " . $price_aqua;
//echo "<br>";
//echo "Цена за замок " . $price_zamok;
//echo "<br>";
//echo "Цена за окна " . $price_windows;
//echo "<br>";
//echo "Цена за доставку " . $price_dostavka;
//echo "<br>";
//echo "Цена за управление " . $price_upr;
//echo "<br>";
//echo "Цена за тип установки " . $price_mounttype;
//echo "<br>";
//if ($door=="door_std"){echo "Выбрана стандартная дверь";echo "<br>";}
//if ($door=="door_low"){echo "Выбрана дверь с низким порогом";echo "<br>";}

//if ($montazh<>"none") {
//	if ($upr=="manual") {
//		echo "Стоимость монтажа ворот с ручным управлением ".$price_upr;
//		echo "<br>";
//	}
//	else{
//		echo "Стоимость монтажа ворот с электроприводом ".$price_upr;
//		echo "<br>";
//	}
//}

//if ($dostavka<>"none"){
//	if ($dostavka<>"city"){
//		$price_dostavka=700+$km*30;
//		echo "Стоимость доставки за ".$km." км. от города ".$price_dostavka;
//		echo "<br>";
//	}
//	else {
//		echo "Стоимость доставки в черте города ".$price_dostavka;
//		echo "<br>";
//	}
//}


//echo "Ширина =" . $csvdata [2];
//echo "<br>";
//echo "Высота =" . $csvdata [3];
//echo "<br>";
// echo"Цена при нестандартном размере=".$csvdata[4];
//echo "<br>";

//echo $csvdata[0];
?>