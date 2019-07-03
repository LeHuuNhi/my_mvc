<?php


class student_model extends Model
{
    public function __construct()
    {

        parent::__construct();
    }

    public function listOfStudents()
    {
        $stmt =$this->db->prepare("SELECT * FROM students_management ");


        $stmt->execute();

        $result = $stmt->get_result();

        //if($result->num_rows === 0) echo 'No rows';
        while($row = $result->fetch_assoc()) {

            $data[] = $row;
        }
        return $data;
        $stmt->close();
        $this->db->close();
    }

    public function creatStudent($name,$birthdate)
    {
        $stmt =$this->db->prepare("INSERT INTO students_management (student_name, student_birthdate) 
        VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $birthdate);
        $stmt->execute();
        $stmt->close();
        $this->db->close();
    }

    public function datailOfStudent($id)
    {
        $stmt =$this->db->prepare("SELECT * FROM students_management WHERE student_id =?");

        $stmt->bind_param("i",$id);

        $stmt->execute();

        $result = $stmt->get_result();

        //if($result->num_rows === 0) echo 'No rows';
        $data = $result->fetch_assoc();
        return $data;
        $stmt->close();
        $this->db->close();
    }

    public function updateStudent($id,$name,$birthdate)
    {
        $stmt =$this->db->prepare("UPDATE students_management SET student_name=?,student_birthdate=? WHERE student_id=?");
        $stmt->bind_param("ssi", $name, $birthdate,$id);
        $stmt->execute();
        $stmt->close();
        $this->db->close();
    }

    public function deleteStudent($id)
    {
        $stmt =$this->db->prepare("DELETE FROM students_management WHERE student_id =?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $stmt->close();
        $this->db->close();
    }
}