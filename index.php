<?php

include_once("filehandler.php");

$filename = "user.txt";
$filedata = new FileHandlingPHP($filename);


$filedata->deleteData($filename);
$filedata->AddData($filename);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File</title>
</head>
<body>

<section id="form">
    <form  method="POST">
        <label for="text">Name:</label>
        <input type="text" name="name" required>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <label for="text">City:</label>
        <input type="text" name="city" required>
        <input type="submit" value="Submit" name="submit">
    </form>
</section>

<br> <br> <br>
<?php
$filedata->ReadData($filename);
?>


</body>
</html>
