<?php
	include "navbar.php";
?>
<!DOCTYPE = html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- 		<link rel="stylesheet" href="../css/bootstrap_4.0/bootstrap.min.css">
		<link rel="stylesheet" href="../css/main.css"> -->
		<script src="../js/jquery_3.2.1/jquery-3.2.1.slim.min.js"></script>
		<script src="../js/popper_1.12.3/popper.min.js"></script>
		<script src="../js/bootstrap_4.0/bootstrap.min.js"></script>
		<title> STEPS : Show Finance Request Detail </title>
	</head>
	<body>
		<div class="container">

			<?php
			//get session from login page
			if ($_SESSION['team_id'] == 5){
				include("connect.php");
				echo "<div class='page-header'>
  						<h1>Requisition Details#";
  				echo "".$_GET['id']."</h1></div>";
				if(!empty($_POST['changeApp'])){
					$change_cmd = "UPDATE financerequests SET Approvement=1 WHERE FinanceRequestID='".$_GET['id']."'";
					$connect->query($change_cmd);
				}

				if(!empty($_POST['changeStat'])){
					$changest=$_POST['changeStat'];
					$change_cmd2 = "UPDATE financerequests SET Status='".$changest."' WHERE FinanceRequestID='".$_GET['id']."'";
					$connect->query($change_cmd2);
				}

				$show_info = "SELECT * FROM financedetails WHERE FinanceRequestID='".$_GET['id']."'";
				$result = $connect->query($show_info);
				$sum = 0 ;
				if ($result->num_rows > 0) {
				    echo "<table class='table'><tr><th>รายละเอียด</th><th>จำนวน</th><th>ราคาต่อหน่วย(บาท)</th></tr>";
				    while($row = $result->fetch_assoc()) {
				        echo "<tr><td>" . $row["Detail"]. "</td>
				        		<td>" . $row["Quantity"]. " </td>
				        		<td>" . $row["PricePerUnit"]. "</td>
				        		</tr>
				        		";
				      	$sum+=intval($row["Quantity"])*intval($row["PricePerUnit"]);
			    	}
			    	echo "<tr><td></td><td></td><td><b>รวมราคา: $sum บาท </b></td></tr>";
			    	echo "</table>";


				} else {
				    echo "0 results";
				}

				$show_info2 = "SELECT Proposer,Field,PhoneNumber,Approvement,Status,Comment
								FROM financerequests WHERE FinanceRequestID='".$_GET['id']."'";
				$result2 = $connect->query($show_info2);
				$row2 = $result2->fetch_assoc();
				$prop = $row2["Proposer"];
				$field = $row2["Field"];
				$phonenum = $row2["PhoneNumber"];
				$approv = $row2["Approvement"]==0 ? "รอการอนุมัติ" : "อนุมัติแล้ว";
				$status = $row2["Status"];
				$comm = $row2["Comment"];
				echo "<label><font size='3'>เพิ่มเติม</font></label><div class='well'><b>นำไปใช้เพื่อ</b>:$comm<br><b>ผู้ติดต่อ: </b>$prop ($field) <b>เบอร์ติดต่อ:</b>$phonenum<br><br>

						<b>การอนุมัติ:</b>$approv";
				if($approv == "รอการอนุมัติ"){
					echo "<form action='' method='post'><input name='changeApp' type='submit' value='เปลี่ยนเป็นอนุมัติแล้ว' class='btn btn-primary btn-sm'> </form>";
				}else echo "<br>";
				echo "<b>สถานะ:</b> $status <form action='' method='post'><input name='changeStat' type='text' placeholder='กรอกข้อความแก้ไขสถานะ'><input type='submit' value='ส่ง' class='btn btn-sm'></form>";
				echo "</div>";
				$connect->close();
			}else{echo ("ไม่ใช่ฝ่ายการเงินห้ามดูน้าา");
				}
		?>
  		<p class="text-right"><button class='btn'><a href="ShowFinanceData.php">Back to previous page</a></button></p>
		</div>
	</body>
</html>
