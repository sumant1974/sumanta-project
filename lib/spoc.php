<?php
include_once 'core.php';
include_once 'php-jwt-master/src/BeforeValidException.php';
include_once 'php-jwt-master/src/ExpiredException.php';
include_once 'php-jwt-master/src/SignatureInvalidException.php';
include_once 'php-jwt-master/src/JWT.php';
use \Firebase\JWT\JWT;

class Spoc
{
    private $jwt;
    public $spoc_id;
    public $inst_id;
    public $spoc_firstname;
    public $spoc_lastname;
    public $spoc_mobile;
    public $spoc_email;
    public $spoc_alternate_mobile;
    public $spoc_alternate_email;
    public function __construct(){
       // $this->conn = $db;
		//$allusers=array();
    }
    public function getSpocs()
    {
        if(isset($_SESSION["jwt"]))
        {
            $this->jwt=$_SESSION["jwt"];
            $url="http://localhost:1080/eduskills/api/spocs/getispocs.php";
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
            $url="http://localhost:1080/eduskills/api/spocs/create.php";

        $data=array("jwt"=>$this->jwt,"spoc_firstname"=>$this->spoc_firstname,"spoc_lastname"=>$this->spoc_lastname,"inst_id"=>$this->inst_id,"spoc_mobile"=>$this->spoc_mobile,"spoc_email"=>$this->spoc_email,"spoc_alternate_email"=>$this->spoc_alternate_email,"spoc_alternate_mobile"=>$this->spoc_alternate_mobile);
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
            $url="http://localhost:1080/eduskills/api/spocs/update.php";

        $data=array("jwt"=>$this->jwt,"spoc_firstname"=>$this->spoc_firstname,"spoc_lastname"=>$this->spoc_lastname,"inst_id"=>$this->inst_id,"spoc_id"=>$this->spoc_id,"spoc_mobile"=>$this->spoc_mobile,"spoc_email"=>$this->spoc_email,"spoc_alternate_email"=>$this->spoc_alternate_email,"spoc_alternate_mobile"=>$this->spoc_alternate_mobile);
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
            $url="http://localhost:1080/eduskills/api/spocs/delete.php";

        $data=array("jwt"=>$this->jwt,"spoc_id"=>$this->spoc_id);
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