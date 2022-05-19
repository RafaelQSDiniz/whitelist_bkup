<?php
session_start();
include_once 'conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="estilo.css"/>
        
    <title>WHITELIST</title>
</head>
<body>
    <div class="container">  

    <?php
       

        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        //var_dump($dados);

        if(!empty($dados['valResposta'])){
            //+1 contador 
            $_SESSION['contador']++;

            //Pesquisar resposta
            $query_val_resposta = "SELECT id AS id_resposta, resposta, pergunta_id, val_resposta FROM alternativas WHERE id=:id_resposta LIMIT 1";
            $result_val_resposta = $conn->prepare($query_val_resposta);
            $result_val_resposta->bindParam(':id_resposta', $dados['id_resposta'], PDO::PARAM_INT);
            $result_val_resposta->execute();
            $row_val_resposta = $result_val_resposta->fetch(PDO::FETCH_ASSOC);

            if($row_val_resposta['val_resposta'] == 1){

                $_SESSION['acertos']++; //<-add +1 respostas corretas
                $_SESSION['msg'] = "<p style='color:green'>Resposta Correta</p>";
            }else{
                $_SESSION['msg'] = "<p style='color:#ff0000'>Resposta Incorreta</p>";
            }

        /*
            //Pesquisar pergunta
            $query_pergunta = "SELECT id, questao FROM perguntas WHERE id=:id LIMIT 1";
            $result_pergunta = $conn->prepare($query_pergunta);
            $result_pergunta->bindParam(':id', $dados['id_pergunta'], PDO::PARAM_INT);
            $result_pergunta->execute();
        */
            //Pesquisar pergunta randomica
            $query_pergunta = "SELECT id, questao FROM perguntas ORDER BY RAND() LIMIT 1";
            $result_pergunta = $conn->prepare($query_pergunta);
            $result_pergunta->execute();
        }else{
            //iniciar contadores
            $_SESSION['contador'] = 1;
            $_SESSION['acertos'] = 0;

            //Pesquisar pergunta randomica
            $query_pergunta = "SELECT id, questao FROM perguntas ORDER BY RAND() LIMIT 1";
            $result_pergunta = $conn->prepare($query_pergunta);
            $result_pergunta->execute();
        }    

    /* mensagem de resposta certa / errada
      if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
        
    }
    */

    ?>
    <?php  //contador
        if ($_SESSION['contador']>5) {
            header('Location: resultado.php');
        }
    ?> 

     <div class="py-3 text-center ">
        <div class="col d-flex justify-content-center">
            <div class="titulo">  
                <?php echo "<h2>QUESTÃO:".$_SESSION['contador']."/5</h2>";  ?>
            </div>
        </div>
        <img class="d-block mx-auto mb-2" src="logo.png" alt="" width="220" height="200">
        
                 

    <form method="POST" class="form-check" action="" >

        <?php
            if(($result_pergunta) AND $result_pergunta->rowCount() != 0){
                $row_pergunta = $result_pergunta->fetch(PDO::FETCH_ASSOC);
                extract($row_pergunta);
                echo  "<h3>".$questao . "</h3><br>";
                echo "<input type='hidden' name='id_pergunta' value='$id' >";

                $query_resposta = "SELECT id AS id_resposta, resposta FROM alternativas WHERE pergunta_id = $id ORDER BY id ASC";
                $result_resposta = $conn->prepare($query_resposta);
                $result_resposta->execute();
                while($row_resposta = $result_resposta->fetch(PDO::FETCH_ASSOC)){
                    extract($row_resposta);
                    //echo $resposta . "<br>";

                    if(isset($dados['id_resposta']) AND (!empty($dados['id_resposta'])) AND $id_resposta == $dados['id_resposta']){
                        $selecionado = "checked";
                    }else{
                        $selecionado = "";
                    }
                    echo "<input class='form-check-input' type='radio' name='id_resposta' value='$id_resposta'required $selecionado><label >$resposta</label><br>";
                }
            }else{
                echo "Pergunta não encontrada!";
            }
        ?>
        <br>
        
         <div class="text-center">
            <input type="submit" name="valResposta" class="btn btn-primary btn-lg botao" value="Enviar">          
        </div>
    </form>


    <hr>
        
    <?php /*  //contador
        echo "Acertos:".$_SESSION['acertos']; 
        */ 
    ?> 
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    
    <a href="index.php">Recomeçar</a>
    <h4>Feito por Rafael Diniz</h4>
</div>

</body>
</html>