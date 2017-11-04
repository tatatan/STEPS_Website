<?php
	if(!(empty($_POST['field']) or
		empty($_POST['project']) or
		empty($_POST['proposer']) or
		empty($_POST['phoneNumber']) or
		empty($_POST['moreDetails'])
	)){

		include('connect.php');
		// echo "<script>alert('hello');</script>";

		if ($connect->connect_error) {
	    	die("Connection failed: " . $connect->connect_error);
		}

		mysql_query("SET NAMES utf8");
		$cmd = "INSERT INTO FinanceRequests (Field,Proposer,PhoneNumber,Project,Approvement,Status,Comment)
						VALUES ('".$_POST['field']."' , '".$_POST['proposer']."', '".$_POST['phoneNumber']."' ,
						'".$_POST['project']."', 0, 'Waiting', '".$_POST['moreDetails']."')" ;

		if ($connect->query($cmd) === FALSE) {
	    	echo "Error: " . $cmd . "<br>" . $connect->error;
		}

		for ($int = 0 ; $int < count($_POST['details']); $int++) {
			$cmd2 = "INSERT INTO FinanceDetails (Detail, Quantity, PricePerUnit, FinanceRequestID)
					VALUES ('".$_POST['details'][$int]."' , '".$_POST['quantitys'][$int]."', '".$_POST['pricePerUnit'][$int]."', last_insert_id())" ;


			if ($connect->query($cmd2) === FALSE) {
		    	echo "Error: " . $cmd2 . "<br>" . $connect->error;
			}
		}
		$connect->close();
		//echo "<script>alert('success');</script>";
		header( "refresh:0;url=show_success.php" );
	}else{
		header("Location: RequestForm.php");
	}
?>
