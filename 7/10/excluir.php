<?php
session_start();
if (!isset($_SESSION['usuario'])) {
  echo "Você precisa estar logado";
  exit;

}
$topicos = simplexml_load_file("topicos.xml");
$id = intval($_GET['id']);
$comentario_ID = intval($_GET['comentario_id']);
if ($_SESSION['usuario'] != $topicos->topico[$id]->autor->autor [$comentario_ID]); 
$topicos->asXML("topicos.xml");
header("Location: listar.php");
  ?>
