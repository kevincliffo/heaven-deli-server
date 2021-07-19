<?php
    include 'db_config.php';

	try
	{
		$conn = new mysqli($HostName, $UserName, $UserPassword, $DatabaseName);

		while(true)
		{
			if($_SERVER['REQUEST_METHOD'] == 'POST')
			{
				$CustomerName = $_POST['CustomerName'];
				$CustomerMobileNo = $_POST['CustomerMobileNo'];
				$CustomerEmail = $_POST['CustomerEmail'];
				$Item = $_POST['Item'];
				$BaseFlavour = $_POST['BaseFlavour'];
				$Topping = $_POST['Topping'];
				$Theme = $_POST['Theme'];
				$SugarFree = $_POST['SugarFree'];
				$TotalCost = $_POST['TotalCost'];
				$OrderTime = $_POST['OrderTime'];
				$OrderDate = $_POST['OrderDate'];
				$CreatedDate = $date_object = date('Y-m-d H:i:s');

				$sql = "INSERT INTO orders(CustomerName, CustomerMobileNo, CustomerEmail, Item, BaseFlavour, "
                     . "Topping, Theme, SugarFree, TotalCost, OrderTime, OrderDate, CreatedDate) "
                     . "VALUES ('$CustomerName','$CustomerMobileNo','$CustomerEmail','$Item','$BaseFlavour',"
                     . "'$Topping','$Theme','$SugarFree','$TotalCost','$OrderTime','$OrderDate','$CreatedDate')";
						
				$response['errorfound'] = "1";
				$response['message'] = 'Not added'.$sql;
				try
				{
					if(mysqli_query($conn, $sql))
					{
						$response['errorfound'] = '0';
						$response['message'] = 'Order added Successfully';
					}
				
					mysqli_close($conn);
				}
				catch(Exception $e)
				{
					$response['errorfound'] = '1';
					$response['message'] = $e->getMessage();
				}
			}
			else
			{
				$response['message'] = "Error occured during Ordering";
				$response['errorfound'] = "1";
			}
			break;
		}
	}
	catch(Exception $e)
	{
		$response['errorfound'] = '1';
		$response['message'] = $e->getMessage();
	}
	header('Content-Type: application/json');
    echo json_encode($response);    
?>
