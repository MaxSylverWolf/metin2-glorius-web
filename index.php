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
	
	<div class="register"><a href="register.php"><img src="images/register.png" onMouseOver="this.src='images/register_on.png'" onmouseout="this.src='images/register.png'" alt=""></a></div>

<div class="login">
<form method="post" name="login" action="log.php">
<table>
<tr><td><input type="text" name="username" value="Login" class="input_t"></td></tr>
<tr><td><input type="password" name="password" value="Password" class="input_t"></td></tr>
<tr><td><input type="image" name="submit" src="images/login_button.png" onMouseOver="this.src='images/login_button_on.png'" onMouseOut="this.src='images/login_button.png'"></td></tr>
<tr><td><a href="zmiana.php">Zmiana hasła</a></td></tr>
</table>
</form>
</div>

<div class="stats">

<table class="status">
<tr><td><?php include('in/status.php'); ?></td></tr>
</table>
<table class="statistics">
</table>
</div>

<?PHP include('in/menu2.php'); ?>
	
	
	
	
<div class="item">
<img src="images/item_cap_top.png" alt="">
<h2>Witamy na ArcaniumMT2</h2>
<div class="content">
<div class="readmore">2011-02-21 18:42:40</div>
<p><span style="font-size: small;">Bla bla bla, informacje o servie itp tutaj wpisujecie. Jeśli chcecie mieć kolejną notkę, to kopiujecie od < div class do < / div> i macie coś w stylu newsów<br /></span></p>
</div>
<img src="images/item_cap_bottom.png" alt="">
</div>

<center><div class="footer">&copy; SylverWolf. All rights reserved.</div></center>

</div>
</body>

<!-- Site by SylverWolf -->
</html></PHP>