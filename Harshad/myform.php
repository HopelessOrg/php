<?php
//error_reporting(0);
// connection for database 
$server = "localhost";
$username = "root";
$password = "";

$con = mysqli_connect($server , $username , $password);

if(!$con){   //  connection is not successful then show this ;
    die("connection to this database failed due to ".mysqli_connect_error());

}

// input data in HTML page 
if(isset($_POST['name'])){
$name = $_POST['name'];
$city = $_POST['city'];
$photo = $_FILES['photo'];
//print_r($photo);
$photoname = $photo['name'];   //stor '$photo = $_FILES['photo] in $photoname
$photopath = $photo['tmp_name']; // temporary name for photopath 
$photoerror = $photo['error'];  // for error

// condition for  error is not thne stor photo in folder 
if($photoerror == 0){

    $destfile = 'upload/'.$photoname;   //path for photo name

    //echo " $destfile";
    move_uploaded_file($photopath ,$destfile ); //php function for stor photo in file this function two parameter {1} photo temporary name,{2} folder pahe.

}
else{

    echo " no buttn has been clicked"; // any issue than show this.
}
// this is a sql query for stor data in mysql in xampp.
$sql   = "INSERT INTO `dbdemo`.`photo` (`name`, `city`, `pic`) VALUES ('$name', '$city', '$destfile')";
//   echo $sql;  // (print sql query);
if($con->query($sql) == true){
    //  echo " successfully inserted";
    $insert = true;
   
 
 }
 else{
     echo " ERROE: $sql <br> $con->erroe";
 }


$con->close();
}
?>

<!-- HTML PART  -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> FORM DATA STOR IN DATABASE</title>
    <link rel="stylesheet" href="myform.css">
</head>

<body>
    <div class="backimg_form">
        <strong>
            <div class="form">
                <H2> SUMIT YOUR DETAILS </H2>
                <hr>
                <br>
                <form action="myform.php" method="post" enctype="multipart/form-data">
                    <div>
                        <lable for="name">name: </lable> <br>

                        <div class="name"> <input type="text" id="name" class="input" required name="name">
                        </div>
                        <br>
                        <div>
                            <lable for="name">add-photo: </lable> <br>

                            <div class="name"> <input type="file" id="name" class="input" name="photo">
                            </div>

                            <br>
                            <lable for="name"> city:</lable> <br>

                            <div>
                                <input type="text" name=" city" class="input" required>

                            </div>

                            </br>
                            <div> <input type="submit" name="submit now" class="sub">
                                <span> <a href="esse.php" class="resat"> resat</a> </span>
                            </div>
                            <br>
                        </div>
                    </div>
                </form>
            </div>
        </strong>
    </div>
    </div>
</body>

</html>