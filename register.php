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
<p><span style="font-size: small;"><h2>Rejestracja</h2>
<div class="content">
<form method="post" name="form" action="#">
<table>
<tr><td></td></tr>
<tr><td>			<?php

include ('config.php'); // Odniesienie Do pliku który ł±czy nas z DB
//jesli byl wyslany formularz przechodzimy do obsługi danych
if(isset($_POST['wyslij']))
{

    //Obrabiamy wszystkie zmienne przekazane metod± POST
    foreach ($_POST AS $klucz => $wartosc)
    {
        $wartosc= trim($wartosc);//usuwamy białe znaki
          if (get_magic_quotes_gpc()) 
              $wartosc= stripslashes($wartosc);
        $wartosc=htmlspecialchars($wartosc, ENT_QUOTES);
        $_POST[$klucz]=$wartosc;
    }

    $username=$_POST['username'];
    $password=$_POST['password'];
    $re_password=$_POST['re_password'];
    $email=$_POST['email'];
	$real_name=$_POST['real_name'];
	$social_id=$_POST['social_id'];
	$re_social_id=$_POST['re_social_id'];
	$phone1=$_POST['phone1'];
	$code2=$_POST['code2'];
	$code=$_POST['code'];
	$question1=$_POST["question1"];

	$answer1=$_POST['answer1'];
    
    $blad_txt='';
    $blad=false;

    
    

//Sprawdzamy czy użytkownik o danym usernameie nie jest juz zajęty
    $zapytanie_sprawdz_usera= "select * from account where login='$username' ";
$wynik = mysql_query($zapytanie_sprawdz_usera);
if(!$wynik)
{
echo 'Przepraszamy rejestracja w tej chwili jest nie mozliwa. "Zajęty login"
.';
exit;
}
if(mysql_num_rows($wynik)>0)
{
$sprawdz_username=1;
}

// Sprawdzamy czy adres email sie nie powtarza.
    $zapytanie_sprawdz_email= "select * from account where email ='$email' ";
$wynik_email = mysql_query($zapytanie_sprawdz_email);
if(!$wynik_email)
{
echo 'Przepraszamy rejestracja w tej chwili jest nie mozliwa. "Zajęty e-mail"
.';
exit;
}
if(mysql_num_rows($wynik_email)>0)
{
$sprawdz_email=1;
}
   
    
    //sprawdzamy czy poprawnie jest wypełnine pole ID

    if(empty($username)){
        $info_txt_nick.=' <font color="#B20000"><font size="1"> Pole musi zostać wypełnione!</font>';
        $blad=true;    
    }
    else if($sprawdz_username==1){
        $info_txt_nick.=' <font color="#B20000"><font size="1"> ID jest zajęte</font>';
        $blad=true;    
    }
    else if(strlen($username)<5){
        $info_txt_nick.='<font color="#B20000"><font size="1">ID musi zawierać minimalnie znaków to 5!</font>';
        $blad=true;
    }
    else if(strlen($username)>30){
        $info_txt_nick.=' <font color="#B20000"><font size="1"> ID może zawierać maksymalnie 30 znaków!</font>';
        $blad=true;
		}
    else if($password == $username){
    $info_txt_nick.=' <font color="#B20000"><font size="1">ID nie może być takie same jak hasło!</font>';
	    }
	
		
    else{
    $info_txt_nick.=' <font color="#207C07"><font size="1">ID jest poprawne</font>';
        }
	  
    //sprawdzamy czy poprawnie jest wypelnione pole Imię
	if(strlen($real_name)<3){
        $info_txt_realname.='<font color="#B20000"><font size="1">Imię musi zawierać minimalnie 3 znaki!</font>';
        $blad=true;
    }
	
	else if(strlen($real_name)>16){
        $info_txt_realname.=' <font color="#B20000"><font size="1"> Imię może zawierać maksymalnie 16 znaków!</font>';
        $blad=true;
    }
    else{
    $info_txt_realname.=' <font color="#207C07"><font size="1">Imię jest poprawne</font>';
    }
	
	//sprawdzamy czy poprawnie wypełnione jest pole Kod usunięcia postaci
	if(empty($social_id)){
        $info_txt_socialid.=' <font color="#B20000"><font size="1"> Pole musi zostać wypełnione!</font>';
        $blad=true;    
    }
	else if(strlen($social_id)<7){
        $info_txt_socialid.='<font color="#B20000"><font size="1"> Kod usunięcia postaci musi zwierać 7 znaków!</font>';
        $blad=true;
    }
	
	else if(strlen($social_id)>7){
        $info_txt_socialid.=' <font color="#B20000"><font size="1"> Kod usunięcia postaci może zawierać maksymalnie 7 znaków!</font>';
        $blad=true;
    }
	else if($password == $social_id){
        $info_txt_socialid.=' <font color="#B20000"><font size="1">Kod usunięcia postaci nie może być taki sam jak hasło!</font>';
    }
	else if(1234567 == $social_id){
        $info_txt_socialid.=' <font color="#B20000"><font size="1">Kod usunięcia postaci jest zbyt łatwy!</font>';
    }
	else if(abcdefg == $social_id){
        $info_txt_socialid.=' <font color="#B20000"><font size="1">Kod usunięcia postaci jest zbyt łatwy!</font>';
    }
	else if($username == $social_id){
        $info_txt_socialid.=' <font color="#B20000"><font size="1">Kod usunięcia postaci nie może być taki sam jak ID!</font>';
    }
	else if(!preg_match('|^[_a-z0-9]{0,7}$|e', $social_id)){
    $info_txt_socialid.=' <font color="#B20000"><font size="1"> Kod usunięcia postaci może zawierać tylko cyfry i litery.</font>';
    $blad=true;
        }
    else{
    $info_txt_socialid.=' <font color="#207C07"><font size="1">KUP jest poprwany</font>';
    }
	
	//sprawdzamy czy poprawnie jest wypełnione pole Powtórz kod usunięcia postaci
	if(empty($re_social_id)){
        $info_txt_resocialid.=' <font color="#B20000"><font size="1"> Pole musi zostać wypełnione!</font>';
        $blad=true;
    }
    else if($social_id != $re_social_id){
        $info_txt_resocialid.=' <font color="#B20000"><font size="1"> Kody usunięcia postaci musz± być takie same.</font>';
        $blad=true;    
    }    
	else if($password == $re_social_id){
        $info_txt_resocialid.=' <font color="#B20000"><font size="1">Kod usunięcia postaci nie może być taki sam jak hasło!</font>';
    }
	
    else{
    $info_txt_resocialid.=' <font color="#B20000"><font color="#207C07"><font size="1">Powtórzenie kodu usunięcia postaci jest poprawne</font>';
    }
	
	//sprwadzamy czy poprawnie wypełnione jest pole Telefon
	if(strlen($phone1)<0){
        $info_txt_phone1.='<font color="#B20000"><font size="1"> Telefon musi się skaładać minimalnie z 3 cyfr!</font>';
        $blad=true;
    }
	
	else if(strlen($phone1)>15){
        $info_txt_phone1.=' <font color="#B20000"><font size="1"> Telfon może zawierać maksymalnie 15 cyfr!.</font>';
        $blad=true;
    }
	else if(!preg_match('|^[0-9. ]*[0-9]{0,15}$|e', $phone1)){
        $info_txt_phone1.=' <font color="#B20000"><font size="1"> Telefon może zawierać tylko cyfry!</font>';
        $blad=true;
    }
    else{
    $info_txt_phone1.=' <font color="#207C07"><font size="1">Telefon jest poprawny</font>';
    }
	
    //sprawdzamy czy jest prawidlowe Hasło
    if(empty($password)){
        $info_txt_password.=' <font color="#B20000"><font size="1"> Pole musi zostać wypełnione!</font>';
        $blad=true;
    }
    else if(strlen($password)<=5) {
        $info_txt_password.=' <font color="#B20000"><font size="1"> Hasło musi minimalnie zawierać 6 znaków!</font>';
        $blad=true;
    }
    else if(strlen($password)>45){
        $info_txt_password.=' <font color="#B20000"><font size="1"> Hasło może składać sie z maksymalnie 45 znaków.</font>';
        $blad=true;
    }
	else if($password == 123456789){
        $info_txt_password.=' <font color="#B20000"><font size="1">Hasło jest zbyt łatwe!</font>';
    }
	else if($password == 123456){
        $info_txt_password.=' <font color="#B20000"><font size="1">Hasło jest zbyt łatwe!</font>';
    }
	else if($socialid == $password){
        $info_txt_password.=' <font color="#B20000"><font size="1">Hasło jest zbyt łatwe!</font>';
    }
	else if(!preg_match('|^[a-z0-9]{0,50}$|e', $password)){
        $info_txt_password.=' <font color="#B20000"><font size="1"> Hasło może zawierać tylko cyfry i litery.</font>';
        $blad=true;
    }
    else{
    $info_txt_password.=' <font color="#207C07"><font size="1">Hasło jest poprawne</font>';
    }
        
    //sprawdzamy czy jest prawidłowe powtórzenia hasła 
    if(empty($re_password)){
        $info_txt_re_harlo.=' <font color="#B20000"><font size="1"> Pole musi zostać wypełnione!</font>';
        $blad=true;
    }
    else if($password != $re_password){
        $info_txt_re_harlo.=' <font color="#B20000"><font size="1"> Hasła muszą być takie same.</font>';
        $blad=true;    
    }    
    else{
    $info_txt_re_harlo.=' <font color="#B20000"><font color="#207C07"><font size="1">Powtórzenie hasła jest poprawne</font>';
    }
        
    
    
    //sprawdzamy czy jest podany prawidłowy adres e-mail
    if(empty($answer1)){
        $info_txt_email.=' <font color="#B20000"><font size="1"> Pole musi zostać wypełnione!</font>';
        $blad=true;    
    }
    else if($sprawdz_email==1){
        $info_txt_email.=' <font color="#B20000"><font size="1"> Na ten adres e-mail zarejestrowane jest już jakie¶ konto!</font>';
        $blad=true;    
    }    
    else if(!preg_match('|^[_a-z0-9.-]*[a-z0-9]@[_a-z0-9.-]*[a-z0-9].[a-z]{2,3}$|e', $email)){
        $info_txt_email.=' <font color="#B20000"><font size="1"> Adres email jest nie prawidłowy. Musi zawierać praw± i lew± stronę (przykład@przykład.pl).</font>';
        $blad=true;
    }
    else{
        $info_txt_email.=' <font color="#207C07"><font size="1">Adres e-mail jest poprawny</font>';
    }
	//
	if(empty($answer1)){
        $info_txt_answer1.=' <font color="#B20000"><font size="1"> Pole musi zostać wypełnione!</font>';
        $blad=true;    
    }
	else if(strlen($answer1)<4){
        $info_txt_answer1.='<font color="#B20000"><font size="1"> Odpowiedź musi zwierać minimalnie 5 znaków!</font>';
        $blad=true;
    }
	
	else if(strlen($answer1)>15){
        $info_txt_answer1.=' <font color="#B20000"><font size="1"> Odpowiedź może zawierać maksymalnie 7 znaków!</font>';
        $blad=true;
    }
	else if($password == $answer1){
        $info_txt_answer1.=' <font color="#B20000"><font size="1">Odpowiedź nie może być taka sama jak hasło!</font>';
    }
	else if($username == $answer1){
        $info_txt_answer1.=' <font color="#B20000"><font size="1">Odpowiedź nie może być taka sama jak ID!</font>';
    }
	else if($social_id == $answer1){
        $info_txt_answer1.=' <font color="#B20000"><font size="1">Odpowiedź nie może być taka sama jak kod usunięcia postaci!</font>';
    }
    else{
    $info_txt_answer1.=' <font color="#207C07"><font size="1">Odpowiedź jest poprwana</font>';
    }


    
if(!$blad)
    {
    //poprawne dane - robmy z nimi co trzeba (zapisujemy do bazy danych itp.)
    $pokaz_form=true;

// Wysyłamy zapytanie do bazy danych    
$zapytanie_add_user = "INSERT INTO account SET login = '".$username."', password = PASSWORD('".$password."'), real_name = '".$rl_name."', email = '".$email."', social_id = '".$social_id."', phone1 = '".$phone1."', question1 = '".$question1."', answer1 = '".$answer1."' ";

// Odpowiedz
$odpowiedz = mysql_query($zapytanie_add_user);
if($odpowiedz > 0){
    echo 'Rejestracja przebiegła pomyślnie! Możesz teraz korzystać z Itemshopu, Zmiany hasła oraz możesz sie zalogować do gry!<br /><Br/>
	<table class=tb border=1><tr><td>ID: </td><td><B>'.$username.'</b></td></tr><tr><td>Hasło:</td><td> <b>'.$password.'</b></td></tr><tr><td>E-mail:</td><Td> <B>'.$email.'</b></td></tr><tr><td>Kod usunięcia postaci:</td><td> <B>'.$social_id.'</b></td></tr><tr><td>Imię:</td><Td> <b>'.$real_name.'</b></td></td><tr><td>Telefon:</td><td><B>'.$phone1.'</b></td></tr><tr><td>OdpowiedĽ:</td><td><B>'.$question1.'</b></td></tr><tr><td>Pytanie:</td><td><B>'.$answer1.'</b></td></tr></table>';
}
else{
  $pokaz_form=false;
echo 'Problem z MySQL.';
}
    
    
    }
    else
    {
    //cos jest zle – wy¶wietlamy stosowne komunikaty
  //      echo $blad_txt;
  $pokaz_form=false;
    }
}
else
{
    //wypelniamy zmienne pustymi danymi jesli formularz nie został jeszcze wysłany
    $username='';
    $password='';
    $re_password='';
    $email='';
	$real_name='';
	$social_id='';
	$re_social_id='';
	$phone1='';
	$code2='';
	$code='';
	$question1='';
	$answer1='';
}
//wyswietlamy formularz
if($pokaz_form!=true){
?>
<!-- FOLMULARZ -->
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
<table border=0 class="reje">
<tr>
<td>ID<font <font color="red">*</font></td><td><input type="text" name="username" value="<?php echo $username; ?>"></td><td><?php echo $info_txt_nick; ?></td>
</tr>
<tr>
<td>Hasło<font color="red">*</font></td>
<td><input type="password" name="password" value="<?php echo $password; ?>"></td><td>  <?php echo $info_txt_password; ?></td>
</tr>

<tr>
<td>Powtórz hasło<font color="red">*</font></td>
<td><input type="password" name="re_password" value="<?php echo $re_password; ?>"></td> <td> <?php echo $info_txt_re_harlo; ?></td>
</tr>

<tr>
<td>E-mail<font color="red">*</font></td>
<td><input type="text" name="email" value="<?php echo $email; ?>"></td>  <td><?php echo $info_txt_email; ?></td>
</tr>

<tr>
<td>Imię<font color="red">*</font></td>
<td><input type="text" name="real_name" value="<?php echo $real_name; ?>"> </td> <td><?php echo $info_txt_realname; ?>  </td>
</tr>
<tr>
<td>Kod usnięcia postaci<font color="red">*</font></td>
<td><input type="password" name="social_id" maxlength="7" value="<?php echo $social_id; ?>"> </td> <td><?php echo $info_txt_socialid; ?>  </td>
</tr>
<td>Powtórz kod usunięcia postaci<font color="red">*</font></td>
<td><input type="password" name="re_social_id" maxlength="7" value="<?php echo $social_id; ?>"> </td> <td><?php echo $info_txt_resocialid; ?>  </td>
</tr>
<td>Telefon</td>
<td><input type="text" name="phone1" value="<?php echo $phone1; ?>"> </td> <td><?php echo $info_txt_phone1; ?>  </td>
</tr>
<td>Pytanie</td>
<td> <select name="question1" background="pliki/input_2.jpg">
                        <option value="Imie_matki"> Imię matki?</option>
                        <option value="Imie_zwierzaka">Imię zwierzaka?</option>
                        <option value="Gdzie_sie_urodziles">Gdzie się urodziłe¶?</option>
                        <option value="Ile_ma_lat_twoj_zwierzak">Ile ma lat twój zwierzak?</option>
                        <option value="Twój_windows">Twój windows?</option>
                      </select></td>
</tr>
<td>Odpowiedź</td>
<td><input type="text" name="answer1" value="<?php echo $answer1; ?>" > </td> <td><?php echo $info_txt_answer1; ?>  </td>
</tr>
<script language="JavaScript"><!--
ts = <?= $ts ?>;
--></script>
<?
session_start();
$ts = time();
?>
<td></td><td><input type="submit" name="wyslij" value="Zarejestruj" class="button" readonly="" /> </td>
</tr><td>Rejestrujac sie akceptujesz nasz <strong><a href="regulamin.php" target="_blank">REGULAMIN</a></strong></td>
</table>
</form>
<!-- KONIEC FOLMULARZA -->
<?php 
}
else{
return false;
}
?>
</td><td>

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