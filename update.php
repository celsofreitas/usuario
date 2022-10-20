<?php

use LDAP\Result;

include "config.php";

if (isset($_POST['update'])) {
    $primeironome = $_post['primeironome'];
    $ultimonome = $_post['ultimonome'];
    $id = $_post['id'];
    $email = $_post['email'];
    $password = $_post['password'];
    $genero = $_post['genero'];

    $sql = "UPDATE `cliente`.`usuarios` SET 
        `primeironome` = '$primeironome', 
        `ultimonome` = '$ultimonome',
        `email` = '$email', 
        `password` = '$password', 
        `genero` = '$genero', 
        WHERE `id` = '$id' ";

    $result = $conn->query($sql);

    if ($result == true) {
        echo "Atualizado com sucesso!";
    } else {
        echo "erro:" . $sql . "<br>" . $conn->error;
    };
}

if (isset($get['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM `cliente`.`usuarios` WHERE `id` = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $primeironome = $row['primeironome'];
            $ultimonome = $row['ultimonome'];
            $email = $row['email'];
            $password = $row['password'];
            $genero = $row['genero'];
            $id = $row['id'];
        }
    }
?>

    <h2>Formulário de Atualização</h2>

    <form action="" method="post">
        <fieldset>
            <legend>Informação PessoaL:</legend>
            Primeiro Nome: <br>
            <input type="text" name="primeironome" value="<? echo $primeironome; ?>">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <br>
            Ultimo Nome: <br>
            <input type="text" name="ultimonome" value="<? echo $ultimonome; ?>">
            <br>
            E-mail: <br>
            <input type="email" name="email" value="<? echo $email; ?>">
            <br>
            Password: <br>
            <input type="text" name="password" value="<? echo $password; ?>">
            <br>
            Gênero: <br>
            <input type="radio" name="genero" value="Masculino" <?php if ($genero == 'Masculino') {
                                                                    echo "checked";
                                                                }  ?>>Masculino">
            <input type="radio" name="genero" value="Feminino" <?php if ($genero == 'Feminino') {
                                                                    echo "checked";
                                                                }  ?>>Feminino">
            <input type="radio" name="genero" value="Outros" <?php if ($genero == 'Outros') {
                                                                    echo "checked";
                                                                }  ?>>Outros">
            <br><br>
            <input type="submit" value="update" name="update">
        </fieldset>
    </form>

<?php

} else {
    header('Location:consultar.php');
}
?>