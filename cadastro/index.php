<?php
    $form1 = true;
    $form2 = false;
    $form3 = false;

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['form1'])){
        $form1 = false;
        $form2 = true;
    };
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['form2'])){
        $form1 = false;
        $form2 = false;
        $form3 = true;
    };

    $resp = [
        $_POST['perg1'] ?? null,
        $_POST['perg2'] ?? null,
        $_POST['perg3'] ?? null,
        $_POST['perg4'] ?? null,
        $_POST['perg5'] ?? null,
        $_POST['perg6'] ?? null,
        $_POST['perg7'] ?? null,
        $_POST['perg8'] ?? null,
        $_POST['perg9'] ?? null,
        $_POST['perg10'] ?? null
    ];

    $segundos = $_POST['segundos'] ?? 0;
    $minutos = $_POST['minutos'] ?? 0;
    $horas = $_POST['horas'] ?? 0;

    $acertos = 0;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            
            var num = 0;
            var intervalo = 0;
            var segundos = 0;
            var minutos = 0;
            var horas = 0;
            isPaused = true;

            //Cronômetro
            function cronometrar(){
                intervalo = setInterval(soma, 1000);
                isPaused = false;
            };

            function soma(){
                num += 1;
                $("#visor").val(num);
                
                //Cronometragem de tempo.
                if(num >= 60){
                    minutos = int(num/60);
                    segundos = int(num%60)
                }else if(num <60){
                    segundos = num;
                };

                if(minutos >= 60){
                    horas = int(minutos/60);
                    minutos = int(minutos%60);
                };
            };
            
            <?php
                if($form2){
                        echo "cronometrar()";
                };

                if($form3){
                    echo "clearInterval(intervalo)";
                 };
             ?>

            function mostrarForm(){
                $('#form2').show();
            };

            $("#visor").val(num);
            
            $.ajax({
                type: 'POST',
                url: 'index.php',
                data: {'horas1': horas, 'minutos2': minutos, 'segundos3': segundos}
            });
        });
    </script>
    <title>Atividade Quiz</title>
    <style>
        body {
            background-color: #e0f7fa; /* Fundo suave */
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        main, section {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            margin: 20px;
        }

        label {
            display: block;
            margin-bottom: 15px;
            font-weight: bold;
            color: #333333;
        }

        input[type="text"], 
        input[type="email"], 
        input[type="password"], 
        select {
            width: calc(100% - 10px);
            padding: 10px;
            margin: 5px 0 15px;
            border: 1px solid #cccccc;
            border-radius: 5px;
            font-size: 14px;
            background-color: #f9f9f9;
        }

        select {
            cursor: pointer;
        }

        input[type="radio"] {
            margin-right: 5px;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        button:hover {
            background-color: #0056b3;
            box-shadow: 0px 6px 8px rgba(0, 0, 0, 0.15);
        }

        /* Estilo específico para as perguntas */
        form#form2 label {
            font-size: 14px;
            font-weight: normal;
            margin-bottom: 15px;
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 5px;
            color: #444;
        }

        form#form2 label input[type="radio"] {
            margin-top: 5px;
        }

        form#form2 {
            padding-top: 10px;
        }

        form#form2 label {
            margin-bottom: 10px; /* Maior espaço entre perguntas */
        }

</style>
</head>
<body>
<center>
<?php if($form1): ?>
    <main>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post" id="form1">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="" required>
            <br>
            <label for="email">E-mail:</label>
            <input type="email" name="email" id="" required>
            <br>
            <label for="senha">Senha:</label>
            <input type="password" name="pass" id="" required>
            <br>
            <label for="ensino">Ensino:</label>
            <select name="ensino" id="" required>
                <option value="fundamental">Ensino fundamental</option>
                <option value="1ano">1° ano do Ensino médio</option>
                <option value="2ano">2° ano do Ensino médio</option>
                <option value="3ano">3° ano do Ensino médio</option>
                <option value="superiorc">Ensino superior (cursando)</option>
                <option value="superior">Ensino superior</option>
            </select>
            <button type="submit" name="form1">Enviar</button>
        </form>
    </main>
<?php endif; ?>
    <br>
    <?php if($form2): ?>
        <input type="text" id="visor" value="0" readonly>
    <section>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post" id="form2">
            <!--Seria mil vezes mais fácil se eu tivesse utilizado apenas 0 e 1. Porém, eu optei por utilizar os nomes de cada resposta correta, pela visualização do código.-->
            <label for="perg1">Qual é a linguagem cujo o foco nos dias de hoje é voltado para IA's?
                <br>
                PHP<input type="radio" name="perg1" id="php" value="PHP" required>
                <br>
                Java<input type="radio" name="perg1" id="java" value="Java" required>
                <br>
                Python<input type="radio" name="perg1" id="python" value="Python" required>
                <br>
                JavaScript<input type="radio" name="perg1" id="javaScript" value="JavaScrit" required>
                <br>
            </label>
            <br>
            <label for="perg2">Qual sistema operacional é conhecido por ser open source e baseado no kernel Linux?
                <br>
                Windows<input type="radio" name="perg2" id="windows" value="Windows" required>
                <br>
                Android<input type="radio" name="perg2" id="android" value="Android" required>
                <br>
                macOS<input type="radio" name="perg2" id="macos" value="macOS" required>
                <br>
                Ubuntu<input type="radio" name="perg2" id="ubuntu" value="Ubuntu" required>
                <br>
            </label>
            <br>
            <label for="perg3">O que significa a sigla 'OOP' em programação?
                <br>
                Open Output Programming<input type="radio" name="perg3" id="openOutputProgramming" value="Open Output Programming" required>
                <br>
                Object-Oriented Programming<input type="radio" name="perg3" id="objectOrientedProgramming" value="Object-Oriented Programming" required>
                <br>
                Operational Output Programming<input type="radio" name="perg3" id="operationalOutputProgrammingerg3" value="Operational Output Programming" required>
                <br>
                Object Operating Protocol<input type="radio" name="perg3" id="objectOperatingProtocol" value="Object Operating Protocol" required>
                <br>
            </label>
            <br>
            <label for="perg4">Qual é a função principal de um sistema operacional?
                <br>
                Criar gráficos para jogos<input type="radio" name="perg4" id="criarGraf" value="criarGraf" required>
                <br>
                Renderização de vídeos e fotos<input type="radio" name="perg4" id="render" value="render" required>
                <br>
                Prevenir a pirataria<input type="radio" name="perg4" id="pirataria" value="pirataria" required>
                <br>
                Gerenciar o hardware e software do computador<input type="radio" name="perg4" id="hardware" value="hardware" required>
                <br>
            </label>
            <br>
            <label for="perg5">O que significa 'HTML'?
                <br>
                Hyper Trainer Markup Language<input type="radio" name="perg5" id="hyperTrainerMarkupLanguage" value="hyperTrainerMarkupLanguage" required>
                <br>
                High Text Machine Language<input type="radio" name="perg5" id="highTextMachineLanguage" value="highTextMachineLanguage" required>
                <br>
                Hyper Text Markup Language<input type="radio" name="perg5" id="hyperTextMarkupLanguage" value="hyperTextMarkupLanguage" required>
                <br>
                Hyperlinking Text Management Language<input type="radio" name="perg5" id="hyperlinkingTextManagementLanguage" value="hyperlinkingTextManagementLanguage" required>
                <br>
            </label>
            <br>
            <label for="perg6">Qual dessas tecnologias é usada para criar páginas dinâmicas na web?
                <br>
                CSS<input type="radio" name="perg6" id="CSS" value="CSS" required>
                <br>
                HTML<input type="radio" name="perg6" id="HTML" value="HTML" required>
                <br>
                SQL<input type="radio" name="perg6" id="SQL" value="SQL" required>
                <br>
                JavaScript<input type="radio" name="perg6" id="JavaScript" value="JavaScript" required>
                <br>
            </label>
            <br>
            <label for="perg7">Qual protocolo é utilizado para envio de emails?
                <br>
                SMTP<input type="radio" name="perg7" id="smtp" value="SMTP" required>
                <br>
                HTTP<input type="radio" name="perg7" id="http" value="HTTP" required>
                <br>
                FTP<input type="radio" name="perg7" id="ftp" value="FTP" required>
                <br>
                DNS<input type="radio" name="perg7" id="dns" value="DNS" required>
                <br>
            </label>
            <br>
            <label for="perg8">O que é um firewall?
                <br>
                Um tipo de vírus de computador<input type="radio" name="perg8" id="virus" value="virus" required>
                <br>
                Um sistema de segurança de rede<input type="radio" name="perg8" id="seguran" value="seguran" required>
                <br>
                Um sistema de armazenamento de dados<input type="radio" name="perg8" id="armazem" value="armazem" required>
                <br>
                Um software para criação de páginas web<input type="radio" name="perg8" id="software" value="software" required>
                <br>
            </label>
            <br>
            <label for="perg9">Qual é a principal função da memória RAM em um computador?
                <br>
                Armazenar permanentemente os dados<input type="radio" name="perg9" id="amarzdados" value="amarzdados" required>
                <br>
                Executar tarefas e armazenar dados temporários<input type="radio" name="perg9" id="temp" value="temp" required>
                <br>
                Processar gráficos 3D<input type="radio" name="perg9" id="graf3d" value="graf3d" required>
                <br>
                Conectar dispositivos de entrada e saída<input type="radio" name="perg9" id="entradaesaida" value="entradaesaida" required>
                <br>
            </label>
            <br>
            <label for="perg10">Quem é considerado o "pai" da computação moderna?
                <br>
                Bill Gates<input type="radio" name="perg10" id="bill" value="bill" required>
                <br>
                Steve Jobs<input type="radio" name="perg10" id="jobs" value="jobs" required>
                <br>
                Alan Turing<input type="radio" name="perg10" id="alan" value="alan" required>
                <br>
                Tim Berners-Lee<input type="radio" name="perg10" id="tim" value="tim" required>
                <br>
            </label>
            <button type="submit" name="form2">Enviar</button>
        </form>
    </section>
    <?php endif; ?>
    <?php if($form3): ?>
    <section>
        <?php
            $horas = $_POST['horas1'];
            $minutos = $_POST['minutos2'];
            $segundos = $_POST['segundos3'];

            if(in_array(null, $resp)){
                echo '<script type="text/javascript">
                        alert("Responda todas as perguntas.");
                      </script>';
            };

            echo "<br><strong>Qual é a linguagem cujo o foco nos dias de hoje é voltado para IA's?</strong><br>";
            echo "<strong>Sua Resposta: $resp[0]</strong><br>";
            if($resp[0] == "Python"){
                echo "<br>Resposta correta!<br>";
                $acertos++;
            }else{
                echo "<br>Resposta incorreta!<br>";
                echo "Resposta correta: Python<br>";
            };
            echo "<br><strong>Qual sistema operacional é conhecido por ser open source e baseado no kernel Linux?</strong><br>";
            echo "<strong>Sua Resposta: $resp[1]</strong><br>";
            if($resp[1] == "Ubuntu"){
                echo "<br>Resposta correta!<br>";
                $acertos++;
            }else{
                echo "<br>Resposta incorreta!<br>";
                echo "Resposta correta: Ubuntu<br>";
            };
            echo "<br><strong>O que significa a sigla 'OOP' em programação?</strong><br>";
            echo "<strong>Sua Resposta: $resp[2]</strong><br>";
            if($resp[2] == "Object-Oriented Programming"){
                echo "<br>Resposta correta!<br>";
                $acertos++;
            }else{
                echo "<br>Resposta incorreta!<br>";
                echo "Resposta correta: Object-Oriented Programming<br>";
            };
            echo "<br><strong>Qual é a função principal de um sistema operacional?</strong><br>";
            echo "<strong>Sua Resposta: $resp[3]</strong><br>";
            if($resp[3] == "hardware"){
                echo "<br>Resposta correta!<br>";
                $acertos++;
            }else{
                echo "<br>Resposta incorreta!<br>";
                echo "Resposta correta: Gerenciar o hardware e software do computador<br>";
            };
            echo "<br><strong>O que significa 'HTML'?</strong><br>";
            echo "<strong>Sua Resposta: $resp[4]</strong><br>";
            if($resp[4] == "hyperTextMarkupLanguage"){
                echo "<br>Resposta correta!<br>";
                $acertos++;
            }else{
                echo "<br>Resposta incorreta!<br>";
                echo "Resposta correta: Hyper Text Markup Language<br>";
            };
            echo "<br><strong>Qual dessas tecnologias é usada para criar páginas dinâmicas na web?</strong><br>";
            echo "<strong>Sua Resposta: $resp[5]</strong><br>";
            if($resp[5] == "JavaScript"){
                echo "<br>Resposta correta!<br>";
                $acertos++;
            }else{
                echo "<br>Resposta incorreta!<br>";
                echo "Resposta correta: JavaScript<br>";
            };
            echo "<br><strong>Qual protocolo é utilizado para envio de emails?</strong><br>";
            echo "<strong>Sua Resposta: $resp[6]</strong><br>";
            if($resp[6] == "SMTP"){
                echo "<br>Resposta correta!<br>";
                $acertos++;
            }else{
                echo "<br>Resposta incorreta!<br>";
                echo "Resposta correta: SMTP<br>";
            };
            echo "<br><strong>O que é um firewall?</strong><br>";
            echo "<strong>Sua Resposta: $resp[7]</strong><br>";
            if($resp[7] == "seguran"){
                echo "<br>Resposta correta!<br>";
                $acertos++;
            }else{
                echo "<br>Resposta incorreta!<br>";
                echo "Resposta correta: Um sistema de segurança de rede<br>";
            };
            echo "<br><strong>Qual é a principal função da memória RAM em um computador?</strong><br>";
            echo "<strong>Sua Resposta: $resp[8]</strong><br>";
            if($resp[8] == "temp"){
                echo "<br>Resposta correta!<br>";
                $acertos++;
            }else{
                echo "<br>Resposta incorreta!<br>";
                echo "Resposta correta: Executar tarefas e armazenar dados temporários<br>";
            };
            echo "<br><strong>Quem é considerado o \"pai\" da computação moderna?</strong><br>";
            echo "<strong>Sua Resposta: $resp[9]</strong><br>";
            if($resp[9] == "alan"){
                echo "<br>Resposta correta!<br>";
                $acertos++;
            }else{
                echo "<br>Resposta incorreta!<br>";
                echo "Resposta correta: Alan Turing<br>";
            };

            echo "<br>Você levou <strong> $horas hora(s)</strong>, <strong> $minutos minuto(s)</strong> e <strong> $segundos segundo(s)</strong> para finalizar o quiz!";
        ?>
    </section>
    <?php endif; ?>
</center>
</body>
</html>