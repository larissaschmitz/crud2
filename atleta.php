<!DOCTYPE html>
<?php 
   include_once "conf/default.inc.php";
   require_once "conf/Conexao.php";
   $title = "Atleta";
   $procurar = isset($_POST["procurar"]) ? $_POST["procurar"] : ""; 
   $busca = isset($_POST["busca"]) ? $_POST["busca"] : 1;
?>
<html>
<head>
    <meta charset="UTF-8">
    <title> <?php echo $title; ?> </title>
</head>
<body>
<?php include "menu.php"; ?>
<form method="post">
    <fieldset>Ordernar e pesquisar por:<br>
        <input type="radio" id="1" name="busca" value="1" <?php if ($busca == "1") echo "checked" ?>>ID<br>
        <input type="radio" id="2" name="busca" value="2" <?php if ($busca == "2") echo "checked" ?>>Nome<br>
        <input type="radio" id="3" name="busca" value="3" <?php if ($busca == "3") echo "checked" ?>>Peso<br>
        <input type="radio" id="4" name="busca" value="4" <?php if ($busca == "4") echo "checked" ?>>Altura<br>
        
    </fieldset>
    <fieldset>
        <legend>Procurar Atleta</legend>
        <input type="text"   name="procurar" id="procurar" size="37" value="<?php echo $procurar;?>">
        <input type="submit" name="acao"     id="acao">
        <br><br>

        <table>
        <tr><td><b>Id</b></td><td><b>Nome</b></td><td><b>Peso</b></td><td><b>Altura</b></td> </tr>
        <?php
            $pdo = Conexao::getInstance(); 
            if($busca == 1){
                $consulta = $pdo->query("SELECT * FROM atleta 
                                        WHERE ID LIKE '$procurar%' 
                                        ORDER BY ID");}
                
                else if($busca == 2){
                $consulta = $pdo->query("SELECT * FROM atleta 
                                        WHERE nome LIKE'$procurar%'
                                        ORDER BY nome");}
                
                else if ($busca == 3){
                $consulta = $pdo->query("SELECT * FROM atleta 
                                        WHERE peso <= '$procurar%' 
                                        ORDER BY peso");}
                else{
                    $consulta = $pdo->query("SELECT * FROM atleta 
                                            WHERE altura <= '$procurar%' 
                                            ORDER BY altura");}

            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) { 
        ?>
        <tr><td><?php echo $linha['id'];?></td>
            <td><?php echo $linha['nome'];?></td>
            <td><?php echo number_format ($linha['peso'], 1, ',', '.');?></td>
            <td><?php echo number_format ($linha['altura'], 2, ',', '.');?></td>
        </tr>
            <?php } ?>       
        </table>
    </fieldset>
    
</body>
</html>