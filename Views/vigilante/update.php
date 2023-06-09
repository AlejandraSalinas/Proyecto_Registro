<?php
include_once dirname(__FILE__) . '../../../Config/config.php';
include_once("../Main/partials/header.php");
require_once '../../models/tipoIdentificacionModel.php';
require_once '../../models/RolesModel.php';
require_once '../../models/SexoModel.php';
require_once '../../models/PersonaModel.php';
require_once '../../models/VigilanteModel.php';

$datos_identificacion = new TipoIdentificacionModel();
$registro_identificacion = $datos_identificacion->getId();

// var_dump($registro_identificacion);
// die();

$datos_rol  = new RolesModel();
$registro_rol  = $datos_rol->getId();

$datos_sexo = new SexoModel();
$genero = $datos_sexo->getId();

$datos_vigilante = new VigilanteModel();
$data = $datos_vigilante->getById($_REQUEST['id_vigilante']);

foreach ($data as $vigilante) {
    $id_vigilante          = $vigilante->getId();
    $tipo_identificacion   = $vigilante->getTipoIdentificacion();
    $numero_identificacion = $vigilante->getNumeroIdentificacion();
    $primer_nombre         = $vigilante->getPrimerNombre();
    $segundo_nombre        = $vigilante->getSegundoNombre();
    $primer_apellido       = $vigilante->getPrimerApellido();
    $segundo_apellido      = $vigilante->getSegundoApellido();
    $email                 = $vigilante->getEmail();
    $telefono              = $vigilante->getTelefono();
    $direccion             = $vigilante->getDireccion();
    $id_sexo               = $vigilante->getSexo();
    $id_rol                = $vigilante->getRoles();

    // var_dump($tipo_identificacion);
    // die();
                    
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Actualizar Usuario</h1>
    <hr class="hr mb-5">
    <form action="../../controllers/PersonaController.php?c=3&id_persona=<?= $id_persona ?> " method="post">
        <div class="container">
            <div class="row">
                <div class="mb-4 col-6">
                    <label for="id_tipo_identificacion" class="form-label">Tipo de Identificación:</label>
                    <select class="form-select" id="id_tipo_identificacion" name="id_tipo_identificacion" required="required">
                        <?php foreach ($registro_identificacion as $datos) : ?>

                            <option value="<?= $datos->getId() ?>" <?= $datos->getId() == $Vigilante->getTipoIdentificacion() ? 'selected' :  "" ?>><?= $datos->getTipoIdentificacion() ?></option>

                        <?php endforeach ?>
                    </select>
                </div>
                <div class="col-6 mb-4">
                    <label for="numero_identificacion" class="form-label">Número de Identificación:</label>
                    <input type="number" class="form-control" id="numero_identificacion" name="numero_identificacion" value="<?= $numero_identificacion ?>">
                </div>
                <div class="mb-4 col-6">
                    <label for="primer_nombre" class="form-label">Primer Nombre:</label>
                    <input type="text" class="form-control" name="primer_nombre" id="primer_nombre" value="<?= $primer_nombre ?>">
                </div>
                <div class="col-6 mb-4">
                    <label for="segundo_nombre" class="form-label">Segundo Nombre:</label>
                    <input type="text" class="form-control" name="segundo_nombre" id="segundo_nombre" value="<?= $segundo_nombre ?>">
                </div>
                <div class="mb-4 col-6">
                    <label for="primer_apellido" class="form-label">Primer Apellido:</label>
                    <input type="text" class="form-control" name="primer_apellido" id="primer_apellido" value="<?= $primer_apellido ?>">
                </div>
                <div class="col-6 mb-4">
                    <label for="segundo_apellido" class="form-label">Segundo Apellido:</label>
                    <input type="text" class="form-control" name="segundo_apellido" id="segundo_apellido" value="<?= $segundo_apellido ?>">
                </div>
                <div class="mb-4 col-6">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email" id="email" value="<?= $email ?>">
                </div>
                <div class="col-3 mb-4">
                    <label for="telefono" class="form-label">Teléfono:</label>
                    <input type="number" class="form-control" value="<?= $telefono ?>" id="telefono" name="telefono">
                </div>
                <div class="col-3 mb-4">
                    <label for="direccion" class="form-label">Dirección:</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" value="<?= $direccion ?>">
                </div>
                <div class="mb-4 col-6">
                    <label for="id_sexo" class="form-label">Sexo:</label>
                    <select class="form-select" id="id_sexo" name="id_sexo" required="required">
                        <?php foreach ($genero as $sexo) : ?>
                            <option value="<?= $sexo->getId() ?>" <?= $sexo->getId() == $vigilante->getSexo() ? 'selected' :  "" ?>><?= $sexo->getSexo() ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="col-6 mb-2">
                    <label for="id_rol" class="form-label">Rol:</label>
                    <select class="form-select" id="id_rol" name="id_rol" required="required">
                        <?php foreach ($data as $datos) : ?>

                            <option value="<?= $datos->getId() ?>" <?= $datos->getId() == $vigilante->getRoles() ? 'selected' :  "" ?>><?= $datos->getRoles() ?></option>

                        <?php endforeach ?>
                    </select>
                </div>

            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-3 mb-2">
                <button type="submit" href="index.php" class="btn btn-outline-primary">Guardar Usuario</button>
                <!-- <a class="btn btn-outline-primary"  href="index.php">Guardar</a> -->

                <a class="btn btn-outline-success" href="index.php">Regresar a Vista</a>
            </div>
        </div>
    </form>
</div>
<!-- /.container-fluid -->


<?php require_once("../Main/partials/footer.php"); ?>