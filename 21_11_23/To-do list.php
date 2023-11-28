<?php

class TodoList {
    private $filename;
    private $items;

    public function __construct($filename) {
        $this->filename = $filename;
        $this->loadItems();
    }

    private function loadItems() {
        if (file_exists($this->filename)) {
            $this->items = file($this->filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        } else {
            $this->items = [];
        }
    }

    private function saveItems() {
        file_put_contents($this->filename, implode(PHP_EOL, $this->items));
    }

    public function addItem($item) {
        $this->items[] = $item;
        $this->saveItems();
    }

    public function deleteItem($index) {
        if (isset($this->items[$index])) {
            unset($this->items[$index]);
            $this->items = array_values($this->items); // Re-index the array
            $this->saveItems();
        }
    }

    public function getItems() {
        return $this->items;
    }
}

// Example usage:

$todoList = new TodoList('todolist.txt');

if (isset($_POST['add'])) {
    $newItem = $_POST['newItem'];
    if (!empty($newItem)) {
        $todoList->addItem($newItem);
    }
}

if (isset($_GET['delete'])) {
    $index = $_GET['delete'];
    $todoList->deleteItem($index);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
</head>
<body>

<h1>Todo List</h1>

<form method="post">
    <label for="newItem">New Item:</label>
    <input type="text" id="newItem" name="newItem" required>
    <button type="submit" name="add">Add</button>
</form>

<ul>
    <?php foreach ($todoList->getItems() as $index => $item): ?>
        <li>
            <?php echo $item; ?>
            <a href="?delete=<?php echo $index; ?>">Delete</a>
        </li>
    <?php endforeach; ?>
</ul>

</body>
</html>
