<!DOCTYPE html>
<html>
<head>
    <title>User Info</title>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $dob = $_POST["dob"];

    if (!empty($name) && !empty($dob)) {
        $currentYear = date("Y");
        $birthYear = date("Y", strtotime($dob));
        $age = $currentYear - $birthYear;

        echo "Name: $name<br>";
        echo "Age: $age years old";
    } else {
        echo "Please fill in both name and date of birth.";
    }
}
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="name">Name: </label>
    <input type="text" name="name" required><br><br>
    
    <label for="dob">Date of Birth: </label>
    <input type="date" name="dob" required><br><br>
    
    <input type="submit" value="Submit">
</form>

</body>
</html>
