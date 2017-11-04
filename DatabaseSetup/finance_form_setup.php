<?php
	$cmd="CREATE TABLE if not exists FinanceRequests(
			FinanceRequestID INT AUTO_INCREMENT PRIMARY KEY,
			Field TEXT NOT NULL,
			Proposer TEXT NOT NULL,
			PhoneNumber TEXT NOT NULL,
			Project TEXT NOT NULL,
			Approvement BOOLEAN NOT NULL,
			Status TEXT NOT NULL,
			Comment TEXT NOT NULL
		)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";
	$cmd2="CREATE TABLE if not exists FinanceDetails(
			Detail TEXT NOT NULL,
			Quantity TEXT NOT NULL,
			PricePerUnit TEXT NOT NULL,
			FinanceRequestID INT,
			FOREIGN KEY (FinanceRequestID) REFERENCES financerequests(FinanceRequestID)
		)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";

	include("connect.php");
	mysqli_query($connect,$cmd);
 	mysqli_query($connect,$cmd2);
 	$connect->close();
?>
