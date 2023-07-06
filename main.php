<?php

require_once 'autoload.php';

$nome = $_POST['nome'] ?? '';
$telefone = $_POST['telefone'] ?? '';
$nivel = $_POST['nivel'] ?? '';

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $usuario = new Usuario();
        $permissao = new Permissao();

        $permissao->setNivel($nivel);

        $usuario->preencherDados($nome, $telefone, $permissao);
        $usuario->cadastrar();
    }
} catch (Exception $e) {
    echo 'Erro: ' . $e->getMessage();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Usuário</title>
</head>
<body>
    <h1>Cadastro de Usuário</h1>
    <form method="POST" action="main.php">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required><br>

        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone" id="telefone" required><br>

        <label for="nivel">Nível:</label>
        <input type="text" name="nivel" id="nivel" required><br>

        <input type="submit" value="Cadastrar">
    </form>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($e)): ?>
        <h2>Dados cadastrados:</h2>
        <p>Nome: <?= $usuario->getNome() ?></p>
        <p>Telefone: <?= $usuario->getTelefone() ?></p>
        <p>Nível: <?= $permissao->getNivel() ?></p>
        <p>Data de Cadastro: <?= $usuario->getDataCadastro() ?></p>
    <?php endif; ?>
</body>
</html>