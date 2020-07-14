<?php
include_once "DataBase.php";

class BorrowBooks
{

    public function store($book_id,$u_id){

        $obj = new DataBase();
        $DBH=$obj->DBconnection();

        $sql = "INSERT INTO `borrow_books`(`book_id`, `u_id`) VALUES (?,?)";
        $conn = $DBH->prepare($sql);
        $conn ->bindParam(1,$book_id);
        $conn ->bindParam(2,$u_id);
        $conn->execute();
    }

    public function approved($borrowDate,$returnDate,$status,$borrow_id,$u_id){
        $obj = new DataBase();
        $DBH=$obj->DBconnection();

        $sql = "UPDATE `borrow_books` SET `borrow_date`='$borrowDate',`return_date`='$returnDate',`status`='$status' WHERE `borrow_id`= '$borrow_id' AND `u_id`='$u_id'";

        $conn= $DBH->prepare($sql);
        $conn->execute();
    }
    public function showAll(){
        $obj = new DataBase();
        $DBH=$obj->DBconnection();

        $sql = "SELECT borrow_books.borrow_id, borrow_books.u_id, borrow_books.submitted_date, book.book_name, student_info.full_name FROM borrow_books, book, student_info WHERE borrow_books.book_id = book.id AND borrow_books.u_id = student_info.u_id AND borrow_books.status = 0 UNION SELECT borrow_books.borrow_id, borrow_books.u_id, borrow_books.submitted_date, book.book_name, teachers_info.full_name FROM borrow_books, book, teachers_info WHERE borrow_books.book_id = book.id AND borrow_books.u_id = teachers_info.u_id AND borrow_books.status = 0 ";
        $conn = $DBH->prepare($sql);
        $conn->execute();
        $allBooks= $conn->fetchAll(PDO::FETCH_OBJ);

        return $allBooks;
    }
    public function countBorrowRequest(){
        $obj = new DataBase();
        $DBH=$obj->DBconnection();

        $sql = "SELECT COUNT(*) FROM borrow_books WHERE `status`=0 ";
        $conn = $DBH->prepare($sql);
        $conn->execute();
        $allBooks= $conn->fetch(PDO::FETCH_COLUMN);

        return $allBooks;
    }
    public function showBorrowedList(){
        $obj = new DataBase();
        $DBH=$obj->DBconnection();

        $sql = "SELECT borrow_books.u_id, borrow_books.borrow_date, borrow_books.return_date, borrow_books.submitted_date, student_info.full_name, book.book_name FROM borrow_books, student_info, book WHERE borrow_books.u_id = student_info.u_id AND borrow_books.book_id = book.id AND borrow_books.status = 1 UNION SELECT borrow_books.u_id, borrow_books.borrow_date, borrow_books.return_date, borrow_books.submitted_date, teachers_info.full_name, book.book_name FROM borrow_books, teachers_info, book WHERE borrow_books.u_id = teachers_info.u_id AND borrow_books.book_id = book.id AND borrow_books.status = 1 ";
        $conn = $DBH->prepare($sql);
        $conn->execute();
        $allBooks= $conn->fetchAll(PDO::FETCH_OBJ);

        return $allBooks;
    }

    public function forReturnList(){
        $obj = new DataBase();
        $DBH=$obj->DBconnection();

        $sql = "SELECT borrow_books.book_id, borrow_books.borrow_id, borrow_books.u_id, borrow_books.borrow_date, borrow_books.return_date, borrow_books.submitted_date, borrow_books.day_exceed, borrow_books.fine, student_info.full_name, student_info.email, book.book_name FROM borrow_books, student_info, book WHERE borrow_books.u_id = student_info.u_id AND borrow_books.book_id = book.id AND borrow_books.status = 1 UNION SELECT borrow_books.book_id, borrow_books.borrow_id, borrow_books.u_id, borrow_books.borrow_date, borrow_books.return_date, borrow_books.submitted_date, borrow_books.day_exceed, borrow_books.fine, teachers_info.full_name, teachers_info.email, book.book_name FROM borrow_books, teachers_info, book WHERE borrow_books.u_id = teachers_info.u_id AND borrow_books.book_id = book.id AND borrow_books.status = 1";

        $conn = $DBH->prepare($sql);
        $conn->execute();
        $all = $conn->fetchAll(PDO::FETCH_OBJ);

        return $all;
    }

    public function updateFineAndDay($day,$fine,$b_id){
        $obj = new DataBase();
        $DBH=$obj->DBconnection();

        $sql = "UPDATE `borrow_books` SET `day_exceed`='$day',`fine`='$fine' WHERE `borrow_id`='$b_id'";

        $conn = $DBH->prepare($sql);
        $conn->execute();
    }
}