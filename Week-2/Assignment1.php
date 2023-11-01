<!DOCTYPE html>
<html>
<head>
    <title>Text File</title>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userInput = $_POST["user_input"];
    
    if (!empty($userInput)) {
        $fileName = "user_input.txt";
        $file = fopen($fileName, "a");  

        if ($file) {
            fwrite($file, $userInput . PHP_EOL);
            fclose($file);
            echo "User input has been written to $fileName successfully.";
        } else {
            echo "Error: Unable to open or write to the file.";
        }
    } else {
        echo "Please enter some text.";
    }
}
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="user_input">Enter text: </label>
    <input type="text" name="user_input">
    <input type="submit" value="Submit">
</form>

</body>
</html>
