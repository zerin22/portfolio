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
}
