<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title> STEPS : Finance Request Form </title>
		<header><h2> Finance Request Form</h2></header>
	</head>
	<body>

		<script>
			var count = 1;
			var tabbody;
			function cloneRow(){
				count = count +1;
				tabbody = document.getElementById('tablebody');

				var row = document.getElementById("firstRow");
				var newrow = row.cloneNode(true);
				newrow.cells[0].innerHTML = count;
				newrow.cells[1].innerHTML = "รายละเอียด...";
				newrow.cells[2].innerHTML = 1;

				tabbody.appendChild(newrow);
			}

			function getInformation(){
				detail = [];
				tabbody = document.getElementById('tablebody');
				for (i = 0; i < tabbody.rows.length; i++) {
					row = tabbody.rows[i];
					tmp = [];
					//for(j = 0; j < row.cells.length; j++){
						//cell = row.cells[j];
						//tmp.push(cell.innerHTML);
					//}	
					l=[tabbody.rows[i].cells[1].innerHTML,tabbody.rows[i].cells[2].innerHTML];
					detail.push(l);
						//list2.push(tabbody.rows[0].cells[2].innerHTML);

					
					//list.push(tmp);
					//list2[column1.innerHTML]=row.cell[2].innerHTML;
				}
				//alert(list2[]);
			}
		</script>
		<form action="" method="post">
			ฝ่าย <input type=text name="Field" placeholder="ฝ่ายของคุณ"> 
			โครง <input type=text name="Project" placeholder="โครงการ"> <br>
			ผู้ติดต่อ <input type=text name="Proposer" placeholder="ชื่อผู้ติดต่อ"> 
			เบอร์ติดต่อ <input type=text name="PhoneNumber" placeholder="090-xxx-xxx">
		<br>
		กรอกรายละเอียดรายการของคุณบนตาราง<br>	
		<table>
			<style>
				table, th, td {
				border: 1px solid black;
				border-collapse: collapse;
				}
			</style>
			<thead>
				<tr>
					<th>ลำดับ</th><th>รายการ</th><th>จำนวน</th>

				</tr>
			</thead>
			<tbody id='tablebody'>
				<tr id="firstRow">
					<td>1</td>
					<td contenteditable="true">กรอกรายละเอียดที่นี่</td>
					<td contenteditable="true">1</td>
				</tr>
			</tbody>
		</table>

		<input type='button' value="เพิ่มรายการ" onclick='cloneRow();return false;'><br>
		<input type='submit' value="ส่งแบบฟอร์ม" onclick='getInformation();return false;'>

		</form>


		<?php 
			echo detail;
			if (!empty ($_POST["Field"]) and !empty ($_POST["Project"]) and !empty($_POST["Proposer"]) and !empty ($_POST["PhoneNumber"]) and detail) {
				$servername = "localhost";
				$username = "root";
				$password = "";
				$db = "mydb";

				$conn = new mysqli($servername, $username, $password ,$db);

			if ($conn->connect_error) {
    			die("Connection failed: " . $conn->connect_error);
			} 


				$fname_str = $_POST["fname"];
				$lname_str = $_POST["lname"];
				$sex_str = $_POST["sex"];

		if(!empty($_POST['hobby'])) {
					$hobby_str = implode(", ",$_POST['hobby']); 
			} else $hobby_str = "-";

		$date_add = "INSERT INTO information (First_Name,Last_Name,Sex,Hobby)	
		VALUES ('".$fname_str."' , '".$lname_str."' , '".$sex_str."','".$hobby_str."')" ; 

		if ($conn->query($date_add) === TRUE) {
    		echo "Success!";
    	}else {
    		echo "Error: " . $date_add . "<br>" . $conn->error;

    		$conn->close();
		}
			

		}

	?>
	</body>
</html>





