<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF8" />

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<link rel='stylesheet' type='text/css' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>

</head>

<body>
		<?php
			if( isset($_POST['username']) && is_numeric( $_POST['id'] ) )
		{
			mysql_query("select * from `rustavel_newoperator`.`user`
				where username = '". $_POST['id'] ."'
			") or die( mysql_error() );				
		}
		if( isset($_POST['password']) && is_numeric( $_POST['id'] ) )
		{
			mysql_query("select * from `rustavel_newoperator`.`user`
				where password = '". $_POST['id'] ."'
			") or die( mysql_error() );				
		}
		

		?>
<div class="jumbotron">
	<div class="container">
		<form action="main.php" method="post" class="form-signin"
			role="form">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
			<h1></h1>
			<input type="text" class="form-control" placeholder="Username" name= "username" required
				autofocus id="username" name="username"> 
				<h1></h1>
			<input
				type="password" class="form-control" placeholder="Password" name= "password" required
				id="password" name="password">
				<h1></h1>
			<button class="btn btn-lg btn-success btn-block" type="submit">შესვლა</button>
				</div>
				<div class="col-md-3"></div>
				</div>
		</form>
	</div>
	</div>
</body>
</html>
