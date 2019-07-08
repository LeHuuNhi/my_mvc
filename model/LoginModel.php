<?php


class LoginModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function checkUser($username)
    {
        $stmt =$this->db->prepare("SELECT * FROM user WHERE username =?");

        $stmt->bind_param("s",$username);

        $stmt->execute();

        $result = $stmt->get_result();

        //if($result->num_rows === 0) echo 'No rows';
        $data = $result->fetch_assoc();
        $stmt->close();
        $this->db->close();
        return $data;
    }
}