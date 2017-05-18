<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Save Contact</title>
</head>
<body>
    <h1>Saving contact...</h1>

    <?php
        $firstName = $_POST['firstName'];
        echo 'First Name: ' . $firstName . '<br />';
        $lastName = $_POST['lastName'];
        echo 'Last Name: ' . $lastName . '<br />';
        $email = $_POST['email'];
        echo 'Email: ' . $email .'<br />';

        //Let's connect to the database(DB) and save our file
        //Step 1 - connect to the DB
        //$conn = new PDO('mysql:host=localhost;dbname=php',  'root',  '');
        $conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200361589',  'gc200361589',  'RUxpI_An__');

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       //Step 2 - create a SQL command
        $sql = "INSERT INTO contacts (firstName, lastName, email)
                VALUES (:firstName, :lastName, :email)";
      //Step 3 - "prepare" the command to prevent SQL injection attacks
        $cmd = $conn->prepare($sql);
        $cmd->bindParam(':firstName', $firstName, PDO::PARAM_STR, 30);
        $cmd->bindParam(':lastName', $lastName, PDO::PARAM_STR, 30);
        $cmd->bindParam(':email', $email, PDO::PARAM_STR, 120);

      //Step 4 - execute the SQL command
        $cmd->execute();
      //Step 5 - close the connection to the DB
        $conn=null;
      //step 6 - redirect to a new page
    ?>
<!-- this is an html comment-->
</body>
</html>
