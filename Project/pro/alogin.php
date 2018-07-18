<?php
session_start();
	include "database.php"; 
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
						<h3 id="heading">Admin Login Here</h3>
						<div id="center">
						<?php
						if(isset($_POST["submit"]))
						{
							$sql="SELECT * FROM admin where ANAME='{$_POST["aname"]}' and APASS='{$_POST["apass"]}'";
							$res=$db->query($sql);
							if($res->num_rows>0)
							{
								$row=$res->fetch_assoc();
								$_SESSION["AID"]=$row["AID"];
								$_SESSION["ANAME"]=$row["ANAME"];
								header("location:ahome.php");
							}
							else
							{
								echo"<p class='error'>Invaid user name</p>";
							}
						}
						?>
						<form action="alogin.php" method="post">
							<label>User Name</label>
							<input type="text" name="aname" required>
							<label>Password</label>
							<input type="password" name="apass" required>
							<button type="submit" name="submit">Login</button>
						</form>
						</div>
					</div>
						<div id="navi">
						  <?php 
						  include "sideBar.php";
						  ?>		  
						</div>
							<div id="footer"> 
								<p>Mahendra Singh Dhoni &copy;</p>
							</div>
			</div>
		</body>
</html>