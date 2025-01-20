<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact_Us Database</title>
</head>

<body>

    <?php

    $DEPARTMENT = $_REQUEST["contact_us"];
    $USER_NAME = $_REQUEST["name"];
    $PHONE_NO = $_REQUEST["phone"];
    $EMAIL = $_REQUEST["email"];
    $CONCERN = $_REQUEST["concern"];



    $connection = mysqli_connect("localhost", "root", "",)
        or die("couldn't connect to server");


    $query = "CREATE DATABASE IF NOT EXISTS CONTACT";
    $result = mysqli_query($connection, $query)
        or die("Query failed: " . mysqli_error($connection));

    $db = mysqli_select_db($connection, "CONTACT")
        or die("couldn't select database");


    $query = "CREATE TABLE IF NOT EXISTS USERS_DATA ( DEPARTMENT VARCHAR(10), USER_NAME VARCHAR(20),  PHONE_NO INT(10), EMAIL VARCHAR(30), CONCERN VARCHAR(100))";
    $result = mysqli_query($connection, $query)
        or die("Query failed: " . mysqli_error($connection));

    $query = "INSERT INTO USERS_DATA ( DEPARTMENT, USER_NAME , PHONE_NO, EMAIL, CONCERN)
    VALUES( '$DEPARTMENT', '$USER_NAME', '$PHONE_NO', '$EMAIL','$CONCERN')";
    $result = mysqli_query($connection, $query)
        or die("Query failed: " . mysqli_error($connection));

    $query = "SELECT * FROM USERS_DATA";
    $result = mysqli_query($connection, $query)
        or die("Query failed: " . mysqli_error($connection));

    if (mysqli_num_rows($result) > 0) {

        // while ($row = mysqli_fetch_assoc($result)) {
        // $DEPARTMENT = $row['DEPARTMENT'];
        // $USER_NAME = $row['USER_NAME'];
        // $PHONE_NO = $row['PHONE_NO'];
        // $EMAIL = $row['EMAIL'];
        // $CONCERN = $row['CONCERN'];

        echo " Thankyou For Contacting us. Our team member will Contact you soon...";
    }

    // echo "<script>alert('Insertion was successfull!');</script>";
    mysqli_close($connection);

    ?>

</body>

<style>
    body {
        text-align: center;
        background: url('https://images.pexels.com/photos/4761352/pexels-photo-4761352.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940 no-repeat center center/cover' );
        justify-content: center;
        align-items: center;
        font-size: 35px;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        color: gray;
        font-weight: bold;
        margin-top: 200px;
    }
</style>

</html>