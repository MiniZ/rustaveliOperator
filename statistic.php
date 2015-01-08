<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">

	<link rel="stylesheet" href="css/style.css" >
  <title>Cinema</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<link rel='stylesheet' type='text/css' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <script>
  $(function() {
    $( ".bookingDate" ).datepicker();
	$( ".bookingDate" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
  });
  </script>
</head>
<?php 	include("./includes/dbconfig.php"); ?>
<body>
	<div class="navigationButtons">
		<a href="./main.php"><button class="btn btn-lg btn-danger submit_button" >მთავარი</button></a>
        	
        <button class="btn btn-lg btn-danger submit_button" >სტატისტიკა</button>
        	
        <a href="./add.php"><button class="btn btn-lg btn-danger submit_button" >დამატება</button></a>

        <a href="./changes.php"><button class="btn btn-lg btn-danger submit_button" >ცვლილებები</button></a>

    </div>
    
	<?php
	
		$DateFrom = isset($_POST['DateFrom']) ? $_POST['DateFrom'] : date("y-m-d");
		$DateTo = isset($_POST['DateTo']) ? $_POST['DateTo'] : date("y-m-d");
		
		//რეზულტატი ბაზიდან
		$sqlQuery = mysql_query("
			SELECT 
				*,
				(select count(ID) from actions where ActyonTypeID = 1 && filmID=f.id) as Booking,
				(select count(ID) from actions where ActyonTypeID = 2 && filmID=f.id) as Information,
				(select count(ID) from actions where ActyonTypeID = 3 && filmID=f.id) as other,
				(select count(ID) from actions where ActyonTypeID = 4 && filmID=f.id) as sum
			FROM 
				films as f
			WHERE
			f.DateFrom <= '".$DateFrom."' 
				and
			f.DateTo >= '".$DateTo."'") or die(mysql_error());
			
		$maxEverBooking = mysql_fetch_array( mysql_query("select count(ID) as Count FROM actions where  ActyonTypeID = 1  

		GROUP by filmID order by Count DESC limit 1") );

		$maxEverInformation = mysql_fetch_array( mysql_query("select count(ID) as Count FROM actions where  ActyonTypeID = 2 

		GROUP by filmID order by Count DESC limit 1") );

		$maxEverOther = mysql_fetch_array( mysql_query("select count(ID) as Count FROM actions where  ActyonTypeID = 3 

		GROUP by filmID order by Count DESC limit 1") );
		

		

	?>
	<form action="" method="post">
        <label for="DateFrom" > თარიღდან: </label>
        <input type="text" name="DateFrom" class="bookingDate" id="DateFrom">
        <label for="DateTo">თარიღამდე:</label>
        <input type="text" name="DateTo" class="bookingDate" id="DateTo">
        <button class="btn-success submit_button" type="submit" name="ნახვა" >ნახვა</button>
       
    </form> 
    <table class="table table-bordered">
    	<tr class="active" height="40">
		<td >
        	ფილმის სახელი
        </td>
   
		<td>
        	
        	დაჯავშნა
        </td>
 		      
    
		<td>
        	
        	ინფორმაცია
        </td>
		
	
		<td>
        	
        	სხვადასხვა
        </td>
        <td>
        	
        	სულ
        </td>
		
	</tr>
	
	<?php while ($sqlRow = mysql_fetch_array($sqlQuery)): ?>
	<?php 
		$FullWidth = 520;
		$PixelPerPercent = $FullWidth / 100;
		$BookingPercent = ($sqlRow['Booking'] / ($maxEverBooking['Count'] / 100) ) *  $PixelPerPercent;
		$informationPercent = ($sqlRow['Information'] / ($maxEverInformation['Count'] / 100) ) *  $PixelPerPercent;
		$otherPercent = ($sqlRow['other'] / ($maxEverOther['Count'] / 100) ) *  $PixelPerPercent;


	?>

    <tr class="success" height="40">
		<td >
        	<?php echo $sqlRow['Name']; ?>
        </td>
   

 		<td>
			<?php echo $sqlRow['Booking']; ?>
        </td>       
    
		
		<td>
        	<?php echo $sqlRow['Information']; ?>
        </td>
	
		
		<td>
        	<?php echo $sqlRow['other']; ?>
        </td>

        <td>
        	<?php echo $sqlRow['sum']; ?>
        </td>
	</tr>
	<?php endwhile; ?>
	</table>

</body>
</html>
