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



<?php   include("./includes/dbconfig.php"); ?>
<body>
  <div class="navigationButtons">
       <a href="./main.php"><button class="btn btn-lg btn-danger submit_button" >მთავარი</button></a>
        
          
        <a href="./statistic.php"><button class="btn btn-lg btn-danger submit_button" >სტატისტიკა</button></a>
       
          
        <a href="./add.php"><button class="btn btn-lg btn-danger submit_button" >დამატება</button></a>

        <button class="btn btn-lg btn-danger submit_button" >ცვლილებები</button>
       
    </div>
<?php
  if( isset( $_POST['Name']) )
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

        
          mysql_query("UPDATE films SET 
            DateFrom = '". $_POST['DateFrom'] ."',
            DateTo = '". $_POST['DateTo'] ."'
            WHERE Name = '". $_POST['Name'] ."'
            
          ");
              echo "ცვლილებები წარმატებით განხორციელდა";
        }



        if( isset( $_POST['newName']) )
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

        
          mysql_query("UPDATE films SET 
            Name = '". $_POST['newName'] ."'
            WHERE Name = '". $_POST['oldName'] ."'
            
          ");
              echo "ცვლილებები წარმატებით განხორციელდა";
        }


        if( isset( $_POST['desc']) )
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

        
          mysql_query("UPDATE films SET 
            Description = '". $_POST['desc'] ."'
            WHERE Name = '". $_POST['filmName'] ."'
            
          ");
              echo "ცვლილებები წარმატებით განხორციელდა";
        }




     
?>
<div class="container">
  <h1></h1>
  <h3><span class="label label-success">ფილმის ხანგრძლივობის შეცვლა</span></h3>
  <h1></h1>
    <form action="" method="post" enctype="multipart/form-data">
        <table border="1" width=450">
            <tr>
                <td>
                    <input type="text" name="Name" placeholder="ფილმის სახელი">
                </td>
                <td>
                    <input type="text" class="bookingDate" name="DateFrom" placeholder="თარიღიდან">
                </td>
                <td>
                    <input type="text" class="bookingDate" name="DateTo" placeholder="თარიღამდე">
                </td>
                
                <td>
                    <input type="submit" name="ChangeMovie" >
                </td>
            </tr>
        </table>
    </form>
    
    <h1></h1>
    <h3><span class="label label-success">ფილმის სახელის შეცვლა</span></h3>
    <h1></h1>
    <form action="" method="post" enctype="multipart/form-data">
        <table border="1" width="500">
            <tr>
              <td>
                    <input type="text" name="oldName" placeholder="ძველი ფილმის სახელი">
                </td>
                <td>
                    <input type="text" name="newName" placeholder="ახალი ფილმის სახელი">
                </td>
                
                <td>
                    <input type="submit" name="changeMovieName" >
                </td>
            </tr>
        </table>
    </form>

    <h1></h1>
    <h3><span class="label label-success">ფილმის აღწერის შეცვლა</span></h3>
    <h1></h1>
    <form action="" method="post" enctype="multipart/form-data">
        <table border="1" width="500">
            <tr>
                <td>
                    <input type="text" name="filmName" placeholder="ფილმის სახელი">
                </td>
                
                <td>
                    <textarea name="desc" placeholder="აღწერა"></textarea>
                </td>
                <td>
                    <input type="submit" name="changeDesc" >
                </td>
            </tr>
        </table>
    </form>


  </div>
</body>
</html>
