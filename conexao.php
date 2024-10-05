<?php
define('HOST', 'localhost');
//Ip do banco no mysql ex:127.0.0.1
define('USUARIO', 'root');
//Irá puxar o usuario padrão do banco
define('SENHA', '');
//Senha do banco de dados, como não definimos senha no banco deixamos vazio.
define('DB', 'login');
// nome do banco de dados.

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar'); 
//mysqli_connect irá receber as constantes desciminadas acima, o or die serve 
//para se ele não consiguir conecter iformar um erro.