<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contacts</title>
</head>
<body>
    <h1>My Contacts</h1>


    <?php
    //github.com/JarretWright
    //Step 1 - connect to database
    $conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200361589',  'gc200361589',  'RUxpI_An__');

    //Step 2 - create the SQL command
    $sql = "SELECT * FROM contacts";

    //Step 3 - prepare the sql command (prevents sql injection)
    $cmd = $conn->prepare($sql);

    //Step 4 - execute the command
    $cmd->execute();

    //Step 5 - store the results
    $contacts = $cmd->fetdhAll();

    //Step 6 - remove the DB connection
    $conn = null;

    //Step 7 - loop over the results and display them to the screen
    echo '<table><tr><th>First Name</th>
                     <th>Last Name</th>
                     <th>Email</th>
                 </tr>';
    foreach($contacts as $contact)
    {
        echo '<tr><td>'.$contact['firstName'].'</td>
                     <td>'.$contact['last Name'].'</td>
                     <td>'.$contact['email'].'</td></tr>';
    }
    echo '</table>';
    ?>
</body>
</html>
