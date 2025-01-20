<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FEEDBACK_DATABASE</title>
</head>

<body>

    <?php

    $NAME = $_REQUEST["name"];
    $EMAIL = $_REQUEST["email"];
    $PHONE = $_REQUEST["phone"];
    $PROBLEM = $_REQUEST["problem"];
    



    $connection = mysqli_connect("localhost", "root", "",)
        or die("couldn't connect to server");


    $query = "CREATE DATABASE IF NOT EXISTS FEEDBACK";
    $result = mysqli_query($connection, $query)
        or die("Query failed: " . mysqli_error($connection));

    $db = mysqli_select_db($connection, "FEEDBACK")
        or die("couldn't select database");


    $query = "CREATE TABLE IF NOT EXISTS USERS_DATA ( NAME VARCHAR(10), EMAIL VARCHAR(20),  PHONE INT(10), PROBLEM VARCHAR(100))";
    $result = mysqli_query($connection, $query)
        or die("Query failed: " . mysqli_error($connection));

    $query = "INSERT INTO USERS_DATA ( NAME, EMAIL,PHONE, PROBLEM)
    VALUES( '$NAME', '$EMAIL', '$PHONE', '$PROBLEM')";
    $result = mysqli_query($connection, $query)
        or die("Query failed: " . mysqli_error($connection));

    $query = "SELECT * FROM USERS_DATA";
    $result = mysqli_query($connection, $query)
        or die("Query failed: " . mysqli_error($connection));

    if (mysqli_num_rows($result) > 0) {

        echo " Thankyou For sharing your problem with us!!!";
    }

    // echo "<script>alert('Insertion was successfull!');</script>";
    mysqli_close($connection);

    ?>
	</body>
	<style>
    body {
        text-align: center;
        background-color: cream ;
        justify-content: center;
        align-items: center;
        font-size: 35px;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        color: black;
        font-weight: bold;
        margin-top: 200px;
    }
</style>

</html>