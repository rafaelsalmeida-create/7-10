<?php
session_start();
if (!isset($_SESSION['usuario'])) {
  echo "Você precisa estar logado para criar um tópico";
  exit;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $topicos = simplexml_load_file("topicos.xml");
  $novo = $topicos->addChild("topico");
  $novo->addChild("autor", $_POST['usuario']);
  $novo->addChild("titulo", $_POST['titulo']);
  $novo->addChild("mensagem", $_POST['mensagem']);
  $topicos->asXML("comentarios");
  echo "Tópico criado com sucesso! <a href='listar.php'>Ver tópicos</a>";
} else {
?>
<form
  method="post">
    Título: <input type="text" name="titulo" required><br>
    Mensagem: <textarea name="mensagem" required></textarea><br>
    <button type="submit" value="Criar">Criar</button>
</form>
<?php
}
