<?php
$debugging=true;
//ну тут всё ясно
$discount = 0.3;
$ip=$_SERVER['REMOTE_ADDR'];

function csv_in_array($url, $delm = ";", $encl = "\"", $head = false, $wid, $heig, $type) {
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
$upr = $_REQUEST['upr'];
$mtype = $_REQUEST['mtype'];
$zamok = $_REQUEST['zamok'];
$windows = $_REQUEST['windows'];
$door = $_REQUEST['kalitka'];
$reductor= $_REQUEST['reductor'];
$csx=$_REQUEST['csx'];
$aqua=$_REQUEST['aqua'];
$springs=$_REQUEST['springs'];
$poddom=$_REQUEST['poddom'];
$price=0;
$price_poddom=0;
$price_poddom_discount=0;
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


if ($maintype="proplus"){
	$yourcsvfile = "vor_prom_proplus.csv";
	if ($door != "none") {
		$price_door = 32860;
	}
}
else{
	//protrend
	$yourcsvfile = "vor_prom_protrend.csv";
	if ($door != "none") {
		$price_door = 26576;
	}
}

$csvdata = csv_in_array( $yourcsvfile, ";", "\"", false, $width, $height);

if ($montazh != "none") {
	if ($upr == "manual") {
		$price_upr = 6000;
		// $price=$price+6000;
	} else {
		$price_upr = 7500;
		// $price=$price+7500;
	}
}

//echo "!!!!!!!!!!!!!!!".$csvdata [2]*$csvdata [3];
if ($upr == "automatic") {
	if ($csvdata [2]*$csvdata [3] <= 18000000)  {
		$price_automatic=20250;
		$price_automatic_text="ASI50KIT Электропривод с цепью ручного управления и набором кабелей, внешний блок управления CUID-230, монтажный комплект.";
	}
	if (($csvdata [2]*$csvdata [3] <= 30000000) & ($csvdata [2]*$csvdata [3] > 18000000)){
		$price_automatic=28100;
		$price_automatic_text="ASI100KIT Электропривод с цепью ручного управления и набором кабелей, внешний блок управления CUID-230, монтажный комплект.";
	}
	if ($poddom !='none') {$price_poddom=1274;};
}

if ($dostavka<>"none"){
	if ($dostavka<>"city"){
		$price_dostavka=700+$km*30;
	}
	else {
		$price_dostavka=1000;
	}
}

if ($upr == "reductor"){
	$price_reductor=6517;
}

if ($csx=="csx2"){
	$price_csx=225;
	$price_csx_text="Телескопическое подвешение типа CS-2";
}
if ($csx=="csx3"){
	$price_csx=300;
	$price_csx_text="Телескопическое подвешение типа CS-3";
}
if ($csx=="csx4"){
	$price_csx=450;
	$price_csx_text="Телескопическое подвешение типа CS-4";
}
if ($csx=="csx5"){
	$price_csx=824;
	$price_csx_text="Телескопическое подвешение типа CS-5";
}

if ($windows !=0){
	$price_windows=$windows*4147;
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
//if ($multi) {$price_multi=$csvdata[4]*1.05;}
if (($door<>"none") and ($multi)) {$price=$csvdata[4]*1.05;}
else {$price=$csvdata[4];}

if ($mtype="mtype_1") {$price_mtype=0;
$mtype_text="стандартный монтаж";};
if ($mtype="mtype_2") {$price_mtype=$csvdata[4]*0.06;
$mtype_text="низкий мотаж (барабан сзади)";};
if ($mtype="mtype_3") {$price_mtype=$csvdata[4]*0.07;
$mtype_text="наклонный монтаж (до 45°)";};
if ($mtype="mtype_4") {$price_mtype=$csvdata[4]*0.08;
$mtype_text="наклонный низкий монтаж (до 45°)";};
if ($mtype="mtype_5") {$price_mtype=$csvdata[4]*0.1;
$mtype_text="наклонный высокий с верхним расположением вала (до 45°)";};
if ($mtype="mtype_6") {$price_mtype=$csvdata[4]*0.1;
$mtype_text="наклонный высокий с нижним расположением вала (до 45°)";};
if ($mtype="mtype_7") {$price_mtype=$csvdata[4]*0.08;
$mtype_text="высокий монтаж с верхним расположением вала";};
if ($mtype="mtype_8") {$price_mtype=$csvdata[4]*0.1;
$mtype_text="высокий монтаж с нижним расположением вала";};
if ($mtype="mtype_9") {$price_mtype=$csvdata[4]*0.1;
$mtype_text="вертикальный монтаж с верхним расположением вала";};
if ($mtype="mtype_10") {$price_mtype=$csvdata[4]*0.1;
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
$orderNumber=uniqid();

echo '<img width="60%" src="images/kp.png">';
echo "<br>";
echo"Предлагаем вам рассмотреть вариант промышленных ворот следующей спецификации:";
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
echo "ширина = " . $csvdata [2]."мм., высота = " . $csvdata [3]."мм.";
echo "<br>";
echo '(профиль '.$maintype.', полотно '.$poltype.', ';
echo 'цвет ='.$selected_color.",";
if ($springs==0 )
{echo $txt_springs;}
echo '<td>';
//echo $csvdata[4].' руб.';
echo $price.' руб.';
echo '</td>';
echo '<td>';
echo $price*(1-$discount).' руб.';
echo '</td>';
echo '</tr>';

echo '<tr>';
echo '<td>';
echo $mtype_text;
echo '</td>';
echo '<td>';
echo $price_mtype.' руб.';
echo '</td>';
echo '<td>';
echo $price_mtype*(1-$discount).' руб.';
echo '</td>';

echo '</tr>';

if ($springs !=0) {
	echo '<tr>';
	echo '<td>';
	echo $txt_springs;
	echo '</td>';
	echo '<td>';
	echo $price_springs.' руб.';
	echo '</td>';
	echo '<td>';
	echo $price_springs*(1-$discount).' руб.';
	echo '</td>';
	echo '</tr>';
}


if ($door=="door_std") {
	echo '<tr>';
	echo '<td>';
	echo 'Встроенная калитка (стандартная)';
	echo '</td>';
	echo '<td>';
	echo $price_door.' руб.';
	echo '</td>';
	echo '<td>';
	echo $price_door*(1-$discount).' руб.';
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
	echo '<td>';
	echo $price_door*(1-$discount).' руб.';
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
	echo '<td>';
	echo $price_windows*(1-$discount).' руб.';
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
	echo '<td>';
	echo $price_aqua*(1-$discount).' руб.';
	echo '</td>';
	echo '</tr>';
}

if ($zamok !="none") {
	$price_zamok=5618;
	echo '<tr>';
	echo '<td>';
	echo "Стоимость ригельного замка";
	echo '</td>';
	echo '<td>';
	echo $price_zamok." руб.";
	echo '</td>';
	echo '<td>';
	echo $price_zamok*(1-$discount).' руб.';
	echo '</td>';
	echo '</tr>';
}

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
		echo '<tr>';
		echo '<td>';
		echo "Коммутационный набор для подключения к системам управления электроприводами датчиков безопасности (датчика калитки и датчиков ослабления тяговых тросов)";
		echo '</td>';
		echo '<td>';
		echo $price_automatic_dop." руб.";
		echo '</td>';
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
	echo '</tr>';
}


if ($csx !="none") {
	echo '<tr>';
	echo '<td>';
	echo $price_csx_text;
	echo '</td>';
	echo '<td>';
	echo $price_csx." руб.";
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
echo $price_poddom_discount;
echo '</td>';
echo '</tr>';
echo '</table>';
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
	
	//echo "Ширина =" . $csvdata [2];
	//echo "<br>";
	//echo "Высота =" . $csvdata [3];
	echo "<br>";
	echo 'IP='; echo $ip;
}
?>