<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<PHP><html>


<!-- Site by SylverWolf -->

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta name="author" content="SylverWolf">
	<link href="style.css" rel="stylesheet" type="text/css">
	<!--[if lt IE 8]>
    	<link type="text/css" href="styleie7.css" rel="stylesheet" />
	<![endif]-->
	<title><?PHP include('in/nazwa.txt'); ?></title>
</head>

<body>

<img src="images/header.png" alt="">

<div class="wrapper">

<?PHP include('in/menu.php'); ?>

<div class="wrapper2">

<div class="left">

<div class="panel">
<div class="title">Top 10 Graczy</div>
<div class="content">
<div class="content2">
<?PHP include('in/rank.php'); ?></div></div>
<img src="images/panel_cap_bottom.png" border="0" alt="">
</div>

<div class="panel">
<div class="title">Top 10 Gildii</div>
<div class="content">
<div class="content2">
<?PHP include('in/guild.php'); ?></div></div>
<img src="images/panel_cap_bottom.png" border="0" alt="">
</div>

</div>
<div class="right">

<?PHP include('in/menu2.php'); ?>
	
	
	
	
<div class="item">
<img src="images/item_cap_top.png" alt="">
<div class="content">
<p><span style="font-size: small;"><h2>Profil</h2>
<div class="content">
<form method="post" name="form" action="#">
<table>
<tr><td></td></tr>
<tr><td><p> <?php          $id = $_GET['id'];

                require_once("config.php");
                $database = mysql_select_db("player");
$query = mysql_query("SELECT * FROM player WHERE id = $id");

$i = 0;

while($player = mysql_fetch_array($query)) { ?>
<h2><img src="images/in.jpg" tppabs="01.jpg" alt="" /><span>Profil Postaci <?php echo "".$player["name"].""; ?></span></h2>
<span class="date">Profile postaci</span> </div>
<div class="postui post-con">
<p>  <?php
        echo "<b>Nazwa postaci:</b> ".$player["name"]."<Br/>";
        echo "<b>Czas gry:</b> ".$player["playtime"]." minut<Br/>"; 
echo "<b>Ilość Yang:</b> ".$player["gold"]."<Br/>";		
echo "<b>Ostatnio w grze:</b> ".$player["last_play"]."<Br/>";
echo "<b>Królestwo: </b>"; 

$query2 = mysql_query("SELECT * FROM player_index WHERE id LIKE '$player[account_id]'");
				while($player2 = mysql_fetch_array($query2)) {
		if($player2['empire'] == 1) { 
		echo "<font color=red>Shinsoo</font><Br/><BR/>"; 
		}
		elseif($player2['empire'] == 2) {
		echo "<font color=yellow>Chunjo</font><Br/><BR/>"; 
		}
		else {
		echo "<font color=blue>Jinno</font><Br/><BR/>"; 
		}
		}	?></p>
		</div>
		<div class="postui post-end"></div>
		<div class="postui post-title">
		<h2><img src="images/in.jpg" tppabs="01.jpg" alt="" /><span>Profil <?php echo "".$player["name"].""; ?> - Statystyki</span></h2>
<span class="date">Statystyki</span> </div>
<div class="postui post-con"><p>
		<?php
                echo "<b>Poziom:</b> ".$player["level"]." <Br/>";
                echo "<b>Doświadczenie:</b> ".$player["exp"]."<Br/>";
if($player['job'] == 0) {
echo "<B>Klasa:</b> Wojownik (Mężczyzna)<Br/>"; 
}
elseif($player['job'] == 4) {
echo "<b>Klasa:</b> Wojownik (Kobieta)<Br/>"; 
}
if($player['job'] == 1) {
echo "<b>Klasa:</b> Ninja (Kobieta)<Br/>"; 
}
elseif($player['job'] == 5) {
echo "<b>Klasa:</b> Ninja (Mężczyzna)<Br/>"; 
}
if($player['job'] == 2) {
echo "<b>Klasa:</b> Sura (Mężczyzna)<Br/>"; 
}
elseif($player['job'] == 6) {
echo "<b>Klasa:</b> Sura (Kobieta)<Br/>"; 
}
if($player['job'] == 3) {
echo "<b>Klasa:</b> Szaman (Kobieta)<Br/>"; 
}
elseif($player['job'] == 7) {
echo "<b>Klasa:</b> Szaman (Mężczyzna)<Br/>"; 
}
                echo "<b>Poziom konia:</b> ".$player["horse_level"]."<Br/>";
				echo "<b>Energia życiowa:</b> ".$player["ht"]."<Br/>";
				echo "<b>Inteligencja:</b> ".$player["int"]."<Br/>";
				echo "<b>Siła:</b> ".$player["st"]."<Br/>";
				echo "<b>Zręczność:</b> ".$player["dx"]."<Br/>";
				echo "<b>Punkty życia:</b> ".$player["hp"]."<Br/>";
				echo "<b>Punkty energii:</b> ".$player["mp"]."<Br/>";
?></p>
		</div>
		<div class="postui post-end"></div>
		<div class="postui post-title">
<div class="postui post-con"><p>
<?php
$i++;
}
 ?>  </p></td><td>

</table>
</form>
</div>
<img src="images/item_cap_bottom.png" alt="">
</div>


</div>

<center><div class="footer">&copy; SylverWolf. All rights reserved.</div></center>

</div>
</body>

<!-- Site by SylverWolf -->
</html></PHP>