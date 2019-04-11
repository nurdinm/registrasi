<?php

	include "conn.php";

	if(isset($_POST['submit'])){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$job = $_POST['job'];

		$query = "INSERT INTO dbo.tb_regis (name,email,job) VALUES ('$name','$email','$job');";

		$stmt = sqlsrv_query($conn, $query);

		if($stmt){
			echo 'register success';
		}else{
			echo 'register gagal';
		}

		sqlsrv_free_stmt( $stmt);  
		sqlsrv_close( $conn);  
	}

	

?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
</head>
<body>

	<h3>Register Here</h3>
	<form method="POST" action="" >
	<label for="name">Name </label>
	<input id="name" type="text" name="name" /><br><br>
	<label for="email">Email </label>
	<input id="email" type="text" name="email" /><br><br>
	<label for="job">Job </label>
	<input id="job" type="text" name="job" /><br><br>

	<button name="submit" value="submit"> Submit	</button>
	<button name="load" value="load"> Load Data	</button>

	<h3>People Who Are Registered:</h3>

	<table style="border:1px solid black;border-collapse:collapse;" border=1>
		<tr>
			<td>No </td>
			<td>Nama </td>
			<td>Email </td>
			<td>Job </td>
		</tr>

		<?php
			if(isset($_POST['load'])){
				$query = "SELECT * FROM dbo.tb_regis;";

				$stmt = sqlsrv_query($conn, $query);

				while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC)) {
				$no = 1;
			?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $row[1]; ?></td>
					<td><?php echo $row[2]; ?></td>
					<td><?php echo $row[3]; ?></td>
				</tr>	
			<?php
					$no++;
				}

				sqlsrv_free_stmt( $stmt);  
				sqlsrv_close( $conn); 
				
			}
		?>
	</table>

</body>
</html>
