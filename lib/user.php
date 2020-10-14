<?php
include_once 'core.php';
include_once 'php-jwt-master/src/BeforeValidException.php';
include_once 'php-jwt-master/src/ExpiredException.php';
include_once 'php-jwt-master/src/SignatureInvalidException.php';
include_once 'php-jwt-master/src/JWT.php';
use \Firebase\JWT\JWT;

class User
{
    private $jwt;
    public $user_id;
    public $user_pass;
    public $user_recovery_mobile;
    public $firstname;
    public $lastname;
    public $role_id;
    public $inst_id;
    public $alternate_email;
     public $allusers;
    public function __construct(){
       // $this->conn = $db;
		//$allusers=array();
    }
    public function getUsers()
    {
        if(isset($_SESSION["jwt"]))
        {
            $this->jwt=$_SESSION["jwt"];
            $url="http://localhost:1080/eduskills/api/users/getusers.php";
        $data=array("jwt"=>$this->jwt);
        //echo $url.$data['user_id'];
        $result=$this->callAPI($url,json_encode($data));
       /* curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_URL, $url);
        $result=curl_exec($curl);
        curl_close($curl);*/
        //echo $result;
        if(!$result){die("Connection Failure");}
        $result=json_decode($result);
        return $result;
        }
    }
    public function create()
    {
        if(isset($_SESSION["jwt"]))
        {
            $this->jwt=$_SESSION["jwt"];
            $url="http://localhost:1080/eduskills/api/users/create.php";

        $data=array("jwt"=>$this->jwt,"user_id"=>$this->user_id,"user_pass"=>$this->user_pass,"user_recovery_mobile"=>$this->user_recovery_mobile,"firstname"=>$this->firstname,"lastname"=>$this->lastname,"role_id"=>$this->role_id,"inst_id"=>$this->inst_id,"alternate_email"=>$this->alternate_email);
        //echo $url.$data['user_id'];
        $result=$this->callAPI($url,json_encode($data));
       /* curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_URL, $url);
        $result=curl_exec($curl);
        curl_close($curl);*/
        print_r($result);
        if(!$result){die("Connection Failure");}
        $result=json_decode($result);
        return $result;
        }
        
    }
    public function update()
    {
        if(isset($_SESSION["jwt"]))
        {
            $this->jwt=$_SESSION["jwt"];
            $url="http://localhost:1080/eduskills/api/users/update.php";

        $data=array("jwt"=>$this->jwt,"user_id"=>$this->user_id,"user_pass"=>$this->user_pass,"user_recovery_mobile"=>$this->user_recovery_mobile,"spoc_id"=>$this->spoc_id,"firstname"=>$this->firstname,"lastname"=>$this->lastname,"role_id"=>$this->role_id,"inst_id"=>$this->inst_id,"alternate_email"=>$this->alternate_email);
        //echo $url.$data['user_id'];
        $result=$this->callAPI($url,json_encode($data));
       /* curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_URL, $url);
        $result=curl_exec($curl);
        curl_close($curl);
        print_r($result);*/
        if(!$result){die("Connection Failure");}
        $result=json_decode($result);
        return $result;
        }
        
    }
    public function delete()
    {
        if(isset($_SESSION["jwt"]))
        {
            $this->jwt=$_SESSION["jwt"];
            $url="http://localhost:1080/eduskills/api/users/delete.php";

        $data=array("jwt"=>$this->jwt,"user_id"=>$this->user_id);
        //echo $url.$data['user_id'];
        $result=$this->callAPI($url,json_encode($data));
       /* curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_URL, $url);
        $result=curl_exec($curl);
        curl_close($curl);
        print_r($result);*/
        if(!$result){die("Connection Failure");}
        $result=json_decode($result);
        return $result;
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
     
}
?>