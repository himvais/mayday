<!-- Project Mayday -->
<!-- FILE - CORE-IOHandler V0.2(Base:PHP) -->
<!-- Written by @Himvais on 20/05/2015 -->

<!-- Gateway for the core API -->
<!-- All the input/output happens using this channel -->
<!-- This page accepts a GET Request (temp) with following parameters -->
<!-- TYP: TEXT/UI -->
<!-- VAL: input string -->
<!-- For testing cases keep the subtype = text and send the message in the value parameter -->
<!-- Other parameter might break the code -->

<?php 
	include 'TextHandler.php';
	include 'ResponseHandler.php';
	include 'guard.php';
	include 'helpers.php';
	// to be read from an ini file at a later point of time. (temp)
	
	$mode_debug = true;
	
	//$guard = new guard($_GET);
	//Implement the security class, check the integrity of the input and store data in local variables later. (temp)

	if(!isset($_GET) or empty($_GET))
	{
		if($mode_debug)
			die("ERR:LVL1:Request with invalid parameters");
		else
			die("Invalid Request");
	}
	
	if(!isset($_GET['TYP']) or empty($_GET['TYP']))
	{
		if($mode_debug)
			die("ERR:LVL1:Request type not identified");
		else
			die("Invalid Request");
	}
	
	if(!isset($_GET['VAL']) or empty($_GET['VAL']))
	{
		if($mode_debug)
			die("ERR:LVL1:Request Value not identified");
		else
			die("Invalid Request");
	}

	if($_GET['TYP'] == "UI"){
		//Call the UI input handler
		if($mode_debug)
			die("ERR:LVL1:Methods for this features are not implemented yet.");
		else
			die("Invalid Request");
	}elseif ($_GET['TYP'] == "TEXT") {
		//Create a text handler, send the request to the chatscript server and get the response back.
		$th = new TextHandler();
		$result = $th->send($_GET['VALUE']);
		//Create a response handler, break the response, match the opcode to find right parameters and fetch the result.
		$send_string = getresultstring($result);
		$opcode = getopcode($result);
		$ResponseHandler = new ResponseHandler($opcode);
		$status = $ResponseHandler->parse();
		if($status) echo $send_string;
		else echo "Not Working";
	}else{
		if($mode_debug)
			die("ERR:LVL2:Invalid values passed with the parameters");
		else
			die("Invalid Request");
	}


?>