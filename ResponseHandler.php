<!-- Project Mayday -->
<!-- FILE - CORE-ResponseHandler V0.1(Base:PHP) -->
<!-- Written by @Himvais on 24/05/2015 -->
<?php 
	/**
	* Response Handler class
	* Provides methods for handling a response (opcode) from texthandler class.
	*/
	include 'Curl.php';
	
	use curl;
	
	class ResponseHandler
	{
		public $opcode = "";
		public $registry = array();

		function __construct($code)
		{
			$this->opcode = $code;
			$this->registry = file('default.rci', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES );
		}

		function parse(){
			foreach ($this->registry as $entry) {
				$temp = explode(":", $entry);
				if($temp == $this->opcode){
					return true;
				}else{
					return false;
				}
			}
		}
	}
?>