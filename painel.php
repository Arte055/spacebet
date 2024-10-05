<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel PHP</title>
</head>
<body>
    <?php
    include('verifica_login.php');
    ?>
    
    <h2>Acertou mizeravi, <?php echo $_SESSION['nome'];?><!--Puxou o nome do usuario pelo Banco de dados-->
    <a href="logout.php"><input type="button" value="Sair"></a></h2><br>
    <!--criou um botão junto com um link fazendo execultar o codigo do logout para encerrar o login-->
    <img src="img/acertou.png">
    
    
</body>
</html>
