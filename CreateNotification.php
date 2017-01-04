<?PHP
	function sendMessage(){
	try {
		$content = array(
			"en" => 'English Message'
			);

		$fields = array(
			'app_id' => "e0c9ffdc-adec-472b-b2e1-6b7821035f1a",
			'included_segments' => array('All'),
			'contents' => $content
		);

		$fields = json_encode($fields);
    print("\nJSON sent:\n");
    print($fields);
        print("0");
		$ch = curl_init();
		print("1");
		curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
		print("2");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
												   'Authorization: Basic ZjYxYjc4NmUtNDNhOC00ODdiLWI0NGYtZjkzY2Q1MzBjMjIw'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		$response = curl_exec($ch);
		curl_close($ch);

		return $response;
		}catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
	}

	$response = sendMessage();
	$return["allresponses"] = $response;
	$return = json_encode($return);

  print("\n\nJSON received:\n");
	print($return);
  print("\n");
?>

