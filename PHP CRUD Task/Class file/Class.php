<?php
require_once ('database.php');

class Service extends Database
{
    protected $uploadFilePath;

    function __construct()
    {
        parent::__construct();
        $this->uploadFilePath = $_SERVER["DOCUMENT_ROOT"].'/TanvirPhotograpy/';
    }

    /*insert service information into database*/
    public function save_service_info($data)
    {
        $img_url = $this->save_service_picture(); /*this line for calling a logo function*/
        $query = "INSERT INTO tbl_service (service_type, service_picture, publication_status)" . "VALUES('$data[service_type]', '$img_url', '$data[publication_status]')";
        if ($this->db_connect->query($query))
        {
            $message = "Service Information Save Successfully!";
            return $message;
        } else
        {
            die("Query Problem! " . mysqli_error($this->db_connect));
        }
    }
    
    /*all service view in admin panel*/
    public function all_service_for_admin()
    {
        $query = "SELECT * FROM tbl_service ORDER BY service_id DESC ";
        if($query_result = $this->db_connect->query($query)){
            return $query_result;
        }else{
            die("Query Problem! ".mysqli_error($this->db_connect));
        }
    }

    /*edit service in admin panel*/
    public function edit_service_by_id($id)
    {
        $query = "SELECT * FROM tbl_service WHERE service_id='$id'";
        if($query_result = $this->db_connect->query($query))
        {
            return $query_result;
        }else {
            die("Query Problem! ".mysqli_error($this->db_connect));
        }
    }


    /*update service*/
    public function update_service_info($data)
    {
        if($_FILES['service_picture']['name'])
        {
            //$this->imageUnlink($data);/*this code for image delete(unlink) from the folder*/
            $img_url = $this->save_service_picture(); /*this code for calling a image function*/

            $query = "UPDATE tbl_service SET service_type='$data[service_type]', service_picture='$img_url', publication_status='$data[publication_status]' WHERE service_id='$data[service_id]'";
            if ($this->db_connect->query($query))
            {
                session_start();
                $_SESSION['message'] = "Service Updated Successfully!";
                header('Location: manage_service.php');
            } else {
                die("Query Problem! " . mysqli_error($this->db_connect));
            }
        }else{
            $query = "UPDATE tbl_service SET service_type='$data[service_type]', publication_status='$data[publication_status]' WHERE service_id='$data[service_id]'";
            if ($this->db_connect->query($query))
            {
                session_start();
                $_SESSION['message'] = "Service Information Updated Successfully!!";
                header('Location: manage_service.php');
            } else {
                die("Query Problem! " . mysqli_error($this->db_connect));
            }
        }
    }

    /*Delete Logo*/
    public function delete_service_info($id)
    {
        $query = "DELETE FROM tbl_service WHERE service_id='$id'";
        if($this->db_connect->query($query))
        {
            $message = "Service Information Deleted Successfully!";
            return $message;
        }else{
            die("Query Problem! ".mysqli_error($this->db_connect));
        }
    }


    /*this function for image uploaded */
    public function save_service_picture()
    {
        $image_extensions_allowed = array("gif", "jpeg", "jpg", "png");
        $file_name = $_FILES["service_picture"]["name"];
        $ext = strtolower(substr(strrchr($file_name, "."), 1));
        $directory = $this->uploadFilePath.'Frontend/assets/images/service/';
        $target = $directory . basename( $file_name) ;
        $image_name     = basename($file_name);
        $new_img_url    = $image_name;
        $image_size = $_FILES['service_picture']['size'];
        $new_logo_url    = $directory.$file_name;

        if (!empty($_FILES))
        {
            if ($image_size > 5000000)
            {
                die('File size is too large! Please upload Small file.');
            } elseif(!in_array($ext, $image_extensions_allowed))
            {
                die("You must upload a file with one of the following extensions: ".$ext);
            } elseif (file_exists($new_logo_url))
            {
                die("The file Already exit.Please Upload Another One");
            }
            else
            {
                //Now upload here
                if(move_uploaded_file($_FILES['service_picture']['tmp_name'], $target))
                {
                    return $new_img_url;
                }
                else
                {
                    die('Sorry, there was a problem uploading your file.');
                }
            }
        } else
        {
            die('The file you Upload is not an image! Please upload a Valid Image.');
        }

    }


}