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
        
        	
        <a href="./statistic.php"><button class="btn btn-lg btn-danger submit_button" >სტატისტიკა</button></a>
       
        	
        <button class="btn btn-lg btn-danger submit_button" >დამატება</button>

        <a href="./changes.php"><button class="btn btn-lg btn-danger submit_button" >ცვლილებები</button></a>
       
    </div>
<?php
		if( isset( $_FILES['Image']) )
		{
			$error = false;
			
			foreach( $_POST as $value )
			{
				if( empty($value) )
				{
					$error = true;
					break;	
				}
			}
			$destinationFileName = "./uploads/". $_FILES['Image']['name'] ;
			
			if($_FILES['Image']['error'] == 0 && !file_exists($destinationFileName) && !$error)
			{
				if( move_uploaded_file( $_FILES['Image']['tmp_name'], $destinationFileName ) )
				{
					mysql_query("INSERT INTO films SET 
						
						Name = '". $_POST['Name'] ."',
						Image = '". $destinationFileName ."',
						Description = '". $_POST['Description'] ."',
						DateFrom = '". $_POST['DateFrom'] ."',
						DateTo = '". $_POST['DateTo'] ."'
						
					");
					
					echo "ფილმი წარმატებით დაემატა";
				}	
			}
			else 
			{
				echo "გთხოვთ შეავსოთ ყველა ველი";
			}	
		} 
?>
<div class="container">
    <form action="" method="post" enctype="multipart/form-data">
        <table border="1" width="600">
            <tr>
                <td>
                    <input type="text" name="Name" placeholder="ფილმის სახელი">
                </td>
                <td>
                    <textarea name="Description" placeholder="განმარტება"></textarea>
                </td>
                <td>
                    <input type="text" class="bookingDate" name="DateFrom" placeholder="თარიღიდან">
                    
                </td>
                <td>
                    <input type="text" class="bookingDate" name="DateTo" placeholder="თარიღამდე">
                </td>
                <td>
                    <input type="file" name="Image">
                </td>
                <td>
                    <input type="submit" name="Addmovie" >
                </td>
            </tr>
        </table>
    </form>
  </div>
</body>
</html>
