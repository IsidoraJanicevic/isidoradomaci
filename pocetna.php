<!DOCTYPE html>

<?php
include ("konekcija.php");
include("cipele.php");

$drzava=$db->get('drzava');
$fabrika=$db->get('fabrika');
$poruka = '';

if(isset( $_POST['dodaj'] )){
	
	$model=$_POST['model'];
	$tip=$_POST['tip'];
	$nota=$_POST['nota'];
	$drz=$_POST['drzava'];
	$fab=$_POST['fabrika'];
	
	
	$data = Array (
				"model" => $model, 
				"tip" => $tip,
				"nota" => $nota,					
				"iddrzave" => $drz,
				"idfabrike" => $fab
		);	

		$cipele = new Cipele();
		
		$cipele->ubaciCipele($data,$db);
		
		$poruka = $cipele->getPoruka();

}

 ?>


<html lang="en">
<head>
	<title>Pretraga Cipela</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="js/custom.js"></script>
</head>

<body style="background-color: #303030;">

<?php include 'header.php';?>

<div class="col-xs-12 col-md-12 col-lg-12 about-img">
        <img src="pictures/cipele1.gif" alt="chanel" style="width: 100%; margin-bottom:60px; ">
      </div>
	
	  <h2 style="text-align:center;">Dodaj cipele</h2>

<div class="container">
	<form class="form-horizontal" method="post" action="" role="form">
  		<div class="form-group">
    		<label class="control-label col-sm-2" for="model">Model:</label>
    			<div class="col-sm-10">
      				<input type="text" class="form-control" name="model" id="model" placeholder="Unesite model">
    			</div>
  		</div>
  	<div class="form-group">
    	<label class="control-label col-sm-2" for="tip">Tip:</label>
    		<div class="col-sm-10">
      			<input type="text" class="form-control" name="tip" id="tip" placeholder="Unesite tip">
    		</div>
  	</div>
  	<div class="form-group">
    	<label class="control-label col-sm-2" for="nota">Nota:</label>
    		<div class="col-sm-10">
      			<input type="text" class="form-control" name="nota" id="nota" placeholder="Unesite notu">
    		</div>
  	</div>
  	<div class="form-group">
  		<label class="control-label col-sm-2" for="drzava">Drzava:</label>
  			<div class="col-sm-10">
  				<select class="form-control" name="drzava" id="drzava">
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
    				<?php foreach($fabrika as $fab): ?>
  					<option value="<?php echo $fab['idfabrike'];?>"><?php echo $fab['nazivfabrike'];?></option>
  					<?php endforeach; ?>
  				</select>
  			</div>
	</div>
 	<div class="form-group"> 
    	<div class="col-sm-offset-2 col-sm-10">
      		<button type="submit" id="dodaj" name="dodaj" class="btn btn-primary">Dodaj</button>
    	</div>
  	</div>
	</form>
	<?php echo $poruka?>
</div>

<footer>
    <p class="nav nav-pills"><a href="#" style="color: #000; margin-right: 190px;">Povratak na vrh</a></p>
</footer>


<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>