<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Peticione'), ['action' => 'edit', $peticione->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Peticione'), ['action' => 'delete', $peticione->id], ['confirm' => __('Are you sure you want to delete # {0}?', $peticione->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Peticiones'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Peticione'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Bugs'), ['controller' => 'Bugs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bug'), ['controller' => 'Bugs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Estadopeticiones'), ['controller' => 'Estadopeticiones', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Estadopeticione'), ['controller' => 'Estadopeticiones', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="peticiones view large-9 medium-8 columns content">
    <h3><?= h($peticione->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($peticione->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bug') ?></th>
            <td><?= $peticione->has('bug') ? $this->Html->link($peticione->bug->id, ['controller' => 'Bugs', 'action' => 'view', $peticione->bug->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Estadopeticione') ?></th>
            <td><?= $peticione->has('estadopeticione') ? $this->Html->link($peticione->estadopeticione->id, ['controller' => 'Estadopeticiones', 'action' => 'view', $peticione->estadopeticione->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Descripcion') ?></th>
            <td><?= h($peticione->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Peticionescol') ?></th>
            <td><?= h($peticione->peticionescol) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($peticione->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($peticione->modified) ?></td>
        </tr>
    </table>
</div>
