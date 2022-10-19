<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Iterativas 03</h1>

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
                <form method="post" action="./?sec=iterativas03">
                    <!--<input type="hidden" name="sec" value="iterativas01" />-->
                    <div class="mb-3">
                        <label for="datos">Números a comparar:</label>
                        <input class="form-control" type="text" name="datos" id="datos" placeholder="1,2,3,4,5" value="<?php echo isset($data['input']['datos'])?$data['input']['datos']:""?>">
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
    if(isset($data['resultado'])){
    ?>
    <div class="col-12">
        <div class="alert alert-success">
            Array sin ordenar:<br><br> <?php echo $data['datos'];?><br><br>
            Array ordenado:<br><br> <?php echo $data['resultado'];?>
        </div>
    </div>
    <?php
    }
    ?>
</div>
<style>
    table{
        border-left: solid 2px ;
        border-right: solid 2px ;
    }
    table,tr,td{
        margin-left: 0;
        padding-left: 0;
        padding-right: 8px;
        padding-left: 8px;
        text-align: center;
    }
    td{
        width:<?php echo $data['porcentaje']."%"?>;
    }    
</style>