<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro e Listagem de Jogos</title>
</head>
<body>
    <h1>Cadastro de Jogos</h1>
    <form method="post" action="salvar_jogo.php">
        <label for="titulo">Título:</label><br>
        <input type="text" id="titulo" name="titulo" required><br><br>

        <label for="genero">Gênero:</label><br>
        <input type="text" id="genero" name="genero" required><br><br>

        <label for="plataforma">Plataforma:</label><br>
        <input type="text" id="plataforma" name="plataforma" required><br><br>

        <label for="lancamento">Data de Lançamento:</label><br>
        <input type="date" id="lancamento" name="lancamento" required><br><br>

        <label for="descricao">Descrição:</label><br>
        <textarea id="descricao" name="descricao" rows="4" cols="50"></textarea><br><br>

        <button type="submit" name="submit">Cadastrar Jogo</button>
    </form>

    <hr>
    <h2>Jogos Cadastrados</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Título</th>
                <th>Gênero</th>
                <th>Plataforma</th>
                <th>Data de Lançamento</th>
                <th>Descrição</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $host = 'localhost'; 
            $dbname = 'jogos'; 
            $username = 'root'; 
            $password = ''; 

            try {
                $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $pdo->query('SELECT * FROM jogos');
                
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>{$row['titulo']}</td>";
                    echo "<td>{$row['genero']}</td>";
                    echo "<td>{$row['plataforma']}</td>";
                    echo "<td>{$row['lancamento']}</td>";
                    echo "<td>{$row['descricao']}</td>";
                    echo "</tr>";
                }
            } catch (PDOException $e) {
                echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
            }
            ?>
        </tbody>
    </table>
</body>
</html>
