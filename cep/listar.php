<?php
// definições de host, database, usuário e senha

require("conexao.php");
// cria a instrução SQL que vai selecionar os dados
$query = "SELECT cep, logradouro, numero, complemento, bairro, cidade, uf FROM consultacep";
// executa a query
$dados = mysqli_query($conn, $query) or die(mysqli_error());
// transforma os dados em um array
$linha = mysqli_fetch_assoc($dados);
// calcula quantos dados retornaram
$total = mysqli_num_rows($dados);
?>

<html>
<head>
  <title>Exemplo</title>
</head>
<body>
  <h1>Registros</h1>
  <table border="1">
    <tr>
      <th>Cep</th>
      <th>Logradouro</th>
      <th>Numero</th>
      <th>Complemento</th>
      <th>Bairro</th>
      <th>Cidade</th>
      <th>UF</th>
    </tr>
  <?php
  // se o número de resultados for maior que zero, mostra os dados
  if($total > 0) {
    // inicia o loop que vai mostrar todos os dados
    do {
      ?>

        <tr>
          <td><?=$linha['cep']?> </td>
          <td><?=$linha['logradouro']?></td>
          <td><?=$linha['numero']?></td>
          <td><?=$linha['complemento']?></td>
          <td><?=$linha['bairro']?></td>
          <td> <?=$linha['cidade']?></td>
          <td><?=$linha['uf']?></td>
        </tr>

      <!-- <p><?=$linha['cep']?> / <?=$linha['logradouro']?>/ <?=$linha['numero']?>/ <?=$linha['complemento']?>/ <?=$linha['bairro']?>/ <?=$linha['cidade']?>/ <?=$linha['uf']?></p> -->
      <?php
      // finaliza o loop que vai mostrar os dados
    }while($linha = mysqli_fetch_assoc($dados));
    // fim do if
  }

  ?>
</table><a href="listar.php">
  <button>
    Atualizar
  </button></a>
</body>
</html>
<?php
// tira o resultado da busca da memória
mysqli_free_result($dados);
?>
