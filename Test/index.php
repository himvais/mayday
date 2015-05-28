<!-- Project Mayday -->
<!-- FILE - Testing platform V0.1(Base:PHP) -->
<!-- Written by @Himvais on 25/05/2015 -->
<!-- use mayday/test to get a console where you can test out the mayday projects -->
<?php 
	
?>
<html>
	<head>
		<title>Mayday:Test</title>
		<script src="jquery-2.1.0.min.js"></script>
		<style>
			html, body, ul, li, div{
				margin: 0px;
				padding: 0px;
			}

			body{
				background-color: #2c3e50;
			}

			#container{
				width: 600px;
				position: absolute;
				left: 50%;
				margin-left: -300px;
			}

			#form{
				text-align: center;
				margin-top: 10px;
				font-size: 2em;
			}

			#in{
				width: 600px;
				height: 30px;
				color: #3c3c3c;
				padding-left: 10px;
			}

			#output{
				padding-top: 10px;
				margin-top: 20px;
				width: 600px;
				height: 600px;
				background-color: #ddd;
			}

			#output li{
				margin-top: 5px;
				margin-left: 15px;
				list-style-type: none;
			}

			.warning{
				color: #ff3333;
			}

			.system{
				color: orange;
			}

			.success{
				color:#33ff33;
			}

			.user{
				color: #3333ff;
			}

			.sub{
				color:#bbb;
			}

		</style>
	</head>
	<body>
			<div id="container">
				<h3>Mayday Console: Version: 0.1</h3>
				<div id="form">
					<input type="text" name="VAL" id="in" placeholder="Enter your text and hit enter to send." onkeypress="return play(event);" />
				</div>
				<div id="output">
						<li class="system">MAYDAY: Welcome to mayday console, let's talk.</li>
				</div>
				<p class="sub">use ':cls' to clear the terminal</p>
			</div>
			<script>
				var sys = "MAYDAY: ";
				var user = "USER :";
				function play(e) {
				    if (e.keyCode == 13) {
				        //alert("working");
				        var input = $('#in').val();
				        if(input){
				        	$('#output').append("<li class='user'>USER: "+input+"</li>");
				        	$('#in').val("");
				        	$.get("http://127.0.0.1/mayday", {TYP:"TEXT", VAL:input}).done(function(data){
				        		$('#output').append("<li class=''>MAYDAY: "+data+"</li>");
				        	});
				        }
				        
				        return false;
				 	}
				}
			</script>
	</body>
</html>