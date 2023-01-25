
<<!DOCTYPE html>
<!-- dont do this ever again, dont mix  M, V and C-->
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<form action="" method="POST">
		<label> First Name </label>
		<input type="text" name="firstName"> <br>
		<label> Last Name </label>
		<input type="text" name="lastName"> <br>
		<label> News Letter </label>
		<input type="checkbox" name="newsLetter"> Yes i want to receive news <br>
		<input type="submit" name="action>" value="Send">
	</form>
</body>
</html>
<?php
//get input from the HTTP request, data from url
//data sent through the GET method
if (isset($_GET['name']))
	echo $_GET['name'];
echo '<pre>';
echo $_GET['name'] ?? ''; //same as above

foreach ($_GET as $key => $value) {
	echo "$key => $value  <br>";
}

var_dump($_GET); //same but will look different

//get to the POST data with $_POST
//POST data is sent in the HTTP headers
echo 'POST DATA <br>';
var_dump($_POST);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	echo 'THIS WAS SENT THROUGH THE HTTP HEADERS';
}