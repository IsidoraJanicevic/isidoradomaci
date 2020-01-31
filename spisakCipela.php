<!DOCTYPE html>

<?php
//include("db.php");
include ("konekcija.php");
include("cipele.php");
$order = '';

if(isset($_GET['sort'])){
	if($_GET['sort'] === 'ascend'){

		$order=' order by model asc';
	}else{
		if($_GET['sort'] === 'descend'){
		$order=' order by model desc';
		}
	}
}

$cipele=$db->rawQuery('select * from cipele a join drzava d on a.iddrzave = d.iddrzave join fabrika fab on a.idfabrike= fab.idfabrike '.$order);

 ?>

<html lang="en">
<head>
	<title>Spisak Cipela</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <link href="css/contact.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="js/custom.js"></script>
</head>

<body>

<?php include 'header.php';?>
<div style="background-color: #FFDFFC;">
<img src="pictures/cipele2.jpg" alt="cipele" style="width:1400px; margin-left:100px;">
</div>
	<div id="sort" style="text-align: center; margin-top:20px; margin-bottom:20px;">
  		<a href="spisakCipela.php">Rastuće po Modelu</a>
    	<a href="spisakCipela.php">Opadajuće po Modelu</a>
  	</div>

  	<table class="table table-bordered" >
  		<thead>
  			<tr>
				<th>Model</th>
				<th>Tip</th>
				<th>Nota</th>
				<th>Drzava</th>
				<th>Fabrika Proizvodnje</th>
				<th>Opcije</th>
  			</tr>
  		</thead>
  	<tbody>
  		<?php 
		foreach($cipele as $pom):	
		?>
			<tr>
				<td><?php echo $pom['model'];?></td>
				<td><?php echo $pom['tip'];?></td>
				<td><?php echo $pom['nota'];?></td>
				<td><?php echo $pom['nazivdrzave'];?></td>
				<td><?php echo $pom['nazivfabrike'];?></td>
				<td><a href="brisanjeCipela.php?id=<?php echo $pom['idmodela']?>"><img src="pictures/delete.png" width="20px" height="20px" style="margin-right: 20px;"/></a><a href="promenaCipela.php?id=<?php echo $pom['idmodela']?>"><img src="pictures/refresh.png" width="20px" height="20px"/></a></td>
			</tr>
	
		<?php endforeach; ?> 
  
	</tbody>
	</table>




	<footer>
    	<p class="nav nav-pills"><a href="#" style="color: #000; margin-right: 20px;">Povratak na vrh</a></p>
  	</footer>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>