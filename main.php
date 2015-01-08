<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">

	<link rel="stylesheet" href="css/style.css" >
  <title>Cinema</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<link rel='stylesheet' type='text/css' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
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
       <button class="btn btn-lg btn-danger submit_button" >მთავარი</button>
        	
        <a href="./statistic.php"><button class="btn btn-lg btn-danger submit_button"> სტატისტიკა </button></a>
        	
        <a href="./add.php"><button class="btn btn-lg btn-danger submit_button" >დამატება</button></a>

        <a href="./changes.php"><button class="btn btn-lg btn-danger submit_button" >ცვლილებები</button></a>


    </div>
	<?php
		if( isset($_POST['information']) && is_numeric( $_POST['id'] ) )
		{
			mysql_query("insert into actions SET 
				filmID = '". $_POST['id'] ."',
				ActyonTypeID = '2',
				ActionDate= NOW()
			") or die( mysql_error() );				
		}

		if( isset($_POST['booking']) && is_numeric( $_POST['id'] ) )
		{
			
				mysql_query("insert into actions SET 
					filmID = '". $_POST['id'] ."',
					ActyonTypeID = '1',
					ActionDate= NOW()
				") or die( mysql_error() );				
		}

		if( isset($_POST['other']) && is_numeric( $_POST['id'] ) )
		{
				mysql_query("insert into actions SET 
					filmID = '". $_POST['id'] ."',
					ActyonTypeID = '3',
					ActionDate= NOW()
				") or die( mysql_error());				
		
		}
		if ((isset($_POST['information']) && is_numeric( $_POST['id']) ) 
			|| (isset($_POST['booking']) && is_numeric( $_POST['id'] ))
			|| (isset($_POST['other']) && is_numeric( $_POST['id']) )) {

				mysql_query("insert into actions SET 
					filmID = '". $_POST['id'] ."',
					ActyonTypeID = '4',
					ActionDate= NOW()
				") or die( mysql_error());	

		}

		//რეზულტატი ბაზიდან
		$sqlQuery = mysql_query("
			SELECT 
				*,
				(select count(ID) from actions where ActyonTypeID = 1 && filmID=f.id) as Booking,
				(select count(ID) from actions where ActyonTypeID = 2 && filmID=f.id) as Information,
				(select count(ID) from actions where ActyonTypeID = 3 && filmID=f.id) as other
			FROM 
				films as f
			WHERE
			f.DateTo >= '".date("y-m-d")."' 
				AND
			f.DateFrom <=  '".date("y-m-d")."'
			 order by f.DateFrom desc") or die(mysql_error());

		while ($sqlRow = mysql_fetch_array($sqlQuery)):	
	?>

	<div class="filmContainer">
		<img src="<?php echo $sqlRow['Image']; ?>">  
        <div class="contentContainer">
            <div class="filmname"><?php echo $sqlRow['Name']; ?></div>  
            <div class="filmdesc"><?php echo $sqlRow['Description']; ?></div>
            <div class="infocount">
            	<label>სტატისტიკა:    </label>
            	<label class="label-success " value="დაჯავშნა">
            	<span>დაჯავშნა <?php echo $sqlRow['Booking']; ?> </span>
            	</label>
               	<label class="label-warning " value="ინფორმაცია">
                <span>ინფორმაცია <?php echo $sqlRow['Information']; ?> </span>
                </label>
                <label class="label-info " value="სხვადასხვა">
                <span>სხვადასხვა <?php echo $sqlRow['other']; ?> </span>
                </label>
            </div>
            <div class="buttons">
            <form action="" method="post">
                <input type="hidden" value="<?php echo $sqlRow['ID']; ?>" name="id">
                <input type="text" class="bookingDate" name="bookingDate" value="<?php echo date("Y-m-d"); ?>" />
                <button class="btn-success submit_button" type="submit" name="booking" >დაჯავშნა</button>
                <button class="btn-warning submit_button" type="submit" name="information" >ინფორმაცია</button>
                <button class="btn-info submit_button" type="submit" name="other" >სხვადასხვა</button>
            </form>
            </div>
        </div>
    </div>
	<?php endwhile; ?>

</body>
</html>
