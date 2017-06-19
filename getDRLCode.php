<?php
header('Content-Type:text/html;charset=UTF-8');
include "include/conn.php";
$term = $_GET['term'];
if ($term == '')
{
	exit("输入DRLCode进行查询");
}
$sql="select host_name,alias,address from tbl_host  where host_name like '%".$term."%' or alias like  '%".$term."%' or address like '%".$term."%' and hostgroups = 1  limit 10";
$results=$db->get_results($sql);
//$date = array('Chinese', 'English', 'Spanish', 'Russian', 'French', 'Japanese', 'Korean', 'German');
$arr=array();
foreach ($results as $result)
{
	$arr[]=array("label"=>$result->host_name.":".$result->alias.":".$result->address,"value"=>$result->host_name);
}
echo json_encode($arr);
?>
