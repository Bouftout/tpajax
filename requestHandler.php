<?php
	$response;
	switch ($_POST["operation"]){
		case "page1":
			$response = handleRequest(resolveUrl("page1Writer.php"),$_POST,"POST");
			break;
		case "page2":
			$response = handleRequest(resolveUrl("page2Writer.php"),$_POST,"POST");
			break;
			case "page3":
				$response = handleRequest(resolveUrl("page3Writer.php"),$_POST,"POST");
				break;
		default:
			$response = "<p>Error, Operation not supported by handler</p>";
			break;
	}
	
	echo $response;
	
	function resolveUrl($url){
		$explodedBaseUrl = explode("/","http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
		$argCount = count($explodedBaseUrl) - 1;
		if(count(explode("../",$url,2) ) > 1){
			$argCount--;
		}
		$baseUrl ="";
		for($i=0;$i<$argCount;$i++){
			$baseUrl = $baseUrl.$explodedBaseUrl[$i]."/";
		}
		$baseUrl = $baseUrl.$url;
		return $baseUrl;
	}
	
	function handleRequest($url, $data, $method){
		$options = array(
			'http' => array(
				'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
				'method'  => $method,
				'content' => http_build_query($data)
			)
		);
		$context  = stream_context_create($options);
		$result = file_get_contents($url, false, $context);
		return $result;
	}
?>