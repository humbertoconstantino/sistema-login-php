<?php
// Conexão
require_once 'db_connect.php';
// Botão Cadastrar
if(isset($_POST['btn-cadastrar'])):
    $erros = array();
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $login = mysqli_escape_string($connect, $_POST['login']);
    $senha = mysqli_escape_string($connect, $_POST['senha']);
    
    if(empty($login) or empty($nome) or empty($senha)):
        $erros[] = "<l1> Todos os campos devem ser preenchidos </li>";
    else:
        $senha = md5($senha);
        $sql = "INSERT INTO usuarios (nome, login, senha) VALUES ('$nome', '$login', '$senha')";
        $resultado = mysqli_query($connect, $sql);
        echo "Cadastrado com sucesso!";
        mysqli_close($connect);
    endif;
endif;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar conta</title>
</head>
<body>
<p>Criar conta</p>
    <?php
    if(!empty($erros)):
        foreach($erros as $erro):
            echo $erro;
        endforeach;
    endif;
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    Nome: <input type="text" name="nome"> <br>
    Login: <input type="text" name="login"> <br>
    Senha: <input type="password" name="senha"><br>
    <button type="submit" name="btn-cadastrar">Cadastrar</button>
    <a href="index.php">Voltar ao menu principal</a>
    </form>
</body>
</html>
