<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"  type="text/css" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<link type="text/css" rel="stylesheet" href="assets/lightbox/featherlight.min.css">
	<link type="text/css" rel="stylesheet" href="assets/lightbox/featherlight.css">

	<script src="assets/javascripts/jquery-1.7.0.min.js"></script>
	<script src="assets/lightbox/featherlight.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="assets/lightbox/featherlight.js" type="text/javascript" charset="utf-8"></script>

    <style type="text/css">

    #dimScreen
	{
    position:fixed;
    padding:0;
    margin:0;

    top:0;
    left:0;

    width: 100%;
    height: 100%;
    background:rgba(90, 90, 90,1);
	}

	.row
	{
		padding-bottom: 20px; 
	}

	.jumbotron.vertical-center {
	  margin-bottom: 0; /* Remove the default bottom margin of .jumbotron */
	}

	.vertical-center {
	  min-height: 100%;  /* Fallback for vh unit */
	  min-height: 100vh; /* You might also want to use
	                        'height' property instead.
	                        
	                        Note that for percentage values of
	                        'height' or 'min-height' properties,
	                        the 'height' of the parent element
	                        should be specified explicitly.
	  
	                        In this case the parent of '.vertical-center'
	                        is the <body> element */

	  /* Make it a flex container */
	  display: -webkit-box;
	  display: -moz-box;
	  display: -ms-flexbox;
	  display: -webkit-flex;
	  display: flex; 
	  
	  /* Align the bootstrap's container vertically */
	    -webkit-box-align : center;
	  -webkit-align-items : center;
	       -moz-box-align : center;
	       -ms-flex-align : center;
	          align-items : center;
	  
	  /* In legacy web browsers such as Firefox 9
	     we need to specify the width of the flex container */
	  width: 100%;
	  
	  /* Also 'margin: 0 auto' doesn't have any effect on flex items in such web browsers
	     hence the bootstrap's container won't be aligned to the center anymore.
	  
	     Therefore, we should use the following declarations to get it centered again */
	         -webkit-box-pack : center;
	            -moz-box-pack : center;
	            -ms-flex-pack : center;
	  -webkit-justify-content : center;
	          justify-content : center;
	}

    </style>

    <title>Grid Wars Soundtrack Demo</title>
  </head>

  <body class="fl-page">

  	<?php include ROOT . '/assets/elements/header.php'; ?>

    <div id="dimScreen" onmousemove="showCoords(event)">
    	<div class="container vertical-center">
    		<div class="jumbotron my-auto">
    			<div class="container-fluid text-center">
    				<div class="row justify-content-md-center">		 
    					<div class="col-md-auto">
				     		<h1 class="display-4">Grid Wars Soundtrack Demo</h1>
				    	</div>
				    </div>

    				<div class="row justify-content-md-center">		 
    					<div class="col-md-auto">
				     		<button class="btn btn-dark" id="startButton" align="center" onmousemove="showCoords(event)" onclick="start(event)" > Start </button>
				    	</div>
				    </div>

					<div class="row justify-content-md-between">		    
						<div id="ice" class="col-sm-3 d-flex" onmousemove="showCoords(event)" style="display: flex; background-color: rgb(165,242,243);">
							<div class="container-fluid">
								<div class="row justify-content-md-center">	
									<div class="col-md-auto">
							     		<h2 class="display-2" style="font-size: 30px;">Ice</h2>
							    	</div>
								</div>
								<div class="row justify-content-md-center">		    
									<div class="col-md-auto">
										<input id="iceValue" type="range" class="custom-range" min="1" max="1000" value="500" onclick="turnOffMode()">
										<button class="btn btn-light btn-block" onmousemove="showCoords(event)" onclick="IceSong.toogle(event)">Toogle</button>
										<button  class="btn btn-light btn-block" onmousemove="showCoords(event)" onclick="IceSong.win(event)">Win</button>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-auto">
						  
						</div>
						<div id="neutral" class="col-sm-3 d-flex" onmousemove="showCoords(event)" style="display: flex; background-color: rgb(90,90,90);">
							<div class="container-fluid">
								<div class="row justify-content-md-center">	
									<div class="col-md-auto">
							     		<h2 class="display-2" style="font-size: 30px;">Neutral</h2>
							    	</div>
								</div>
							 	<div class="row justify-content-md-center">
							 		<div class="col-md-auto">
							 			<input id="neutralValue" type="range" class="custom-range" min="1" max="1000" value="500">
										<button class="btn btn-light btn-block" onmousemove="showCoords(event)" onclick="NeutralSong.toogle(event)"> Toogle </button>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-auto">

						</div>
						<div id="fire" class="col-sm-3 d-flex" onmousemove="showCoords(event)" style="display: flex; background-color: rgb(252,116,5);">
							<div class="container-fluid">
								<div class="row justify-content-md-center">	
									<div class="col-md-auto">
							     		<h2 class="display-2" style="font-size: 30px;">Fire</h2>
							    	</div>
								</div>
								<div class="row justify-content-md-center">
									<div class="col-md-auto">      
										<input id="fireValue" class="custom-range"  type="range" min="1" max="1000" value="500" onclick="turnOffMode()">
										<button class="btn btn-light btn-block" onmousemove="showCoords(event)" onclick="FireSong.toogle(event)"> Toogle </button>
										<button class="btn btn-light btn-block" onmousemove="showCoords(event)" onclick="FireSong.win(event)"> Win </button>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row justify-content-md-center">		 
    					<div class="col-md-auto">
				     		<div class="custom-control custom-switch">
							  <input type="checkbox" class="custom-control-input" id="customSwitches" checked onclick="changeMode();">
							  <label class="custom-control-label" for="customSwitches">Follow Mouse Movement</label>
							</div>
				    	</div>
				    </div>

				    <div class="row justify-content-md-end">		 
    					<div class="col-md-auto">
							<a href="#" data-featherlight="#fl1" class="button btn btn-dark" style="border-radius: 50%;">&#9432;</a>
				    	</div>
				    </div>
				</div>
		  	</div>
		</div>
    </div><!-- /.wrap -->

    <div class=".featherlight" id="fl1">
				<h2>Grid Wars Soundtrack Demo</h2>
				<h4>Luis Espirito Santo</h4>
				<p>
					This is a default featherlight 1lightbox.<br>
					It's flexible in height and width.<br>
					Everything that is used to display and style the box can be found in the <a href="https://github.com/noelboss/featherlight/blob/master/src/featherlight.css">featherlight.css</a> file which is pretty simple.</p>
	</div>

	<?php include ROOT . '/assets/elements/social.php'; ?>
	<?php include ROOT . '/assets/elements/footer.php'; ?>
	<?php include ROOT . '/assets/elements/scripts.php'; ?>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script>
    	var follow = true;

		var started = false;
		var audioContext;
		var Amount = {ice: 0, fire: 0, neutral: 0};

		var IceColor = {r: 165, g: 242, b: 243};
		var FireColor =  {r: 252, g: 116, b: 5};
		var NeutralColor = {r: 90, g: 90, b: 90};

		function turnOffMode(){
			document.getElementById("customSwitches").checked = false;
			follow = document.getElementById("customSwitches").checked;
		}

		function changeMode(){
			console.log(document.getElementById("customSwitches").checked);
			follow = !follow;
		}

		function init(){
			IceSong.init();
			FireSong.init();
			NeutralSong.init();
		}

		Amount.getTotal  = function() {
			return this.ice + this.fire + this.neutral;
		}

		Amount.getIceFrac = function(){
			return this.ice / this.getTotal();
		}

		Amount.getFireFrac = function(){
			return this.fire / this.getTotal();
		}

		Amount.getNeutralFrac = function(){
			return this.neutral / this.getTotal();
		}

		function start(event) {
			if(!started){
				document.getElementById("startButton").innerHTML = "Stop";
				IceSong.play();
				FireSong.play();
				NeutralSong.play();
			}
			else{
				location.reload();
			}
		}

		function showCoords(event) {
		  var x = (event.clientX - (window.innerWidth / 2) )/ window.innerWidth;

		  if (follow){
			  Amount.fire = Math.max(0,(x + 0.5));
			  Amount.ice = Math.max(0,(1-(x + 0.5)));
			  Amount.neutral = Math.max(0,NeutralSong.range.value/1000);

			  IceSong.range.value = Amount.getIceFrac() * 1000;
			  FireSong.range.value = Amount.getFireFrac() * 1000;
		  }
		  else{
		  	Amount.fire = Math.max(0,FireSong.range.value/1000);
			Amount.ice = Math.max(0,IceSong.range.value/1000);
			Amount.neutral = Math.max(0,NeutralSong.range.value/1000);
		  }

		  var r = Amount.getFireFrac()*FireColor.r + Amount.getIceFrac()*IceColor.r + Amount.getNeutralFrac()*NeutralColor.r;
		  var g = Amount.getFireFrac()*FireColor.g + Amount.getIceFrac()*IceColor.g + Amount.getNeutralFrac()*NeutralColor.g;
		  var b = Amount.getFireFrac()*FireColor.b + Amount.getIceFrac()*IceColor.b + Amount.getNeutralFrac()*NeutralColor.b;

		  document.getElementById("dimScreen").style = "background:rgb("+r+","+g+","+b+");";

		  if (FireSong.inited){
		  	FireSong.volume = Amount.getFireFrac();
		  	FireSong.changingGain.gain.value = FireSong.volume;
		  }
		  if (IceSong.inited){
		  	IceSong.volume = Amount.getIceFrac();
		  	IceSong.changingGain.gain.value = IceSong.volume;
		  }
		  if (NeutralSong.inited){
		  	NeutralSong.volume = Amount.getNeutralFrac();
		  	NeutralSong.changingGain.gain.value = NeutralSong.volume;
		  }
		}

	</script>
	<script src="neutralSong.js"></script> 
	<script src="fireSong.js"></script> 
	<script src="iceSong.js"></script> 
  </body>
</html>
