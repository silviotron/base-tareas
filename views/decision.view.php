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
                    <?php echo $data['ej1_dividendo'] . ($data['ej1_resultado'] ? '' : ' no') . ' es divisible entre ' . $data['ej1_divisor']; ?>
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
                <p class="text-success">
                    <?php echo $data['ej2_num1'] === $data['ej2_resultado'] ? "<b>" . $data['ej2_num1'] . "</b>" : $data['ej2_num1']; ?>
                    <?php echo $data['ej2_num2'] === $data['ej2_resultado'] ? "<b>" . $data['ej2_num2'] . "</b>" : $data['ej2_num2']; ?>
                    <?php echo $data['ej2_num3'] === $data['ej2_resultado'] ? "<b>" . $data['ej2_num3'] . "</b>" : $data['ej2_num3']; ?>
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
                <?php echo "dias: " . $data['ej3_dia'] ?>
                <?php echo "<br>horas: " . $data['ej3_hora'] ?>
                <?php echo "<br>minutos: " . $data['ej3_min'] ?>
                <?php echo "<br>segundos: " . $data['ej3_sec'] ?>
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
                <p class=<?php echo $data['ej4_result'] ? "text-success" : "text-danger"; ?>>
                    <?php echo $data['ej4_ano'] . ($data['ej4_result'] ? ' ' : ' no') . ' es bisiesto'; ?>
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
                <?php echo "El número " . $data['ej5_num'] . " está formado por " . $data['ej5_centena'] . " centenas, " . $data['ej5_decena'] . " decenas y " . $data['ej5_unidad'] . " unidades"; ?>
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
                <?php echo $data['ej6_neto'] >= 2000 ? '<p class="alert alert-success"> Felicidades, tienes un salario por encima de la media</p>' : "" ?>
                <?php echo "Bruto: " . $data['ej6_sueldo'] . "<br>Neto: " . $data['ej6_neto'] . "<br>Descuento: " . $data['ej6_descuento']; ?>
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
                <p class=<?php echo $data['ej7_clase'] ?>>
                    <?php echo "<br>Nota: ".$data['ej7_nota']." (".$data['ej7_texto'].")" ?>
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
                    <?php echo $data['ej8_texto']." es un ".$data['ej8_result'] ?>
            </div>
        </div>
    </div>                           

</div>
