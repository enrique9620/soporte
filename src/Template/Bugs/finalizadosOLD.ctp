<?php
/**
  * @var \App\View\AppView $this
  */
?>
<script src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/1.0.7/js/dataTables.responsive.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/1.0.7/css/responsive.dataTables.min.css">
<script type="text/javascript">
    $(document).ready(function() {
        $('#bugs').DataTable();
    } );
</script>
<div class="col-lg-12">
    <div class="text-right" style="margin-bottom: 10px;">
            <?php
            echo  $this->Html->link
                                (
                                    'reportes ABIERTOS',
                                    array
                                        (
                                            'action'=>'index'
                                        ),
                                    array
                                        (
                                            'class'=>'btn btn-success'
                                        )
                                );
            ?>
    </div>
</div>
<div class="col-lg-12">
    <h3><?= __('Reportes cerrados') ?></h3>
    <table id="bugs" class="table table-striped table-hover display responsive nowrap">
        <thead>
            <tr>
                
                <th>Asunto</th>
                <th>Asignado</th>
                <th>Sistema</th>
                <th>Fecha inicio</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bugs as $bug): ?>
            <tr>
                
                <td><?= $bug->asunto ?></td>
                <td><?= $bug->asignado->nombre ?> </td>
                <td><?= $bug->sistema->sistema ?> </td>
                <td><?= $bug->fecha_inicio ?> </td>
                <td><?= $bug->activo ?> </td>
                <td><?= $bug->acciones ?> </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script>DataTableGeneratorOrderBy('bugs',3,'desc');</script>
<script language="Javascript">
function confirmDel()
{
    alert(window.location);
    alert()
  //var agree=confirm("¿Realmente desea eliminarlo? ");
  if (agree) return true ;
  return false;
}
</script>

<!-- <?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="table table-striped table-hover" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Bug'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sistemas'), ['controller' => 'Sistemas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sistema'), ['controller' => 'Sistemas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Asignados'), ['controller' => 'Asignados', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Asignado'), ['controller' => 'Asignados', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Peticiones'), ['controller' => 'Peticiones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Peticione'), ['controller' => 'Peticiones', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="bugs index large-9 medium-8 columns content">
    <h3><?= __('Bugs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sistema_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('asignado_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('asunto') ?></th>
                <th scope="col"><?= $this->Paginator->sort('descripcion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('usuario_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sistemaoperativo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('navegador') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha_inicio') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha_fin') ?></th>
                <th scope="col"><?= $this->Paginator->sort('activo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bugs as $bug): ?>
            <tr>
                <td><?= h($bug->id) ?></td>
                <td><?= $bug->has('sistema') ? $this->Html->link($bug->sistema->id, ['controller' => 'Sistemas', 'action' => 'view', $bug->sistema->id]) : '' ?></td>
                <td><?= $bug->has('asignado') ? $this->Html->link($bug->asignado->id, ['controller' => 'Asignados', 'action' => 'view', $bug->asignado->id]) : '' ?></td>
                <td><?= h($bug->asunto) ?></td>
                <td><?= h($bug->descripcion) ?></td>
                <td><?= h($bug->usuario_id) ?></td>
                <td><?= h($bug->sistemaoperativo) ?></td>
                <td><?= h($bug->navegador) ?></td>
                <td><?= h($bug->fecha_inicio) ?></td>
                <td><?= h($bug->fecha_fin) ?></td>
                <td><?= $this->Number->format($bug->activo) ?></td>
                <td><?= h($bug->created) ?></td>
                <td><?= h($bug->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $bug->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $bug->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $bug->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bug->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
 -->