<?php
include("test_con.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta Tipo="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Produtos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>
    <header class="z-depth-2">
        <nav class="blue">
        </nav>
    </header>

    <div id="main" class="row content">
        <div id="register" class=" col s2 m2 l2">
            <ul>
                <li><a href="ProductType.html">Cadastro de Tipo e Percentual</a></li>
                <li><a href="AddProduct.php">Cadastro de Produtos</a></li>
                <li><a href="Purchases.php">Vendas</a></li>
            </ul>
        </div>
        <div id="register" class=" col s10 m10 l10">
            <div class="card white">
                <div id="slide-register hide"></div>
                
                <div id="form-register" class="card-content ">
                    <div class="card-title">Cadastro Produtos</div>

                    <form class="row" id="reg" action="insertProduct.php" method="POST" enctype="multipart/form-data">
                        
                        <div class="input-field col s4 ">
                            <input type="text" name="productname" id="type" placeholder="Ex: Macarrão" required>
                            <label for="productname">Nome Produto</label>
                        </div>

                        <div class="input-field col s4 ">
                            <input type="text" name="price" onkeyup="processPercent(this.value)" 
                            id="price" placeholder="Ex: 30,50" required>
                            <label for="price">Preço</label>
                        </div>

                        <div class="input-field col s4 ">
                            <select name="type" id="type" class="browser-default" required>
                                <option disabled selected value="">Tipo do Produto</option>
                                <?php
                                foreach($db->query('SELECT * FROM market.product_type') as $row) { ?>
                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['type']; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="input-field col s12 ">
                            <button class="btn norwegian-red">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        function processPercent(valInput) {

            if (isNaN(valInput[valInput.length - 1]) && valInput[valInput.length - 1] != ",") {

                valInput = valInput.replace(valInput[valInput.length - 1], "");
                document.getElementById("price").value = valInput;
                return;
            }
            
            return;
        }
    </script>
</body>
</html>