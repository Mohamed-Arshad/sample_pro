<?php
session_start();
$con = new MongoDB\Driver\Manager("mongodb://localhost:27017");
$name1 = $_SESSION["email"];
$name2 = $_POST["r_name"];
$message = $_POST['message'];

$bulk = new MongoDB\Driver\Query(['email'=>$name1]);
$col1=$con->executeQuery('sbuddy.users', $bulk);
$col1=current($col1->toarray());
$col1=$col1->fname;

$bulk = new MongoDB\Driver\Query(['email'=>$name2]);
$col2=$con->executeQuery('sbuddy.users', $bulk);
$col2=current($col2->toarray());
$col2=$col2->fname;

$bulk = new MongoDB\Driver\BulkWrite;


$bulk->insert(["s_name"=>"$name1", "r_name"=>"$name2", "message"=>"$message", "sname"=>"$col1", "rname"=>"$col2"]);

$con->executeBulkWrite('sbuddy.chat', $bulk);

?>