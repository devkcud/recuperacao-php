<?php
$host = 'localhost'; 
$dbname = 'jogos'; 
$username = 'root'; 
$password = ''; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $titulo = $_POST['titulo'];
    $genero = $_POST['genero'];
    $plataforma = $_POST['plataforma'];
    $lancamento = $_POST['lancamento'];
    $descricao = $_POST['descricao'];

    $sql = "INSERT INTO jogos (titulo, genero, plataforma, lancamento, descricao)
            VALUES (:titulo, :genero, :plataforma, :lancamento, :descricao)";
    
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
    $stmt->bindParam(':genero', $genero, PDO::PARAM_STR);
    $stmt->bindParam(':plataforma', $plataforma, PDO::PARAM_STR);
    $stmt->bindParam(':lancamento', $lancamento, PDO::PARAM_STR);
    $stmt->bindParam(':descricao', $descricao, PDO::PARAM_STR);

    try {
        $stmt->execute();
        header('Location: index.php');
    } catch (PDOException $e) {
        echo "Erro ao cadastrar o jogo: " . $e->getMessage();
    }
}
