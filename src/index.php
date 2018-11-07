<!DOCTYPE HTML>
<html>
	<head>
		<title>Easy-Type Passwords</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>

	<body>

		<!-- Wrapper -->
			<div id="wrapper">
				<h1>Easy-type Passwords</h1>
				<p>Secure passwords that you can actually type.</p>
				<hr />
						
				<form action="/passwords">
					Words<br><span class="smallnote">(min 4, max 30)</span><br/>
					<input type="number" name="words" value="<?php include "assets/php/return-num-of-words.php";?>" min="4" max="30">
					<br>
				<input type="submit" value="Give Me Another!">
				</form>
	
				<p>
					<input type="text" onClick="this.select();" value="<?php include"assets/php/gen.php";?>" id="passwd"  class="passwd" readonly>
					<a href="#" onclick="copy();return false;"><i class="fa fa-clone" aria-hidden="true"></i><br/>Copy</a>
				</p>
				
				<div id="snackbar">Password Copied To Clipboard</div>

				<hr />

			</div>

		<!-- Scripts -->
			<script async src=assets/js/main.js></script>
			<script>
				if ('addEventListener' in window) {
					window.addEventListener('load', function() { document.body.className = document.body.className.replace(/\bis-preload\b/, ''); });
					document.body.className += (navigator.userAgent.match(/(MSIE|rv:11\.0)/) ? ' is-ie' : '');
				}
			</script>

	</body>
</html>
