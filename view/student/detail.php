<?php
if (count($this->row) > 0) :
    $student = $this->row;
    echo "Information of student :"."</br>".
        "Name :".$student['student_name']."</br>".
        "Birthdate :".$student['student_birthdate'];

endif;
?>
