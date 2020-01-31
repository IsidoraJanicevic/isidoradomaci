<?php
include ("konekcija.php");

$id=$_GET['id'];
$db->where('idmodela',$id);
$db->delete('cipele');
header("Location:spisakCipela.php");
 ?>