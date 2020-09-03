<?php
include_once 'core.php';
include_once 'php-jwt-master/src/BeforeValidException.php';
include_once 'php-jwt-master/src/ExpiredException.php';
include_once 'php-jwt-master/src/SignatureInvalidException.php';
include_once 'php-jwt-master/src/JWT.php';
use \Firebase\JWT\JWT;

class Auth
{
    private $jwt;
    private $msg;
    private $user_id;
    private $role_id;
    private $inst_id;
    private $firstname;
    private $lastname;
    public function __construct(){
       // $this->conn = $db;
		//$allusers=array();
    }
    public function login($user_id,$user_pass)
    {
        
       // $curl=curl_init();
       
        $url="http://localhost:1080/eduskills/api/login.php";
        $data=array("user_id"=>$user_id,"user_pass"=>$user_pass);
        //echo $url.$data['user_id'];
        $result=$this->callAPI($url,json_encode($data));
       /* curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_URL, $url);
        $result=curl_exec($curl);
        curl_close($curl);*/
        //echo $result;
        if(!$result){die("Connection Failure");}
        $jwtarray=json_decode($result,true);
        //echo $jwtarray["jwt"];
        if($jwtarray["success"]=="1")
        {
            $this->jwt=$jwtarray["jwt"];
            $_SESSION["jwt"]=$this->jwt;
            return 1;
        }
        else
        {
            return 0;
        }
       
       
    }
    public function getUser()
    {
        if(isset($_SESSION["jwt"]))
        {
            $this->jwt=$_SESSION["jwt"];
            // decode jwt
            $decoded = JWT::decode($this->jwt, $GLOBALS['key'], array('HS256'));
 
            // set user property values here
		    $this->firstname = $decoded->data->firstname;
		    $this->lastname = $decoded->data->lastname;
		    $this->inst_id = $decoded->data->inst_id;
		    $this->user_id = $decoded->data->user_id;
            $this->role_id = $decoded->data->role_id;
            $userinfo=array("firstname"=>$this->firstname,"lastname"=>$this->lastname,"inst_id"=>$this->inst_id,"role_id"=>$this->role_id,"user_id"=>$this->user_id);
            return $userinfo;
        }
    }
    private function callAPI($url, $data){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);

       // print_r($result);
        curl_close($ch);
        return $result;
     }
     public function logout()
     { 
            session_destroy();
            header('Location: /pages/auth/login.php');
     }
}
?>