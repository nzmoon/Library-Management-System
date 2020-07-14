<?php

include_once "DataBase.php";

class Admin
{
    public function adminLogin($email, $password){
        $obj =new DataBase();
        $DBH=$obj->DBconnection();

        $sql = "SELECT * FROM `admin` WHERE `email`= '$email' AND `password`= '$password'";

        $conn = $DBH->query($sql);
        $conn->setFetchMode(PDO::FETCH_ASSOC);
        $conn->fetchAll();
        $count= $conn->rowCount();

        if ($count > 0){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

    public function requisition(){
        $obj =new DataBase();
        $DBH=$obj->DBconnection();

        $sql = "SELECT teachers_requisition.requisition_id, teachers_requisition.u_id, teachers_requisition.book_name, teachers_requisition.book_category, teachers_requisition.writer_name, teachers_requisition.publishing_year, teachers_requisition.publisher_name, teachers_requisition.description, teachers_info.full_name FROM teachers_requisition, teachers_info WHERE teachers_requisition.u_id = teachers_info.u_id AND teachers_requisition.status= 0 ";

        $conn = $DBH->prepare($sql);
        $conn->execute();
        $all=$conn->fetchAll(PDO::FETCH_OBJ);
        return $all;
    }

    public function updaterequisition($requisition_id,$u_id){
        $obj =new DataBase();
        $DBH=$obj->DBconnection();

        $sql = "UPDATE `teachers_requisition` SET `status`=1 WHERE `requisition_id`='$requisition_id' AND `u_id`='$u_id'";
        $conn = $DBH->prepare($sql);
        $conn->execute();

    }

    public function countRequisition(){
        $obj = new DataBase();
        $DBH=$obj->DBconnection();

        $sql = "SELECT COUNT(*) FROM teachers_requisition WHERE `status`=0 ";
        $conn = $DBH->prepare($sql);
        $conn->execute();
        $all= $conn->fetch(PDO::FETCH_COLUMN);

        return $all;
    }
    public function bookReturn($borrow_id,$u_id){
        $obj = new DataBase();
        $DBH=$obj->DBconnection();

        $sql = "UPDATE `borrow_books` SET `status`=2 WHERE `borrow_id`='$borrow_id' AND `u_id`='$u_id'";
        $conn= $DBH->prepare($sql);
        $conn->execute();
    }

    public function returnList(){
        $obj = new DataBase();
        $DBH=$obj->DBconnection();

        $sql = "SELECT borrow_books.borrow_id, borrow_books.u_id, borrow_books.borrow_date, borrow_books.return_date, borrow_books.submitted_date, borrow_books.day_exceed, borrow_books.fine, student_info.full_name, book.book_name FROM borrow_books, student_info, book WHERE borrow_books.u_id = student_info.u_id AND borrow_books.book_id = book.id AND borrow_books.status = 2 UNION SELECT borrow_books.borrow_id, borrow_books.u_id, borrow_books.borrow_date, borrow_books.return_date, borrow_books.submitted_date, borrow_books.day_exceed, borrow_books.fine, teachers_info.full_name, book.book_name FROM borrow_books, teachers_info, book WHERE borrow_books.u_id = teachers_info.u_id AND borrow_books.book_id = book.id AND borrow_books.status = 2 ";
        $conn= $DBH->prepare($sql);
        $conn->execute();
        $all=$conn->fetchAll(PDO::FETCH_OBJ);
        return $all;
    }

    public function logout(){
        $_SESSION['email'] = "";
        return true;
    }
}