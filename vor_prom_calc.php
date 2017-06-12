<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script
	src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"
	type="text/javascript">
</script>
<link rel="stylesheet" type="text/css" href="style_prom.css">
<title>Калькулятор"</title>
</head>

<body>
<div id="parameters">
	<div id="blok1">
		<h2>Схема проведения замеров</h2>
		<div class="schema">
			<img src="images/vor_prom.jpg" alt="" />
			<div class="size size-w">
				<input type="text" name="vorw" id="width" value="4000" maxlength="4" />
			</div>
			<div class="size size-h">
				<input type="text" name="vorh" id="height" value="3000" maxlength="4" />
			</div>
		</div>
		<h2>Дополнительно</h2>
		<div id="div_dops">
			<p class="p_class">
				<div id="div_zamok">
					<input type="checkbox" name="rigel" value="bolt" id="zamok" /><label>Замок ригельный</label>
				</div>
				<br>
				<div id="div_aqua">
					<input type="checkbox" id="aqua" /><label>Комплект для влажных помещений</label>
				</div>
				<br> <input type="checkbox" name="kalitka" id="door" onchange="Door(this);" /><label>Калитка</label>
			</p>
			<div id="kalitka" style="display: none;">
				<p class="p_class">
					<input type="radio" name="kaltype" value="1" id="door_std" checked="checked" /> <label>стандартная</label>
				</p>
				<p class="p_class">
					<input type="radio" name="kaltype" value="2" id="door_low" /> <label>с низким порогом</label>
				</p>
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
		</div>

		<div class="b-springs">
			<p class="p_class">
				<select size="1" style="width:200px" id="springs">
			    	<option selected value="0">стандартные пружины до 25000 циклов</option>
			    	<option  value="1">усиленные пружины до 35000 циклов</option>
			    	<option  value="2">усиленные пружины до 50000 циклов</option>
			    	<option  value="3">усиленные пружины до 75000 циклов</option>
			    	<option  value="4">усиленные пружины до 100000 циклов</option>
			    </select>
		</div>
		<p class="p_class">
			<input type="checkbox" id="poddom" value="" /> <label>Система защиты от поддомкрачивания</label>
		</p>
	</div>

	<div id="blok2">
		<div id="div_poltype">
			<h2>Тип полотна</h2>
			<ul class="type-els">
				<li><input type="radio" name="poltype" id="poltype_1" checked="checked" onclick="handleClick(this);" /> <label>Гофр</label>
				</li>
				<li><input type="radio" name="poltype" id="poltype_4" onclick="handleClick(this);" /> <label>Микроволна</label></li>
			</ul>

			<script>
	    	function handleClick(pol_type)
		    	{
		        	if (pol_type.id == "poltype_1") {
		        		document.getElementById("poltype").src = "images/s_gofr.jpg";
		        	}
		        	if (pol_type.id == "poltype_4") {
		        		document.getElementById("poltype").src = "images/wave.jpg";
		        	}
		        	//alert(pol_type.id);
		    	}
	    	</script>
			<img id="poltype" width="50%" src="images/s_gofr.jpg">
		</div>

		<div id="div_upravlenie">
			<h2>Управление</h2>
			<p class="p_class">
				<input type="radio" name="upr" id="manual" checked="checked"
					onclick="Automatic(this);" /><label>ручное управление</label> <br>
				<input type="radio" name="upr" id="reductor"
					onclick="Automatic(this);" /><label>привод цепной редукторный</label>
				<br> <input type="radio" name="upr" id="automatic"
					onclick="Automatic(this);" /><label>электропривод</label>
			</p>
			<div id="div_automatic" style="display: none;">
				<p class="p_class">
					<input type="radio" name="automtype" id="an-motors"
						value="AN-Motors" /><label>AN-Motors</label>
				</p>
				<p class="p_class">
					<input type="radio" name="automtype" id="marantec" value="Marantec" /><label>Marantec</label>
				</p>
			</div>
			<script>
			function Automatic(automatic)
			{
				if (document.getElementById("automatic").checked ) { 
					document.getElementById("div_automatic").style = "display: inline-block;"
					document.getElementById("reductor").style = "display: inline-block;"
				}
				if (document.getElementById("manual").checked ) { 
					document.getElementById("div_automatic").style = "display: none;"
				} 
				if (document.getElementById("reductor").checked ) { 
					document.getElementById("div_automatic").style = "display: none;"
				} 
			}
		</script>
		</div>
		<div class="winqty">
			<h2>Количество окон</h2>
			<p class="p_class">
				<input type="radio" name="okna" id="windows_0" checked="checked" /> <label>0</label>
			</p>
			<p class="p_class">
				<input type="radio" name="okna" id="windows_1" /> <label>1</label>
			</p>
			<p class="p_class">
				<input type="radio" name="okna" id="windows_2" /> <label>2</label>
			</p>
			<p class="p_class">
				<input type="radio" name="okna" id="windows_3" /> <label>3</label>
			</p>
			<p class="p_class">
				<input type="radio" name="okna" id="windows_4" /> <label>4</label>
			</p>
		</div>

		<br>
		<h2>Цвет</h2>

		<input type="radio" name="vcolor" id="color_white" onclick="Click_color(this);"
			checked="checked" /><label>белый RAL9016</label> <br> <input
			type="radio" name="vcolor" id="color_brown" onclick="Click_color(this);" /><label>коричневый RAL8014</label>
		<script>
    	function Click_color(color)
    	{
        	if (color.id == "1") {
        		document.getElementById("polcolor").src = "images/color_white.jpg";
        	}
        	if (color.id == "2") {
        		document.getElementById("polcolor").src = "images/color_brown.jpg";
        	}
        	//document.getelementbyid("test").innerHTML = document.querySelector('input[name="vcolor"]:checked').id;
        	//alert(document.querySelector('input[name="vcolor"]:checked').id);
    	}
    	</script>
		<img id="polcolor" width="50%" src="images/color_white.jpg"> <br>
	</div>

	<div id="blok3">
		<div>
			<h2>Тип монтажа</h2>
			<p class="p_class">
				<select size="1" style="width:200px" id="mtype">
			    	<option selected value="mtype_1">стандартный монтаж</option>
			    	<option  value="mtype_2">низкий монтаж (барабан сзади)</option>
			    	<option  value="mtype_3">наклонный монтаж (до 45°)</option>
			    	<option  value="mtype_4">наклонный низкий монтаж (до 45°)</option>
			    	<option  value="mtype_5">наклонный высокий с верхним расположением вала (до 45°)</option>
			    	<option  value="mtype_6">наклонный высокий с нижним расположением вала (до 45°)</option>
			    	<option  value="mtype_7">высокий монтаж с верхним расположением вала</option>
			    	<option  value="mtype_8">высокий монтаж с нижним расположением вала</option>
			    	<option  value="mtype_9">вертикальный монтаж с верхним расположением вала</option>
			    	<option  value="mtype_10">вертикальный монтаж с нижним расположением вала</option>
			    </select>
			</p>			
		</div>

		<h2>Доставка / монтаж</h2>
		<p class="p_class">
			<input type="checkbox" name="montazh" id="montazh" value="" /><label>Монтаж ворот</label>
		</p>
		<p class="p_class">
			<input type="checkbox" name="dostavka" value="" data-value="delivery"
				id="delivery" onclick="Delivery(this);" /><label>Доставка</label>
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
			<p class="p_class">
				<input type="radio" name="city" id="outofkad" value="abroad"
					onclick="Delivery(this);" /> <label>За пределами КАД</label>
			</p>
			<p class="p_class">
			
			
			<div id="kad" style="display: none;">
				<input type="text" id="km" name="kad" value="" maxlength="4" /> км.
			</div>
			<p class="p_class">
				<input type="radio" name="city" id="city" value=""
					onclick="Delivery(this);" /> <label>По городу</label>
			</p>
		</div>


		<br> <br> <input id="start" type="submit" value="Рассчитать стоимость"
			onclick="javascript:GetPrice()" />

		<script type="text/javascript">
		function GetPrice(){
			var poltype=" ";
			if (document.getElementById("poltype_1").checked ) { poltype="s_gofr";}
			if (document.getElementById("poltype_4").checked ) { poltype="wave";}
			//alert(poltype);

			var mtype="";
			mtype=document.getElementById("mtype").value;
			alert(mtype);
			var csx="none";
			csx=document.getElementById("podves_csx").value;
			var springs="";
			springs=document.getElementById("springs").value;
			alert(springs);
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
			var reductor="none";
			if (document.getElementById("manual").checked ) {upr="manual"};
			if (document.getElementById("reductor").checked ) {upr="reductor"};
			if (document.getElementById("automatic").checked ) { 
				upr="automatic";
				var mech="none";
				if (document.getElementById("an-motors").checked ) {mech="an-motors"};
				if (document.getElementById("marantec").checked ) {mech="marantec"};
			}
			var aqua="none";
			if (document.getElementById("aqua").checked) {aqua="yes"};
			var poddom="none";
			if (document.getElementById("poddom").checked) {poddom="yes"};
			var zamok="none";
			if (document.getElementById("zamok").checked) {zamok="yes"};
			var kalitka="none";
			if (document.getElementById("door").checked ) {
				if (document.getElementById("door_std").checked) {kalitka="door_std"};
				if (document.getElementById("door_low").checked) {kalitka="door_low"};
			}
			var windows=0;
			if (document.getElementById("windows_0").checked) {windows=0};
			if (document.getElementById("windows_1").checked) {windows=1};
			if (document.getElementById("windows_2").checked) {windows=2};
			if (document.getElementById("windows_3").checked) {windows=3};
			if (document.getElementById("windows_4").checked) {windows=4};
			var width=document.getElementById("width").value;
			var height=document.getElementById("height").value;
			var selected_color="white";
			if (document.getElementById("color_white").checked ) { selected_color="white"};
			if (document.getElementById("color_brown").checked ) { selected_color="brown"};
			
			document.getElementById("kp").style= "display: inline-block;";
			document.getElementById("parameters").style= "display: none;";
		    $.ajax({
		    	type: 'POST',
		        url: 'check_prom.php',
		        data: {width: width, height: height, poddom: poddom, springs: springs, selected_color: selected_color, poltype: poltype, montazh: montazh, dostavka: dostavka, km: km,upr: upr, mtype: mtype, zamok: zamok, windows: windows, kalitka: kalitka, csx: csx, aqua: aqua },
		        // aqua:aqua, 
		        cache: false,
		        success: function(data){ $('.res').html(data); }
		    });
		};
	</script>
	</div>

	<div id="blok4">
		<h2>Тип подвеса</h2>
		<p class="p_class">
			<select size="1" style="width:280px" id="podves_csx">
				<option selected value="podves_cs2">Телескопическое подвешение типа CS-2</option>
			    <option  value="podves_cs3">Телескопическое подвешение типа CS-3</option>
			    <option  value="podves_cs4">Телескопическое подвешение типа CS-4</option>
			    <option  value="podves_cs5">Телескопическое подвешение типа CS-5</option>
			</select>
		
		</p>
	</div>
</div>
	<div id="kp" style="display: none;">
		<div id="res" class="res">
		</div>
		<div id="send_button">
			<input id="send" type="submit" value="Отправить" onclick="javascript:SendMail()" /> 
			<script type="text/javascript">
				function SendMail(){
					msg = document.getElementById("content").innerHTML;
					//alert(msg);
					url='mailto:lubimov@wss.spb.ru?subject=ТЕМА&body=';
					url+=encodeURIComponent(msg);
					//window.location.href = url;
					//window.open(url);
					
				}
			</script>
		</div>
	</div>
	
</body>
</html>