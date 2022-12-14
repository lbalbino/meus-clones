    <html>        
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Listar-Admins</title>
</head>
    <style>
        body {
    background-color: rgb(0, 0, 0);
    margin: 0;
      padding: 0;
      font-family: system-ui, 'Segoe UI', 'Open Sans', 'Helvetica Neue', sans-serif;
      background: #000000;
}


.table{
    position: absolute;
    top: 10%;
    box-sizing: border-box;
    box-shadow:5px 5px 10px rgba(0, 0, 0, 0.699);
    margin: 10px 10px 10px 0px;
    color: rgb(255, 255, 255);
}
.menu{
    background: black;
    position: absolute;
    width: 100%;
    box-shadow: 0 0 2rem red;
      border: 1px solid red;
      border-bottom: 10px solid red;
}

.menu nav{
    position: relative;
    display: flex;
    max-width: calc(100% - 200px);
    margin: 0 auto;
    height: 70px;
    align-items: center;
    justify-content: space-between;
}
nav .conteudo{
    display: flex;
    align-items: center;
}
nav .conteudo .links{
    margin-left: 80px;
    display: flex;
}
.conteudo .logo {
    max-width: 100px;
    max-height: 100px;
    width: auto;
    height: auto;
}
.conteudo .links li{
    list-style: none;
}
.conteudo .links li a{
    color: white;
    font-size: 18px;
    font-weight: 500;
    padding: 7px 17px;
    border-radius: 5px;
}
.conteudo .links li:hover a{
    background: red;
    transition: .3s;
}

    </style>
    <body>
        <header>
        <div class="menu">
    <nav>
        <div class="conteudo">
        <div class="logo"> <img src="../Imagens/logobravo.png" alt="LogoMarca" class="logo"></div>
        <ul class="links">
            <li><a href="login.php">Login</a></li>
            <li><a href="CadastroAdm.php">Cadastro</a></li>
            <li><a href="cadastroDeProdutos.php">Cadastro de Produtos</a></li>
            <li><a href="listaradmins.php">Lista ADM</a></li>
            <li><a href="../CATEGORIAS/listaCategoria.php">Categoria</a></li>
            <li><a href="listaProdutos.php">Produtos</a></li>
        </ul>
        </div>
            </nav>
        </header>
        
    <?php
        $mysqlhostname= "144.22.244.104";
        $mysqlport="3306";
        $mysqlusername="Bravo4Fun";
        $mysqlpassword="Bravo4Fun";
        $mysqldatabase="Bravo4Fun";

        
        $dsn='mysql:host=' . $mysqlhostname . ";dbname=" . $mysqldatabase . ';port=' . $mysqlport;
        $pdo= new PDO($dsn, $mysqlusername, $mysqlpassword);

        $cmd= $pdo->query("SELECT * FROM ADMINISTRADOR WHERE COALESCE(ADM_ATIVO,1)=1");   
        
        $admins = $cmd->fetch(PDO::FETCH_NUM);

    ?>

    <table border="1" class=table>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Senha</th>
            <th>Atualiza????o</th>
            <th>Ocultar</th>            
        </tr>
<?php

while($linha = $cmd->fetch()) {
?>
    <tr>
        <td>
            <?php 
                echo $linha["ADM_ID"];
            ?>
        </td>
        <td>
            <?php
                echo $linha["ADM_NOME"];
            ?>
        </td>
        <td>
            <?php
                echo $linha["ADM_EMAIL"];
            ?>
        </td>    
        <td>
            <?php
                echo $linha["ADM_SENHA"];
            ?>
        </td>    
        <td>
            <a href="atualizaradmin.php?id=<?php echo $linha["ADM_ID"] ?>">Atualizar</a>
        </td>
        <td>
            <a href="excluirform.php?id=<?php echo $linha["ADM_ID"] ?>">Ocultar</a>
        </td>        
    </tr>
<?php
    } 
?>
    </table>

    </body>
    </html>