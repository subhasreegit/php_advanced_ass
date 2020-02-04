<html>
	<head>
		<title>php advanced assignment 1</title>
		<link rel="stylesheet" href="css1.css">
	</head>


<body>

<?php 
	
	use GuzzleHttp\Client;
	use GuzzleHttp\Message\Request;
	use GuzzleHttp\Message\Response;

	require ('../vendor/autoload.php'); 
 	
	
	$client = new GuzzleHttp\Client();
	
	$response= $client->request('GET', 'https://ir-revamp-dev.innoraft-sites.com/jsonapi/node/services');
	$response_body= $response->getBody();
	$json_decode= json_decode($response_body);
	
	

	class first{

	Function call(&$client,&$response,&$json_decode){

		$j=0;
		$i=0;
		foreach($json_decode->data as $key=>$value)
		{

			echo "<div class='parent'>";
				echo "<div class='container'>";
					$link=$value->relationships->field_image->links->related->href;
					$response2= $client->request('GET', $link);
					$json_decode2= json_decode($response2->getBody());
					$data3="https://ir-revamp-dev.innoraft-sites.com/";
					$data4=$json_decode2->data->attributes->uri->url;
					$data5=$data3.$data4;
					if($i%2==0){
						echo "<div class='img1' height:100px width:100px>";
							echo "<img src=$data5>";
						echo "</div>";
					}
					else{
						echo "<div class='img2' height:100px width:100px>";
							echo "<img src=$data5>";
						echo "</div>";
					}

					if($i%2==0){
						echo "<div class='content1'>";
							$dat1=$value->attributes->title;
							$dat2=$value->attributes->body->summary;
							$dat3=$value->attributes->field_services->processed;
							echo "<div class='heading'>";
								echo "<h1>"."<span>".++$j."</span>".$dat1."</h1>";
								echo "<br>";
							echo "</div>";
							echo "<h4>".$dat2."</h4>";
							echo "<h5>".$dat3."</h5>";
						echo "</div>";
					}
					else{
						echo "<div class='content2'>";
							$dat1=$value->attributes->title;
							$dat2=$value->attributes->body->summary;
							$dat3=$value->attributes->field_services->processed;
							echo "<div class='heading'>";
								echo "<h1>"."<span>".++$j."</span>"." ".$dat1."</h1>";
								echo "<br>";
							echo "</div>";
							echo "<h4>".$dat2."</h4>";
							echo "<h5>".$dat3."</h5>";
						echo "</div>";
					}
					echo "</div>";
				echo "</div>";
			echo "<br>";
			$i++;
		}
	}

}
$reply1= new first();
$reply1->call($client,$response,$json_decode);



?>

</body>

</html>
