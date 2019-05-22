<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Asignado'), ['action' => 'edit', $asignado->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Asignado'), ['action' => 'delete', $asignado->id], ['confirm' => __('Are you sure you want to delete # {0}?', $asignado->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Asignados'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Asignado'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Bugs'), ['controller' => 'Bugs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bug'), ['controller' => 'Bugs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="asignados view large-9 medium-8 columns content">
    <h3><?= h($asignado->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($asignado->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $asignado->has('user') ? $this->Html->link($asignado->user->id, ['controller' => 'Users', 'action' => 'view', $asignado->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($asignado->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Correo') ?></th>
            <td><?= h($asignado->correo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($asignado->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($asignado->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Bugs') ?></h4>
        <?php if (!empty($asignado->bugs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Sistema Id') ?></th>
                <th scope="col"><?= __('Asignado Id') ?></th>
                <th scope="col"><?= __('Asunto') ?></th>
                <th scope="col"><?= __('Descripcion') ?></th>
                <th scope="col"><?= __('Usuario Id') ?></th>
                <th scope="col"><?= __('Sistemaoperativo') ?></th>
                <th scope="col"><?= __('Navegador') ?></th>
                <th scope="col"><?= __('Fecha Inicio') ?></th>
                <th scope="col"><?= __('Fecha Fin') ?></th>
                <th scope="col"><?= __('Activo') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($asignado->bugs as $bugs): ?>
            <tr>
                <td><?= h($bugs->id) ?></td>
                <td><?= h($bugs->sistema_id) ?></td>
                <td><?= h($bugs->asignado_id) ?></td>
                <td><?= h($bugs->asunto) ?></td>
                <td><?= h($bugs->descripcion) ?></td>
                <td><?= h($bugs->usuario_id) ?></td>
                <td><?= h($bugs->sistemaoperativo) ?></td>
                <td><?= h($bugs->navegador) ?></td>
                <td><?= h($bugs->fecha_inicio) ?></td>
                <td><?= h($bugs->fecha_fin) ?></td>
                <td><?= h($bugs->activo) ?></td>
                <td><?= h($bugs->created) ?></td>
                <td><?= h($bugs->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Bugs', 'action' => 'view', $bugs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Bugs', 'action' => 'edit', $bugs->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Bugs', 'action' => 'delete', $bugs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bugs->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
