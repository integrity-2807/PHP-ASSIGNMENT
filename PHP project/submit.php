<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    echo "Thank you, $name, for submitting the form.";
}
?>
