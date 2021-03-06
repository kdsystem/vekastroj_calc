<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script
	src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"
	type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="style.css">
<title>Калькулятор"</title>
</head>

<body>
	<div id="parameters">
		<div class="block_a">
			<h2>Тип ворот</h2>
			<p>
				<input type="radio" name="maintype" id="clasic_maintype" value="1"
					checked="checked" onclick="clickTrend(this);" /> <label>CLASSIC</label>
			</p>
			<p>
				<input type="radio" name="maintype" id="trend_maintype" value="2"
					onclick="clickTrend(this);" /> <label>TREND</label>
			</p>

			<script>
			function clickTrend(maintype)
			{
				if (maintype.id=="trend_maintype") {
					document.getElementById("div_aqua").style ="display: none;";
					document.getElementById("aqua").checked = false;
				}
				else {document.getElementById("div_aqua").style ="display: inline-block;"
				}
			}	
		</script>

			<h2>Тип полотна</h2>
			<p>
				<input type="radio" name="poltype" id="poltype_1" value="S-гофр"
					data-value="s_gofr" checked="checked" onclick="handleClick(this);" />
				<label>S–гофр</label>
			</p>
			<p>
				<input type="radio" name="poltype" id="poltype_2" value="M-гофр"
					data-value="m_gofr" onclick="handleClick(this);" /> <label>M–гофр</label>
			</p>
			<p>
				<input type="radio" name="poltype" id="poltype_3" value="L–гофр"
					data-value="l_gofr" onclick="handleClick(this);" /> <label>L–гофр</label>
			</p>
			<p>
				<input type="radio" name="poltype" id="poltype_4" value="Микро-волна"
					data-value="wave" onclick="handleClick(this);" /> <label>Волна</label>
			</p>

			<script>
    	function handleClick(pol_type)
	    	{
	        	if (pol_type.id == "poltype_1") {
	        		document.getElementById("poltype").src = "images/s_gofr.jpg";
	        	}
	        	if (pol_type.id == "poltype_2") {
	        		document.getElementById("poltype").src = "images/m_gofr.jpg";
	        	}
	        	if (pol_type.id == "poltype_3") {
	        		document.getElementById("poltype").src = "images/l_gofr.jpg";
	        	}
	        	if (pol_type.id == "poltype_4") {
	        		document.getElementById("poltype").src = "images/wave.jpg";
	        	}
	        	//alert(pol_type.id);
	    	}
    	</script>
			<img id="poltype" src="images/s_gofr.jpg">

			<h2>Доставка / монтаж</h2>
			<p>
				<input type="checkbox" name="montazh" id="montazh" value="" /><label>Монтаж
					ворот</label>
			</p>
			<p>
				<input type="checkbox" name="dostavka" value=""
					data-value="delivery" id="delivery" onclick="Delivery(this);" /><label>Доставка</label>
			</p>
			<script>
	    	function Delivery(delivery)
	    	{
	    	if (document.getElementById("delivery").checked ) { 
	    		document.getElementById("dostavka").style = "display: inline-block;"
	    		document.getElementById("city").style = "display: inline-block;"}
	    	else {document.getElementById("dostavka").style ="display: none;" }
	    	if (document.getElementById("outofkad").checked ) { 
	    		document.getElementById("kad").style = "display: inline-block;"}
	    	else {document.getElementById("kad").style ="display: none;"}
	    	}
    	</script>

			<div id="dostavka" style="display: none;">
				<p>
					<input type="radio" name="city" id="outofkad" value="abroad"
						onclick="Delivery(this);" /> <label>За пределами КАД</label>
				</p>
				<p>
				
				
				<div id="kad" style="display: none;">
					<input type="text" id="km" name="kad" value="" maxlength="4" /> км.
				</div>
				<p>
					<input type="radio" name="city" id="city" value=""
						onclick="Delivery(this);" /> <label>По городу</label>
				</p>
			</div>
		</div>
		<div class="block_b">
			<h2>Цвет</h2>
			<input type="radio" name="vcolor" id="1" onclick="Click_color(this);"
				checked="checked" /><label>белый RAL9016</label> <br> <input
				type="radio" name="vcolor" id="2" onclick="Click_color(this);" /><label>коричневый
				RAL8014</label> <br> <input type="radio" name="vcolor" id="12"
				onclick="Click_color(this);" /><label>шоколад RAL 8017</label> <br>
			<input type="radio" name="vcolor" id="3" onclick="Click_color(this);" /><label>серебро
				RAL9006</label> <br> <input type="radio" name="vcolor" id="4"
				onclick="Click_color(this);" /><label>синий RAL5010</label> <br> <input
				type="radio" name="vcolor" id="5" onclick="Click_color(this);" /><label>винно-красный
				RAL3004</label> <br> <input type="radio" name="vcolor" id="6"
				onclick="Click_color(this);" /><label>зеленый RAL6005</label> <br> <input
				type="radio" name="vcolor" id="7" onclick="Click_color(this);" /><label>бежевый
				RAL1015</label> <br> <input type="radio" name="vcolor" id="8"
				onclick="Click_color(this);" /><label>антрацит ADS 703</label> <br>
			<input type="radio" name="vcolor" id="9" onclick="Click_color(this);" /><label>золотой
				дуб</label> <br> <input type="radio" name="vcolor" id="10"
				onclick="Click_color(this);" /><label>темный дуб</label> <br> <input
				type="radio" name="vcolor" id="11" onclick="Click_color(this);" /><label>вишня</label>
			<script>
    	function Click_color(color)
    	{
        	if (color.id == "1") {
        		document.getElementById("polcolor").src = "images/color_white.jpg";
        	}
        	if (color.id == "2") {
        		document.getElementById("polcolor").src = "images/color_brown.jpg";
        	}
        	if (color.id == "3") {
        		document.getElementById("polcolor").src = "images/color_silver.jpg";
        	}
        	if (color.id == "4") {
        		document.getElementById("polcolor").src = "images/color_blue.jpg";
        	}
        	if (color.id == "5") {
        		document.getElementById("polcolor").src = "images/color_winered.jpg";
        	}
        	if (color.id == "6") {
        		document.getElementById("polcolor").src = "images/color_green.jpg";
        	}
        	if (color.id == "7") {
        		document.getElementById("polcolor").src = "images/color_biege.jpg";
        	}
        	if (color.id == "8") {
        		document.getElementById("polcolor").src = "images/color_antracit.jpg";
        	}
        	if (color.id == "9") {
        		document.getElementById("polcolor").src = "images/color_golddub.jpg";
        	}
        	if (color.id == "10") {
        		document.getElementById("polcolor").src = "images/color_darkdub.jpg";
        	}
        	if (color.id == "11") {
        		document.getElementById("polcolor").src = "images/color_vishnya.jpg";
        	}
        	if (color.id == "12") {
        		document.getElementById("polcolor").src = "images/color_chokolate.jpg";
        	}
        	//document.getelementbyid("test").innerHTML = document.querySelector('input[name="vcolor"]:checked').id;
        	//alert(document.querySelector('input[name="vcolor"]:checked').id);
    	}
    </script>
			<img id="polcolor" src="images/color_white.jpg"> <br>
		</div>

		<div class="block_c">
			<h2>Управление</h2>
			<p>
				<input type="radio" name="upr" value="Ручное" id="manual"
					checked="checked" onclick="Automatic(this);" /><label>Ручное</label>
			</p>
			<p>
				<input type="radio" name="upr" value="Автоматическое" id="automatic"
					onclick="Automatic(this);" /><label>Автоматическое</label>
			</p>
			<div id="div_automatic" style="display: none;">
				<p>
					<input type="radio" name="automtype" id="an-motors"
						value="AN-Motors" /><label>AN-Motors</label>
				</p>
				<p>
					<input type="radio" name="automtype" id="marantec" value="Marantec" /><label>Marantec</label>
				</p>
			</div>
			<script>
			function Automatic(automatic)
			{
				if (document.getElementById("automatic").checked ) { 
					document.getElementById("div_automatic").style = "display: inline-block;"
				}
				if (document.getElementById("manual").checked ) { 
					document.getElementById("div_automatic").style = "display: none;"
				} 
			}
		</script>

			<div>
				<h2>Тип монтажа</h2>
				<img src="assets/templates/site_tpl/img/mounting.jpg" alt="" />
				<p>
					<input type="radio" name="mtype" value="1" checked="checked"
						id="std_mount" /><label>стандартный монтаж</label>
				</p>
				<p>
					<input type="radio" name="mtype" value="2" id="low_mount" /><label>низкий
						монтаж</label>
				</p>
				<p>
					<input type="radio" name="mtype" value="3" id="high_mount" /><label>высокий
						монтаж <br> <span style="font-size: 75%;"> Размер перемычки 500
							мм. Рекомендуется стандартный монтаж. </span>
					</label>
				</p>
			</div>
			<div>
				<h2>Дополнительно</h2>
				<p class="calc-other-text">
					<label>Количество окон</label><input type="text" name="okna"
						id="windows" value="0" maxlength="4" />
				</p>

				<div id="div_aqua">
					<input type="checkbox" id="aqua" /><label>Комплект для влажных
						помещений</label>
				</div>
				<p>
					<div id="div_zamok">
						<input type="checkbox" name="rigel" value="bolt" id="zamok" /><label>Замок ригельный</label>
					</div>
				</p>
				<p>
					<input type="checkbox" name="kalitka" value="wicket" id="door" onchange="Door(this);" /><label>Калитка</label>
				</p>

				<div id="kalitka" style="display: none;">
					<p>
						<input type="radio" name="kaltype" value="1" id="door_std"
							checked="checked" /> <label>стандартная</label>
					</p>
					<p>
						<input type="radio" name="kaltype" value="2" id="door_low" /> <label>с
							низким порогом</label>
					</p>
				</div>

				<script>
			function Door(door)
			{
				if (document.getElementById("door").checked ) { 
					document.getElementById("kalitka").style = "display: inline-block;";
					document.getElementById("div_zamok").style="display: none;";
				}
				else {
					document.getElementById("kalitka").style = "display: none;"
					document.getElementById("div_zamok").style= "display: inline-block;";
				}
			}
		</script>

			</div>
			<br> Ширина <br> <input type="text" size="10" name="width" id="width">
			<br> 
			<br> Высота <br> <input type="text" size="10" name="height" id="height"> 
			<br> <br> 
			<input id="start" type="submit" value="Рассчитать стоимость" onclick="javascript:GetPrice()" />

			<script type="text/javascript">
		function GetPrice(){
			var maintype="classic";
			if (document.getElementById("clasic_maintype").checked ) { maintype="classic";}
			if (document.getElementById("trend_maintype").checked ) { maintype="trend";}
			var poltype="s_gofr";
			if (document.getElementById("poltype_1").checked ) { poltype="s_gofr";}
			if (document.getElementById("poltype_2").checked ) { poltype="m_gofr";}
			if (document.getElementById("poltype_3").checked ) { poltype="l_gofr";}
			if (document.getElementById("poltype_4").checked ) { poltype="wave";}
			var montazh="none";
			if (document.getElementById("montazh").checked ) { montazh="yes";}

			var dostavka="none";
			if (document.getElementById("delivery").checked ) { 
				dostavka="yes";
				if (document.getElementById("outofkad").checked ) {
					var km=document.getElementById("km").value;
					}
				if (document.getElementById("city").checked ) {
					dostavka="city";
					} 				
			}
			var upr="none";
			if (document.getElementById("manual").checked ) { upr="manual";}
			if (document.getElementById("automatic").checked ) { 
				upr="automatic";
				var mech="none";
				if (document.getElementById("an-motors").checked ) {
					mech="an-motors"};
				if (document.getElementById("marantec").checked ) {
					mech="marantec"};
			}

			var mount_type="none";
			if (document.getElementById("std_mount").checked) {mount_type="std_mount";}
			if (document.getElementById("low_mount").checked) {mount_type="low_mount";}
			if (document.getElementById("high_mount").checked) {mount_type="high_mount";}

			//var antikor="none";
			//if (document.getElementById("antikor").checked) {antikor="yes";}
			//var reductor="none";
			//if (document.getElementById("reductor").checked) {reductor="yes";}
			var aqua="none";
			if (document.getElementById("aqua").checked) {aqua="yes";}
			var zamok="none";
			if (document.getElementById("zamok").checked) {zamok="yes";}
			var kalitka="none";
			if (document.getElementById("door").checked ) {
				if (document.getElementById("door_std").checked) {kalitka="door_std";}
				if (document.getElementById("door_low").checked) {kalitka="door_low";}
			}
						
			var windows=0;
			windows=document.getElementById("windows").value;
			var width=0;
			width=document.getElementById("width").value;
			var height=0;
			height=document.getElementById("height").value;
			var selected_color="white";
			if (document.getElementById("1").checked ) { selected_color="white";}
			if (document.getElementById("2").checked ) { selected_color="brown";}
			if (document.getElementById("3").checked ) { selected_color="silver";}
			if (document.getElementById("4").checked ) { selected_color="blue";}
			if (document.getElementById("5").checked ) { selected_color="winered";}
			if (document.getElementById("6").checked ) { selected_color="green";}
			if (document.getElementById("7").checked ) { selected_color="biege";}
			if (document.getElementById("8").checked ) { selected_color="antracit";}
			if (document.getElementById("9").checked ) { selected_color="golddub";}
			if (document.getElementById("10").checked ) { selected_color="darkdub";}
			if (document.getElementById("11").checked ) { selected_color="vishnya";}

			var csx="none";
			if (document.getElementById("podves_csx2").checked ) { csx="csx2";}
			if (document.getElementById("podves_csx3").checked ) { csx="csx3";}
			if (document.getElementById("podves_csx4").checked ) { csx="csx4";}
			if (document.getElementById("podves_csx5").checked ) { csx="csx5";}

			document.getElementById("kp").style= "display: inline-block;";
			document.getElementById("parameters").style= "display: none;";
			
			//alert(height);
			//var color=document.getElementById("height").value;
		    $.ajax({
		    	type: 'POST',
		        url: 'check_gar.php',
		        data: { maintype: maintype, poltype: poltype, width: width, height: height, selected_color: selected_color, montazh: montazh, dostavka: dostavka, km: km, upr: upr, mount_type: mount_type, zamok: zamok, windows: windows, kalitka: kalitka, aqua:aqua, csx: csx},
		        cache: false,
		        success: function(data){ $('.res').html(data); }
		    });
		};
	</script>
		</div>

		<div class="block_d">
			<h2>Тип подвеса</h2>
			<p>
				<input type="checkbox" name="csx" id="podves_csx2"
					onclick="click_csx(this);" /> <label>Телескопическое подвешение
					типа CS-2 <br>
				<span style="font-size: 75%; margin-left: 25px">(высота подвеса 500
						мм.)</span>
				</label> <br> <input type="checkbox" name="csx" id="podves_csx3"
					onclick="click_csx(this);" /> <label>Телескопическое подвешение
					типа CS-3 <br>
				<span style="font-size: 75%; margin-left: 25px">(высота подвеса 800
						мм.)</span>
				</label> <br> <input type="checkbox" name="csx" id="podves_csx4"
					onclick="click_csx(this);" /> <label>Телескопическое подвешение
					типа CS-4 <br>
				<span style="font-size: 75%; margin-left: 25px">(высота подвеса 800
						мм.)</span>
				</label> <br> <input type="checkbox" name="csx" id="podves_csx5"
					onclick="click_csx(this);" /> <label>Телескопическое подвешение
					типа CS-5 <br>
				<span style="font-size: 75%; margin-left: 25px">(высота подвеса 800
						мм.)</span>
				</label>
			</p>
			<script>
			function click_csx(csx)
			{
				//alert(csx.id);
				if (csx.id =="podves_csx2" ) {
					document.getElementById("podves_csx3").checked = false;
					document.getElementById("podves_csx4").checked = false;
					document.getElementById("podves_csx5").checked = false;
				}
				if (csx.id =="podves_csx3" ) {
					document.getElementById("podves_csx2").checked = false;
					document.getElementById("podves_csx4").checked = false;
					document.getElementById("podves_csx5").checked = false;
				}
				if (csx.id =="podves_csx4" ) {
					document.getElementById("podves_csx2").checked = false;
					document.getElementById("podves_csx3").checked = false;
					document.getElementById("podves_csx5").checked = false;
				}
				if (csx.id =="podves_csx5" ) {
					document.getElementById("podves_csx2").checked = false;
					document.getElementById("podves_csx3").checked = false;
					document.getElementById("podves_csx4").checked = false;
				}
			}	
		</script>
		</div>
	</div>
	<div id="kp" style="display: none;">
		<div class="res">
		</div>
	</div>
	<br>
</body>
</html>