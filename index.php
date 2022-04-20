<?php

$db = mysqli_connect('localhost', 'root', '', 'crowdfunding');

 if (isset($_POST['submit'])){
 	$reason = $_POST['reason'];
 	$raised = $_POST['raised'];
 	$required = $_POST['required'];

 	mysqli_query($db, "INSERT INTO fund (reason,raised, required) VALUES ('$reason', '$raised', '$required')");

 	header('location: index.php');

 }

 	if (isset($_GET['del_task'])){
 		$id = $_GET['del_task'];
 		mysqli_query($db, "DELETE FROM fund WHERE id=$id");
 		header('location: index.php');
 	}

 	$fund = mysqli_query($db, "SELECT *FROM fund");





?>


<!DOCTYPE html>
<html>
<head>
	<title>title</title>
	<link rel="stylesheet" type="text/css" href="style.css">	
</head>

<body>

	<div class="bgimage">
		<div class="menu">
			
			<div class="leftmenu">
				<h4> Crowd Funding Website </h4>
			</div>

			<div class="rightmenu">
				<ul>
					<a href="index.php"><li>HOME</li></a>
					<a href="form.php"><li>SIGNUP</li></a>
					<a href="login.php"><li>LOGIN</li></a>									
					<a href="about.php"><li>ABOUT US</li></a>						
					<a href="contact.php"><li>CONTACT</li></a>
					
				</ul>
			</div>

		</div>

		
			<form method ="POST" action = "index.php">
				<input type= "text" value = "Wrire fund asking Reason here!" name = "reason" class = "task_input" >

				<input type= "text" value = "Raised" name = "raised" class = "task_input1" >

				<input type= "text" value = "Required" name = "required" class = "task_input1" >
				
			
				<button type = "submit" class ="add_btn" name = "submit"> Ask Fund</button>
            </form>

            <table>
            	<thead>
            	<tr> 
            		<th> sl </th>
            		<th> Fund asking reason </th>
            		<th> Raised </th>
            		<th> Required </th>
            		<th> Delete </th>
            		<th><button type = "submit" class ="add_btn" name = "submit"> Donate</button> </th>
            	</tr>
            	</thead>

            	<tbody>

            		<?php while ($row = mysqli_fetch_array($fund)){ ?>

            			<tr>
            		<td class = "id"> <?php echo $row['id']; ?></td>
            		<td class = "reason"> <?php echo $row ['reason']; ?> </td>

            		<td class = "raised"> <?php echo $row ['raised']; ?> </td>
            		<td class = "required"> <?php echo $row ['required']; ?> </td>
            	

            		<td class = "delete">
            			<a href = "index.php?del_task=<?php echo $row['id']; ?>" > x </a>
            		</td>

            		<th><button type = "submit" class ="add_btn" name = "submit"> Donate</button> </th>
            	</tr>

            			<?php 


            		} ?>
            		
            	</tbody>

            </table>
	   

	</div>



</body>
</html>