<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="calculadora.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Calculadora</title>
</head>
<body>
    <div class="container">
    <header>Calculadora IMC</header>
    <form action="calculadora.php" method="post">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome"
        required placeholder="Seu Nome"> <br><br>
        <label for="peso">Peso(kg): </label>
        <input type="number" id="peso" name="peso"
        step="0.1" required placeholder="Seu peso"> <br><br>
        <label for="altura">Altura(m):</label>
        <input type="number" name="altura" id="altura"
        step="0.01" required placeholder="Sua Altura"> <br><br>
        <label for="anoNasc">Ano de Nascimento:</label>
        <input type="number" name="anoNasc" id="anoNasc"
        required placeholder="Seu ano" min="1900"> <br><br>
        <input class="button" type="submit" value="Calcular">
        <input class="button" type="reset" value="Limpar">
        <a href="principal.php"><input class="button" type="button" value="Voltar"></a>
    </form>
    <div class="resposta">

    <?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['nome']) && isset($_POST['peso']) && isset($_POST['altura']) && isset($_POST['anoNasc'])){
        $ano = date('Y');
        $nome = $_POST['nome'];
        $peso = $_POST['peso'];
        $altura = $_POST['altura'];
        $anoNasc = $_POST['anoNasc'];
        $erro= empty($nome) || empty($peso) || empty($altura) || empty($anoNasc) ? "todos os campos são obrigatórios" : 
        ((!is_numeric($altura) || $peso <=0 || $altura <=0 || $anoNasc <= 1900) ? "por favor insira valores
        válidos para o peso, altura e ano de nascimento" : "");
        if($erro){
            echo $erro;
        }else{
            $imc = $peso / ($altura * $altura);
            $imc = number_format($imc, 2);
            $classificacao= ($imc < 18.5) ? "Abaixo do Peso" : (($imc < 24.9) ? "Peso normal" : (($imc < 29.9) ?
            "Sobrepeso" : "Obesidade"));

            $idade = $ano - $anoNasc;
            echo "Nome: $nome, $idade anos<br>";
            echo "Indíce de Massa Corporal: $imc <br>($classificacao)";
        }
    }else {echo "Formulário não enviado corretamente";}}?>
</div>
</div>
<footer>Copyright | Maurício Scheffer🖥️ | 2024</footer>
</body>
</html>