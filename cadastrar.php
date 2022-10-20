<?php

include "config.php";

if (isset($_POST['submit'])) {

    $primeironome = $_POST['primeironome'];
    $ultimonome = $_POST['ultimonome'];
    $email = $_POST['email'];
    $password = $_POST[''];
    $genero = $_POST['genero'];

    $sql = "INSERT INTO `cliente`.`usuarios`
         (`primeironome`, `ultimonome`, `email`, `password`,`genero`)
         VALUES ('$primeironome', '$ultimonome', '$email', '$password', '$genero')";

    $result = $conn->query($sql);

    if ($result == TRUE) {

        echo "Novo registro criado com sucesso!";
    } else {

        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

?>

<!DOCTYPE html>

<html>

<body>
    <h2>Formulário de Cadastro</h2>
    <form action="" method="POST">
        <fieldset>
            <legend>Informações Pessoais:</legend>
            Primeiro Nome:<br>
            <input type="text" name="primeironome">
            <br>
            Último nome:<br>
            <input type="text" name="ultimonome">
            <br>
            E-mail: <br>
            <input type="email" name="email">
            <br>
            Password: <br>
            <input type="password" name="password">
            <br>
            Gênero: <br>
            <input type="radio" name="genero" value="Masculino"> Masculino
            <input type="radio" name="genero" value="Feminino"> Feminino
            <input type="radio" name="genero" value="Outros"> Outros
            <br><br>
            <input type="submit" name="submit" value="submit">
        </fieldset>

    </form>
</body>

<?php
    echo "<a href='consultar.php'>Clique aqui para realizar uma consulta</a><br>";
?>


</html>