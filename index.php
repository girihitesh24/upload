<?php
	include('dbconfig.php');
	if(isset($_POST['submit']))
	{
		$name=$_POST['name'];
		$img=$_FILES['image']['name'];

		$insert="INSERT INTO images('name','imagename') VALUES ('$name','$img')";

		if(mysqli_query($link,$insert))
		{
			move_uploaded_file($_FILES['image'],"./picture/$img");
			echo "<script>alert('image has been uploaded')</script>";
		}
		else
		{
			echo $insert;
			echo "<script>alert('image does not uploaded')</script>";
		}
	}

?>

<html>
	<body>
		<form action="index.php" method="POST" enctype="multipart/form-data">
			<lable>Name</lable>
			<input type="text" name="name"/>
			<br>
			<br>
			<lable>select image</lable>
			<input type="file" name="image"/>
			<input type="submit" name="submit" value="upload"/>
		</form>
	</body>
</html>