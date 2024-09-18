<?php 

// Configurações do banco de dados

$host = 'localhost';
$dbname= 'mercado';
$usarname = 'root';
$password = '';

// Cria conexão com o banco de dados usando PDO - PHP Data Objects

try{
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $usarname, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexão realizada com sucesso! <br>";
}

catch(PDOException $e){

echo "falha na conexão:" .$e->getmessage();

}

//dados a serem inseridos

$nome= 'Cookies Bauducco';
$preco = '5.50';

$sql = "INSERT INTO produto(nome,preco) VALUES (:nome,:preco)";

//Prepara a conexão
$stmt= $conn -> prepare($sql);

//Associa os valores aos parametros de consulta

$stmt ->bindParam (':nome',$nome);
$stmt ->bindParam (':preco',$preco);

//Executa a consulta 

if($stmt-> execute ()){

echo"Produtos inseridos com sucesso!";

}
else{

echo"Erro ao inserir os produtos!";

}

//Fecha a conexão
$conn=null;
?>