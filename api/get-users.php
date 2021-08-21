<?php
    include 'db_config.php';

	try
	{
		$conn = new mysqli($HostName, $UserName, $UserPassword, $DatabaseName);

		while(true)
		{
			// if($_SERVER['REQUEST_METHOD'] == 'POST')
			// {
				$sql = "SELECT * FROM users";

				$response['users'] = array();
				try
				{
					if($result = mysqli_query($conn, $sql))
					{
						// $response['errorfound'] = "0";
						// $response['message'] = '';

						while($row = mysqli_fetch_assoc($result))
						{
							$user['UserId'] = $row['UserId'];
							$user['Name'] = $row['Name'];
							$user['UserType'] = $row['UserType'];
							$user['Email'] = $row['Email'];
							$user['Password'] = $row['Password'];
							$user['MobileNo'] = $row['MobileNo'];
							$user['Age'] = $row['Age'];
							$user['CreatedDate'] = $row['CreatedDate'];
                            
							array_push($response['users'], $user);
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
