<?php
include '../controller/guias-controller.php';
$mdl = new GuiaController;

$codigo_guia = $_POST['Id'];
//$codigo_guia = "202210000";
//Info de la guia
$Fguia = $mdl->ctrMostrarListaHistorialGuia($codigo_guia);
$rows = $Fguia['data'];
?>

<div class="col-sm-12">
    <table class="table">
        <thead>
            <tr>
                <th class="text-center">Fecha</th>
                <th class="text-center">Ubicación</th>
                <th class="text-center">Latitud</th>
                <th class="text-center"> Longitud</th>
                <th class="text-center">Estatus</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($rows as $guia) {
                $Id = $guia['Id'];
                $Guia = $guia['Guia'];
                $Fecha = $guia['Fecha'];
                $Nombre = $guia['Nombre'];
                $Evidencia = $guia['Evidencia'];
                $Parentesco = $guia['Parentesco'];
                $Ubicacion = $guia['Ubicacion'];
                $Latitud = $guia['Latitud'];
                $Longitud = $guia['Longitud'];
                $IDEstatus = $guia['IDEstatus'];
                $Estatus = $guia['Estatus'];
            ?>
                <tr>
                    <td><?php echo $Fecha; ?></td>
                    <td><?php echo $Ubicacion; ?></td>
                    <td><?php echo $Latitud; ?></td>
                    <td><?php echo $Longitud; ?></td>
                    <td><?php echo $Estatus; ?></td>
                </tr>
                <?php
                if ($IDEstatus == "8") {
                ?>
                    <tr>
                        <td colspan="5">
                            <b>Nombre:</b><?php echo " " . $Nombre; ?><br>
                            <b>Evidencia:</b><?php echo " " . $Evidencia; ?><br>
                            <b>Parentesco:</b><?php echo " " . $Parentesco; ?>
                        </td>
                    </tr>
                <?php
                }
                ?>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>