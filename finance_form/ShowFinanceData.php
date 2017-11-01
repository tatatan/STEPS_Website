<?php
	session_start();
?>
<!DOCTYPE = html>
<html>
	<head>
		<meta charset="UTF-8">
		<title> STEPS : Show Finance Request  </title>
	</head>
	<body>
		<script>
			function showDetail(id){
				document.location.href = 'ShowFinanceDetail.php?id='+id;

			}
		</script>
		<?php 
			//รับSessionฝ่ายจาก login 
			//if ($_SESSION['team'] == 5){
				$servername = "localhost";
				$username = "root";
				$password = "";
				$db = "mydb";


				$conn = new mysqli($servername, $username, $password, $db);

				if ($conn->connect_error) {
			    	die("Connection failed: " . $conn->connect_error);
				} 

				$show_info = "SELECT * FROM financerequests";
				$result = $conn->query($show_info);

				if ($result->num_rows > 0) {
				    echo "<table><tr><th>No.</th><th>โครงการ</th><th>ฝ่าย</th><th>ผู้เสนอ</th><th>การอนุมัติ</th><th>สถานะ</th><th>รายละเอียดเพิ่มเติม</th></tr>";
				    while($row = $result->fetch_assoc()) {
				        echo "<tr><td>" . $row["FinanceRequestID"]. "</td>
				        		<td>" . $row["Project"]. " </td>
				        		<td>" . $row["Field"]. "</td>
				        		<td>". $row["Proposer"]. "</td>
				        		<td>". ($row["Approvement"]==0 ? "รอการอนุมัติ" : "อนุมัติแล้ว") . "</td>
				        		<td>". $row["Status"]. "</td>
				        		<td><button type='button' onclick='showDetail(\"".$row["FinanceRequestID"]."\")'>More...</button></td>
				        		</tr>
				        		";

			    	}
				} else {
				    echo "0 results";
				}
				$conn->close();
			//}
	?>
	</body>
</html>