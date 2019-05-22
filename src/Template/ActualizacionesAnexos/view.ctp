<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Actualizaciones Anexo'), ['action' => 'edit', $actualizacionesAnexo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Actualizaciones Anexo'), ['action' => 'delete', $actualizacionesAnexo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $actualizacionesAnexo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Actualizaciones Anexos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Actualizaciones Anexo'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Actualizaciones'), ['controller' => 'Actualizaciones', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Actualizacione'), ['controller' => 'Actualizaciones', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="actualizacionesAnexos view large-9 medium-8 columns content">
    <h3><?= h($actualizacionesAnexo->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($actualizacionesAnexo->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tipo') ?></th>
            <td><?= h($actualizacionesAnexo->tipo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tamano') ?></th>
            <td><?= h($actualizacionesAnexo->tamano) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Actualizacione') ?></th>
            <td><?= $actualizacionesAnexo->has('actualizacione') ? $this->Html->link($actualizacionesAnexo->actualizacione->id, ['controller' => 'Actualizaciones', 'action' => 'view', $actualizacionesAnexo->actualizacione->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($actualizacionesAnexo->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($actualizacionesAnexo->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Imagen Anterior') ?></h4>
        <?= $this->Text->autoParagraph(h($actualizacionesAnexo->imagen_anterior)); ?>
    </div>
    <div class="row">
        <h4><?= __('Imagen Nueva') ?></h4>
        <?= $this->Text->autoParagraph(h($actualizacionesAnexo->imagen_nueva)); ?>
    </div>
</div>
