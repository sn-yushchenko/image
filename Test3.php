<?php
class User{
    public $db;
    //Данные для подключения базы данных
    public $host="127.0.0.1";
    public $dbname="users";
    public $user="root";
    public $pass="root";
    public function __construct()
    {
         $dbname=$this->dbname;
         $host=$this->host;
         $user=$this->user;
         $pass=$this->pass;
         $this -> db = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
    }
    public function userAdd($name,$email,$country)
    {
        $sm=$this->db->prepare("INSERT INTO users (id,user_name,user_email,user_country_id) VALUES (NULL,:name,:email,(SELECT id FROM countries WHERE country_name =:country))");
        $sm->execute(array('name' => $name,'email' => $email,'country' => $country));
        
    }
    public function userShow()
    {
        $arr=array();
        $sm=$this->db->prepare("SELECT users.*,countries.country_name FROM users LEFT JOIN countries ON users.user_country_id=countries.id");
        $sm->execute();
        while ($row = $sm->fetch(PDO::FETCH_ASSOC))
        {
            $arr[]=$row;
        }
        return $arr;
    }
    public function userRemove($email)
    {
        
        $sm=$this->db->prepare("DELETE FROM users WHERE user_email=:email");
        $sm->execute(array('email' => $email));
        
    }
     public function countryShow()
    {
        $arr=array();
        $sm=$this->db->prepare("SELECT country_name FROM countries");
        $sm->execute();
        while ($row = $sm->fetch(PDO::FETCH_ASSOC))
        {
            $arr[]=$row;
        }
        return $arr;
    }
       
}
                   
?>