<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title> STEPS : Finance Request Form </title>
		<header><h2> Finance Request Form</h2></header>
	</head>
	<body>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		เลขที่ใบเสนอซื้อ:
		<?php
			$servername = "localhost";
			$username = "root";
			$password = "";
			$db = "mydb";

			$conn = new mysqli($servername, $username, $password ,$db);

			if ($conn->connect_error) {
		    	die("Connection failed: " . $conn->connect_error);
			}

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
		<form action="" method="post">
			โครง <input type=text name="project" placeholder="โครงการ"> <br>
			<?php 
				if (!empty($_SESSION['nickname'])){
					$checkfield = ""
					if ($_SESSION['team']=1){
						$checkfield = "President & Vice president";
					}
					elseif ($_SESSION['team']=2){
						$checkfield = "Operation";
					}
					elseif ($_SESSION['team']=3){
						$checkfield = "Community relations";
					}
					elseif ($_SESSION['team']=4){
						$checkfield = "Marketing";
					}
					elseif ($_SESSION['team']=5){
						$checkfield = "Finance and Accounting";
					}
					elseif ($_SESSION['team']=6){
						$checkfield = "Organization Development";
					}
					elseif ($_SESSION['team']=7){
						$checkfield = "Human Resources";
					}
					elseif ($_SESSION['team']=8){
						$checkfield = "Corporate Communication";
					}
		
					echo "ผู้ติดต่อ <input type='text' name='field' value='<?php echo $_SESSION['nickname'];?' disabled> 
							ฝ่าย <input type='text' value='<?php echo $checkfield; ?>' disabled>" ;
				}else {
					echo "ผู้ติดต่อ <input type='text' name='proposer' placeholder='ชื่อผู้ติดต่อ'>
							ฝ่าย <input type=text name='field' placeholder='ฝ่ายของคุณ'>"; 
				}
				
			?>		

			เบอร์ติดต่อ <input type=text name="phoneNumber" placeholder="090-xxx-xxx"><br><br>
			รายการเสนอซื้อ<br>


			<div id="warpper">
				<div id="1">
					<label>1</label>
					<input name="details[]" type="text" placeholder="รายละเอียด">
					<input name="quantitys[]" type="text" placeholder="จำนวน" class="quantity">
					<input name="pricePerUnit[]" type="text" placeholder="ราคาต่อหน่วย" class="price">
				</div>
			</div>
			ราคารวม: <label name ="totalprice" id='total'>0</label>
			<br><button id="add">เพิ่มรายการ</button>
			<button id="remove">ลบรายการล่าสุด</button><br><br>

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
						$(warpper).append('<div id="'+nums+'"><label>'+nums+' </label><input name="details[]" type="text" placeholder="รายละเอียด"> <input name="quantitys[]" type="text" placeholder="จำนวน" class="quantity"> <input name="pricePerUnit[]" type="text" placeholder="ราคาต่อหน่วย" class="price"></div>');
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

			รายละเอียดเพิ่มเติม (สถานที่สั่งซื้อ, ต้องการนำไปใช้เพื่อทำอะไร, กำหนดการใช้)<br>
			<textarea name="moreDetails" row="10" cols="30" placeholder="กรอกรายละเอียด..."></textarea>

			<input type="submit" value="ส่งแบบฟอร์ม" >
		</form>

		<?php
			//header("charset=utf-8");
			//echo count($_POST['details']);
			//echo count($_POST['quantitys']);
			//echo count($_POST['pricePerUnit']);

			if(!(empty($_POST['field']) or 
				empty($_POST['project']) or 
				empty($_POST['proposer']) or 
				empty($_POST['phoneNumber']) or
				empty($_POST['moreDetails'])
			)){
				echo "<script>alert('abcderthgfads')</script>";
				$servername = "localhost";
				$username = "root";
				$password = "";
				$db = "mydb";

				$conn = new mysqli($servername, $username, $password ,$db);

				if ($conn->connect_error) {
			    	die("Connection failed: " . $conn->connect_error);
				} 

				mysql_query("SET NAMES utf8");
				$cmd = "INSERT INTO FinanceRequests (Field,Proposer,PhoneNumber,Project,Approvment,Status,Comment) 
								VALUES ('".$_POST['field']."' , '".$_POST['proposer']."', '".$_POST['phoneNumber']."' , 
								'".$_POST['project']."', 0, 'Waiting', '".$_POST['moreDetails']."')" ;

				if ($conn->query($cmd) === TRUE) {
			   		echo "<script type='text/javascript'>alert('ส่งแบบฟอร์มแล้ว รอการอนุมัติจากฝ่ายการเงิน');</script>";
			    }else{
			    	echo "Error: " . $cmd . "<br>" . $conn->error;
				}

				for ($int = 0 ; $int < count($_POST['details']); $int++) {

					$cmd2 = "INSERT INTO FinanceDetails (Detail, Quantity, PricePerUnit, FinanceRequestID)
							VALUES ('".$_POST['details'][$int]."' , '".$_POST['quantitys'][$int]."', '".$_POST['pricePerUnit'][$int]."', last_insert_id())" ;


					if ($conn->query($cmd2) === FALSE) {
				    	echo "Error: " . $cmd2 . "<br>" . $conn->error;
					}

				}

				$conn->close();
				header ("Location: RequestForm.php");
			}

		?>

	</body>
</html>

