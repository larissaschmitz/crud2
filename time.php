<!DOCTYPE html>
<?php 
   include_once "conf/default.inc.php";
   require_once "conf/Conexao.php";
   $title = "Time";
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
        <input type="radio" id="3" name="busca" value="3" <?php if ($busca == "3") echo "checked" ?>>Cidade<br>
        <input type="radio" id="4" name="busca" value="4" <?php if ($busca == "4") echo "checked" ?>>Pontos<br>
        
    </fieldset>
    <fieldset>
        <legend>Procurar Time</legend>
        <input type="text"   name="procurar" id="procurar" size="37" value="<?php echo $procurar;?>">
        <input type="submit" name="acao"     id="acao">
        <br><br>

        <table>
	    <tr><td><b>Id</b></td><td><b>Nome</b></td><td><b>Cidade</b></td><td><b>Pontos</b></td> <td><b>Data de Fundação</b></td> </tr>
        <?php
            $pdo = Conexao::getInstance(); 
            if($busca == 1){
                $consulta = $pdo->query("SELECT * FROM time 
                                        WHERE ID LIKE '$procurar%' 
                                        ORDER BY ID");}
                
                else if($busca == 2){
                $consulta = $pdo->query("SELECT * FROM time 
                                        WHERE nome LIKE'$procurar%'
                                        ORDER BY nome");}
                
                else if ($busca == 3){
                $consulta = $pdo->query("SELECT * FROM time 
                                        WHERE cidade LIKE '$procurar%' 
                                        ORDER BY cidade");}
                else{
                    $consulta = $pdo->query("SELECT * FROM time 
                                            WHERE pontos <= '$procurar%' 
                                            ORDER BY pontos");}


            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) { 
        ?>
	    <tr><td><?php echo $linha['id'];?></td>
            <td><?php echo $linha['nome'];?></td>
            <td><?php echo $linha['cidade'];?></td>
            <td><?php echo $linha['pontos'];?></td>
            <td><?php echo $linha['dataFundacao'];?></td>
	    </tr>
            <?php } ?>       
        </table>
    </fieldset>
    
</body>
</html>