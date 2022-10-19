<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Iterativas 08</h1>

</div>
<!-- Content Row -->

<div class="row">
    <?php
    if (isset($data['resultado'])) {
        ?>
        <div class="col-12">
            <!--<div class="alert alert-success">-->
            <table class="table table-striped">
                <tr>
                    <th>Módulo</th>
                    <th>Media</th>
                    <th>Suspensos</th>
                    <th>Aprobados</th>
                    <th>Nota máxima</th>
                    <th>Nota mínima</th>
                </tr>                    
                <?php foreach ($data['resultado']['modulos'] as $nombre => $array) { ?>
                    <tr>
                        <td><?php echo ucfirst($nombre) ?></td>
                        <td><?php echo $array['media'] ?></td>
                        <td><?php echo $array['suspensos'] ?></td>
                        <td><?php echo $array['aprobados'] ?></td>
                        <td><?php echo $array['max']['alumno'] ?></td>
                        <td><?php echo $array['min']['alumno'] ?></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
            <!--</div>-->
        </div>
        <?php
    }
    ?>
    <!--Para parte 2 -->
    <?php
    if (isset($data['resultado'])) {
        ?>
        <div class="col-lg-4 col-12">
            <div class="alert alert-success">
                <ol>
                    <?php
                    foreach ($data['resultado']['alumnos'] as $nombre => $datos) {
                        if ($datos['suspensos'] == 0) {
                            echo "<li>$nombre</li>";
                        }
                    }
                    ?>
                </ol>
            </div>
        </div>
        <div class="col-lg-4 col-12">
            <div class="alert alert-warning">
                <ol>
                    <?php
                    if (isset($data['resultado']['alumnos'])) {
                        foreach ($data['resultado']['alumnos'] as $nombre => $datos) {
                            if ($datos['suspensos'] <= 1) {
                                echo "<li>$nombre</li>";
                            }
                        }
                    }
                    ?>
                </ol>
            </div>
        </div>
        <div class="col-lg-4 col-12">
            <div class="alert alert-danger">
                <ol>
                    <?php
                    if (isset($data['resultado']['alumnos'])) {
                        foreach ($data['resultado']['alumnos'] as $nombre => $datos) {
                            if ($datos['suspensos'] > 1) {
                                echo "<li>$nombre</li>";
                            }
                        }
                    }
                    ?>
                </ol>
            </div>
        </div>

        <?php
    }
    ?>

    <!-- comment -->
    <div class="col-12">
        <div class="card shadow mb-4">
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Array de notas</h6>                                    
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <!--<form action="./?sec=formulario" method="post">                   -->
                <form method="post" action="./?sec=iterativas08">
                    <!--<input type="hidden" name="sec" value="iterativas01" />-->
                    <div class="mb-3">
                        <label for="texto">Json Notas:</label>
                        <textarea class="form-control" id="json_notas" name="json_notas" rows="10"><?php echo isset($data['input']['json_notas']) ? $data['input']['json_notas'] : ''; ?></textarea>
                        <p class="text-danger small"><?php echo isset($data['errores']['json_notas']) ? $data['errores']['json_notas'] : ''; ?></p>
                    </div>                    
                    <div class="mb-3">
                        <input type="submit" value="Enviar" name="enviar" class="btn btn-primary"/>
                    </div>
                </form>
            </div>
        </div>
    </div>                        
</div>
