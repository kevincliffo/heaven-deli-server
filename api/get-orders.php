<?php
    include 'db_config.php';

	try
	{
		$conn = new mysqli($HostName, $UserName, $UserPassword, $DatabaseName);

		while(true)
		{
			// if($_SERVER['REQUEST_METHOD'] == 'POST')
			// {
				$sql = "SELECT * FROM orders";

				$response['orders'] = array();
				try
				{
					if($result = mysqli_query($conn, $sql))
					{
						// $response['errorfound'] = "0";
						// $response['message'] = '';

						while($row = mysqli_fetch_assoc($result))
						{
							$order['OrderId'] = $row['OrderId'];
							$order['CustomerName'] = $row['CustomerName'];
							$order['CustomerMobileNo'] = $row['CustomerMobileNo'];
							$order['CustomerEmail'] = $row['CustomerEmail'];
							$order['Item'] = $row['Item'];
							$order['BaseFlavour'] = $row['BaseFlavour'];
							$order['Topping'] = $row['Topping'];
							$order['Theme'] = $row['Theme'];
							$order['SugarFree'] = $row['SugarFree'];
							$order['TotalCost'] = $row['TotalCost'];
							$order['OrderTime'] = $row['OrderTime'];
							$order['OrderDate'] = $row['OrderDate'];
							$order['CreatedDate'] = $row['CreatedDate'];
							array_push($response['orders'], $order);
						}
						mysqli_close($conn);
					}
				}
				catch(Exception $e)
				{
					$response['errorfound'] = '1';
					$response['message'] = $e->getMessage();
				}
			// }
			// else
			// {
				// $response['message'] = "Error occured";
				// $response['errorfound'] = "1";
			// }
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
