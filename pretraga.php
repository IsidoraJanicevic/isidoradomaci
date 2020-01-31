<?php

$id = $_GET['iddrzave'];
include ("konekcija.php");


$cipele=$db->rawQuery('select * from cipele a join drzava d on a.iddrzave = d.iddrzave join fabrika fab on a.idfabrike= fab.idfabrike where d.iddrzave = '.$id);

echo(json_encode($cipele));


 ?>