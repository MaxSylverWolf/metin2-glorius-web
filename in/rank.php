<h4>Top 10 Graczy</h4>

</div>

<div class="sbui sb-con">

<table id="sbRanking" border="0" cellpadding="0" cellspacing="0" width="206">

  <tbody>

    <tr>

      <th class="sbrc1" scope="col">Rank</th>

      <th class="sbrc2" scope="col">Nick</th>

      <th class="sbrc3" scope="col">Lvl</th>

    </tr>
<tr></tr>
<?php 
require_once("config.php");
$database = mysql_select_db("player");
$query = mysql_query("SELECT * FROM player WHERE name NOT LIKE '[GM]%' AND name NOT LIKE '[GA]%'  AND name NOT LIKE '[HA]%' AND name NOT LIKE '[SGM]%' ORDER BY level desc, exp desc limit 10");
$i = 1;

while($player = mysql_fetch_array($query))

            if($player["name"] != GM) {
       
        echo "<tr><td class='sbrc1'>".$i."</td><td class='sbrc2'><a href='profil.php?id=".$player["id"]." '>".$player["name"]."</a></td><td class='sbrc3'> [".$player["level"]."]</td></tr>"; 
           
$i++;
}
 ?>


  </tbody>
</table>