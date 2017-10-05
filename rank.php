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
<img src="images/item_cap_top.png" alt=""><h2>Ranking Graczy</h2>
<div class="content">
<p><span style="font-size: small;">
<div class="postui post-con"><?php $nazwa = $_GET['nazwa'];
                require_once("config.php");
                $database = mysql_select_db("player");
		if(isset($_GET['poz']) && $_GET['poz'] != '') { 
		$poz1 = addslashes($_GET['poz'])-25; $poz = addslashes($_GET['poz']); $poz2 = addslashes($_GET['poz'])+25; 
		} 
		else { 
		$poz1 = '-25'; $poz = '0'; $poz2 = '25'; 
		}
			
$query = mysql_query("SELECT * FROM player WHERE name NOT LIKE '[GM]%' AND name NOT LIKE '[GA]%'  AND name NOT LIKE '[HA]%' AND name NOT LIKE '[SGM]%' ORDER BY level desc, exp desc limit $poz,25");
                 echo "<table class=tb cellpadding=\"2\"  border=\"0\" width=90%>";               
                                          echo "<tr>";
										  echo "<td style=\"background-color: #9b9777; color: black;\"><b>Miejsce</b>";
        echo "<td style=\"background-color: #c5c098; color: black;\"><b>Nazwa postaci</b></td>";
        echo "<td style=\"background-color: #9b9777; color: black;\"><b>Czas</b></td>";
                echo "<td style=\"background-color: #c5c098; color: black;\"><b>Poziom</b></td>";
                echo "<td style=\"background-color: #9b9777; color: black;\"><b>Exp</b></td>";
				echo "<td style=\"background-color: #c5c098; color: black;\"><b>Klasa</b></td>";
				echo "<td style=\"background-color: #9b9777; color: black;\"><b>Imperium</b></td>";
        echo "</tr>";
$i = $poz+1;
while($player = mysql_fetch_array($query))

             if($player["id"] != 11172 && $player["id"] != 11173 AND $player["id"] != 11177) {
         

                echo "<tr>";
				echo "<td style=\"background-color: #ffcc77; color: black;\">".$i."</td>";
        echo "<td style=\"background-color: #ffcc77; color: black;\"><a href=profil.php?id=".$player['id'].">".$player["name"]."</a></td>";
        echo "<td style=\"background-color: #ffcc77; color: black;\">".$player["playtime"]." min.</td>";                
                echo "<td style=\"background-color: #ffcc77; color: black;\">".$player["level"]." </td>";
                echo "<td style=\"background-color: #ffcc77; color: black;\">".$player["exp"]."</td>";
if($player['job'] == 0) {
echo "<td style=\"background-color: #ffcc77; color: black;\"> Wojownik (M)</td>"; 
}
elseif($player['job'] == 4) {
echo "<td style=\"background-color: #ffcc77; color: black;\"> Wojownik (K)</td>"; 
}
if($player['job'] == 1) {
echo "<td style=\"background-color: #ffcc77; color: black;\"> Ninja (K)</td>"; 
}
elseif($player['job'] == 5) {
echo "<td style=\"background-color: #ffcc77; color: black;\"> Ninja (M)</td>"; 
}
if($player['job'] == 2) {
echo "<td style=\"background-color: #ffcc77; color: black;\"> Sura (M)</td>"; 
}
elseif($player['job'] == 6) {
echo "<td style=\"background-color: #ffcc77; color: black;\"> Sura (K)</td>"; 
}
if($player['job'] == 3) {
echo "<td style=\"background-color: #ffcc77; color: black;\"> Szaman (K)</td>"; 
}
elseif($player['job'] == 7) {
echo "<td style=\"background-color: #ffcc77; color: black;\"> Szaman (M)</td>"; 
}

				$query2 = mysql_query("SELECT * FROM player_index WHERE id LIKE '$player[account_id]'");
				while($player2 = mysql_fetch_array($query2))
		if($player2['empire'] == 1) { 
		echo "<td align='center' style=\"background-color: #970100; color: black;\"></td>"; 
		}
		elseif($player2['empire'] == 2) {
		echo "<td align='center' style=\"background-color: #dc9e27; color: black;\"></td>"; 
		}
		else {
		echo "<td align='center' style=\"background-color: #151f6e; color: black;\"></td>"; 
		}
$i++;
}
	$rs=@mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM player "));
	$num=$rs[0];
								echo "</tr>    </table>";
	echo "<center>".($poz1>='0' ? "<a href='?poz=".$poz1."'>[<- Poprzednia strona]</a>&nbsp;&nbsp;" : "").($poz2<$num ? "<a href='?poz=".$poz2."'>[Nastepna strona ->]</a>" : "")."<form action=rank.php>Wyswietl od pozycji: <input name=poz></form> </center>";
	?></p>
</div>
<img src="images/item_cap_bottom.png" alt="">
</div>

<center><div class="footer">&copy; SylverWolf. All rights reserved.</div></center>

</div>
</body>

<!-- Site by SylverWolf -->
</html></PHP>