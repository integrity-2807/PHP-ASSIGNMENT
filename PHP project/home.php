<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['username']; ?></h1>
    <p>Brief description of yourself.</p>
    <h2>Contact Form</h2>
    <form method="post" action="submit.php">
    Name: <input type="text" name="name" placeholder="Name" required> <br><br>
    Email: <input type="email" name="email" placeholder="Email" required> <br><br>
    Gender:
            <input type="radio" name="gender" value="female">Female
            <input type="radio" name="gender" value="male">Male
    <br><br>
    Occupation:    <input type="text" name="occupation" placeholder="Occupation"> <br><br>
    Comment:        <textarea name="comment" placeholder="Comment"></textarea> <br><br>
        <button type="submit">Submit</button>
    </form>
    
    
    <h2>Calculator</h2>
    <!-- Calculator HTML -->
      <form method="post">
        <input type="text" name="num1" placeholder="Enter number 1">
        <input type="text" name="num2" placeholder="Enter number 2">
        <select name="operator">
            <option value="add">Addition (+)</option>
            <option value="subtract">Subtraction (-)</option>
            <option value="multiply">Multiplication (*)</option>
            <option value="divide">Division (/)</option>
        </select>
        <button type="submit" name="calculate">Calculate</button>
    </form>
    <p>Result:</p>
    <?php
    if(isset($_POST['calculate'])){
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $operator = $_POST['operator'];
        $result = 0;

        switch ($operator) {
            case "add":
                $result = $num1 + $num2;
                break;
            case "subtract":
                $result = $num1 - $num2;
                break;
            case "multiply":
                $result = $num1 * $num2;
                break;
            case "divide":
                if ($num2 == 0) {
                    echo "Cannot divide by zero.";
                } else {
                    $result = $num1 / $num2;
                }
                break;
            default:
                echo "Invalid operator.";
        }

        echo "Result: $num1 $operator $num2 = $result";
    }
    ?>

</body>
</html>
