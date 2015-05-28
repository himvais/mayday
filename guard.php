<?php 
	 Class Guard{
		

		function __construct(){
		}

		function clean_text($text){
			$text = trim($text);
			if(empty($text)) die("<h1>Don't try to hack nigga!!!</h1>");
			if(strlen($text)== 0 )header('location:index.php');
			if($text == "") header('location:index.php');
			if($text == " ")header('location:index.php'); 
            	 	$final = preg_replace("/[^A-Za-z0-9]/", '', $text);
            	 	if(!$final) header ('location:index.php');
            	 	else return $final;
		}

		function clean_number($num){
		if($num == null)header('location:index.php');
		if(empty($num)) header('location:index.php');
			else return preg_replace('/\D/', '', $num);
		}

		function clean_get($get){
			foreach($get as &$stuff ) {
                if( is_array( $stuff ) ) {
                    foreach( $stuff as $thing ) {
                         $thing = $this->clean_number($thing);
                    }
                } else {
                     $stuff= $this->clean_number($stuff);
                }
        	}
        	return $get;
		}


		function clean_post($post){
 			foreach($post as &$stuff ) {
		                if( is_array( $stuff ) ) {
		                    foreach( $stuff as &$thing ) {
		                         $thing = $this->clean_text($thing);
		                    }
		                } else {
		                     $stuff = $this->clean_text($stuff);
		                }
		        }
		        return $post;
	 	}
	}
?>