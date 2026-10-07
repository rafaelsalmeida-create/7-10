<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $usuarios = simplexml_load_file("usuarios.xml");
  foreach ($usuarios->usuario as $usuario) {
    if ($usuario->email == $_POST['email'] && $usuario->senha == md5($_POST['senha'])) {
      $_SESSION['usuario'] = (string)$usuario->nome;
      echo "<script>alert('Login realizado com sucesso!'); window.location.href='index.php';</script>";
      exit;
    }
  } echo "Login invalido!";
} else {
  ?>
    <form method="post">
      Email: <input type="email" name="email" required><br>
      Senha: <input type="password" name="senha" required><br>
      <button type="submit" value="Login">Login</button>
    </form>
  <?php
}
