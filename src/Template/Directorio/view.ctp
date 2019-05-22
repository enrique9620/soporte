<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Directorio'), ['action' => 'edit', $directorio->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Directorio'), ['action' => 'delete', $directorio->id], ['confirm' => __('Are you sure you want to delete # {0}?', $directorio->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Directorio'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Directorio'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="directorio view large-9 medium-8 columns content">
    <h3><?= h($directorio->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($directorio->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Localidad') ?></th>
            <td><?= h($directorio->id_localidad) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($directorio->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Paterno') ?></th>
            <td><?= h($directorio->paterno) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Materno') ?></th>
            <td><?= h($directorio->materno) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cargo') ?></th>
            <td><?= h($directorio->cargo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Correo') ?></th>
            <td><?= h($directorio->correo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telefono') ?></th>
            <td><?= h($directorio->telefono) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ultima Actualizacion') ?></th>
            <td><?= h($directorio->ultima_actualizacion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($directorio->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($directorio->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Activo') ?></th>
            <td><?= $directorio->activo ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
