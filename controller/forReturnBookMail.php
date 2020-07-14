<?php

include_once "../Model/DataBase.php";
include_once "../Model/Mail.php";

$obj = new Mail();
$all=$obj->showemailid($_GET['borrow_id']);


$message = "
<h3>Hello $all->full_name</h3><br/><br/>

<p>Your book return date was over. Due to not submitting books at the right time, adding a separate fine to your account from now .<b> Every day this fine will be increase(10tk per day)</b></p><br>

<p>Your Borrow book name is $all->book_name</p><br>
<p>Return Date was $all->return_date</p><br>
<p>Day exceed $all->day_exceed</p><br>
<p>Current Fine $all->fine</p><br>

";
echo $message;
$sentMessage = $obj->forReturnBook($all->email,$message);