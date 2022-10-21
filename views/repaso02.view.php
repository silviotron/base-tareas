<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Repaso 02</h1>

</div>
<!-- Content Row -->

<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <!--<form action="./?sec=formulario" method="post">                   -->
                <form method="post" action="./?sec=repaso02">
                    <div class="mb-3">
                        <label for="nombre">Nombre completo</label>
                        <input class="form-control" id="nombre" type="text" name="nombre" placeholder="nombre" value="<?php echo isset($data['input']['nombre']) ? $data['input']['nombre'] : "" ?>">
                        <p class="text-danger small"><?php echo isset($data['errores']['nombre']) ? $data['errores']['nombre'] : ''; ?></p>
                    </div>
                    <div class="mb-3">
                        <label for="ip">Ip usuario</label>
                        <input class="form-control" id="ip" type="text" name="ip" placeholder="192.168.0.1" value="<?php echo isset($data['input']['ip']) ? $data['input']['ip'] : "" ?>">
                        <p class="text-danger small"><?php echo isset($data['errores']['ip']) ? $data['errores']['ip'] : ''; ?></p>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-sm">
                                <div class="form-check">
                                    <input class="form-check-input" id="news" type="checkbox" value="news" name="opcions[]" <?php echo isset($data['input']['opcions']) && in_array('news', $data['input']['opcions']) ? "checked" : "" ?>>
                                    <label class="form-check-label" for="news">Suscribirse newsletter</label>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-check">
                                    <input class="form-check-input" id="socio" type="checkbox" value="socio"  name="opcions[]" <?php echo isset($data['input']['opcions']) && in_array('socio', $data['input']['opcions']) ? "checked" : "" ?>>
                                    <label class="form-check-label" for="socio">Hacerse socio</label>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-check">
                                    <input class="form-check-input" id="tarjeta" type="checkbox" value="tarjeta" name="opcions[]" <?php echo isset($data['input']['opcions']) && in_array('tarjeta', $data['input']['opcions']) ? "checked" : "" ?>>
                                    <label class="form-check-label" for="tarjeta">Tarjeta crédito</label>
                                </div>
                            </div>
                        </div>
                        <p class="text-danger small"><?php echo isset($data['errores']['opcions']) ? $data['errores']['opcions'] : ''; ?></p>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1">Mi código fuente</label>
                        <textarea class="form-control" id="codigo" name="codigo" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="enviar" name="enviar" class="btn btn-primary"/>
                    </div>
                </form>
            </div>
        </div>
    </div>   
</div>
