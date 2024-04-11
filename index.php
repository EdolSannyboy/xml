<?php

// Connect to database
// $erver - localhost
// Username - root
// Password - empty
// Database name = xml
$conn = mysqli_connect ("localhost", "root", "", "xml");

$affectedRow = 0;

// Load xml file else check connection
$xml = simplexml_load_file ("data.xml")
    or die ("Error: Cannot create object");

// Assign values
foreach ($xml->children () as $row) {
    $employee_id= $row->employee_id;
    $first_name = $row->first_name;
    $Last_name = $row->last_name;
    $email = $row->email;
    $phone_number = $row->phone_number;
    $hire_date = $row->hire_date;
    $job_id = $row->job_id;
    $salary = $row->salary;

// $OL query to insert data into xml table
$sql = "INSERT INTO employee (employee_id, first_name,
    Last_name, email, phone_number, hire_date, job_id, salary) VALUES ('" 
    . $employee_id . "' , '" . $first_name .  "' , '" . $Last_name .  "' , '"
    . $email .  "' , '" . $phone_number .  "' , '" . $hire_date .  "' , '" . $job_id .  "' , '" . $salary . "')";

$result = mysqli_query ($conn, $sql);

if (! empty ($result)) {
    $affectedRow ++;
} else {
    $error_message = mysqli_error ($conn) . "\n";
}
}
?>



<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RESULT XML</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <header class="container-fluid d-flex flex-column align-items-center p-2">
        <h2>
            INSERT XML TO MYSQL USING PHP
        </h2>
        <h1>
            XML data storing in Database
        </h1>

    </header>

    <p class="p-2 m-1 fs-4">Click submit to Load data</p>
    <form action="load-xml.php" method="post" class="p-3 mt-1">
    <button type="submit" class="btn btn-primary ">Submit</button>
    </form>
    <?php
    if ($affectedRow>0){
        $message = $affectedRow." records inserted";
    }
    else{
        $message = "No records inserted";
    }
    ?>

    <div class=" text-bg-info m-2 p-2 rounded container-fluid ">
        <?php echo $message; ?>
    </div>
    <?php
    if (! empty($error)){?>
    <div class=" text-bg-error m-2 p-2 rounded container-fluid ">
        <?php echo $error; ?>
    </div>
    <?php } ?>

</body>
</html>