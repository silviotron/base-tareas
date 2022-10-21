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
                        <label for="texto">Texto:</label>
                        <input class="form-control" id="texto" type="text" name="texto" placeholder="texto" value="<?php echo isset($data['input']['texto']) ? $data['input']['texto'] : "" ?>">
                        <p class="text-danger small"><?php echo isset($data['errores']['texto']) ? $data['errores']['texto'] : ''; ?></p>
                    </div>                    
                </form>
            </div>
        </div>
    </div>
</div>
