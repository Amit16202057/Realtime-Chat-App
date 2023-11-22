<?php
$servername = "localhost"; // Change this to your database server name
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$dbname = "tsmartex"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from PPL_PLANNING_INFO_ENTRY_MST table
$mst_query = "SELECT BOOKING_NO, BUYER_ID, DETERMINATION_ID, FABRIC_DESC, JOB_NO, BUYER_BRAND_ID FROM PPL_PLANNING_INFO_ENTRY_MST";
$mst_result = $conn->query($mst_query);

// Fetch data from PPL_PLANNING_INFO_ENTRY_DTLS table
$dtls_query = "SELECT MACHINE_ID, ID, MST_ID, STATUS, START_DATE, END_DATE FROM PPL_PLANNING_INFO_ENTRY_DTLS";
$dtls_result = $conn->query($dtls_query);

// Display the data in a neat UI
echo "<h1>Data from PPL_PLANNING_INFO_ENTRY_MST table</h1>";
echo "<table border='1'>";
echo "<tr><th>BOOKING_NO</th><th>BUYER_ID</th><th>DETERMINATION_ID</th><th>FABRIC_DESC</th><th>JOB_NO</th><th>BUYER_BRAND_ID</th></tr>";

if ($mst_result->num_rows > 0) {
    while ($row = $mst_result->fetch_assoc()) {
        echo "<tr><td>" . $row["BOOKING_NO"] . "</td><td>" . $row["BUYER_ID"] . "</td><td>" . $row["DETERMINATION_ID"] . "</td><td>" . $row["FABRIC_DESC"] . "</td><td>" . $row["JOB_NO"] . "</td><td>" . $row["BUYER_BRAND_ID"] . "</td></tr>";
    }
} else {
    echo "<tr><td colspan='6'>No data found</td></tr>";
}

echo "</table>";

echo "<h1>Data from PPL_PLANNING_INFO_ENTRY_DTLS table</h1>";
echo "<table border='1'>";
echo "<tr><th>MACHINE_ID</th><th>ID</th><th>MST_ID</th><th>STATUS</th><th>START_DATE</th><th>END_DATE</th></tr>";

if ($dtls_result->num_rows > 0) {
    while ($row = $dtls_result->fetch_assoc()) {
        echo "<tr><td>" . $row["MACHINE_ID"] . "</td><td>" . $row["ID"] . "</td><td>" . $row["MST_ID"] . "</td><td>" . $row["STATUS"] . "</td><td>" . $row["START_DATE"] . "</td><td>" . $row["END_DATE"] . "</td></tr>";
    }
} else {
    echo "<tr><td colspan='6'>No data found</td></tr>";
}

echo "</table>";

// Close connection
$conn->close();

?>
<?php require("script.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="How to store form data in a json file with php">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <!-- <title>Storing messages in a json file with PHP</title> -->
</head>

<body>

    <!-- <h1>Storing messages in a JSON file with PHP</h1> -->

    <!-- Let's begin with our form element -->
    <form action="" method="post">
        <h3>Contact us</h3>
        <label>Enter your email</label>
        <!-- <input type="email" name="email" value="mail@mail.com"> -->

        <label>Enter a subject</label>
        <!-- <input type="text" name="subject" value="Please send me a pricelist"> -->

        <label>Enter your message</label>
        <!-- <textarea name="message">This is my message</textarea> -->

        <input type="submit" name="submit" value="Send message">

        <p class="error"><?php echo @$error; ?></p>
        <p class="success"><?php echo @$success; ?></p>
    </form>

</body>

</html>