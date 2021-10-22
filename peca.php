<!DOCTYPE html>
<?php 
   include_once "conf/default.inc.php";
   require_once "conf/Conexao.php";
   $title = "Peça";
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
        <input type="radio" id="2" name="busca" value="2" <?php if ($busca == "2") echo "checked" ?>>Descrição<br>
        <input type="radio" id="3" name="busca" value="3" <?php if ($busca == "3") echo "checked" ?>>Valor<br>
        <input type="radio" id="4" name="busca" value="4" <?php if ($busca == "4") echo "checked" ?>>Fornecedor<br>
        
    </fieldset>
    <fieldset>
        <legend>Procurar Peça</legend>
        <input type="text"   name="procurar" id="procurar" size="37" value="<?php echo $procurar;?>">
        <input type="submit" name="acao"     id="acao">
        <br><br>
        <table>
        <tr><td><b>Id</b></td><td><b>Descrição</b></td><td><b>Valor</b></td><td><b>Fornecedor</b></td> <td><b>Garantia</b></td> </tr>
        <?php
            $pdo = Conexao::getInstance(); 
            if($busca == 1){
                $consulta = $pdo->query("SELECT * FROM peca 
                                        WHERE ID LIKE '$procurar%' 
                                        ORDER BY ID");}
                
                else if($busca == 2){
                $consulta = $pdo->query("SELECT * FROM peca 
                                        WHERE descricao LIKE'$procurar%'
                                        ORDER BY descricao");}
                
                else if ($busca == 3){
                $consulta = $pdo->query("SELECT * FROM peca 
                                        WHERE valor <= '$procurar%' 
                                        ORDER BY valor");}
                else{
                    $consulta = $pdo->query("SELECT * FROM peca 
                                            WHERE fornecedor LIKE '$procurar%' 
                                            ORDER BY fornecedor");}

            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) { 
        ?>
        <tr><td><?php echo $linha['id'];?></td>
            <td><?php echo $linha['descricao'];?></td>
            <td><?php echo number_format ($linha['valor'], 2, ',', '.');?></td>
            <td><?php echo $linha['fornecedor'];?></td>
            <td><?php echo date("d/m/Y", strtotime($linha['garantia']));?></td>
        </tr>
            <?php } ?>       
        </table>
    </fieldset>
    </form>
</body>
</html>