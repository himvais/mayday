<!-- Project Mayday -->
<!-- FILE - CORE-ResponseHandler V0.1(Base:PHP) -->
<!-- Written by @Himvais on 24/05/2015 -->
<?php 
	/**
	* Response Handler class
	* Provides methods for handling a response (opcode) from texthandler class.
	*/
	class ResponseHandler
	{
		public $opcode = "";

		function __construct($code)
		{
			$this->opcode = $code;
		}
	}
?>