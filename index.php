<?php
date_default_timezone_set('Asia/jakarta');
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://api.banghasan.com/sholat/format/json/kota");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);

$response = curl_exec($ch);
curl_close($ch);

//var_dump($response);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>shodiqtec Jadwal Sholat</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
	<script type="text/javascript" src="jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<!-- CUSTOM EXTERNAL STYLESHEET -->
	<link rel="stylesheet" href="css/main.css">	
	<style>
		body{
			background:#227788;
		}

		.our-team{
			padding: 30px 0 40px;
			background: #fff;
			text-align: center;
			overflow: hidden;
			position: relative;
		}

		.our-team .pic{
			display: inline-block;
			width: 130px;
			height: 130px;
			margin-bottom: 50px;
			/*background:#ff00ac;*/
			position: relative;
			z-index: 1;
		}

		.our-team .pic:before
		{
			content: "";
			width: 100%;
			background: #ff00ac;
			position: absolute;
			bottom: 135%;
			right: 0;
			left: 0; 
			transform: scale(3);
			transition: all 0.3s linear 0s;
		}

		.our-team:hover .pic:before
		{
			height: 100%;
		}

		.our-team .pic:after
		{
			content: "";
			width: 100%;
			height: 100%;
			border-radius: 50%;
			background: #ff00ac;
			position: absolute;
			top: 0;
			left: 0; 
			z-index: -1;
		}

		.our-team .pic img{
			width: 100%;
			height: auto;
			border-radius: 50%;
			transform: scale(1);
			transition: all 0.9s ease 0s;
		}

		.our-team:hover .pic img
		{
			box-shadow: 0 0 0 14px #ff00ac;
			transform: scale(0.7);
		}

		.our-team .team-content
		{
			margin-bottom: 30px;
		}
		
		.our-team .title{
			font-size: 22px;
			font-weight: 700;
			color:#4e5052;
			letter-spacing: 1px;
			text-transform: capitalize;
			margin-bottom: 5px;
		}

		.our-team .post{
			display: block;
			font-size: 25px;
			color:#4e5052;
			text-transform: capitalize;
		}

		.our-team .social{
			width: 100%;
			padding:0;
			margin:0;
			background: #eb1768;
			position: absolute;
			bottom: -100px;
			left:0;
			transition: all 0.5 ease 0s;
		}

		.our-team:hover .social{
			bottom:0;
		}

		.our-team .social li{
			display: inline-block;
		}

		.our-team .social li a{
			display: block;
			padding:10px;
			font-size: 17px;
			color:#fff;
			transition: all 0.3s ease 0s;
		}

		.our-team .social li a:hover{
			color:#eb1768;
			background: #f7f5ec;
			text-decoration: none;
			
		}

	</style>
        <style>
		.blink {
		  animation: blink-animation 2s steps(5, start) infinite;
		  -webkit-animation: blink-animation 2s steps(5, start) infinite;
		}
		@keyframes blink-animation {
		  to {
		    visibility: hidden;
		  }
		}
		@-webkit-keyframes blink-animation {
		  to {
		    visibility: hidden;
		  }
		}
		</style>
	<!--SCRIP JS WAKTU SHOLAT API -->
	<script type="text/javascript">
		$(document).ready(function(){
			var mintak = new XMLHttpRequest();
	                var tgl='<?php echo date("Y-m-d");?>';
	                var value=583; //aceh barat => urutan 1
	                //{ "id": "583", "nama": "KOTA PARIAMAN" }
					//mintak.open('GET', 'https://api.banghasan.com/sholat/format/json/jadwal/kota/'+value+'/tanggal/'+tgl);
					mintak.open('GET', 'https://api.banghasan.com/sholat/format/json/jadwal/kota/'+value+'/tanggal/'+tgl);

					mintak.onreadystatechange = function () {
						if (this.readyState === 4) {
							var jws1=JSON.parse(this.responseText);
							$('#tanggal').html(jws1.jadwal.data.tanggal);
							$('#terbit').html(jws1.jadwal.data.terbit);
							$('#dhuha').html(jws1.jadwal.data.dhuha);
							$('#imsak').html(jws1.jadwal.data.imsak);
							$('#maghrib').html(jws1.jadwal.data.maghrib);
							$('#isya').html(jws1.jadwal.data.isya);
							$('#subuh').html(jws1.jadwal.data.subuh);
							$('#zhuhur').html(jws1.jadwal.data.dzuhur);
							$('#ashar').html(jws1.jadwal.data.ashar);
						}
					};

					mintak.send();

	        $("#kuto").change(function(){
	            value=$(this).val();
	            if(value>0){

					mintak.open('GET', 'https://api.banghasan.com/sholat/format/json/jadwal/kota/'+583+'/tanggal/'+tgl);
					mintak.onreadystatechange = function () {
						if (this.readyState === 4) {
							var jws=JSON.parse(this.responseText);
							$('#tanggal').html(jws.jadwal.data.tanggal);
							$('#terbit').html(jws.jadwal.data.terbit);
							$('#dhuha').html(jws.jadwal.data.dhuha);
							$('#imsak').html(jws.jadwal.data.imsak);
							$('#maghrib').html(jws.jadwal.data.maghrib);
							$('#isya').html(jws.jadwal.data.isya);
							$('#subuh').html(jws.jadwal.data.subuh);
							$('#zhuhur').html(jws.jadwal.data.dzuhur);
							$('#ashar').html(jws.jadwal.data.ashar);
						}
					};

					mintak.send();
	            }
	        });
	    });
	</script>
	<!--SCRIP JS KOTA API -->
	<script type="text/javascript">
		var request = new XMLHttpRequest();

		request.open('GET', 'https://api.banghasan.com/sholat/format/json/kota');

		request.onreadystatechange = function () {
			 if (this.readyState === 4) {
			  	var hasil=JSON.parse(this.responseText);
			    $(document).ready(function(){
			    	//jumlah array in object 510
			    	//{ "id": "583", "nama": "KOTA PARIAMAN" }
			    	hasil.kota.forEach(function(obj) {
						$('#kuto').append('<option value="' + obj.id + '">' + obj.nama + '</option>');
					})
			    });
			 }
		};

		request.send();
	</script>
	<style type="text/css">
		.post{
			font-size: 40px;

		}
	</style>
<body style=" background: url('img/baground.jpg');background-repeat: no-repeat;">
	<div style=" position: relative;top: 150px;left: 0%; font-family: 'digital-7', sans-serif;">
		<main>
		<!-- DAY OF THE WEEK -->
		<div class="days">
		
			<div class="day">
				<p class="sunday">sunday</p>
			</div>

			<div class="day">
				<p class="monday">monday</p>
			</div>

			<div class="day">
				<p class="tuesday">tuesday</p>
			</div>

			<div class="day">
				<p class="wednesday">wednesday</p>
			</div>

			<div class="day">
				<p class="thursday">thursday</p>
			</div>

			<div class="day">
				<p class="friday">friday</p>
			</div>

			<div class="day">
				<p class="saturday">saturday</p>
			</div>

		</div>
		<!-- CLOCK -->
		<div class="clock">
			<!-- HOUR -->
			<div class="numbers">
				<p class="hours"></p>
				<p class="placeholder">88</p>
			</div>

			<div class="colon">
				<p>:</p>
			</div>

			<!-- MINUTE -->
			<div class="numbers">
				<p class="minutes"></p>
				<p class="placeholder">88</p>
			</div>

			<div class="colon">
				<p>:</p>
			</div>

			<!-- SECOND -->
			<div class="numbers">
				<p class="seconds"></p>
				<p class="placeholder">88</p>
			</div>
			
			<!-- AM / PM -->
			<div class="am-pm">

				<!-- AM -->
				<div>
					<p class="am">am</p>
				</div>

				<!-- PM -->
				<div>
					<p class="pm">pm</p>
				</div>
			</div>
		</div><!-- END CLOCK -->
		</main>
	</div>

	<div class="container-fluid" style=" position: relative;top: 350px;left: 0%;">
		<div class="row">
			<div class="col-md-2 col-sm-4">
				<div class="our-team">
					<div class="team-content">
						<h3 class="title" >TERBIT</h3>
						<h6 class="post" id='terbit'></h6>
					</div>
				</div>
			</div>
			<div class="col-md-2 col-sm-6">
			<div style="width: 440%; padding: 30px 0 40px; background: ;text-align: center;overflow: hidden;
			position: relative">
					<div class="team-content">
						<span class="blink" style="display: block; font-size: 23px;color:#4e5052;text-transform: capitalize; color: #7FFF00;" >“Dan apabila kamu berada di tengah-tengah mereka (sahabatmu) lalu kamu hendak mendirikan shalat bersama-sama mereka, maka hendaklah segolongan dari mereka berdiri (shalat) besertamu dan menyandang senjata” (QS. An-Nisa : 102).</span>
					</div>
				</div>
			</div>
			<div class="col-md-2 col-sm-4" style="position: relative;left: 50%;">
				<div class="our-team">
					<div class="team-content">
						<h3 class="title">IMSAK</h3>
						<span class="post" id='imsak'></span>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container-fluid" style=" position: relative;top: 360px;left: 0%;">
		<div class="row">
			<div class="col-md-2 col-sm-4">
				<div class="our-team">
					<div class="team-content">
						<h3 class="title">ZHUHUR</h3>
						<span class="post" id='zhuhur'></span>
					</div>
				</div>
			</div>
			<div class="col-md-2 col-sm-4">
				<div class="our-team">
					<div class="team-content">
						<h3 class="title">ASHAR</h3>
						<span class="post" id='ashar'></span>
					</div>
				</div>
			</div>
			<div class="col-md-2 col-sm-4">
				<div class="our-team">
					<div class="team-content">
						<h3 class="title">MAGRIB</h3>
						<span class="post" id='maghrib'></span>
					</div>
				</div>
			</div>
			<div class="col-md-2 col-sm-4">
				<div class="our-team">
					<div class="team-content">
						<h3 class="title">ISYAK'</h3>
						<span class="post" id='isya'></span>
					</div>
				</div>
			</div>
			<div class="col-md-2 col-sm-4">
				<div class="our-team">
					<div class="team-content">
						<h3 class="title">SUBUH</h3>
						<span class="post" id='subuh'></span>
					</div>
				</div>
			</div>
			<div class="col-md-2 col-sm-4">
				<div class="our-team">
					<div class="team-content">
						<h3 class="title">DHUHA</h3>
						<span class="post" id='dhuha'></span>
					</div>
				</div>
			</div>
		</div>
	</div>

	 <!--CUSTOM JAVASCRIPT STYLESHEET -->
	<script src="javascript/main.js"></script>
</body>
</html>
<script type="text/javascript">
	var data=document.GatelementById(post).value;
</script>