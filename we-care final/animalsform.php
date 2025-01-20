<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ANIMALSFORM_DATABASE</title>
</head>

<body>

    <?php

    $NAME = $_REQUEST["name"];
    $EMAIL = $_REQUEST["email"];
    $PHONE = $_REQUEST["phone"];
	$ADDRESS=$_REQUEST["address"];
    $PROBLEM = $_REQUEST["problem"];
	$OPTION="" ;
	if(isset($_REQUEST["option"]))
	{
		$OPTION=$_REQUEST["option"];
	}
    



    $connection = mysqli_connect("localhost", "root", "",)
        or die("couldn't connect to server");


    $query = "CREATE DATABASE IF NOT EXISTS ANIMALSFORM";
    $result = mysqli_query($connection, $query)
        or die("Query failed: " . mysqli_error($connection));

    $db = mysqli_select_db($connection, "ANIMALSFORM")
        or die("couldn't select database");


    $query = "CREATE TABLE IF NOT EXISTS USERS_DATA ( NAME VARCHAR(10), EMAIL VARCHAR(20),  PHONE INT(10),ADDRESS VARCHAR(50), PROBLEM VARCHAR(100), OPTION VARCHAR(10))";
    $result = mysqli_query($connection, $query)
        or die("Query failed: " . mysqli_error($connection));

    $query = "INSERT INTO USERS_DATA ( NAME, EMAIL,PHONE,ADDRESS, PROBLEM, OPTION)
    VALUES( '$NAME', '$EMAIL', '$PHONE','$ADDRESS', '$PROBLEM', '$OPTION')";
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