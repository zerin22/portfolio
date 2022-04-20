<?php
class  Education{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    //Getting all education data based on loggedin users
    public function getAllEducation()
    {
        //Getting logged in user's user_id
        $user_id = SessionUser::getUser('user_id');

        //Getting education data for the logged in user

        $query = "SELECT * FROM `educations` WHERE `user_id` = '$user_id' ORDER BY `id` DESC";
        $result = $this->db->select($query);
        return $result;
    }

    //Create education 
    public function createEducation($data)
    {
        $title              = mysqli_real_escape_string($this->db->link, $data['education_title']);
        $institute          = mysqli_real_escape_string($this->db->link, $data['education_institute']);
        $start_date         = mysqli_real_escape_string($this->db->link, $data['education_start_date']);
        $end_date           = mysqli_real_escape_string($this->db->link, $data['education_end_date']);
        $graduation_status  = mysqli_real_escape_string($this->db->link, $data['education_graduation_status']);
        $active_status      = mysqli_real_escape_string($this->db->link, $data['education_active_status']);
        $description        = mysqli_real_escape_string($this->db->link, $data['education_description']);
        
        //Checking if required fields are empty
        if($title == "" || $institute == "" || $start_date == "" || $end_date == "" || $graduation_status == "" || $active_status == "")
        {
            $msg = "<div class='alert alert-danger text-center'>
                        Required fields can not be empty.
                    </div>";
            return $msg;
        }

        //Checking if graduation_status & active_status are neumaric
        if(!is_numeric($graduation_status) || !is_numeric($active_status))
        {
            $msg = "<div class='alert alert-danger text-center'>
                        Something went wrong. Please try again letter.
                    </div>";
            return $msg;
        }

        //Inserting data to database(educations table)
        //Getting logged in user's user_id
        $user_id = SessionUser::getUser('user_id');

        $query = "INSERT INTO `educations`
                (`title`,`user_id`,`institute`,`starting_date`,`ending_date`,`graduation_status`,`active_status`,`description`)
                VALUES
                ('$title','$user_id', '$institute','$start_date','$end_date','$graduation_status','$active_status','$description')
                ";
        $result = $this->db->insert($query);

        if($result)
        {
            $msg = "<div class='alert alert-success text-center'>
                        Education created successfully.
                    </div>";
            return $msg;
        }else{
            $msg = "<div class='alert alert-danger text-center'>
                        Unable to create_education.
                    </div>";
            return $msg;
        }
    }
    //Delete single education
    public function deleteEducation($id)
    {
        //Getting logged in user's user_id
        $user_id = SessionUser::getUser('user_id');

        //Getting education by id and user_id
        $query = "SELECT * FROM `educations` WHERE `id` = '$id' AND `user_id` = '$user_id'";

        $result = $this->db->select($query);

        if($result->num_rows > 0){
            $deletQuery = "DELETE FROM `educations` WHERE `id` = '$id' AND `user_id` = '$user_id'";
            $deleteResult = $this->db->delete($deletQuery);

            if($deleteResult)
            {
                $msg = "
                    <div class='alert alert-success text-center'>
                        Education data deleted successfully.
                    </div>";
                return $msg;
            }else{
                $msg = "
                    <div class='alert alert-danger text-center'>
                        Unable to delete education data.
                    </div>";
                return $msg;
            }
        }else{
            $msg = "
                <div class='alert alert-danger text-center'>
                    Selected education data not found!
                </div>";
            return $msg;
        }
        
    }
}
