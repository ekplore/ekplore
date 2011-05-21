<?php
/*
//Created By Arunram Kalaiselvan on 05/21/2011
//register.php
//
//API to register New User with ekplore's servers - Includes twitter connect and facebook connect
//Sends back JSON -> {"registered":"yes" "session":"<sessionKey>"}
//
//POST -> email, password, udid, nickname, fbid (optional) , fbauthtoken(optional), twitter tokens (optional - token, secret)
//
*/



include("../includes/helpers.php"); //Helper methods


class registerAPI {
	private $db;

	if($worked!=1)
	{
		sendResponse(200, 'helpers not found');
		return false;
	}
		
	function __construct(){
		$this->db = new mysqli('localhost','ekplore','Lamp55','ekplore'); 
		$this->db->autocommit(FALSE);
	}
	
	function __destruct(){
		$this->db->close();
	}

	//Check if already registered	
	function isRegistered(){
		$regcheckstmt = $this->db->prepare('SELECT active FROM user WHERE email=?');
		$regcheckstmt->bind_param("s", $_POST["email"]);
		$regcheckstmt->execute();
		$regcheckstmt->bind_result($userAlreadyRegistered);
		while($regcheckstmt->fetch()){
				break;
			}
		$regcheckstmt->close();
		return $userAlreadyRegistered;
	}
	
	//Login with the regular registration
	function registerUser(){
		if(isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["udid"]))
		{
			
			//Sanitizing the variables and hashing them for the db
			$semail=sanitize($_POST["email"]);
			$hashedemail=sha1($semail);
			$udid = sanitize($_POST["udid"]);
			
			$nickname = sanitize($_POST["nickname"]);
			$spwd=sha1(md5($hashedemail) . sanitize($_POST["password"]));

			//Creating a session key (Has to be unique to the device everytime
			$session = sha1($semail).sha1($udid).sha1.generatePassword();
			$sessionKey = sha1($session);
			
			//checking if user is registered.
			$userAlreadyRegistered = $this->isRegistered();
			
			if($userAlreadyRegistered == 1)
			{
				unset($userAlreadyRegistered);
	            sendResponse(400, 'email already registered');
	            return true;
			}
			else
			{
				$active = 1;
				
				//Look at this ---------- {}{}{}{}{}{}{}{}{}
				$reguserstmt = $this->db->query("INSERT INTO user (id, email, password, fname, lname, VALUES(null,'$semail', '$spwd', '$udid','$active', '$nickname',CURDATE(), null,'$sessionKey', '$active')");
				
				if($reguserstmt){
				$result = array(
						registered => yes,
						sessionKey => $sessionKey
						);
				sendResponse(200, json_encode($result));
				return true;
				}
				else{
					sendResponse(400, 'Could not register');
					return false;
				}
			}
		}
		else
		{
			sendResponse(400, 'Invalid username / password');
			return false;
		}
		sendResponse(400, 'Invalid request');
        return false;
	}
	
	/*
	//Login with facebook connect.
	function userLoginWithFBtoken()
	{
		if(isset["fbtoken"] && isset["udid"])
		{
			
		}
		sendResponse(400, 'Invalid Request');
		return false;
	
	}*/
	
}

// This is the first thing that gets called when this page is loaded
// Creates a new instance of the RedeemAPI class and calls the redeem method
$api = new registerAPI;
$api->registerUser();
// unset($_POST["email"]);
// unset($_POST["password"]);
?>