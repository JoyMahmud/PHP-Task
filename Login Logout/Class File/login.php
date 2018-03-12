<?php
require_once ('database.php');

class Login extends Database{

    public function user_login_check($data){
        $email_address = $data['email'];
        $password = md5($data['password']);
        $query = "SELECT * FROM tbl_user_signup WHERE email = '$email_address' AND password = '$password'";
        $query_result = mysqli_query($this->db_connect, $query);
        $admin_info= mysqli_fetch_assoc($query_result);

        if($admin_info){
            session_start();
            $_SESSION['user_id']    = $admin_info['user_id'];
            $_SESSION['first_name'] = $admin_info['first_name'];

            header('Location:userDashboard/userDashboard.php');
        }else{
            $message = "Your User Id and Password is Not Valid";
            return $message;
        }
    }

    public function user_logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['first_name']);
        header('Location: ../login.php');
    }

}