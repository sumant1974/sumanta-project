<?php
include_once 'core.php';
include_once 'php-jwt-master/src/BeforeValidException.php';
include_once 'php-jwt-master/src/ExpiredException.php';
include_once 'php-jwt-master/src/SignatureInvalidException.php';
include_once 'php-jwt-master/src/JWT.php';
use \Firebase\JWT\JWT;

class Partner
{
    private $jwt;
    public $partner_id;
    public $partner_name;
    public $partner_programme;
    public $partner_website;
    public $partner_programme_website;
    public function __construct(){
       // $this->conn = $db;
		//$allusers=array();
    }
    public function getDashboard()
    {
        if(isset($_SESSION["jwt"]))
        {
            $this->jwt=$_SESSION["jwt"];
            $url="http://localhost:1080/eduskills/api/partners/getdashboard.php";
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
            $url="http://localhost:1080/eduskills/api/partners/create.php";

        $data=array("jwt"=>$this->jwt,"partner_name"=>$this->partner_name,"partner_programme"=>$this->partner_programme,"partner_website"=>$this->partner_website,"partner_programme_website"=>$this->partner_programme_website);
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
            $url="http://localhost:1080/eduskills/api/partners/update.php";

        $data=array("jwt"=>$this->jwt,"partner_id"=>$this->partner_id, "partner_name"=>$this->partner_name,"partner_programme"=>$this->partner_programme,"partner_website"=>$this->partner_website,"partner_programme_website"=>$this->partner_programme_website);
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
            $url="http://localhost:1080/eduskills/api/partners/delete.php";

        $data=array("jwt"=>$this->jwt,"partner_id"=>$this->partner_id);
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