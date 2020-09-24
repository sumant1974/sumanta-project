<?php
include_once 'core.php';
include_once 'php-jwt-master/src/BeforeValidException.php';
include_once 'php-jwt-master/src/ExpiredException.php';
include_once 'php-jwt-master/src/SignatureInvalidException.php';
include_once 'php-jwt-master/src/JWT.php';
use \Firebase\JWT\JWT;

class Institute
{
    private $jwt;
    public $inst_id;
    public $inst_name;
    public $inst_shortname;
    public $inst_state;
    public $inst_address;
    public $principal_name;
    public $inst_phone;
    public $inst_email;
    public $inst_website;
    public function __construct(){
       // $this->conn = $db;
		//$allusers=array();
    }
    public function getaDashboard()
    {
        if(isset($_SESSION["jwt"]))
        {
            $this->jwt=$_SESSION["jwt"];
            $url="http://localhost:1080/eduskills/api/institutes/getadashboard.php";
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
    public function getPCourses()
    {
        if(isset($_SESSION["jwt"]))
        {
            $this->jwt=$_SESSION["jwt"];
            $url="http://localhost:1080/eduskills/api/pcourses/getpcourses.php";
        $data=array("jwt"=>$this->jwt,"partner_id"=>$this->partner_id);
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
    public function getAllCourses()
    {
        if(isset($_SESSION["jwt"]))
        {
            $this->jwt=$_SESSION["jwt"];
            $url="http://localhost:1080/eduskills/api/pcourses/getallcourses.php";
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
            $url="http://localhost:1080/eduskills/api/institutes/create.php";

        $data=array("jwt"=>$this->jwt,"inst_name"=>$this->inst_name,"inst_shortname"=>$this->inst_shortname,"inst_state"=>$this->inst_state,"inst_phone"=>$this->inst_phone,"inst_website"=>$this->inst_website,"principal_name"=>$this->principal_name,"inst_address"=>$this->inst_address,"inst_email"=>$this->inst_email);
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
            $url="http://localhost:1080/eduskills/api/institutes/update.php";

        $data=array("jwt"=>$this->jwt,"inst_id"=>$this->inst_id,"inst_name"=>$this->inst_name,"inst_shortname"=>$this->inst_shortname,"inst_state"=>$this->inst_state,"inst_phone"=>$this->inst_phone,"inst_website"=>$this->inst_website,"principal_name"=>$this->principal_name,"inst_address"=>$this->inst_address,"inst_email"=>$this->inst_email);
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
            $url="http://localhost:1080/eduskills/api/institutes/delete.php";

        $data=array("jwt"=>$this->jwt,"inst_id"=>$this->inst_id);
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