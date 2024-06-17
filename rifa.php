<?php
$premio = "Iphone";
$valor = 2000;
$quantNum = 3;
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" href="rifa.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Aula PHP</title>
</head>

<body>
    <div class="header">
        <h1 style="color: #fff;">RIFA ENTRE AMIGOS</h1>
    </div>
    <div class="container">
            <form id="rifaForm">
            <label for="rifaQuantidade">Quantidade de Rifas:</label>
            <input type="number" id="rifaQuantidade" name="rifaQuantidade" min="1" required>
            <button type="submit">Adicionar Rifas</button>
            </form>
        <div id="rifaList">
            <?php
            $cont = 1;
            while ($cont <= $quantNum) {
                echo "<table>
                        <td class='caixa_1' style='border: 2px solid black; border-radius: 20px; border-right: 2px dashed black;'>
                            <h4>N°: $cont</h4>
                            <h4>Nome:___________________</h4>
                            <h4>Telefone:</h4>
                            <h4>E-mail:__________________</h4>
                        </td>
                        <td class='caixa_2'>
                            <h4>Ação Entre Amigos CSL</h4>
                            <h4>$premio</h4>
                            <h4>valor: R$ $valor,00</h4>
                            <h4>N°: $cont</h4>
                        </td>
                        <td class='caixa_3' style='border: 2px solid black;'>
                            <img src='img/celular.png' style='width: 120px;'>
                        </td>
                    </table>";
                $cont++;
            }
            ?>
        </div>
    </div>
    <a href="principal.php"><button class="btn-voltar">Voltar</button></a>
    <footer class="footer">Copyright - Maurício Scheffer🖥️ - 2024</footer>
    <script>
        document.getElementById('rifaForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const quantidade = document.getElementById('rifaQuantidade').value;
            const rifaList = document.getElementById('rifaList');

            rifaList.innerHTML = ''; // Limpa a lista atual de rifas

            for (let i = 0; i < quantidade; i++) {
                const cont = i + 1;
                const table = document.createElement('table');
                table.innerHTML = `
                    <td class='caixa_1' style='border: 2px solid black; border-radius: 20px; border-right: 2px dashed black;'>
                        <h4>N°: ${cont}</h4>
                        <h4>Nome:___________________</h4>
                        <h4>Telefone:</h4>
                        <h4>E-mail:__________________</h4>
                    </td>
                    <td class='caixa_2'>
                        <h4>Ação Entre Amigos CSL</h4>
                        <h4>${"<?php echo $premio; ?>"}</h4>
                        <h4>valor: R$ ${"<?php echo $valor; ?>,00"}</h4>
                        <h4>N°: ${cont}</h4>
                    </td>
                    <td class='caixa_3' style='border: 2px solid black;'>
                        <img src='img/celular.png' style='width: 120px;'>
                    </td>
                `;
                rifaList.appendChild(table);
            }

            document.getElementById('rifaQuantidade').value = ''; // Limpa o campo de entrada
        });
    </script>   
</body>

</html>