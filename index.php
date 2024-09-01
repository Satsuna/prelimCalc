<!DOCTYPE html>
<html>
    <head>
        <title>Basic Calculator</title>
    </head>
<body>
<?php
$result = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // isset() and is_numeric() functions using ternary operator (shorthand if else)
    $num1 = isset($_POST['num1']) && is_numeric($_POST['num1']) ? $_POST['num1'] : null;
    $num2 = isset($_POST['num2']) && is_numeric($_POST['num2']) ? $_POST['num2'] : null;
    $operator = isset($_POST['operator']) ? $_POST['operator'] : null;

    // Operation
    if ($num1 !== null && $num2 !== null && $operator !== null) {
        switch ($operator) {
            case 'add':
                $result = $num1 + $num2;
                break;
            case 'subtract':
                $result = $num1 - $num2;
                break;
            case 'multiply':
                $result = $num1 * $num2;
                break;
            case 'divide':
                // Avoid division by zero
                if ($num2 != 0) {
                    $result = $num1 / $num2;
                }
                else {
                    $result = "Error: Division by zero";
                }
                break;
            default:
                $result = "Invalid Operation";
                break;
        }
    } else {
        $result = "Please enter valid numbers and select an operation.";
    }
}
?>

<form action="index.php" method="post">
    <h1><b>BASIC CALCULATOR</b></h1>
    
    <!--Input-->
    <label for="num1"><b>First Number: </b></label> <br>
    <input type="number" name="num1" required>
    <br><br>
    <label for="num2"><b>Second Number: </b></label> <br>
    <input type="number" name="num2" required>
    <br><br>

    <!--Operator-->
    <label for="operator">Select Operator:</label>
    <br><br>
    <input type="radio" name="operator" value="add" required>
    <label for="Add">Add</label> <br>
    <input type="radio" name="operator" value="subtract" required>
    <label for="Subtract">Subtract</label> <br>
    <input type="radio" name="operator" value="multiply" required>
    <label for="Multiply">Multiply</label> <br>
    <input type="radio" name="operator" value="divide" required>
    <label for="Divide">Divide</label>
    <br><br>
    
    <!--Answer-->
    <label for="total"><b>Total</b></label>
    <input type="text" name="total" value="<?php echo $result; ?>" readonly> 
    <br><br>
    <input type="submit" name="submit" value="Submit">
</form>
</body>
</html>
