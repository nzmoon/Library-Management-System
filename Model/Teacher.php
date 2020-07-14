<?php
include_once "DataBase.php";

class Teacher{
    public function checkTeacher($email){

        $obj = new DataBase();
        $DBH =$obj->DBconnection();

        $sql="SELECT count(id) FROM `teachers_info` WHERE `email`=?";

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

        $sql="SELECT id FROM `teachers_info` order by id desc limit 1";

        $prepared=$DBH->prepare($sql);
        $prepared->execute();
        $result=$prepared->fetch(PDO::FETCH_COLUMN);
        return $result;
    }
    public  function store($data){

        $obj = new DataBase();
        $DBH =$obj->DBconnection();

        $sql="INSERT INTO `teachers_info`(`u_id`, `full_name`, `mobile_no`, `email`, `password`, `dept`, `joining_date`, `photo`, `status`) VALUES (?,?,?,?,?,?,?,?,?)";

        $prepared=$DBH->prepare($sql);
        $prepared->bindParam(1,$data['teachers_id']);
        $prepared->bindParam(2,$data['full_name']);
        $prepared->bindParam(3,$data['mobile_no']);
        $prepared->bindParam(4,$data['email']);
        $prepared->bindParam(5,$data['password']);
        $prepared->bindParam(6,$data['dept']);
        $prepared->bindParam(7,$data['joining_date']);
        $prepared->bindParam(8,$data['photo']);
        $prepared->bindParam(9,$data['status']);
        $prepared->execute();
    }

    public function TeacherRegister($id){
        $obj =new DataBase();
        $DBH=$obj->DBconnection();

        $sql = "SELECT * FROM `teachers_info` WHERE `u_id` = '$id'";
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

    public function TeacherLogin($email, $password){
        $obj =new DataBase();
        $DBH=$obj->DBconnection();

        $password=md5($password);

        $sql = "SELECT * FROM `teachers_info` WHERE `email`='$email' AND `password`='$password'";
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
    public function teacherSidebar($email){
        $obj = new DataBase();
        $DBH =$obj->DBconnection();

        $sql="SELECT * FROM `teachers_info` WHERE `email`='$email'";

        $prepared=$DBH->query($sql);
        $prepared->setFetchMode(PDO::FETCH_OBJ);
        $result=$prepared->fetch();
        return $result;
    }

    public function showAllTeacher(){
        $obj = new DataBase();
        $DBH =$obj->DBconnection();

        $sql="SELECT * FROM `teachers_info`";

        $prepared=$DBH->prepare($sql);
        $prepared->execute();
        $result=$prepared->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function view($sessionData){
        $obj = new DataBase();
        $DBH =$obj->DBconnection();

        $sql = "SELECT * FROM `teachers_info` WHERE `u_id` ='$sessionData'";
        $conn = $DBH->prepare($sql);
        $conn->setFetchMode(PDO::FETCH_ASSOC);
        $conn->execute();
        $result=$conn->fetch();

        return $result;
    }
    public function setAccount($password, $teacher_id){
        $obj = new DataBase();
        $DBH =$obj->DBconnection();

        $sql = "UPDATE `teachers_info` SET `password`= '$password' WHERE `u_id`= '$teacher_id'";
        $conn = $DBH->prepare($sql);
        $conn->execute();
    }

    public function uploadlecture($postData){
        $obj = new DataBase();
        $DBH =$obj->DBconnection();

        $sql = "INSERT INTO `teachers_resource_tab`(`title`, `resource`, `uploader_id`) VALUES (?,?,?)";
        $conn = $DBH->prepare($sql);
        $conn->bindParam(1,$postData['title']);
        $conn->bindParam(2,$postData['file']);
        $conn->bindParam(3,$postData['uploader_id']);
        $conn->execute();
    }

    public function showlecture(){
        $obj = new DataBase();
        $DBH =$obj->DBconnection();

        $sql="SELECT teachers_resource_tab.resource_id, teachers_resource_tab.title, teachers_resource_tab.upload_date, teachers_resource_tab.resource, teachers_info.full_name FROM teachers_resource_tab, teachers_info WHERE teachers_resource_tab.uploader_id = teachers_info.u_id ";

        $prepared=$DBH->prepare($sql);
        $prepared->execute();
        $result=$prepared->fetchAll(PDO::FETCH_OBJ);
        return $result;
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

    public function storeBookRequisition($post){
        $obj = new DataBase();
        $DBH =$obj->DBconnection();

        $sql = "INSERT INTO `teachers_requisition`(`u_id`,`book_name`, `book_category`, `publisher_name`, `writer_name`, `publishing_year`, `description`) VALUES (?,?,?,?,?,?,?)";
        $conn = $DBH->prepare($sql);
        $conn->bindParam(1,$post['u_id']);
        $conn->bindParam(2,$post['book_title']);
        $conn->bindParam(3,$post['book_category']);
        $conn->bindParam(4,$post['publisher_name']);
        $conn->bindParam(5,$post['writer_name']);
        $conn->bindParam(6,$post['publishing_year']);
        $conn->bindParam(7,$post['description']);
        $conn->execute();
    }
    public function ShowApproveRequisition($session_uid){
        $obj = new DataBase();
        $DBH =$obj->DBconnection();

        $sql= "SELECT * FROM `teachers_requisition` WHERE `u_id`='$session_uid' AND `status` = 1";
        $conn = $DBH->prepare($sql);
        $conn->setFetchMode(PDO::FETCH_OBJ);
        $conn->execute();
        $result=$conn->fetchAll();

        return $result;
    }
    public function ShowPendingRequisition($session_uid){
        $obj = new DataBase();
        $DBH =$obj->DBconnection();

        $sql= "SELECT * FROM `teachers_requisition` WHERE `u_id`='$session_uid' AND `status` = 0";
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