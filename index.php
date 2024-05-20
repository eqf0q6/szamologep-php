<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Számológép</title>
</head>
<body>
    <h1>Egyszerű Számológép</h1>
    <form method="POST" action="">
        <label for="number1">Első szám:</label>
        <input type="text" id="number1" name="number1" required>
        <br>
        <label for="number2">Második szám:</label>
        <input type="text" id="number2" name="number2" required>
        <br>
        <label for="operation">Művelet:</label>
        <select id="operation" name="operation">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>
        <br>
        <button type="submit">Számítás</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $number1 = $_POST['number1'];
        $number2 = $_POST['number2'];
        $operation = $_POST['operation'];

        // Input validáció
        if (!is_numeric($number1) || !is_numeric($number2)) {
            echo "<p style='color: red;'>Kérjük, érvényes számokat adjon meg!</p>";
        } else {
            $number1 = floatval($number1);
            $number2 = floatval($number2);
            $result = 0;

            switch ($operation) {
                case '+':
                    $result = $number1 + $number2;
                    break;
                case '-':
                    $result = $number1 - $number2;
                    break;
                case '*':
                    $result = $number1 * $number2;
                    break;
                case '/':
                    if ($number2 == 0) {
                        echo "<p style='color: red;'>Nullával való osztás nem lehetséges!</p>";
                        exit;
                    }
                    $result = $number1 / $number2;
                    break;
                default:
                    echo "<p style='color: red;'>Érvénytelen művelet!</p>";
                    exit;
            }

            echo "<p>Eredmény: $result</p>";
        }
    }
    ?>
</body>
</html>
