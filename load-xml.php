<?php
// Start php code
// Load xml file into xml_data variable

$xml_data = simplexml_load_file("data.xml") or 
die("Error: Object Creation failure");
// Use foreach loop to display data and for sub elements access,
// We will use children() function
foreach ($xml_data->children() as $data)
{
    // display each sub element in xml file
    echo "Employee ID : ", $data->employee_id . "<br> ";
    echo "First Name : ", $data->first_name . "<br> ";
    echo "Last Name : ", $data->Last_name . "<br> ";
    echo "Email : ", $data->email . "<br> ";
    echo "Phone Number : ", $data->phone_number . "<br> ";
    echo "Hire Date : ", $data->hire_date . "<br> ";
    echo "Job ID : ", $data->job_id . "<br> ";
    echo "Salary : ", $data->salary . "<br> ";
    echo "-------------------------------------------------";
    echo "<br>";
}
?>