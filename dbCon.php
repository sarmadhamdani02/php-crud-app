
<?php

    define("HOSTNAME", "localhost");
    define("USERNAME", "root");
    define("PASSWORD", "");
    define("DATABASE", "crud_operations");

    $dbConnection = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);

    if (!$dbConnection) {
        die("Coudn't connect to databse ❌");
    }
    else{
        echo"Connection Established";
    }

?>