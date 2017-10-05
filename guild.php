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
<h2>Ranking Gildii</h2>
<div class="content">
<p><span style="font-size: small;">
<div class="postui post-con">
<?php $nazwa = $_GET['nazwa'];
                require_once("config.php");
                $database = mysql_select_db("player");
		if(isset($_GET['poz']) && $_GET['poz'] != '') { 
		$poz1 = addslashes($_GET['poz'])-25; $poz = addslashes($_GET['poz']); $poz2 = addslashes($_GET['poz'])+25; 
		} 
		else { 
		$poz1 = '-25'; $poz = '0'; $poz2 = '25'; 
		}
			
$query = mysql_query("SELECT * FROM guild ORDER BY level desc, exp desc limit $poz,25");
                 echo "<table class=tb cellpadding=\"2\"  border=\"0\" width=90%>";               
                                          echo "<tr>";
										  echo "<td style=\"background-color: #9b9777; color: black;\"><b>Miejsce</b>";
        echo "<td style=\"background-color: #c5c098; color: black;\"><b>Nazwa gildi</b></td>";
        echo "<td style=\"background-color: #9b9777; color: black;\"><b>Poziom</b></td>";
                echo "<td style=\"background-color: #c5c098; color: black;\"> <b>Exp</b></td>";
                echo "<td style=\"background-color: #9b9777; color: black;\"><b>Wygrane wojny</b></td>";
                echo "<td style=\"background-color: #c5c098; color: black;\"><b>Przegrane wojny</b></td>";
				echo "<td style=\"background-color: #9b9777; color: black;\"><b>Yang</b></td>";
        echo "</tr>";
$i = $poz+1;
while($player = mysql_fetch_array($query)) {
         
                echo "<tr>";
				echo "<td style=\"background-color: #ffcc77; color: black;\">".$i."</td>";
        echo "<td style=\"background-color: #ffcc77; color: black;\">".$player["name"]."</td>";
        echo "<td style=\"background-color: #ffcc77; color: black;\">".$player["level"]."</td>";                
                echo "<td style=\"background-color: #ffcc77; color: black;\">".$player["exp"]." </td>";
                echo "<td style=\"background-color: #ffcc77; color: black;\">".$player["win"]."</td>";
                echo "<td style=\"background-color: #ffcc77; color: black;\">".$player["loss"]."</td>";
				echo "<td style=\"background-color: #ffcc77; color: black;\">".$player["gold"]."</td>";
$i++;
}
	$rs=@mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM guild "));
	$num=$rs[0];
								echo "</tr>    </table>";
	echo "<center>".($poz1>='0' ? "<a href='?poz=".$poz1."'>[<- Poprzednia strona]</a>&nbsp;&nbsp;" : "").($poz2<$num ? "<a href='?poz=".$poz2."'>[Nastepna strona ->]</a>" : "")."<form action=rank.php>Wyswietl od pozycji: <input name=poz></form> </center>";
	?></p><div class="postbody">
<p>
</div>
<img src="images/item_cap_bottom.png" alt="">
</div>

<center><div class="footer">&copy; SylverWolf. All rights reserved.</div></center>

</div>
</body>

<!-- Site by SylverWolf -->
</html></PHP>