<?php
class Database{
    protected $db_connect;

    public function __construct(){
        $host_name = 'localhost';
        $user_name = 'root';
        $password  = '';
        $db_name   ='db_car_bikroy_mela';

        $this->db_connect = mysqli_connect($host_name, $user_name, $password, $db_name);
        if (!$this->db_connect){
            die('Connection Fail! '.mysqli_error($this->db_connect));
        }
    }

}

?>