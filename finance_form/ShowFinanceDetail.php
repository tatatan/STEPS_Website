<?php
	session_start();
?>
<!DOCTYPE = html>
<html>
	<head>
		<meta charset="UTF-8">
		<title> STEPS : Show Finance Request Detail </title>
	</head>
	<body>
		<?php 
			//get session from login page 
			//if ($_SESSION['team'] == 5){
				$servername = "localhost";
				$username = "root";
				$password = "";
				$db = "mydb";


				$conn = new mysqli($servername, $username, $password, $db);

				if ($conn->connect_error) {
			    	die("Connection failed: " . $conn->connect_error);
				} 

				$show_info = "SELECT * FROM financedetails WHERE FinanceRequestID='".$_GET['id']."'";
				$result = $conn->query($show_info);
				$sum = 0 ;
				if ($result->num_rows > 0) {
				    echo "<table><tr><th>รายละเอียด</th><th>จำนวน</th><th>ราคาต่อหน่วย</th></tr>";
				    while($row = $result->fetch_assoc()) {
				        echo "<tr><td>" . $row["Detail"]. "</td>
				        		<td>" . $row["Quantity"]. " </td>
				        		<td>" . $row["PricePerUnit"]. "</td>
				        		</tr>
				        		";
				      $sum+=intval($row["Quantity"])*intval($row["PricePerUnit"]);
			    	}

			    echo "<p><caption align='bottom'> รวม: $sum </caption></p>";

				} else {
				    echo "0 results";
				}

				$show_info2 = "SELECT Proposer,Field,PhoneNumber,Approvement,Status,Comment 
								FROM financerequests WHERE FinanceRequestID='".$_GET['id']."'";
				$result2 = $conn->query($show_info2);
				$row2 = $result2->fetch_assoc();
				$prop = $row2["Proposer"];
				$field = $row2["Field"];
				$phonenum = $row2["PhoneNumber"];
				$approv = $row2["Approvement"]==0 ? "รอการอนุมัติ" : "อนุมัติแล้ว";
				$status = $row2["Status"];
				$comm = $row2["Comment"];
				echo "<p><caption align='bottom'> ผู้ติดต่อ:$prop ($field) เบอร์ติดต่อ:$phonenum นำไปใช้เพื่อ:$comm <br> 
						การอนุมัติ:$approv
						<form action='' method='post'><input type='submit' value='เปลี่ยนเป็นอนุมัติแล้ว'> <br> 
						สถานะ: $status <input type='submit' value='แก้ไขสถานะ'></form>
					</caption></p>";
				$conn->close();
			//}
	?>
	</body>
</html>