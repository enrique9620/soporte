<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="col-lg-12">
    <h3><?= __('Sistemas') ?></h3>
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
    <table id="sistemas" class="table table-striped table-hover">
        <thead>
            <tr>
                <th>id</th>
                <th>Sistemas</th>
                <th>Acciones</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($sistemas as $sistema): ?>
            <tr>
                <td><?=$sistema->id ?></td>
                <td><?=$sistema->sistema ?></td>
                <td><?=$sistema->acciones ?> </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script>DataTableGenerator('sistemas');</script>
<script language="Javascript">
function confirmDel()
{
  var agree=confirm("¿Realmente desea eliminarlo? ");
  if (agree) return true ;
  return false;
}
</script>