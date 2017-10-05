<?php
function check_port($port) {
    $conn = @fsockopen("IP", $port, $errno, $errstr, 0.2);
    if ($conn) {
        fclose($conn);
        return true;
    }
}

function server_report() {
    $report = array();
    $svcs = array(
	'11002'=>'LOGOWANIE',
    '13000'=>'CH1',
	'16000'=>'CH2',
	'80000'=>'CH3',
    '280002'=>'CH4');
    foreach ($svcs as $port=>$service) {
        $report[$service] = check_port($port);
    }
    return $report;
}

$report = server_report();
?>
<div style="text-align: left; margin-left: 10px;" class="srvstatus">

<a style="color: rgb(102, 102, 102);">Login &nbsp;: <?php echo $report['LOGOWANIE'] ? "<font color='green'>Online</font>" : "<font color='red'>Offline</font>"; ?></a><br>
<a style="color: rgb(102, 102, 102);">CH1 &nbsp;: <?php echo $report['CH1'] ? "<font color='green'>Online</font>" : "<font color='red'>Offline</font>"; ?></a><br>
<a style="color: rgb(102, 102, 102);">CH2 &nbsp;: <?php echo $report['CH2'] ? "<font color='green'>Online</font>" : "<font color='red'>Offline</font>"; ?></a><br>
<a style="color: rgb(102, 102, 102);">CH3 &nbsp;: <?php echo $report['CH3'] ? "<font color='green'>Online</font>" : "<font color='red'>Offline</font>"; ?></a><br>
<a style="color: rgb(102, 102, 102);">CH4 &nbsp;: <?php echo $report['CH4'] ? "<font color='green'>Online</font>" : "<font color='red'>Offline</font>"; ?></a>
</left>

</div>

<div class="playerstats"></div>
</div>
<div class="sbui sbft"></div>
</div>

<div class="clear"></div>