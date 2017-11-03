<?php
	$cmd="CREATE TABLE if not exists financerequests1( 
			FinanceRequestID INT AUTO_INCREMENT PRIMARY KEY,
			Field TEXT NOT NULL,
			Proposer TEXT NOT NULL,
			PhoneNumber TEXT NOT NULL,
			Project TEXT NOT NULL,
			Approvement BOOLEAN NOT NULL,
			Status TEXT NOT NULL,
			Comment TEXT NOT NULL
			)";
	$cmd2="CREATE TABLE if not exists financedetails1( 
			Detail TEXT NOT NULL,
			Quantity TEXT NOT NULL,
			PricePerUnit TEXT NOT NULL,
			FinanceRequestID INT,
			FOREIGN KEY (FinanceRequestID) REFERENCES financerequests(FinanceRequestID)
		)";

	include("connect.php");
	mysqli_query($conn,$cmd);
 	mysqli_query($conn,$cmd2);
 	$conn->close();		
?>