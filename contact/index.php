<?php

	require_once $_SERVER['DOCUMENT_ROOT'] . '/core/init.php';

	$page = 'contact';
	$pageTitle = 'Contact ' . owner;

	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
	    $name = htmlspecialchars(trim($_POST["name"]));
	    $email = htmlspecialchars(trim($_POST["email"]));
	    $message = htmlspecialchars(trim($_POST["message"]));
	    $to = supportMail;
	    $errorMessages = array();

	    if ($name == "" OR $email == "" OR $message == "")
	    {
	       $errorMessages[] = "You must specify a value for name, email address, and message.";
	    }

	    foreach( $_POST as $value )
	    {
	        if( stripos($value,'Content-Type:') !== FALSE )
	        {
	            $errorMessages[] = "There was a problem with the information you entered."; 
	        }
	    }

	    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
	    {
	        $errorMessages[] = "You must specify a valid email address.";	        
	    }

	    if (count($errorMessages) == 0) 
	    {
		    if(mail($to, $email, $message, $name)) 
		    {
		    	header("Location: contact.php?status=thanks");
		    	exit;
		    }
		    else
		    {
		    	$errorMessages[] = "There was a problem sending the email";
		    }
		}
	    
	}

	require_once header;

	if (isset($_GET["status"]) AND $_GET["status"] == "thanks") 
	{
    	echo '<div class="alert alert-success"><p>Thanks for the email! I&rsquo;ll be in touch shortly!</p></div>';
	} 

	else { 

?>

<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4">
		<div class="alert alert-info"><h3 class="text-center">Get in touch</h3></div>
		<form action="/contact/" method="POST" role="form">
			<?php 

				if (isset($errorMessages)) 
				{				
					foreach ($errorMessages as $errorMessage) 
					{
						echo '<div class="alert alert-danger">' . $errorMessage . '</div>';
					}
				}
				else
				{
					echo '<div class="alert alert-warning"><p class="text-center">I’d love to hear from you! Complete the form to send me an email.</p></div>';
				}

			?>
			<div class="form-group">
				<label for="">Name</label>
				<input type="name" class="form-control" id="" name="name" value="<?php if(isset($name)){echo $name;}?>" placeholder="Enter your name">
			</div>
			<div class="form-group">
				<label for="">Email</label>
				<input type="email" class="form-control" id="" name="email" value="<?php if(isset($email)){echo $email;}?>" placeholder="Enter your email address">
			</div>
			<div class="form-group">
				<label for="message">Message</label>
				<textarea class="form-control" name="message" rows="3" id="comment"><?php 
				if(isset($message)){echo $message;}?></textarea>
			</div>

			<button type="submit" name="submit" class="btn btn-success">Send</button>
		</form>
		<?php } ?>
	</div>
	<div class="col-md-4"></div>
</div>
			
<!-- Start Footer -->
<?php require_once footer; ?>
<!-- End Footer -->