<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questionário</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet' type='text/css' media='screen' href='style.css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src='codigo.js'></script>
</head>
<body>
<ul>
        
       
 <li><a href="questi.php">Questão</a></li>
           
</ul>


<center>
<h1>Logar</h1>

 <button class = "botao" id="btn"  >Digite seu nome </button>
    <input type="text"  class="corletra"  id="texto" val="" placeholder="Digite seu nome" require>
    <br>
    <button class = "botao" id="btn2">Digite sua idade</button>
     <input type="number" class="corletra"  id="idade" val="" placeholder="Digite sua idade" require>
    <br>
     <button class = "botao" id="btn3">Digite seu Email</button>
     <input type="text" class="corletra"  id="email" val="" placeholder="Digite seu Email" require>
     <br>
    <select class="seleçao" id="escolaridade">
        <option value="">Escolaridade</option>
        <option value="1 ano ">1 ano </option>
        <option value="2 ano ">2 ano</option>
        <option value="3 ano ">3 ano </option>
    </select>
    <br>
    <button class = "btn" id="turma"  onclick="funcao()" value="Exibir Alert"  >Cadastrar</button>
    <br>
    


<center>



<?php 

?>

<script>
    function funcao()
{
    if($("#escolaridade").val() == 0) {
        alert("Selecione a escolaridade");
        return 0;
    }else if($("#texto").val() == 0) {
        alert("Preencha seu nome");
        return 0;
    }else if($("#idade").val() == 0) {
        alert("Preencha sua idade");
        return 0;
    }else if($("#email").val() == 0) {
        alert("Preencha email");
        return 0;
    
    }


alert($("#texto").val() + '\n' + $("#idade").val() + '\n' + $("#email").val() + '\n' + '\n' + $("#escolaridade").val() ) ;

}
</script>



    
</body>
</html>