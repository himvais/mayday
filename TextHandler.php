<!-- Project Mayday -->
<!-- FILE - CORE-TextHangler V0.1(Base:PHP) -->
<!-- Written by @Himvais on 21/05/2015 -->

<!-- this file contains the classes required to handle the input type text. -->
<!-- Text handler for the phase one just tries to communicate with the ChatScript Server and gets back the response. -->
<?php 
	/**
	* The Core class which provide methods for commuicating with the ChatScript server.
	* This file will read the parameters from the standard config ini file so we can keep everything in one place.
	*/
	class TextHandler
	{
		
		public $host = null;
		public $port = null;
		public $bot = null;
		public $null = null;
		public $botprefix = null;
		public $userprefix = null;
		public $mode_debug = null;
		public $response = null;

		function __construct()
		{
			//We want to load this things from an INI file, change it after INI helper is implemented.
			$this->host = "127.0.0.1";  //  <<<<<<<<<<<<<<<<< YOUR CHATSCRIPT SERVER IP ADDRESS GOES HERE 
			$this->port = 1024;     	  // <<<<<<< your portnumber if different from 1024
			$this->bot  = "";  		  // <<<<<<< desired botname, or "" for default bot
			$this->null = "\x00";
			$this->botprefix = "Bot: ";
			$this->userprefix = "You: ";
			$this->mode_debug = true;
			$this->response = "";
		}

		function readINIparameters($url)
		{
			//Include the library.php & read the ini file for settings here.
		}

		function send($text)
		{
			//Step1: Get user ip address
			$userip = "127.0.0.1";
			//Step2: Create a null terminated string (according to ChatScript Documentation)
			$message = $userip.$this->null.$this->bot.$this->null.$this->text.$this->null;
			//Step3: Open a socket to the ChatScript Server
			if(!$fp=fsockopen($this->host,$this->port,$errstr,$errno,300))
		    {
		        if($this->mode_debug)
		        	return "ERR:LVL5:Can't Connect to the ChatScript Server";
		        else
		        	return "Connection Terminated";
		    }
		    //Step4: Write null terminated string to the socket if it's open
		    fputs($fp,$message);
		    //Step5: Get response from the server into a variable 
		    while (!feof($fp))
			{
		        $this->response .= fgets($fp, 128);
		    }
		    //Step5: Close the socket
	        fclose($fp); 
	        //Step6: Return the response
	        return $this->response;
		}
	}
 ?>