<?php header("Content-Type: text/html; charset=utf-8");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="de-CH" xml:lang="de-CH">
<head>
	<title>:: Galerie - Atelier Aliesch ::</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="publisher" content="Lukas Abegg" />
	<meta name="description" content="Atelier für schöne, edle Schweizer Drahtkunst.  Anna-Liisa Aliesch erschafft kreative Objekte aus Draht, in Handarbeit." />
	<meta name="keywords" content="Aliesch, Draht, farbig, Kunst, Schweiz, Atelier, Galerie, gallery, edel, bunt, schön, Wand, wall, art, style, Swiss, original" />
	<meta name="robots" content="index, follow" />
	<meta name="revisit-after" content="30 days" />
	<meta http-equiv="window-target" content="_top" />
	<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
	
	
	<script type="text/javascript" src="js/prototype.js"></script>
	<script type="text/javascript" src="js/scriptaculous.js?load=effects,builder"></script>
	<script type="text/javascript" src="js/lightbox.js"></script>
	<script type="text/javascript" src="js/jquery-1.7.2.min.js" /></script>
	<script type="text/javascript">
		/*<![CDATA[*//*---->*/
			// Um unerwünschten Namenskollisionen zu vermeiden
			jQuery.noConflict();
			
			jQuery(document).ready(function() {			
				setHoverEffects('#button1');
				setHoverEffects('#button2');
				setHoverEffects('#button3');
				setHoverEffects('#button4');
			
				function setHoverEffects(kandidat){
					if(kandidat == ""){
						alert("Problem");
					}
					jQuery(kandidat).hover(
						function(){			
							jQuery(kandidat + ' .menu-pic').fadeIn(500);
						},
						function(){	
							if(!jQuery(kandidat + ' .menu-pic').hasClass('active_link') ){
								jQuery(kandidat+ ' .menu-pic').fadeOut(200);
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
				<div class="menu-pic active_link"></div>
				<a href="galerie.php">Galerie</a>
			</li>
			<li id="button4">
				<div class="menu-pic menu-pic-rechts"></div>
				<a href="kontakt.html">Kontakt</a>
			</li>
		</ul>
	</div>

	<div id="content">
	<h1>Galerie</h1><br />
	<?php 

		$verzeichnisname = getcwd() . "/img/bilder";

		$array = scandir($verzeichnisname);
		
		foreach ($array as $datei){
			if(is_file("img/bilder/" . $datei) && $datei != "Thumbs.db"){
				
				// Strings für Thumbnailerstellung
				$speicherort = "img/thumbnails/" . $datei;
				$quelle = "img/bilder/" . $datei;
				
				// Grösse des Orginalbildes ermitteln
				$im = imagecreatefromjpeg($quelle);
				$width = imagesx($im);
				$height = imagesy($im);
				
				// Grösse des neuen Bildes berechnen
				$breite = $width / 8;
				$hoehe = $height / 8;
				
				// Thumbnail erstellen
				$im2 = imagecreatetruecolor($breite, $hoehe);
				imagecopyresized($im2, $im, 0, 0, 0, 0, $breite, $hoehe, $width, $height);
				imagejpeg($im2, $speicherort);
				
				echo "<div class=\"picture\">";
				echo "<a href='img/bilder/$datei' target='bild' rel='lightbox[drahtkunst]'>";
				echo "<img src=\"img/thumbnails/$datei\" alt=\"$datei\"/>";
				echo "</a>";		
				
				$datei = str_replace(".jpeg", "", $datei);
				$datei = str_replace(".jpg", "", $datei);
				$datei = str_replace("_", " ", $datei);
				$datei = str_replace("ae", "ä", $datei);
				$datei = str_replace("oe", "ö", $datei);
				$datei = str_replace("ue", "ü", $datei);
				$datei = str_replace("Ae", "Ä", $datei);
				$datei = str_replace("Oe", "Ö", $datei);
				$datei = str_replace("Ue", "Ü", $datei);
				//$datei = ucwords($datei);
				echo "<p class='bild-beschreibung'>$datei</p>";
				echo "</div>";
			}
		}
	?>
	</div>

	<div id="footer">&copy; 2012, Anna-Liisa Aliesch, Lukas Abegg</div>

	</div>
</body>
</html>
