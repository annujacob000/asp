<!doctype html>
<?php
$con=mysqli_connect("localhost","root","","sample");
?>
<html>
<head>
<meta charset="utf-8">
<title>Student</title>
</head>
<body background="digiresidency/images/slide_5.jpg">
<?php 
if(isset($_POST['update']))
{
	$id=$_POST['id'];
	echo($id);
	$sql2="select * from tbl_reg where id='$id'";
	$res1=mysqli_query($con,$sql2);
	$row=mysqli_fetch_array($res1);
	?>
	<form  action="#" name="student" method="post">
	<table border="1" background="digiresidency/images/testimonial_person2.jpg">
	<tr><th>Name:</th><td><input type="text" name="name" id="name" value="<?php echo($row['name']); ?>"></td></tr>
	<tr><th>Place:</th><td><input type="text" name="place" id="place" value="<?php echo($row['place']); ?>"></td></tr>
	<tr><th>Phone No:</th><td><input type="text" name="phone" id="phone" value="<?php echo($row['phone']); ?>"></td></tr>
	<tr><th></th><td><input type="hidden" name="uid" value="<?php echo($id);?>">
	<input type="submit" value="update" name="updates"></td></tr>
	</table>
	</form>
<?php
}
else
{?>
	<form  action="#" name="student" method="post">
	<table border="1" background="digiresidency/images/testimonial_person2.jpg">
	<tr><th>Name:</th><td><input type="text" name="name" placeholder="Name"id="name"></td></tr>
	<tr><th>Place:</th><td><input type="text" name="place" placeholder="Place"id="place"></td></tr>
	<tr><th>Phone No:</th><td><input type="text" name="phone" placeholder="Phone"id="phone"></td></tr>
	<tr><th></th><td><input type="submit" value="submit" name="submit"></td></tr>
	</table>
	</form>
<?php
}
?>
<br>
<br>
<br>

<?php 
if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$place=$_POST['place'];
	$phone=$_POST['phone'];
$sql="INSERT INTO `tbl_reg`( `name`, `place`, `phone`) VALUES ('$name','$place',$phone)";
	$res=mysqli_query($con,$sql);
}
	if(isset($_POST['Delete']))
	{
		$id=$_POST["id"];
		$sql="DELETE FROM `tbl_reg` WHERE id='$id'";
		$res=mysqli_query($con,$sql);
		
	}
	
if(isset($_POST['updates']))
{
	$name=$_POST['name'];
	$place=$_POST['place'];
	$phone=$_POST['phone'];
	$id=$_POST['uid'];
	$sql="UPDATE `tbl_reg` SET `name`='$name',`place`='$place',`phone`='$phone' WHERE id='$id'";
	$res=mysqli_query($con,$sql);
}
?>
<?php
	$sql1="Select * from tbl_reg";
	$res=mysqli_query($con,$sql1);
	$r=mysqli_num_rows($res);
	if($r)
	{
	?>
<table border="5px">
	<tr><th>ID</th><th>Name</th><th>Place</th><th>phone</th><th>Action</th></tr>
	<?php
	$sql1="Select * from tbl_reg";
	$res=mysqli_query($con,$sql1);
	while($row=mysqli_fetch_array($res))
	{
		?>
		<form action="#" method="post">
		<?php
		echo("<tr><th>".$row['id']."</th><th>".$row['name']."</th><th>".$row['place']."</th><th>".$row['phone']."</th>");
		?>
		<th><input type="hidden" name="id" value="<?php echo($row['id'])?>">
			<input type="submit" value="update" name="update"</th>
		<th><input type="submit" value="Delete" name="Delete"</th></tr>
	<?php
	}
	}
	?>
</table>
</body>
</html>
