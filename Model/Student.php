<?php

include_once "DataBase.php";

class Student{

    public function checkStudent($email){

        $obj = new DataBase();
        $DBH =$obj->DBconnection();

        $sql="SELECT count(id) FROM `student_info` WHERE `email`=?";

        $prepared=$DBH->prepare($sql);
        $prepared->bindParam(1,$email);

        $prepared->execute();

        $result=$prepared->fetch(PDO::FETCH_COLUMN);
        if ($result=='0'){

            return true;
        }
        else{
            return false;
        }
    }

    public  function getLastId(){

        $obj = new DataBase();
        $DBH =$obj->DBconnection();

        $sql="SELECT id FROM `student_info` order by id desc limit 1";

        $prepared=$DBH->prepare($sql);
        $prepared->execute();
        $result=$prepared->fetch(PDO::FETCH_COLUMN);
        return $result;
    }
    public  function store($data){

        $obj = new DataBase();
        $DBH =$obj->DBconnection();

        $sql="INSERT INTO `student_info`(`u_id`, `full_name`, `mobile_no`, `email`, `password`, `dept`, `batch`, `session`, `shift`, `program`, `photo`, `status`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";

        $prepared=$DBH->prepare($sql);
        $prepared->bindParam(1,$data['u_id']);
        $prepared->bindParam(2,$data['full_name']);
        $prepared->bindParam(3,$data['mobile_no']);
        $prepared->bindParam(4,$data['email']);
        $prepared->bindParam(5,$data['password']);
        $prepared->bindParam(6,$data['dept']);
        $prepared->bindParam(7,$data['batch']);
        $prepared->bindParam(8,$data['session']);
        $prepared->bindParam(9,$data['shift']);
        $prepared->bindParam(10,$data['program']);
        $prepared->bindParam(11,$data['photo']);
        $prepared->bindParam(12,$data['status']);
        $prepared->execute();
    }
    public function StudentLogin($email, $password){
        $password=md5($password);

        $obj =new DataBase();
        $DBH=$obj->DBconnection();

        $sql = "SELECT * FROM `student_info` WHERE `email`='$email' AND `password`='$password'";
        $conn = $DBH->query($sql);
        $conn->setFetchMode(PDO::FETCH_ASSOC);
        $data=$conn->fetch();
        $count= $conn->rowCount();

        if ($count > 0){
            $_SESSION['u_id'] = $data['u_id'];
            $_SESSION['id'] = $data['id'];
            $_SESSION['full_name'] = $data['full_name'];
            return TRUE;
        }
        else{
            return FALSE;
        }

    }

    public function studentSidebar($email){
        $obj = new DataBase();
        $DBH =$obj->DBconnection();

        $sql="SELECT * FROM `student_info` WHERE `email`='$email'";

        $prepared=$DBH->query($sql);
        $prepared->setFetchMode(PDO::FETCH_OBJ);
        $result=$prepared->fetch();
        return $result;
    }
    public function studentRegister($std_id){
        $obj =new DataBase();
        $DBH=$obj->DBconnection();

        $sql = "SELECT * FROM `student_info` WHERE `u_id`='$std_id'";

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

    public function showAllStudent(){
        $obj = new DataBase();
        $DBH =$obj->DBconnection();

        $sql="SELECT * FROM `student_info`";

        $prepared=$DBH->prepare($sql);
        $prepared->execute();
        $result=$prepared->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function view($sessionData){
        $obj = new DataBase();
        $DBH =$obj->DBconnection();

        $sql = "SELECT * FROM `student_info` WHERE `u_id` ='$sessionData'";
        $conn = $DBH->prepare($sql);
        $conn->setFetchMode(PDO::FETCH_ASSOC);
        $conn->execute();
        $result=$conn->fetch();

        return $result;
    }

    public function setAccount($password, $reg_date, $status, $std_id){
        $obj = new DataBase();
        $DBH =$obj->DBconnection();

        $sql = "UPDATE `student_info` SET `password`= '$password',`reg_date`= '$reg_date',`status`= '$status' WHERE `u_id`= '$std_id'";
        $conn = $DBH->prepare($sql);
        $conn->execute();
    }

    public function ShowapproveRequest($u_id){
        $obj = new DataBase();
        $DBH =$obj->DBconnection();

        $sql = "SELECT borrow_books.borrow_date, borrow_books.return_date, book.book_name, book.sbn, books_category.cat_name, publisher.publisher_name, writer.writer_name FROM borrow_books, book, books_category, publisher, writer WHERE borrow_books.book_id = book.id AND book.book_cat = books_category.cat_id AND book.publisher_id = publisher.id AND book.writer_id = writer.id AND borrow_books.status = 1 AND borrow_books.u_id = '$u_id' ";
        $conn = $DBH->prepare($sql);
        $conn->setFetchMode(PDO::FETCH_OBJ);
        $conn->execute();
        $result=$conn->fetchAll();

        return $result;
    }
    public function ShowPendingRequest($u_id){
        $obj = new DataBase();
        $DBH =$obj->DBconnection();

        $sql = "SELECT borrow_books.borrow_date, borrow_books.return_date, book.book_name, book.sbn, books_category.cat_name, publisher.publisher_name, writer.writer_name FROM borrow_books, book, books_category, publisher, writer WHERE borrow_books.book_id = book.id AND book.book_cat = books_category.cat_id AND book.publisher_id = publisher.id AND book.writer_id = writer.id AND borrow_books.status = 0 AND borrow_books.u_id = '$u_id' ";
        $conn = $DBH->prepare($sql);
        $conn->setFetchMode(PDO::FETCH_OBJ);
        $conn->execute();
        $result=$conn->fetchAll();

        return $result;
    }
    public function ShowReturnList($u_id){
        $obj = new DataBase();
        $DBH =$obj->DBconnection();

        $sql = "SELECT borrow_books.submitted_date, borrow_books.borrow_date, borrow_books.return_date, borrow_books.day_exceed, borrow_books.fine, book.book_name, book.sbn, books_category.cat_name, publisher.publisher_name, writer.writer_name FROM borrow_books, book, books_category, publisher, writer WHERE borrow_books.book_id = book.id AND book.book_cat = books_category.cat_id AND book.publisher_id = publisher.id AND book.writer_id = writer.id AND borrow_books.status = 2 AND borrow_books.u_id = '$u_id' ";
        $conn = $DBH->prepare($sql);
        $conn->setFetchMode(PDO::FETCH_OBJ);
        $conn->execute();
        $result=$conn->fetchAll();

        return $result;
    }

}