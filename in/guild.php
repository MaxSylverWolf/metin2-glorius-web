<h4>Top 10 Gildii</h4>

</div>

<div class="sbui sb-con">
<table id="sbRanking" border="0" cellpadding="0" cellspacing="0" width="206">

  <tbody>

    <tr>

      <th class="sbrc1" scope="col">Rank</th>

      <th class="sbrc2" scope="col">Nazwa</th>

      <th class="sbrc3" scope="col">Lvl</th>

    </tr>
<tr></tr>
<?php 
                require_once("config.php");
                $database = mysql_select_db("player");
$query = mysql_query("SELECT * FROM guild ORDER BY level desc, exp desc limit 10");
$i = 1;

while($guild = mysql_fetch_array($query))

            if($guild["name"] != Admin && $guild["name"] != GameMasters && $guild["name"] != Admini) {
         
        echo "<tr><td class='sbrc1'>".$i."</td><td class='sbrc2'>".$guild["name"]."</td><td class='sbrc3'> [".$guild["level"]."]</td></tr>";             

$i++;
}
 ?>

    
  </tbody>

</table>
