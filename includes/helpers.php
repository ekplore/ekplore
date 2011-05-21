<?php
/*
//Created By Arunram Kalaiselvan on 04/26/2011
//helpers.php
//
//Helper classes for the API
//
*/

// Helper method to get a string description for an HTTP status code
// From http://www.gen-x-design.com/archives/create-a-rest-api-with-php/ 

$worked=1;

function getStatusCodeMessage($status)
{
    // these could be stored in a .ini file and loaded
    // via parse_ini_file()... however, this will suffice
    // for an example
    $codes = Array(
        100 => 'Continue',
        101 => 'Switching Protocols',
        200 => 'OK',
        201 => 'Created',
        202 => 'Accepted',
        203 => 'Non-Authoritative Information',
        204 => 'No Content',
        205 => 'Reset Content',
        206 => 'Partial Content',
        300 => 'Multiple Choices',
        301 => 'Moved Permanently',
        302 => 'Found',
        303 => 'See Other',
        304 => 'Not Modified',
        305 => 'Use Proxy',
        306 => '(Unused)',
        307 => 'Temporary Redirect',
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        406 => 'Not Acceptable',
        407 => 'Proxy Authentication Required',
        408 => 'Request Timeout',
        409 => 'Conflict',
        410 => 'Gone',
        411 => 'Length Required',
        412 => 'Precondition Failed',
        413 => 'Request Entity Too Large',
        414 => 'Request-URI Too Long',
        415 => 'Unsupported Media Type',
        416 => 'Requested Range Not Satisfiable',
        417 => 'Expectation Failed',
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        502 => 'Bad Gateway',
        503 => 'Service Unavailable',
        504 => 'Gateway Timeout',
        505 => 'HTTP Version Not Supported',
        506 => 'Higher Security Clearance Required'
    );

    return (isset($codes[$status])) ? $codes[$status] : '';
}

// Helper method to send a HTTP response code/message
function sendResponse($status = 200, $body = '', $content_type = 'text/html')
{
    $status_header = 'HTTP/1.1 ' . $status . ' ' . getStatusCodeMessage($status);
    header($status_header);
    header('Content-type: ' . $content_type);
    echo $body;
}

function generatePassword($length=5) 
	{
		$vowels = 'aeiouyACEUY'; $consonants = 'bdghjmnwpqrstvzBDGHJLMNWKPQRSTVWXZ23456789@#$%';
		$password = '';
		$alt = time() % 2;
		for ($i = 0; $i < $length; $i++) 
		{
			if ($alt == 1) 
			{
				$password .= $consonants[(rand() % strlen($consonants))];
				$alt = 0;
			} 
			else 
			{
			$password .= $vowels[(rand() % strlen($vowels))];
			$alt = 1;
			}
		}
		return $password;
	}
	
function sanitize($data) {
		global $mysql_conn;
		$data = trim($data);
		if(get_magic_quotes_gpc()) {
			$data = stripslashes($data);
		}
		
					$host="sqlhost.looneydoodle.com";
					$password="gamelab";
					$username="socialgamelab";
					$mysql_conn = mysql_connect("$host","$username","$password");
					if (!$mysql_conn)
						die('Could not connect: ' . mysql_error());
					mysql_select_db('moveitgame',$mysql_conn);
		$data = mysql_real_escape_string($data,$mysql_conn);
		return $data;
	}
	
//Helper Methods End Here
?>