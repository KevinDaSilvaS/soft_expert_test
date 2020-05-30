<?php
include("test_con.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta Tipo="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendas</title>
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
                    <div class="card-title">Compras</div>

                    <form class="row" id="reg" action="" method="POST" enctype="multipart/form-data">

                        <div class="input-field col s6 ">
                            <select name="productname" id="productname" class="browser-default" required>
                                <option disabled selected value="">Nome do Produto</option>
                                <?php
                                foreach($db->query('SELECT * FROM market.product') as $row) { ?>
                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['product_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="input-field col s6 ">
                            <input type="number" name="amount" id="amount" placeholder="3 UN" required>
                            <label for="amount">Quantidade</label>
                        </div>

                        <div class="input-field col s12 card card-content blue lighten-3 ">
                            <h6>Lista</h6>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Produto</th>
                                        <th>Quantidade</th>
                                        <th>Preço Total</th>
                                        <th>Custo em Impostos</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody">
                                   
                                    
                                </tbody>
                            </table>
                            
                        </div>
                        <div class="col s6 card center-align">Preço Total dos Itens: 
                            <h5 id="totalprices" class="card-title green-text">00.00</h5>
                        </div>
                        
                        <div class="col s6 card center-align">Preço Total de Impostos: 
                            <h5 id="totaltaxes" class="card-title green-text">00.00</h5>
                        </div>

                        <div class="input-field col s12 ">
                            <a class="btn norwegian-red" onclick="searchProduct();">ADD</a>
                            <a class="btn norwegian-red">Salvar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        var myHeaders = new Headers([
            ['Content-Type', 'application/json']
        ]);

        function searchProduct(){
            const selectValue = document.getElementById("productname").value;
            if (selectValue > 0) {
                const data = new Object;
                data.idProduct = selectValue;

                const url = `getProductData.php`;

                const myInit = { 
                    method: 'POST',
                    headers: myHeaders,
                    body: JSON.stringify(data),
                    mode: 'cors',
                };

                const myRequest = new Request(url, myInit);

                fetch(myRequest)
                .then(function(response) {
                    return response.json();
                })
                .then(function(json) {
                    console.log(json.response);
                    addTable(json.response);
                    calculateTotals();
                    clear();
                });
            }
        }

        function addTable(data){
            const amount = document.getElementById("amount").value;
            const elem = 
            `<tr>
                <td>${data[0].productName }</td>
                <td>${amount}</td>
                <td class="prices">${(amount * data[0].price).toFixed(2) }</td>
                <td class="taxes">${((data[0].taxAmount / data[0].price) * amount).toFixed(2) }</td>
            </tr> `;

            document.getElementById("tbody").innerHTML += elem;

        }

        function calculateTotals(){
            const prices = document.getElementsByClassName("prices");
            let totalPrice = 0;
            for (let i = 0; i < prices.length; i++) {
                totalPrice += parseFloat(prices[i].innerHTML);
            }
                
            document.getElementById("totalprices").innerHTML = totalPrice.toFixed(2);
            const taxes = document.getElementsByClassName("taxes");
            let totalTaxes = 0;
            for (let i = 0; i < taxes.length; i++) {
                totalTaxes += parseFloat(taxes[i].innerHTML);
            }
            document.getElementById("totaltaxes").innerHTML = totalTaxes.toFixed(2);
        }

        function clear(){
            document.getElementById("amount").value = 0;
        }
    </script>
</body>
</html>