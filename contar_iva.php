<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Calcular IVA</title>
</head>

<body>
    <main class="container">
        <div class="d-sm-flex justify-content-sm-center">
            <div class="row">
                <div class="col-12  col-sm-6 my-3">
                    <div class="my-3">
                        <h2 class="text-center">Calculadora de IVA</h2>
                    </div>
                    <form action="">
                        <div>
                            <label for="txtIVA">IVA</label>
                            <select name="Valor" id="" class="form-control">
                                <option value=" Seleccionar" selected>Seleccionar</option>
                                <option value="10.5">10.5</option>
                                <option value="21">21</option>
                                <option value="27">27</option>
                            </select>
                        </div>
                        <div>
                            <label for="txtPrecioSinIva">Precio sin IVA</label>
                            <input type="number" class="form-control">
                        </div>
                        <div>
                            <label for="txtPrecioSinIva">Precio con IVA</label>
                            <input type="number" class="form-control">
                        </div>
                        <div>
                            <button class="btn btn-primary">CALCULAR</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class=" row">
                <div class="col-12 col-sm-6">
                    <table class="table table-hover table-dark">
                        <tr>
                            <th>IVA:</th>
                            <td>$0</td>
                        </tr>
                        <tr>
                            <th>Precio sin IVA:</th>
                            <td>$0</td>
                        </tr>
                        <tr>
                            <th>Precio con IVA:</th>
                            <td>$0</td>
                        </tr>
                        <tr>
                            <th>IVA Cantidad:</th>
                            <td>$0</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </main>
</body>

</html>