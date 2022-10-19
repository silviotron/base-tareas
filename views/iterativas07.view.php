<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Iterativas 07</h1>

</div>
<!-- Content Row -->

<div class="row">

    <div class="col-12">
        <div class="card shadow mb-4">
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Ordenar</h6>                                    
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <!--<form action="./?sec=formulario" method="post">                   -->
                <form method="post" action="./?sec=iterativas07">
                    <!--<input type="hidden" name="sec" value="iterativas01" />-->               
                    <div class="mb-3">
                        <input type="hidden" class="form-control" id="bolas_anterior" name="bolas_anterior" value="<?php echo isset($data['bolas']) ? base64_encode(json_encode($data['bolas'])) : ''; ?>" />
                        <input type="hidden" class="form-control" id="carton_anterior" name="carton_anterior" value="<?php echo isset($data['carton']) ? base64_encode(json_encode($data['carton'])) : ''; ?>" />
                        <input type="hidden" class="form-control" id="resultado_anterior" name="resultado_anterior" value="<?php echo isset($data['resultado']) ? base64_encode(json_encode($data['resultado'])) : ''; ?>" />
                        <input type="submit" value="Sacar bola" name="enviar" class="btn btn-primary"/>
                        <input type="submit" value="Reiniciar" name="reiniciar" class="btn btn-primary"/>

                    </div>
                </form>
            </div>
        </div>
    </div> 
    <?php
    if (isset($data['carton'])) {
        ?>
        <div class="col-12">

            <?php
            $array = $data['carton'];
            $result = "</table>";
            $result = "</tr>" . $result;
            while (count($array) > 0) {
                if (count($array) % 5 == 0) {
                    $result = "</tr> <tr>" . $result;
                }
                $result = "<td>" . array_pop($array) . "</td>" . $result;
            }
            $result = "<tr>" . $result;
            $result = "<table class='table table-bordered'>" . $result;

            echo $result;
            ?>


        </div>
        <?php
    }
    ?>
    <?php
    if (isset($data['resultado'])) {
        ?>
        <div class="col-12">
            <div class="alert alert-success">
                <?php
                foreach ($data['resultado'] as $n) {
                    echo $n . " ";
                }
                ?>
    <?php var_dump($data); ?>

            </div>
        </div>
        <?php
    }
    ?>
</div>
<style>
    table,tr,td{
        margin-left: 0;
        padding-left: 0;
        padding-right: 8px;
        padding-left: 8px;
        text-align: center;
    }
</style>
