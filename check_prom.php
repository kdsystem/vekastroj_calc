<?php
$debugging=false;
$discount=0.34;
//ну тут всё ясно

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

echo '<input id="back" type="submit" value="Назад" onclick="javascript:Back()" />
<script type="text/javascript">
function Back(){
	document.getElementById("parameters").style= "display: inline-block;";
	document.getElementById("kp").style= "display: none;";
}
</script>';
//echo "<br>";
//reductor: reductor, poltype: poltype, mtype: mtype, width: width, height: height, selected_color: selected_color, montazh: montazh, dostavka: dostavka,
//km: km, upr: upr, mount_type: mount_type, zamok: zamok, windows: windows, kalitka: kalitka, aqua:aqua, csx: csx
$maintype= $_REQUEST['maintype'];
$height= $_REQUEST['height'];
$width= $_REQUEST['width'];
$selected_color = $_REQUEST['selected_color'];
$poltype = $_REQUEST['poltype'];
$montazh = $_REQUEST['montazh'];
$dostavka = $_REQUEST['dostavka'];
$km = $_REQUEST['km'];
$upr = $_REQUEST['upr'];
$mtype = $_REQUEST['mtype'];
$zamok = $_REQUEST['zamok'];
$windows = $_REQUEST['windows'];
$door = $_REQUEST['kalitka'];
//$reductor= $_REQUEST['reductor'];
$csx=$_REQUEST['csx'];
$aqua=$_REQUEST['aqua'];
$springs=$_REQUEST['springs'];
$poddom=$_REQUEST['poddom'];
$upr_dop=$_REQUEST['upr_dop'];
$price=0;
$price_poddom=0;
$price_discount=0;
$price_poddom_discount=0;
$price_zamok_discount=0;
$price_springs_discount=0;
$price_mtype_discount=0;
$price_door_discount=0;
$price_aqua_discount=0;
$price_csx=0;
$price_door=0;
$price_aqua=0;
$price_windows=0;
$price_zamok=0;
$price_dostavka=0;
$price_upr=0;
$price_multi=0;
$price_mounttype=0;
$price_csx_text="";
$price_reductor=0;
$price_springs=0;
$txt_springs="";
$price_automatic=0;
$price_automatic_dop=0;

if ($maintype=="ProPlus"){
	$yourcsvfile = "vor_prom_proplus.csv";
	if ($door != "none") {
		$price_door = 37973;
	}
	if ($windows !=0){
		$price_windows=$windows*4793;
	}
}
else{
	//protrend
	$yourcsvfile = "vor_prom_protrend.csv";
	if ($door != "none") {
		$price_door = 30711;
	}
	if ($windows !=0){
		$price_windows=$windows*4589;
	}
}

$csvdata = csv_in_array( $yourcsvfile, ";", "\"", false, $width, $height);

if ($montazh != "none") {
	if ($upr == "manual") {
	    if ($csvdata [2]*$csvdata [3] <= 16000000) { $price_upr = 8000;} else $price_upr = 10000;
		// $price=$price+6000;
	} else {
		if ($csvdata [2]*$csvdata [3] <= 16000000) { $price_upr = 10000;} else $price_upr = 12000;
		// $price=$price+7500;
	}
}

//echo "!!!!!!!!!!!!!!!".$csvdata [2]*$csvdata [3];
if ($upr == "automatic") {
	if ($csvdata [2]*$csvdata [3] <= 18000000)  {
		$price_automatic=22785;
		$price_automatic_text="ASI50KIT Электропривод с цепью ручного управления и набором кабелей, внешний блок управления CUID-230, монтажный комплект.";
	}
	if (($csvdata [2]*$csvdata [3] <= 30000000) & ($csvdata [2]*$csvdata [3] > 18000000)){
		$price_automatic=31500;
		$price_automatic_text="ASI100KIT Электропривод с цепью ручного управления и набором кабелей, внешний блок управления CUID-230, монтажный комплект.";
	}
	if ($poddom !="none") {$price_poddom=1471;};
}

if ($dostavka<>"none"){
	if ($dostavka<>"city"){
		$price_dostavka=1000+$km*30;
	}
	else {
		$price_dostavka=1000;
	}
}

if ($upr == "reductor"){
	$price_reductor=7531;
}

if ($csx=="podves_cs1"){
	$price_csx=0;
	$price_csx_text="Телескопическое подвешение типа CS-1";
}

if ($csx=="podves_cs2"){
	$price_csx=260;
	$price_csx_text="Телескопическое подвешение типа CS-2";
}
if ($csx=="podves_cs3"){
	$price_csx=347;
	$price_csx_text="Телескопическое подвешение типа CS-3";
}
if ($csx=="podves_cs4"){
	$price_csx=520;
	$price_csx_text="Телескопическое подвешение типа CS-4";
}
if ($csx=="podves_cs5"){
	$price_csx=952;
	$price_csx_text="Телескопическое подвешение типа CS-5";
}

if ($aqua != "none") {
	if ($height < 3000) {
		$price_aqua = 16546;
		//echo "!!!!!".$height."!!!!!";
		// $price=$price+14318;
	} else {
		//echo "!!!!!".$height."!!!!!";
		$price_aqua = 23689;
		// $price=$price+20499;
	}
}
//if ($multi) {$price_multi=$csvdata[4]*1.05;}
if (($door<>"none") and ($multi)) {$price=$csvdata[4]*1.05;}
else {$price=$csvdata[4];}
if ($mtype=="mtype_1") {$price_mtype=0;
$mtype_text="стандартный монтаж";};
if ($mtype=="mtype_2") {$price_mtype=$csvdata[4]*0.06;
$mtype_text="низкий мотаж (барабан сзади)";};
if ($mtype=="mtype_3") {$price_mtype=$csvdata[4]*0.07;
$mtype_text="наклонный монтаж (до 45°)";};
if ($mtype=="mtype_4") {$price_mtype=$csvdata[4]*0.08;
$mtype_text="наклонный низкий монтаж (до 45°)";};
if ($mtype=="mtype_5") {$price_mtype=$csvdata[4]*0.1;
$mtype_text="наклонный высокий с верхним расположением вала (до 45°)";};
if ($mtype=="mtype_6") {$price_mtype=$csvdata[4]*0.1;
$mtype_text="наклонный высокий с нижним расположением вала (до 45°)";};
if ($mtype=="mtype_7") {$price_mtype=$csvdata[4]*0.08;
$mtype_text="высокий монтаж с верхним расположением вала";};
if ($mtype=="mtype_8") {$price_mtype=$csvdata[4]*0.1;
$mtype_text="высокий монтаж с нижним расположением вала";};
if ($mtype=="mtype_9") {$price_mtype=$csvdata[4]*0.1;
$mtype_text="вертикальный монтаж с верхним расположением вала";};
if ($mtype=="mtype_10") {$price_mtype=$csvdata[4]*0.1;
$mtype_text="вертикальный монтаж с нижним расположением вала";};

if ($springs==0) { $txt_springs='стандартные торсионные пружины на 25000 циклов';};
if ($springs==1) { $txt_springs='усиленные торсионные пружины на 35000 циклов';
$price_springs=$csvdata[4]*0.03;};
if ($springs==2) { $txt_springs='усиленные торсионные пружины на 50000 циклов';
$price_springs=$csvdata[4]*0.04;};
if ($springs==3) { $txt_springs='усиленные торсионные пружины на 75000 циклов';
$price_springs=$csvdata[4]*0.06;};
if ($springs==4) { $txt_springs='усиленные торсионные пружины на 100000 циклов';
$price_springs=$csvdata[4]*0.08;};

echo "<br>";
echo '<div id="content">';
$orderNumber=uniqid();

echo '<img width="60%" src="images/kp.png">';
echo "<br>";
echo"Предлагаем вам рассмотреть вариант промышленных ворот следующей спецификации:";
echo "<br>";
echo '<table border="1">';
echo '<tr>';
echo "<th> Коммерческое предложение  №".$orderNumber." от ".date("d.m.y")."</th>";
echo '<td width="100px">';
echo 'Сумма';
echo '</td>';
echo '<td width="100px">';
$discount_percent=$discount*100;
echo 'с учетом скидки '.$discount_percent.' %';
echo '</td>';
echo '</tr>';
echo '<tr>';
echo '<td>';
echo 'Промышленные ворота ';
echo 'Тип '.$maintype.', ';
//echo "ширина = " . $csvdata [2]."мм., высота = " . $csvdata [3]."мм.".'(профиль '.$maintype.', полотно '.$poltype.', ';
echo "ширина = " . $width."мм., высота = " . $height."мм.".'(профиль '.$maintype.', полотно '.$poltype.', ';
echo 'цвет ='.$selected_color;
if ($springs==0 )
{echo ', '.$txt_springs;}
echo '<td>';
//echo $csvdata[4].' руб.';
echo $price.' руб.';
echo '</td>';
$price_discount=$price*(1-$discount);
echo '<td>';
echo $price_discount.' руб.';
echo '</td>';
echo '</tr>';

if ($mtype != "mtype_1") {
	echo '<tr>';
	echo '<td>';
	echo $mtype_text;
	echo '</td>';
	echo '<td>';
	echo $price_mtype.' руб.';
	echo '</td>';
	$price_mtype_discount=$price_mtype*(1-$discount);
	echo '<td>';
	echo $price_mtype_discount.' руб.';
	echo '</td>';
	
	echo '</tr>';
}
if ($springs !=0) {
	echo '<tr>';
	echo '<td>';
	echo $txt_springs;
	echo '</td>';
	echo '<td>';
	echo $price_springs.' руб.';
	echo '</td>';
	$price_springs_discount=$price_springs*(1-$discount);
	echo '<td>';
	echo $price_springs_discount.' руб.';
	echo '</td>';
	echo '</tr>';
}

$door_txt=", комплект калитки включает: контакт калитки, усиливающий корпус замка, врезной замок, комплект ключей (2 шт.), комплект алюминиевых ручек, линейный доводчик.";
if ($door=="yes") {
	echo '<tr>';
	echo '<td>';
	echo 'Встроенная калитка'.$door_txt;
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
	$price_aqua_discount=$price_aqua*(1-$discount);
	echo '<td>';
	echo $price_aqua_discount.' руб.';
	echo '</td>';
	echo '</tr>';
}

if ($zamok !="none") {
	$price_zamok=6492;
	echo '<tr>';
	echo '<td>';
	echo "Стоимость ригельного замка";
	echo '</td>';
	echo '<td>';
	echo $price_zamok." руб.";
	echo '</td>';
	echo '<td>';
	$price_zamok_discount=$price_zamok*(1-$discount);
	echo $price_zamok_discount.' руб.';
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
$price_csx_discount=$price_csx*(1-$discount);
echo '<td>';
echo $price_csx_discount." руб.";
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
	if ($upr_dop !="0"){
		$price_automatic_dop=3100;
		$price_automatic_dop_dicount=$price_automatic_dop*(1-$discount);
		echo '<tr>';
		echo '<td>';
		echo "Коммутационный набор для подключения к системам управления электроприводами датчиков безопасности";
		echo "(датчика калитки и датчиков ослабления тяговых тросов)";
		echo '</td>';
		echo '<td>';
		echo $price_automatic_dop." руб.";
		echo '</td>';
		//echo '<td>';
		//echo $price_automatic_dop_dicount." руб.";
		//echo '</td>';
	}
	echo '</tr>';
	
	if ($poddom !="none") {
		echo '<tr>';
		echo '<td>';
		echo 'Система защиты от поддомкрачивания (устанавливается на промышленные секционные ворота с навальным электроприводом. ';
		echo '<br>';
		echo 'При ширине проема ворот до 5 м и площади до 25 м² в состав опции входят кронштейны с регулировкой натяжения тросов)';
		echo '</td>';
		echo '<td>';
		echo $price_poddom.' руб.';
		echo '</td>';
		echo '<td>';
		$price_poddom_discount=$price_poddom*(1-$discount);
		echo $price_poddom_discount.' руб.';
		echo '</td>';
		echo '</tr>';
	}
}

if ($upr == "reductor") {
	echo '<tr>';
	echo '<td>';
	echo "Редуктор цепной";
	echo '</td>';
	echo '<td>';
	echo $price_reductor." руб.";
	echo '</td>';
	echo '<td>';
	$price_reductor_discount=$price_reductor*(1-$discount);
	echo $price_reductor_discount.' руб.';
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

echo '<tr>';
echo '<td>';
echo 'Итого';
echo '</td>';
echo '<td>';
echo $price+$price_poddom+$price_springs+$price_mtype+$price_mounttype+$price_door+$price_dostavka+$price_upr+$price_windows+$price_aqua+$price_zamok+$price_csx+$price_automatic_dop+$price_automatic+$price_reductor.' руб.';
echo '</td>';
echo '<td>';
echo $price_discount+
$price_mtype_discount+
$price_springs_discount+
$price_door_discount+
$price_dostavka+
$price_upr+
$price_windows_discount+
$price_aqua_discount+
$price_zamok_discount+
$price_csx_discount+
$price_automatic+
$price_automatic_dop+
$price_poddom_discount.' руб.';
echo '</td>';
echo '</tr>';
echo '</table>';
echo "<br>";
echo "Благодарим Вас, за использование калькулятора расчета стоимости Ваших ворот на сайте нашей компании!";
echo "<br>";

if ($debugging){
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
	echo "Файл для рассчетов=";
	echo $yourcsvfile;
	echo "<br>";
	
	//echo "Ширина =" . $csvdata [2];
	//echo "<br>";
	//echo "Высота =" . $csvdata [3];
	echo "<br>";
	echo 'upr_dop='.$upr_dop;
	echo "<br>";
	echo 'IP='; echo $ip;
	echo '</div>';
}

?>