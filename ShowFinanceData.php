<?php
	include "navbar.php";
?>
<!DOCTYPE = html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="../css/bootstrap_4.0/bootstrap.min.css">
		<link rel="stylesheet" href="../css/main.css">
		<script src="../js/jquery_3.2.1/jquery-3.2.1.slim.min.js"></script>
		<script src="../js/popper_1.12.3/popper.min.js"></script>
		<script src="../js/bootstrap_4.0/bootstrap.min.js"></script>
		<title> STEPS : Show Finance All Requisitions  </title>
	</head>
	<body>
		<div class="container">
			<div class="page-header"><h1>Finance All Requisitions</h1></div>
		<script>
			function showDetail(id){
				document.location.href = 'ShowFinanceDetail.php?id='+id;

			}
		</script>

			<?php
				//รับSessionฝ่ายจาก login
				if ($_SESSION['team_id'] == 5){
					include("connect.php");

					$show_info = "SELECT * FROM FinanceRequests";
					$result = $connect->query($show_info);

					echo '<div class="container">';
					if ($result->num_rows > 0) {
					    echo "<table class='table table-striped'><tr><th>#</th><th>โครงการ</th><th>ฝ่าย</th><th>ผู้เสนอ</th><th>การอนุมัติ</th><th>สถานะ</th><th><center>รายละเอียดเพิ่มเติม</center></th></tr>";
					    while($row = $result->fetch_assoc()) {
					        echo "<tr><td>" . $row["FinanceRequestID"]. "</td>
					        		<td>" . $row["Project"]. " </td>
					        		<td>" . $row["Field"]. "</td>
					        		<td>". $row["Proposer"]. "</td>
					        		<td>". ($row["Approvement"]==0 ? "รอการอนุมัติ" : "อนุมัติแล้ว") . "</td>
					        		<td>". $row["Status"]. "</td>
					        		<td><center><button type='button' class='btn-primary' onclick='showDetail(\"".$row["FinanceRequestID"]."\")'>Info</button></center></td>
					        		</tr>
					        		";

				    	}
				    	echo "</table>";
					} else {
					    echo "0 results";
					}
					echo "</div>";
					$connect->close();
				}
			?>
		<p class="text-right"><button class='btn btn'><a href="RequestForm.php">กลับไปหน้าฟอร์ม</a></button></p>
		</div>
	</body>
</html>
