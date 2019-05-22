<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="col-lg-12">
    <h3><?= __('Supervisores') ?></h3>
    <div class="text-right" style="margin-bottom: 10px;">
        <?php
        echo  $this->Html->link
                            (
                                'Nuevo Registro',
                                array
                                    (
                                        'action'=>'add'
                                    ),
                                array
                                    (
                                        'class'=>'btn btn-default'
                                    )
                            );
        ?>
    </div>
    <table id="asignados" class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Usuario</th>
                <th>Acciones</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($asignados as $asignado): ?>
            <tr>
                <td><?=$asignado->nombre ?></td>
                <td><?=$asignado->correo ?></td>
                <td><?=$asignado->Users['username'] ?></td>
                <td><?=$asignado->acciones ?> </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script>DataTableGenerator('asignados');</script>
<script language="Javascript">
function confirmDel()
{
  var agree=confirm("¿Realmente desea eliminarlo? ");
  if (agree) return true ;
  return false;
}
</script>
