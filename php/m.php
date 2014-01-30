<?php 
/*

*/
header("Content-Type: text/html; charset=utf-8");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="de-CH" xml:lang="de-CH">
<head>
	<title> :: Kontakt- Atelier Aliesch :: </title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="publisher" content="Lukas Abegg" />
	<meta name="description" content="Atelier für schöne, edle Schweizer Drahtkunst.  Anna-Liisa Aliesch erschafft kreative Objekte aus Draht, in Handarbeit." />
	<meta name="keywords" content="Aliesch, Draht, farbig, Kunst, Schweiz, Atelier, Galerie, gallery, edel, bunt, schön, Wand, wall, art, style, Swiss, original" />
	<meta name="robots" content="index, follow" />
	<meta name="revisit-after" content="30 days" />
	<meta http-equiv="window-target" content="_top" />
	<link rel="stylesheet" href="../style.css" type="text/css" media="screen" />
	<script type="text/javascript" src="js/jquery-1.7.2.min.js" /></script>
	<script type="text/javascript">
		/*<![CDATA[*//*---->*/
			$(document).ready(function() {
				setHoverEffects('#button1');
				setHoverEffects('#button2');
				setHoverEffects('#button3');
				setHoverEffects('#button4');
			
				function setHoverEffects(kandidat){
					$(kandidat).hover(
						function(){			
							$(kandidat + ' .menu-pic').fadeIn(500);
						},
						function(){	
							if(!$(kandidat + ' .menu-pic').hasClass('active_link') ){
								$(kandidat+ ' .menu-pic').fadeOut(200);
							}
						}
					);
				}
			});
		/*--*//*]]>*/
	</script>
</head>
<body>

	<div id="seite">
	
	<div id="header"></div>

		<div id="navigation">
		<ul>
			<li id="button1">
				<div class="menu-pic"></div>
				<a href="index.html">About</a>
			</li>
			<li id="button2">
				<div class="menu-pic menu-pic-rechts"></div>
				<a href="ausstellungen.html">Austellungen</a>
			</li>
			<li id="button3">
				<div class="menu-pic"></div>
				<a href="galerie.php">Galerie</a>
			</li>
			<li id="button4">
				<div class="menu-pic menu-pic-rechts active_link"></div>
				<a href="kontakt.html">Kontakt</a>
			</li>
		</ul>
	</div>

	<div id="content">
		
	<?php

		$empfaenger = "info@drahtobjekte.ch";
		$betreff = "Neue Nachricht Ihrer Homepage";

		$name = $_POST['name'];
		$email = $_POST['mail'];
		$nachricht = $_POST['nachricht'];

		// Mailnachricht zusammensetzen
		$gesamtnachricht = "<p>Name: $name</p>
		<p>Adresse: $email</p>
		<p>Nachricht: <br />$nachricht</p>";
		


		mail($empfaenger, $betreff, $gesamtnachricht, "From: $name <$email>\n" . "Content-Type: text/html");

		echo "<p>Vielen Dank, Ihre Nachricht wurde erfolgreich versendet.</p>";
	?>


	</div>

	<div id="footer">&copy; 2012, Anna-Liisa Aliesch, Lukas Abegg</div>

	</div>
</body>
</html>













