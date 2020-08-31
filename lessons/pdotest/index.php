<?php

//phpinfo();

$host = 'db';
$user = 'root';
$password = 'somepass';
$dbname = 'somedatabase';

//Set Database Source Name
$dsn = 'mysql:host=' . $host. ';dbname=' . $dbname;

//Create a PDO instance
$pdo = new PDO($dsn, $user, $password);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);

$status = 'admin';

$sql = 'SELECT * FROM users WHERE status = :status';

$stmt = $pdo->prepare($sql);
$stmt->execute(['status'=>$status]);
// $users = $stmt->fetchAll();
$users =$stmt->fetchAll();

 foreach($users as $user){
//     echo $user['name'].'<br>';
    echo $user->name.'<br>';
 }

//  $name = 'Karen Williams';
//  $email = 'karen@gmail.com';
//  $status = 'guest';

//  $sql2 = 'INSERT INTO users (name, email, status) VALUES (:name, :email, :status)';
//  $stmt2 = $pdo->prepare($sql2);
//  $stmt2->execute(['name'=>$name, 'email'=>$email, 'status'=> $status]);