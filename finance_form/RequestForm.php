<?php
	session_start();
	// create necessary session value for test
	//include("fake_session.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- 		<link rel="stylesheet" href="../css/bootstrap_4.0/bootstrap.min.css">
		<link rel="stylesheet" href="../css/main.css"> -->
		<script src="../js/jquery_3.2.1/jquery-3.2.1.slim.min.js"></script>
		<script src="../js/popper_1.12.3/popper.min.js"></script>
		<script src="../js/bootstrap_4.0/bootstrap.min.js"></script>
		<title> STEPS : Finance Request Form </title>
	<body>

		<div class="container">
			<header><h2>Finance Request Form</h2></header>
			<p class="text-right"><font size="4"><b>เลขที่ใบเสนอซื้อ:</b></font>
				<?php 

					// echo empty($_POST['field']) ? 'empty':'no';
					// echo empty($_POST['project']) ? 'empty':'no';
					// echo empty($_POST['proposer']) ? 'empty':'no';
					// echo empty($_POST['phoneNumber']) ? 'empty':'no';
					// echo empty($_POST['moreDetails']) ? 'empty':'no';

					include("connect.php");

					$cmd = "SELECT FinanceRequestID FROM FinanceRequests";
					$result = $conn->query($cmd);

					if ($result->num_rows == 0) {
				   		echo "1";
				   	}
				   	else {
				   		echo $result->num_rows+1;
				   	}
					   		
				   	$conn->close();
				?>
			</p>
		<form action="insert_data.php" method="post" >
			<div class="row">
				<div class="col-xs-12">
					<div class="form-group">
						<label for="proj">โครงการ </label>
						<input type=text name="project" class="form-control" placeholder="ชื่อโครงการ" id="proj">
					</div>
				</div>
			</div>
			<?php 
				if (!empty($_SESSION['nickname'])){
					$servername = "localhost";
					$username = "root";
					$password = "";
					// $db = "step";
					$db = "mydb";
					$conn = new mysqli($servername, $username, $password, $db); 

					if ($conn->connect_error) {
						die("Connection failed: " . $conn->connect_error);
					} 

					$select_tel="SELECT tel FROM members WHERE nickname='".$_SESSION['nickname']."'";
					$phnum=$conn->query($select_tel);
					//access members table  to select phone number

				//$phnum="090"; test
					echo "<div class='row'>
							<div class='col-xs-4'>
								<div class='form-group'>
									<label for='propo'>ผู้ติดต่อ</label> 
										<input type='text' name='proposer' class='form-control' placeholder='ชื่อผู้ติดต่อ' id='propo' value='".$_SESSION['nickname']."' readonly>
								</div>
							</div> 
						<div class='col-xs-4'>
							<div class='form-group'>
								<label for='fd'>ฝ่าย</label>
								<input type='text' name='field' class='form-control' placeholder='ฝ่ายของคุณ' id='fd' value='".$_SESSION['team_name']."' readonly>
							</div>
						</div>
						<div class='col-xs-4'>
							<div class='form-group'>
								<label for='ph'>เบอร์ติดต่อ</label>
								<input type='text' name='phoneNumber' class='form-control' placeholder='090-xxx-xxx'id='ph' value='".$phnum."' readonly>
							</div>
						</div>";
				}else {
					echo "<div class='row'>
							<div class='col-xs-4'>
								<div class='form-group'>
									<label for='propo'>ผู้ติดต่อ</label> 
										<input type='text' name='proposer' class='form-control' placeholder='ชื่อผู้ติดต่อ' id='propo'>
								</div>
							</div>
							<div class='col-xs-4'>
								<div class='form-group'>
									<label for='fd'>ฝ่าย</label>
										<input type='text' name='field' class='form-control' placeholder='ฝ่ายของคุณ' id='fd'>
								</div>
							</div>
							<div class='col-xs-4'>
								<div class='form-group'>
									<label for='ph'>เบอร์ติดต่อ</label>
								<input type='text' name='phoneNumber' class='form-control' placeholder='090-xxx-xxx'id='ph'>
								</div>
							</div>
						</div>"; 
				}
				
			?>		
			
			<br>
			<div class="row">
				<div class="col-xs-12">
					<center><h4>รายการ</h4></center>
				</div>
			</div>
			<div class="well">
			<div class="row">
				<div class="col-xs-1"><font size="3"><center><b>ลำดับที่</b></center></div>
				<div class="col-xs-4"><font size="3"><center><b>รายละเอียด</b></center></div>
				<div class="col-xs-4"><font size="3"><center><b>จำนวน</b></center></div>
				<div class="col-xs-3"><font size="3"><center><b>ราคาต่อหน่วย(บาท)</b></center></div>
			</div>


			<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

			<div id="warpper">
				<div id="1">
					<div class="row">
						<div class="col-xs-1"><center><label>1</label></center></div>
						<div class="col-xs-4"><div class="form-group"><input name="details[]" type="text" placeholder="รายละเอียด" class="form-control"></div></div>
						<div class="col-xs-4"><div class="form-group"><input name="quantitys[]"  type="text" placeholder="จำนวน" class="form-control quantity"></div></div>
						<div class="col-xs-3"><div class="form-group"><input name="pricePerUnit[]"  type="text" placeholder="ราคาต่อหน่วย" class="form-control price"></div></div>	
					</div>
				</div>
			</div>
			</div>
			<p class="text-right"><font size="4"><b>ราคารวม: </b></font><label name ="totalprice" id='total'>0</label><br>
			<button id="add" class="btn btn-success btn-sm">เพิ่มรายการ</button>
			<button id="remove" class="btn btn-danger btn-sm">ลบรายการล่าสุด</button></p>
			

			<script>
				$(document).ready(function() {
					var nums = 1;
					var totalRow = 0;

					$.fn.totalPrice = function(x) {
						var t = 0;
						$('.price').each(function(i, obj){
							t += parseInt($(obj).val())*parseInt($('.quantity').eq(i).val());
						});
						$('#total').html(t);
					};

					$("#add").click(function(e) {
						e.preventDefault();
						nums++;
						$(warpper).append('<div id="'+nums+'"><div class="row"><div class="col-xs-1"><center><label>'+nums+'</label></center></div><div class="col-xs-4"><div class="form-group"><input name="details[]" type="text" placeholder="รายละเอียด" class="form-control"></div></div><div class="col-xs-4"><div class="form-group"><input name="quantitys[]" type="text" placeholder="จำนวน" class="form-control quantity"></div></div><div class="col-xs-3"><div class="form-group"><input name="pricePerUnit[]" type="text" placeholder="ราคาต่อหน่วย" class="form-control price"></div></div></div><br>');
						$('.price').keyup($.fn.totalPrice);
					});
					$("#remove").click(function(e) {
						if (nums>0){
							e.preventDefault();
							$("#"+String(nums)).remove();
							nums--;

							$.fn.totalPrice(1234);
						}
					});
					
					$('#warpper').keyup($.fn.totalPrice);
				});
			</script>

			<div class="form-group">
				<label for="moredet">รายละเอียดเพิ่มเติม (สถานที่สั่งซื้อ, ต้องการนำไปใช้เพื่อทำอะไร, กำหนดการใช้)</label>
				<textarea name="moreDetails" class="form-control" row="5" placeholder="กรอกรายละเอียด..." id="moredet"></textarea>
			</div>

			<input type="submit" value="ส่งแบบฟอร์ม" class="btn btn-primary">
		</form>

		<p class="text-right"><font color="red">**เฉพาะฝ่ายการเงิน</font><br><button class='btn btn-xs'><a href="ShowFinanceData.php">ดูใบเบิกทั้งหมด</a></button></p>

	</body>
</html>

