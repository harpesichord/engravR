<?php

	$error = "";
	
	if (isset($_POST["engrave"]))
	{
		include 'engrave.php';
		
		$error = validate();
		if ($error == "")
		{
			move_uploaded_file($_FILES["engraveFile"]["tmp_name"], "engrave.ngc");
			engrave("/var/www/engrave.ngc", $_POST["title"], $_POST["speed"]);
		}

	}

?>

<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>EngravR Control</title>
	<script data-require="jquery@*" data-semver="2.0.3" src="https://code.jquery.com/jquery-2.0.3.min.js"></script>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.0.1-p7/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.0.1-p7/css/bootstrap-theme.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.0.1-p7/js/bootstrap.min.js"></script>
	
</head>

	<body>
        <div id="wrap">
			<div class="content">
				<div class="container">
					<h1>EngravR Control</h1>
					<div class="well">
						<form class="form-horizontal" action="" method="POST" id="engraving" enctype="multipart/form-data">
							<div class="payment-errors"><?php if ($error != "") { ?><div class=" alert alert-danger"> 
								<strong>Error!</strong>
								<?php echo $error; ?></div><?php } ?>
							</div>
						
							<div class="form-group">
								<label for="title" class="col-lg-3 control-label">Engraving Title</label>
								<div class="col-lg-9">
									<input type="text" class="form-control" name="title" id="title" placeholder="Title" required>
								</div>
							</div>
							
							<div class="form-group">
								<label for="speed" class="col-lg-3 control-label">Engraving Speed</label>
								<div class="col-lg-9">
										<input type="text" class="form-control" name="speed" id="speed" placeholder="Speed" required>
								</div>
							</div>
							
							
							<div class="fileinput fileinput-new form-group" data-provides="fileinput">
								<label for="engraveFile" class="col-lg-3 control-label">Engraving File</label>
								<div class="input-group col-lg-9">
									<div class="form-control uneditable-input span3" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
									<span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new">Select Engraving File</span><span class="fileinput-exists">Change</span><input type="file" name="engraveFile" required></span>
									<a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
								</div>
							</div>

							<br><br>
							<div class="form-group">
								<input type='submit' class="btn btn-default btn-primary" name='engrave' value='Start Engraving'>
								<div class=" alert alert-warning"><strong>Warning!</strong> Before submitting, make sure laser power is on and the laser safety is off.</div>
							</div>
							</div>
						</form>
					</div>
				</div>
			</div>
        </div>
	</body>
</html>


</html>