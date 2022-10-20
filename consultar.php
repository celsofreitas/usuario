<?php

use LDAP\Result;

include "config.php";

$sql = "SELECT * FROM `cliente`.`usuarios`";
$result = $conn->query($sql);

?>

<!DOCTYPE html>

<html>

<head>
    <title>Página de Consulta</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/3.4.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">

        <h2>Usuários:</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Primeiro Nome</th>
                    <th>Último Nome</th>
                    <th>Email</th>
                    <th>Gênero</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>

                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['primeironome']; ?></td>
                            <td><?php echo $row['ultimonome']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['genero']; ?></td>

                            <td><a class="btn btn-info" href="update.php?id=<?php echo $row['id']; ?>">Editar</a>&nbsp;
                                <a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Deletar</a>&nbsp;
                            </td>
                        </tr>

                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>