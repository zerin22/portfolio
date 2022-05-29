<?php
// include composer autoload
require 'vendor/autoload.php';
// import the Intervention Image Manager Class
use Intervention\Image\ImageManager;

class  Client{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    //Getting all education data based on loggedin users
    public function getAllclient()
    {
        //Getting logged in user's user_id
        $user_id = SessionUser::getUser('user_id');

        //Getting education data for the logged in user

        $query = "SELECT * FROM `clients` WHERE `user_id` = '$user_id' ORDER BY `id` DESC";
        $result = $this->db->select($query);
        return $result;
    }

    //Create education 
    public function createClient($data, $file)
    {
        $title              = mysqli_real_escape_string($this->db->link, $data['client_title']);
        $active_status      = mysqli_real_escape_string($this->db->link, $data['client_active_status']);
        $description        = mysqli_real_escape_string($this->db->link, $data['client_description']);
        
        //Checking if required fields are empty
        if($title == "" || $active_status == "")
        {
            $msg = "<div class='alert alert-danger text-center'>
                        Required fields can not be empty.
                    </div>";
            return $msg;
        }

        //Checking if active_status are neumaric
        if(!is_numeric($active_status))
        {
            $msg = "<div class='alert alert-danger text-center'>
                        Something went wrong. Please try again letter.
                    </div>";
            return $msg;
        }

        
        //Processing client' image
        $image_name = $file['client_image']['name'];
        $image_size = $file['client_image']['size'];
        // $image_temp = $file['client_image']['tmp_name'];
        // $image_type = $file['client_image']['type'];

        

        if($image_name != "")
        {
            $allowed = array(
                "jpg"  => "image/jpg", 
                "jpeg" => "image/jpeg",
                "gif"  => "image/gif", 
                "png"  => "image/png"
            );

            // CHECKING ALOWED OR VAID FILE EXTENTION TYPE
            $ext = pathinfo($image_name, PATHINFO_EXTENSION);
            if(!array_key_exists($ext, $allowed))
            {
                $msg = "
                    <div class='alert alert-danger mt-3 text-center'>
                        <h4>Only jpg/jpeg/png/gif file type is allowed!</h4>
                    </div>
                ";
                return $msg;
            }

             //CHECKING FILE SIZE
            if($image_size > 1048567)
            {
                $msg = "
                    <div class='alert alert-danger mt-3 text-center'>
                        <h4>Image Size should be less then 1MB!</h4>
                    </div>
                ";
                return $msg;
            }

            //Generating unique image name
            $imageName = str_shuffle(time()).'.'.$ext;

            // create an image manager instance with favored driver (gd=Graphics Driver)
            $manager = new ImageManager(['driver' => 'gd']);

            // to finally create image instances
            $image = $manager->make($file["client_image"]["tmp_name"])->resize(200, 200);

            //Checking directory
            $dir = "assets/img/clients/";
            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }

            //Inserting data to database(educations table)
            //Getting logged in user's user_id
            $user_id = SessionUser::getUser('user_id');

            $query = "INSERT INTO `clients`
                    (`title`,`user_id`,`image`,`active_status`,`description`)
                    VALUES
                    ('$title','$user_id', '$imageName','$active_status','$description')
                    ";
            $result = $this->db->insert($query);

            if($result)
            {
                //Finally moving the image to directory
                $image->save($dir.$imageName);

                $msg = "<div class='alert alert-success text-center'>
                            Client created successfully.
                        </div>";
                return $msg;
            }else{
                $msg = "<div class='alert alert-danger text-center'>
                            Unable to create client.
                        </div>";
                return $msg;
            }
        }else{
            $imageName = 'default-client.jpg';

            //Inserting data to database(educations table)
            //Getting logged in user's user_id
            $user_id = SessionUser::getUser('user_id');

            $query = "INSERT INTO `clients`
                    (`title`,`user_id`,`image`,`active_status`,`description`)
                    VALUES
                    ('$title','$user_id', '$imageName','$active_status','$description')
                    ";
            $result = $this->db->insert($query);

            if($result)
            {
                $msg = "<div class='alert alert-success text-center'>
                            Client created successfully.
                        </div>";
                return $msg;
            }else{
                $msg = "<div class='alert alert-danger text-center'>
                            Unable to create client.
                        </div>";
                return $msg;
            }
        }
    }

    //Delete single education
    public function deleteClient($id)
    {
        //Getting logged in user's user_id
        $user_id = SessionUser::getUser('user_id');

        //Getting education by id and user_id
        $query = "SELECT * FROM `clients` WHERE `id` = '$id' AND `user_id` = '$user_id'";

        $result = $this->db->select($query);
        
        if($result != NULL){
            $data = $result->fetch_assoc();
            $oldImage = $data['image'];

            $deletQuery = "DELETE FROM `clients` WHERE `id` = '$id' AND `user_id` = '$user_id'";
            $deleteResult = $this->db->delete($deletQuery);

            if($deleteResult)
            {
                
                if (file_exists('assets/img/clients/'.$oldImage)) {
                   if($oldImage != 'default-client.jpg'){
                        unlink('assets/img/clients/'.$oldImage);
                   }
                }

                $msg = "
                    <div class='alert alert-success text-center'>
                        Client data deleted successfully.
                    </div>";
                return $msg;
            }else{
                $msg = "
                    <div class='alert alert-danger text-center'>
                        Unable to delete client data.
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

    //Get single education for showing edit data on edit form
    public function getClient($id)
    {
        //Getting logged in user's user_id
        $user_id = SessionUser::getUser('user_id');

        $query = "SELECT * FROM `clients` WHERE `id` = '$id' AND `user_id` = '$user_id'";
        $result =$this->db->select($query);
        return $result;
    }

    //Create education 
    public function editClient($id, $data, $file)
    {
        $title              = mysqli_real_escape_string($this->db->link, $data['client_title']);
        $active_status      = mysqli_real_escape_string($this->db->link, $data['client_active_status']);
        $description        = mysqli_real_escape_string($this->db->link, $data['client_description']);
        
        //Checking if required fields are empty
        if($title == "" || $active_status == "")
        {
            $msg = "<div class='alert alert-danger text-center'>
                        Required fields can not be empty.
                    </div>";
            return $msg;
        }

        //Checking if active_status are neumaric
        if(!is_numeric($active_status))
        {
            $msg = "<div class='alert alert-danger text-center'>
                        Something went wrong. Please try again letter.
                    </div>";
            return $msg;
        }

        
        //Processing client' image
        $image_name = $file['client_image']['name'];
        $image_size = $file['client_image']['size'];
        // $image_temp = $file['client_image']['tmp_name'];
        // $image_type = $file['client_image']['type'];

        

        if($image_name != "")
        {
            $allowed = array(
                "jpg"  => "image/jpg", 
                "jpeg" => "image/jpeg",
                "gif"  => "image/gif", 
                "png"  => "image/png"
            );

            // CHECKING ALOWED OR VAID FILE EXTENTION TYPE
            $ext = pathinfo($image_name, PATHINFO_EXTENSION);
            if(!array_key_exists($ext, $allowed))
            {
                $msg = "
                    <div class='alert alert-danger mt-3 text-center'>
                        <h4>Only jpg/jpeg/png/gif file type is allowed!</h4>
                    </div>
                ";
                return $msg;
            }

             //CHECKING FILE SIZE
            if($image_size > 1048567)
            {
                $msg = "
                    <div class='alert alert-danger mt-3 text-center'>
                        <h4>Image Size should be less then 1MB!</h4>
                    </div>
                ";
                return $msg;
            }

            //Generating unique image name
            $imageName = str_shuffle(time()).'.'.$ext;

            // create an image manager instance with favored driver (gd=Graphics Driver)
            $manager = new ImageManager(['driver' => 'gd']);

            // to finally create image instances
            $image = $manager->make($file["client_image"]["tmp_name"])->resize(200, 200);

            //Checking directory
            $dir = "assets/img/clients/";
            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }

            //Inserting data to database(educations table)
            //Getting logged in user's user_id
            $user_id = SessionUser::getUser('user_id');

            $query = "UPDATE `clients`
                      SET
                      `title` = '$title',
                      `image` = '$imageName',
                      `active_status` = '$active_status',
                      `description` = '$description'
                      WHERE `id` = '$id' AND `user_id` = '$user_id'
                      ";
            $result = $this->db->update($query);

            if($result)
            {

                //Getting client by id and user_id
                $getClientQuery = "SELECT * FROM `clients` WHERE `id` = '$id' AND `user_id` = '$user_id'";

                $getClientResult = $this->db->select($getClientQuery);
                
                if($getClientResult != NULL){
                    $getClientData = $getClientResult->fetch_assoc();
                    $oldImage = $getClientData['image'];

                    //Removing old image
                    if (file_exists('assets/img/clients/'.$oldImage)) {
                        if($oldImage != 'default-client.jpg'){
                             unlink('assets/img/clients/'.$oldImage);
                        }
                     }
                }
                //Finally moving the image to directory
                $image->save($dir.$imageName);

                $msg = "<div class='alert alert-success text-center'>
                            Client updated successfully.
                        </div>";
                return $msg;
            }else{
                $msg = "<div class='alert alert-danger text-center'>
                            Unable to update client.
                        </div>";
                return $msg;
            }
        }else{
            //Updating data to database(clients table)
            //Getting logged in user's user_id
            $user_id = SessionUser::getUser('user_id');

            $query = "UPDATE `clients`
                      SET
                      `title` = '$title',
                      `active_status` = '$active_status',
                      `description` = '$description'
                      WHERE `id` = '$id' AND `user_id` = '$user_id'
                      ";
            $result = $this->db->update($query);

            if($result)
            {
                $msg = "<div class='alert alert-success text-center'>
                            Client updated successfully.
                        </div>";
                return $msg;
            }else{
                $msg = "<div class='alert alert-danger text-center'>
                            Unable to update client.
                        </div>";
                return $msg;
            }
        }
    }
}
