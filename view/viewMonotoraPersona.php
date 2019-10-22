<?php
include("../controller/controleAcesso.php");
include('../controller/conexao.php');

$sql = "SELECT f.id, f.nome, f.email, CASE f.func_ativo WHEN 1 THEN 'ON' WHEN 0 THEN 'OFF' END as status, c.placa FROM funcionario f LEFT join carro c on f.id_car = c.id";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastro</title>
    <meta charser="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href=../css/stylenav.css rel="stylesheet">
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
</head>
<body>
<div>
<?php include("navbar.php")?>

  <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Acessar</th>
          </tr>
        </thead>
        <tbody>
          <?php while($dado = $result -> fetch_array()){?>
          <tr>
            <th scope="row"><?php echo $dado['status']?></th>
            <td><?php echo $dado['nome']?></td>
            <td><?php echo $dado['email']?></td>
            <td><form method="POST" action="../model/modelMonitoraPersona.php"><button value="<?php echo $dado['id'] ?>" name = "id_func" type="submit" class="btn btn-success">Acessar</button></form></td>
          </tr>
          <?php }?>
        </tbody>
      </table>

    </div>
</body>
</html>