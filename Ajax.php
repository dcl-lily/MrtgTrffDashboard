<?php

$action=$_GET['action'];
include "include/conn.php";
switch ($action)
{
	case 'getgraph':
		include "graphs.php";
		$starttime=$_GET['starttime'];
		$endtime=$_GET['endtime'];
		$code=$_GET['code'];
		$sql="select host_name,alias,address from tbl_host  where host_name='".$code."'";
		$result=$db->get_row($sql);
		if ($result->host_name=="")
		{	
			print "<div>没有找到相关的DRL店</div>";
			exit();
		}
		if ($starttime==""){
			$starttime='-4h';
		}
		if ($endtime=="")
		{
			$endtime='-10';
		}

		$rrd=new TrafficAction();
		echo "<div></br></div>";
		echo '<table width="100%">'; 
		for ($x=1; $x<=10; $x++) {
			$jpgfile="./graphs/".$code."_".$result->address."_".$x.$starttime.".png";
			$filename="/usr/local/mrtg-2/rrd/".$code."/".$result->address."_".$x.".rrd";
			if(!is_file($filename)){
				continue;
			}
			$rrd->create_traffic_graph($jpgfile,$starttime,$endtime,$result->alias."-Interface".$x,$filename);
			echo '<tr> <td width="50%"  align="center">';
			echo '<img src="'.$jpgfile.'"  alt="'.$result->alias.'" />';
			echo '</td></tr><tr><td></br></td></tr>';
		} 
		echo '</table>';
		break;
	case '':
		break;
	default:
		print "参数错误";
}

?>