
<html>

	<body>
		<!-- 1. html form with file upload control -->
		<form action="upload.php" method="post" enctype="multipart/form-data">
  			Select image to upload:
  			<input type="file" name="fileToUpload" id="fileToUpload">
  			<input type="submit" value="Upload Image" name="submit">
		</form>
	</body>
</html>


<?php

//2- Read the uploaded file and move it to the target location
if (isset($_POST['submit'])) {
//Specify where the uploaded file where be put
$target_dir = "sampleupload/upload/";

//Specify the name of the uploaded file
$target_file = $target_dir . basename($_FILES['fileToUpload']['name']);

//Move uploaded file to target location
move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
}

?>