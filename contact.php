<?php
	// include('form_process.php');
	
	$msg = '';
	$msgClass = '';
	$Email_msg = '';

	if(filter_has_var(INPUT_POST, 'submit')) {
		//Get Form Data
		$name = htmlspecialchars($_POST['name']);
		$email = htmlspecialchars($_POST['email']);
		$question = htmlspecialchars($_POST['question']);

		if(!empty($email) && !empty($name) && !empty($question)) {
			if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
				//Fail
				$Email_msg = 'Invalid Email';
				$msgClass = "alert-danger";
			} else {
				//passed
				$toEmail = 'floatlikemax@gmail.com';
				$subject = 'Contact request from '.$name;
				$body = '<h4>Name</h4><p>'.$name.'</p>
						<h4>Email</h4><p>'.$email.'</p>
						<h4>Question</h4><p>'.$question.'</p>';

						//Email headers
						$headers = "MIME-Version: 1.0" ."\r\n";
						$headers .= "Content-Type:text/html;charset=UTF-8" . "\r\n";

						//Additional Headers
						$headers .= "From: " .$name. "<" . $email . ">" . "\r\n";

						if(mail($toEmail, $subject, $body, $headers)) {
							//Email Sent
							$msg = 'Your email has been sent';
							$msgClass = 'alert-success';
						} else {
							$msg = 'Your email was not sent';
							$msgClass = 'alert-danger';
						}

			}


		} else {
			$msg = 'Please fill in all fields';
			$msgClass = "alert-danger";
		}



	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Tribute</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>


<div class="row">
	<div class="col-md-2 col-sm-12">
		
		<div class="navarea">
			<a href="home.html"><img src="logo.jpg" id="logo"></a>

				<ul id="nav-list">
					<li><a href="work.html">Work</a></li>
					<li><a href="contact.php">Contact</a></li>
				</ul>
		</div>
	</div>

<div class="col-md-2 col-sm-1"></div>
<div class="col-md-6 col-sm-10 content-area content-area-work text-center ">
	<h1 class="contacttitle">Have a question about Takashi?</h1>
	<?php if($msg != '') { ?>
		<div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
	<?php } ?>

	
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	  <div class="form-group">
	    <label for="exampleInputPassword1">Name</label>
	    <input type="text" name="name" class="form-control" id="exampleInputPassword1" placeholder="Name" value="<?php echo isset($_POST['name']) ? $name : ''; ?>">
	    
	  </div>

	  <div class="form-group">
	    <label for="exampleInputEmail1">Email address</label>
	    <input type="text" name="email" class="form-control" id=""  placeholder="Enter email" value="<?php echo isset($_POST['email']) ? $email : ''; ?>">
	  <?php if($Email_msg != '') { ?>
			<div class="alert  <?php echo $msgClass; ?> err-msgs"><?php echo $Email_msg; ?></div>
		<?php } ?>

	  </div>
	  

	  <div class="form-group">
	    <label for="exampleInputEmail1">Question</label>
	    <textarea name="question" class="form-control" placeholder="What's your question?"><?php echo isset($_POST['question']) ? $question : ''; ?></textarea>
	    <span class="error"><?php //echo $question_error ?></span>
	    
	  </div>
	  
	  <button type="submit" name="submit" class="btn btn-primary submitbtn">Submit</button>
	  <span class="success"><?php //echo $success ?></span>
	</form>




</div>
<div class="col-md-2 col-sm-1"></div>


</div>

<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="script.js"></script>
</body>
</html>