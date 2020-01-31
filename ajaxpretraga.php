<!DOCTYPE html>
<?php
include ("konekcija.php");
$drzava =$db->get('drzava');
?>


<html lang="en">
<head>
<meta charset="utf-8">
<title>Pretraga Cipela</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="js/custom.js"></script>
    <script>
    
    function pronadji(){
      
      var pretraga = $("#drzava").val();
      $.ajax({url: "pretraga.php",data: "iddrzave="+pretraga, success: function(result){
        //alert(result);
        var nalepi = '<table class="table table-hover"><thead><tr><th>Model</th><th>Tip</th><th>Nota</th><th>Drzava</th><th>Fabrika</th></thead><tbody>';
        $.each(JSON.parse(result), function(i, val) {
          nalepi += '<tr>';
          nalepi += '<td>'+val.model+'</td>';
          nalepi += '<td>'+val.tip+'</td>';
          nalepi += '<td>'+val.nota+'</td>';
          nalepi += '<td>'+val.nazivdrzave+'</td>';
          nalepi += '<td>'+val.nazivfabrike+'</td>';
          nalepi += '</tr>';
          
          });
          
          nalepi+='</tbody></table>';
          //alert(nalepi);
          $('#output').html(nalepi);
      }});
    }
    
    </script>
</head>


<body style="background-color:#ECECEC;">


<?php include 'header.php';?>

<img src="pictures/cipele7.jpg" alt="pretraga" style="margin-left: 100px; width:1200px; hight:900px;">

<div class="form-group" style="margin-top:20px;">
	<label class="control-label col-sm-2" for="drzava">Drzava:</label>
		<div class="col-sm-10">
  			<select class="form-control" name="drzava" id="drzava">
    			<?php foreach($drzava as $drz): ?>
  				<option value="<?php echo $drz['iddrzave'];?>"><?php echo $drz['nazivdrzave'];?></option>
  				<?php endforeach; ?>
  			</select>
  		</div>
		<div class="col-sm-2" style="margin-top:20px;">
      		<button type="button" id="dodaj" name="dodaj" class="btn btn-primary" onclick="pronadji()">Pronađi</button>
    	</div>
</div>
    
<div id="output"></div>  



<footer class="futer">
    <p class="nav nav-pills"><a href="#" style="color: #000; margin-right: 190px; margin-top:40px;">Povratak na vrh</a></p>
</footer>


<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>