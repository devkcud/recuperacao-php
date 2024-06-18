<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Dólar para Real</title>
</head>
<body>
    <h1>Conversor de Dólar para Real</h1>
    <form method="post">
        <label for="amount">Digite o valor em dólar:</label>
        <input type="number" id="amount" name="amount" step="0.01" required>
        <button type="submit" name="convert">Converter</button>
    </form>

    <?php
    if (isset($_POST['convert'])) {
        $amount = $_POST['amount'];

        $url = 'https://economia.awesomeapi.com.br/json/last/USD-BRL';

        $response = file_get_contents($url);

        if ($response !== false) {
            $data = json_decode($response, true);

            if (isset($data['USDBRL']['bid'])) {
                $exchangeRate = $data['USDBRL']['bid'];
                $convertedAmount = $amount * $exchangeRate;
                $convertedAmount = number_format($convertedAmount, 2, ',', '.');

                echo "<p>$amount dólares equivalem a aproximadamente R$$convertedAmount.</p>";
            } else {
                echo "<p>Erro ao obter a cotação do dólar. Tente novamente mais tarde.</p>";
            }
        } else {
            echo "<p>Erro ao conectar à API. Tente novamente mais tarde.</p>";
        }
    }
    ?>
</body>
</html>
