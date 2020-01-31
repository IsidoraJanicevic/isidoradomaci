<!DOCTYPE html>

<?php
include ("konekcija.php");
include("cipele.php");
$id=$_GET['id'];


$cipele=$db->rawQuery('select * from cipele a join drzava d on a.iddrzave = d.iddrzave join fabrika fab on a.idfabrike= fab.idfabrike where idmodela = '.$id);;

$drzava=$db->get('drzava');
$fabrika=$db->get('fabrika');
$poruka = '';

if(isset( $_POST['dodaj'] )){
  
  $model=$_POST['model'];
  $tip=$_POST['tip'];
  $nota=$_POST['nota'];
  $drz=$_POST['drzava'];
  $fab=$_POST['fabrika'];
  
  $params = Array($model, $tip, $nota, $drz, $fab, $id);
  $db->rawQuery("UPDATE cipele SET model=?,tip=?,nota=?, iddrzave=?,idfabrike=? WHERE idmodela=?",$params);
     header("Location:spisakCipela.php");
}

 ?>

<html lang="en">
<head>
	<title>Pretraga Cipela</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="js/custom.js"></script>
</head>
<body>


	<html lang="en">
<head>
  <title>Pretraga Cipela</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <link href="css/contact.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="js/custom.js"></script>
</head>
<body style="background-color: #ECECEC;">


<?php include 'header.php';?>
<h2 style="text-align: center;">Izmeni cipele</h2>
<div class="container" style="margin-top:20px;">
	<form class="form-horizontal" method="post" action="" role="form">
  		<div class="form-group">
    		<label class="control-label col-sm-2" for="model">Model:</label>
    			<div class="col-sm-10">
      				<input type="text" class="form-control" name="model" id="model" value="<?php echo $cipele[0]['model']; ?>">
    			</div>
  		</div>
  	<div class="form-group">
    	<label class="control-label col-sm-2" for="tip">Tip:</label>
    		<div class="col-sm-10">
      			<input type="text" class="form-control" name="tip" id="vrstamodela" value="<?php echo $cipele[0]['tip']; ?>">
    		</div>
  	</div>
  	<div class="form-group">
    	<label class="control-label col-sm-2" for="nota">Nota:</label>
    		<div class="col-sm-10">
      			<input type="text" class="form-control" name="nota" id="vrstapogona" value="<?php echo $cipele[0]['nota']; ?>">
    		</div>
  	</div>
  	<div class="form-group">
  		<label class="control-label col-sm-2" for="drzava">Drzava:</label>
  			<div class="col-sm-10">
  				<select class="form-control" name="drzava" id="drzava">
            <option value="<?php echo $cipele[0]['iddrzave'];?>"><?php echo $cipele[0]['nazivdrzave'];?></option>
    				<?php foreach($drzava as $d): ?>
  					<option value="<?php echo $d['iddrzave'];?>"><?php echo $d['nazivdrzave'];?></option>
  					<?php endforeach; ?>
  				</select>
  			</div>
	</div>
 	<div class="form-group">
  		<label class="control-label col-sm-2" for="fabrika">Fabrika:</label>
  			<div class="col-sm-10">
  				<select class="form-control" name="fabrika" id="fabrika">
            <option value="<?php echo $cipele[0]['idfabrike'];?>"><?php echo $cipele[0]['nazivfabrike'];?></option>
    				<?php foreach($fabrika as $fab): ?>
  					<option value="<?php echo $fab['idfabrike'];?>"><?php echo $fab['nazivfabrike'];?></option>
  					<?php endforeach; ?>
  				</select>
  			</div>
	</div>
 	<div class="form-group"> 
    	<div class="col-sm-offset-2 col-sm-10">
      		<button type="submit" id="dodaj" name="dodaj" class="btn btn-primary">Promeni Cipele</button>
    	</div>
  	</div>
	</form>
</div>

<footer>
    <p class="nav nav-pills"><a href="#" style="color: #000; margin-right: 190px;">Povratak na vrh</a></p>
</footer>


<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>