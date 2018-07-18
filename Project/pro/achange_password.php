<?php
session_start();
include "database.php"; 

if(!isset($_SESSION["AID"]))
{
	header("location:alogin.php"); 
}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Document</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
		<body>
			<div id="container">
				<div id="header">
					<h1>E-Library Management System</h1>
				</div>
					<div id="wrapper">
						<h3 id="heading">Changing Password Wizard</h3>
						<div id="center">
						<?php
						if(isset($_POST["submit"]))
						{
							$sql="select * from admin where APASS='{$_POST["opass"]}' and AID='{$_SESSION["AID"]}'";
							$res=$db->query($sql);
							if($res->num_rows>0)
							{
								$s="update admin set APASS='{$_POST["npass"]}' where AID=".$_SESSION["AID"];
								$db->query($s);
								echo "<p class='success'>Password Updated Successfully</p>";
							}
							else
							{
								echo "<p class='error'>Invalid Password</p>";
							}
						}
						
						?>
							<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
								<label>Old Password</label>
								<input type="password" name="opass" required>
								<label>New Password</label>
								<input type="password" name="npass" required>
								<button type="submit" name="submit">Update password</button>
							</form>
						</div>
					</div>
					<div id="navi">
					  <?php 
					  include "AdminSideBar.php";
					  ?>		  
					</div>
						<div id="footer"> 
							<p>Mahendra Singh Dhoni &copy;</p>
						</div>
			</div>
		</body>
</html>