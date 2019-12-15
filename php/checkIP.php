<?php 
include('connection.php');
$connections=array();
function getUserIP()
{
    // Get real visitor IP behind CloudFlare network
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
              $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
              $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}
$user_ip = getUserIP();



if($user_ip === '::1')
{ 
    include("method.php");
	//echo "localhost";
	array_push($connections,$conn1);
}
elseif($user_ip === $servername2)
{	
    echo "<h2>Akram's Server</h2>";
	array_push($connections,$conn1);
	array_push($connections,$connakram);
	/*if($connections[0]->connect_error){
		die("Connection failed with branch".$conn1->connect_error);
	}
	else{
		echo "connected with akram server";
	}*/

}
elseif($user_ip === '192.168.43.94')
{
    echo "<h2>Faisalabad</h2>";
}
?>