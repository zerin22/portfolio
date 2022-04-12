<?php 

class Setting{
    private $db;

    //Autommiti call __construct function when object is created of this class
    public function __construct()
    {
        $this->db = new Database();
    }

    //Updating general settings
    public function updateGneralSettings($data)
    {
        $data['site_title']  = mysqli_real_escape_string($this->db->link, $data['site_title']);
        $data['site_slogan'] = mysqli_real_escape_string($this->db->link, $data['site_slogan']);
        
        foreach($data as $key=>$value)
        {
            //SQL TRANSACTION PROCEDURE SHOULD BE WORK WITH TRY AND CATCH
            if($key != 'generalSettings')
            {
                $query = "SELECT * FROM `settings` WHERE `key` = '$key'";
                $result = $this->db->select($query);  
            }
            
            if($result){
                $query = "UPDATE `settings`
                          SET 
                          `value` = '$value'
                          WHERE `key` = '$key'
                ";
                $result = $this->db->update($query);
            }else{
                $msg = "<div class='alert alert-danger text-center'>
                            Invalid settings!
                        </div>";
                return $msg;
            }
        }

        $msg = "<div class='alert alert-success text-center'>
                    General settings Successfully Updated!!
                </div>";
                return $msg;
    }
}