<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Actualizacione'), ['action' => 'edit', $actualizacione->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Actualizacione'), ['action' => 'delete', $actualizacione->id], ['confirm' => __('Are you sure you want to delete # {0}?', $actualizacione->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Actualizaciones'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Actualizacione'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="actualizaciones view large-9 medium-8 columns content">
    <h3><?= h($actualizacione->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($actualizacione->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Descripcion') ?></th>
            <td><?= h($actualizacione->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cat Importancia Id') ?></th>
            <td><?= h($actualizacione->cat_importancia_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cat Tipoactualizacion Id') ?></th>
            <td><?= h($actualizacione->cat_tipoactualizacion_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha') ?></th>
            <td><?= h($actualizacione->fecha) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($actualizacione->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($actualizacione->modified) ?></td>
        </tr>
    </table>
</div>
