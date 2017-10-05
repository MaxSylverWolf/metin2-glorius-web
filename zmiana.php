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
<p><span style="font-size: small;"><h2>Zmiana hasła</h2>
<div class="content">
<form method="post" name="form" action="#">
<table>
<tr><td></td></tr>
<tr><td><p> <center><?php
	
	if(isset($_POST['change']) && $_POST['change'] == 'Zmień') {
	
		include('config.php');
			mysql_select_db('account');
			
$user = mysql_real_escape_string($_POST['user']);
$oldpw = mysql_real_escape_string($_POST['oldpw']);
$oldpw2 = mysql_real_escape_string($_POST['oldpw2']);
$newpw = mysql_real_escape_string($_POST['newpw']);
$newpw2 = mysql_real_escape_string($_POST['newpw2']);
$lcold = mysql_real_escape_string($_POST['lcold']);
$lcnew = mysql_real_escape_string($_POST['lcnew']);

	if($oldpw == $oldpw2 && $newpw == $newpw2) {
        
	
		$change = "UPDATE account set password = PASSWORD('" . $newpw . "'), social_id = '" . $lcnew . "' where login = '" . $user . "' and password = PASSWORD('" . $oldpw . "') and social_id = '" . $lcold . "'";
			$result = mysql_query($change);
			
		if($result) {
		echo "<center><br>Zmieniłeś hasło!!<br>"; } else { echo "<center><br>Nie udało się zmienić hasła, spróbuj znowu!<br>"; }
		echo '<br>Twoje nowe hasło to:<font color="red"><strong> ', $newpw;		
	} else { echo "<center><br>Hasło nie zostało zmienione!<br>"; }
	
}
?>
</strong></font>
<br>
<br>
<center><font color="black">
	<form action="zmiana.php" method="post">
                <p style="background-image:url(images/bg.png); height:516px; width:428;  padding:15px;">
<br><br><br><br>
		Login: <br>
		<input type="text" name="user"><br><br>
		Stare hasło: <br>
		<input type="password" name="oldpw"><br><br>
		Powtórz stare hasło: <br>
		<input type="password" name="oldpw2"><br><br>
		Nowe hasło: <br>
		<input type="password" name="newpw"><br><br>
		Powtórz nowe hasło: <br>
		<input type="password" name="newpw2"><br><br>
		Stary kod usunięcia postaci: <br>
		<input type="text" name="lcold"><br><br>
		Nowy kod usunięcia postaci: <br>
		<input type="text" name="lcnew"><br><br>
	<input type="submit" name="change" value="Zmień">
	</form>
</center></p></td><td>

</table>
</form>
</div></center>
<img src="images/item_cap_bottom.png" alt="">
</div>


</div>

<center><div class="footer">&copy; SylverWolf. All rights reserved.</div></center>

</div>
</body>

<!-- Site by SylverWolf -->
</html></PHP>