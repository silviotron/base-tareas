<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $data['titulo']; ?></h1>

</div>

<!-- Content Row -->

<div class="row">

    <div class="col-12 col-sm-6 col-lg-4">
        <div class="card shadow mb-4">
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Ejercicio 01</h6>                                    
            </div>
            <div class="card-body">
                <p>
                    <?php
                    echo $data['ejercicio01_resultado'];
                    ?>
                </p>
            </div>
        </div>
    </div>                        
    <div class="col-12 col-sm-6 col-lg-4">
        <div class="card shadow mb-4">
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Ejercicio 02</h6>                                    
            </div>
            <div class="card-body">
                <p>
                    <?php
                    echo $data['ejercicio02_resultado'];
                    ?>
                </p>
            </div>
        </div>
    </div>   
    <div class="col-12 col-sm-6 col-lg-4">
        <div class="card shadow mb-4">
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Ejercicio 03</h6>                                    
            </div>
            <div class="card-body">
                <form  method="post">
                    <label for="base">Base: </label>
                    <input name="base" type="number" id="base" min="0" style="width: 80px" required >
                    <label for="altura">Altura: </label>
                    <input name="altura" type="number" id="altura" min="0" style="width: 80px" required >                     
                    <input type="submit" value="Calcular">
                </form>
                <p>

                    <?php echo $data['ejercicio03_resultado']; ?>
                </p>
            </div>
        </div>
    </div>    
    <div class="col-12 col-sm-6 col-lg-4">
        <div class="card shadow mb-4">
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Ejercicio 04</h6>                                    
            </div>
            <div class="card-body">
                <p>
                    Nombre: <?php echo $data['nombre']; ?><br>
                    Edad: <?php echo $data['edad']; ?><br>
                    Nota Media: <?php echo $data['notaMedia']; ?>
                </p>
            </div>
        </div>
    </div>    
    <div class="col-12 col-sm-6 col-lg-4">
        <div class="card shadow mb-4">
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Ejercicio 05</h6>                                    
            </div>
            <div class="card-body">
                <p>
                    Precio temporada alta: <?php echo $data['precioAlta']; ?>€/noche<br>
                    Precio temporada baja: <?php echo $data['precioBaja']; ?>€/noche<br>
                    Noches temporada alta: <?php echo $data['nochesAlta']; ?><br>
                    Noches temporada baja: <?php echo $data['nochesBaja']; ?><br>
                    Factura: <?php echo $data['ejercicio05_resultado']; ?>€

                </p>
            </div>
        </div>
    </div>    
    <div class="col-12 col-sm-6 col-lg-4">
        <div class="card shadow mb-4">
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Ejercicio 06</h6>                                    
            </div>
            <div class="card-body">
                <form  method="get">
                    <input type="hidden" name="sec" value="basicos" />
                    <label for="radio">Radio: </label>
                    <input name="radio" type="number" id="radio" min="0" style="width: 100px" required >
                    <br>
                    <input type="submit" value="Calcular">
                </form>
                <p>
                    Radio: <?php echo $data['radio']; ?><br>
                    area: <?php echo $data['area06']; ?><br>
                    perímetro: <?php echo $data['perimetro06']; ?><br>
                </p>
            </div>
        </div>
    </div>      
    <div class="col-12 col-sm-6 col-lg-4">
        <div class="card shadow mb-4">
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Ejercicio 07</h6>                                    
            </div>
            <div class="card-body">
                <form  method="post">
                    <label for="velocidad">velocidad: </label>
                    <input name="velocidad" type="number" id="velocidad" min="0" style="width: 100px" required >
                    <br>
                    <input type="submit" value="Calcular">
                </form>
                <p>
                    velocidad Km/h: <?php echo $data['velocidad']; ?><br>
                    velocidad m/s: <?php echo $data['resultado07']; ?>
                </p>
            </div>
        </div>
    </div>    
    <div class="col-12 col-sm-6 col-lg-4">
        <div class="card shadow mb-4">
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Ejercicio 08</h6>                                    
            </div>
            <div class="card-body">
                <p>
                    <?php
                    echo $data['ejercicio08_resultado'];
                    ?>
                </p>
            </div>
        </div>
    </div>    
    <div class="col-12 col-sm-6 col-lg-4">
        <div class="card shadow mb-4">
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Ejercicio 09</h6>                                    
            </div>
            <div class="card-body">
                <p>
                    <?php
                    echo $data['ejercicio09_resultado'];
                    ?>
                </p>
            </div>
        </div>
    </div>    
    <div class="col-12">
        <div class="card shadow mb-4">
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">data</h6>                                    
            </div>
            <div class="card-body">
                <p>
                    <?php var_dump($data); ?>
                </p>
            </div>
        </div>
    </div>    
</div>

