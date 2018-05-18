<?php
	header("content-type:application/json");
	if($_GET['id']==1)
	{
		$response=array(
			'resr'=>'123',
			'ere'=>'test'
			);
		$json=json_encode($response);
		echo $json;
	}
?>