<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Iterativas 05</h1>

</div>
<!-- Content Row -->

<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">texto</h6>                                    
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <!--<form action="./?sec=formulario" method="post">                   -->
                <form method="post" action="./?sec=iterativas05">
                    <!--<input type="hidden" name="sec" value="iterativas01" />-->
                    <div class="mb-3">
                        <label for="datos">texto para contabilizar:</label>
                        <input class="form-control" type="text" name="datos" id="datos" placeholder="escribe aqui" value="<?php echo isset($data['input']['datos']) ? $data['input']['datos'] : "" ?>">
                        <p class="text-danger small"><?php echo isset($data['errores']['datos']) ? $data['errores']['datos'] : ''; ?></p>
                    </div>                    
                    <div class="mb-3">
                        <input type="submit" value="Enviar" name="enviar" class="btn btn-primary"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    if (isset($data['resultado'])) {
        ?>
        <div class="col-12">
            <div class="alert alert-success">
                Array ordenado:<br><br> <?php
                foreach ($data['resultado'] as $key => $value) {
                    echo $value . " -> " . $key . "<br>";
                }
                ?>
            </div>
        </div>
        <?php
    }
    ?>
</div>
