<?php
require_once ('database.php');

class Signup extends Database{

    public function save_userSignup_info($data){
        $password = md5($data['password']);
        $confirm_password = md5($data['Confirm']);

        if($password==$confirm_password){
            $query = "INSERT INTO tbl_user_signup (first_name, last_name, email, password, Confirm)"
                ."VALUES('$data[first_name]', '$data[last_name]', '$data[email]', '$password', '$confirm_password')";

            if(mysqli_query($this->db_connect, $query)){
                $message = "User Information Save Successfully!";
                return $message;

            }else{
                die("Query Problem! ".mysqli_error($this->db_connect));
            }
        }else{
            $message = "Password is Not Matched! Please Insert a Match Password!";
            return $message;
        }

    }

}