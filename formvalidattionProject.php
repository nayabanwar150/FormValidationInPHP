<?php

$NameError = "";
$EmailError = "";
$GenderError = "";
$WebsiteError  = "";
if(isset($_POST['submit']))
{
	if(empty($_POST['name']))
	{
		$NameError = "Name is Required";
	}
	else
	{
		$Name = Test_User_Input($_POST['name']);
		if (!preg_match("/^[A-Za-z\. ]*$/", $Name)) {
			$NameError = "Only Letters and white spaces are allowed.";
		}
	}

	if(empty($_POST['email']))
	{
		$EmailError = "Email is Required";
	}
	else
	{
		$Email = Test_User_Input($_POST['email']);
		if (!preg_match("/[A-Za-z0-9._-]{3,}@[A-Za-z0-9._-]{3,}[.]{1}[A-Za-z0-9._-]{2,}/", $Email)) {
			$EmailError = "Invalid Email Format";
		}
	}

	if(empty($_POST['gender']))
	{
		$GenderError = "Gender is Required";
	}
	else
	{
		$Gender = Test_User_Input($_POST['gender']);
	}

	if(empty($_POST['website']))
	{
		$WebsiteError = "Website is Required";
	}
	else
	{
		$Website = Test_User_Input($_POST['website']);
		if (!preg_match("/(https:|ftp:)\/\/+[A-Za-z0-9.\-_\/?\$=&\#\~`!]+\.[A-Za-z0-9.\-_\/?\$=&\#\~`!]*/", $Website)) {
			$WebsiteError = "Invalid Website Address Format";
		}
	}
}

if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['gender']) && !empty($_POST['website'])) {
	if ((preg_match("/^[A-Za-z\. ]*$/", $Name)==true) && (preg_match("/[A-Za-z0-9._-]{3,}@[A-Za-z0-9._-]{3,}[.]{1}[A-Za-z0-9._-]{2,}/", $Email)==true) && (preg_match("/(https:|ftp:)\/\/+[A-Za-z0-9.\-_\/?\$=&\#\~`!]+\.[A-Za-z0-9.\-_\/?\$=&\#\~`!]*/", $Website)==true)) {
	
			echo "<h2> Your Submit Information: </h2><br>";
			echo "Name : ".ucwords($_POST['name'])."<br>";
			echo "Email : {$_POST['email']}<br>";
			echo "Gender : {$_POST['gender']}<br>";
			echo "Website : {$_POST['website']}<br>";
			echo "Comment : {$_POST['comment']}<br>";
		}
		else
		{
			echo '<span class="Error">Please complete and correct your Form Again!</span>';
		}
}

function Test_User_Input($Data)
{
	return $Data;
}

?>

<html>
<head>
	<title>Form Validation</title>
</head>
<style type="text/css">
	input[type="text"],input[type="email"],textarea{
		border: 1px solid dashed;
		background-color: rgb(221,216,212);
		width: 600px;
		padding: 0.5em;
		font-size: 1.0em;
	}

	.Error{
		color: red;
	}
</style>
<body>
	<?php ?>
	<h2>Form Validation with PHP.</h2>
	<form action="formvalidattionProject.php" method="POST">
	<legend>* Please Fill Out the Following Fields.</legend>
	<fieldset>
	Name : <br>
	<input type="text" name="name">
	<span class="Error">* <?php echo $NameError;?> </span><br>
	E-mail : <br>
	<input type="text" name="email">
	<span class="Error">* <?php echo $EmailError;?> </span><br>
	Gender : <br>
	<input type="radio" name="gender" value="Male"> Male</input>
	<input type="radio" name="gender" value="Female"> Female </input>
	<span class="Error">* <?php echo $GenderError;?> </span><br>
	Website : <br>
	<input type="text" name="website">
	<span class="Error">* <?php echo $WebsiteError;?> </span><br>
	Comment : <br>
	<textarea name="comment" rows="5" cols="25"></textarea>
	<br>
	<br>
	<input type="submit" name="submit" value="Submit">
	</fieldset>
	</form>
</body>
</html>