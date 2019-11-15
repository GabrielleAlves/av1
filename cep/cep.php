<?php
require ("conexao.php");


function get_endereco($cep){
  $cep=preg_replace('/[^0-9]/', '', (string) $cep);
  $url = "http://viacep.com.br/ws/".$cep."/json/";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_URL, $url);
  $result = curl_exec($ch);
  curl_close($ch);

  $json=json_decode($result);
  return $json;
}
?>
<meta charset="utf-8">
<h1>Pesquisar Endereço</h1>
<form action="" method="post">
  <input type="text" name="cep" id="cep">
  <button type="submit">Pesquisar Endereço</button>
</form>
<?php

if(isset($_POST['cep'])){
  if ($_POST['cep'] == "" || $_POST['cep'] == null){
    echo "<script>alert('preencha o cep')</script>";}
    else{$cepp = $_POST['cep'];
      ?>

      <h2>Resultado da Pesquisa</h2>
      <form action="guardacep.php" method="post">
        <?php $endereco = get_endereco($cepp); ?>
        <label >CEP: </label><input type="text" name="cp" id="cp" value="<?php echo $endereco->cep; ?>"></input><br>
        <label >Logradouro: </label><input type="text" name="logradouro" id="logradouro" value="<?php echo $endereco->logradouro; ?>"></input><br>
        <label >Numero: </label><input type="text" name="numero" id="numero"/><br>
        <label >Complemento: </label><input type="text" name="complemento" id="complemento"/><br>
        <label >Bairro: </label><input type="text" name="bairro" id="bairro" value="<?php echo $endereco->bairro; ?>"></input><br>
        <label >Cidade: </label><input type="text" name="cidade" id="cidade" value="<?php echo $endereco->localidade; ?>"></input><br>
        <label >UF: </label><input type="text" name="uf" id="uf" value="<?php echo $endereco->uf; ?>"></input><br>
        <button type="submit">Guardar Endereço</button>
      </form>
    <?php }
}
    ?>
