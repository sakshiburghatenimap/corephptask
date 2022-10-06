<?php

$DATABASE_HOST='localhost';
$DATABASE_USER='root';
$DATABASE_PASS='';
$DATABASE_NAME='form';

$con = mysqli_connect($DATABASE_HOST , $DATABASE_USER , $DATABASE_PASS , $DATABASE_NAME);

if (mysqli_connect_error()){
    exit('error connecting to database' . mysqli_connect_error());
}

if(!isset($_POST['username'], $_POST['email'], $_POST['password'])){
    exit ('Empty Field(s)');
}

 if (empty($_POST['username'] || empty ($_POST['email']) || empty ($_POST['password']))){
    exit('empty values');
 }

 if($stmt = $con->prepare('SELECT id, password FROM users WHERE username=?')){
    $stmt->bind_param('s' , $_POST['username']);
    $stmt->execute();
    $stmt->store_result();

    if($stmt->num_rows>0) {
        echo 'user already exist , try again later';
    }
    else{
        if($stmt = $con->prepare('INSERT INTO users (username,password,email) VALUES (?,?,?)')){
            $password = password_hash($_POST['password'] , PASSWORD_DEFAULT);
            $stmt->bind_param('sss' , $_POST['username'],$password , $_POST['email']);
            $stmt->execute();
            echo 'You have succefully registered';
        }
        else {
            echo 'error occured';
        }
 }
 $stmt->close();
}
else {
    echo 'error occured';
}
   $con->close();

?>
