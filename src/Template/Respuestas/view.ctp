<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Respuesta $respuesta
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Respuesta'), ['action' => 'edit', $respuesta->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Respuesta'), ['action' => 'delete', $respuesta->id], ['confirm' => __('Are you sure you want to delete # {0}?', $respuesta->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Respuestas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Respuesta'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Bugs'), ['controller' => 'Bugs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bug'), ['controller' => 'Bugs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Estadopeticiones'), ['controller' => 'Estadopeticiones', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Estadopeticione'), ['controller' => 'Estadopeticiones', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Respuesta Anexos'), ['controller' => 'RespuestaAnexos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Respuesta Anexo'), ['controller' => 'RespuestaAnexos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="respuestas view large-9 medium-8 columns content">
    <h3><?= h($respuesta->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($respuesta->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bug') ?></th>
            <td><?= $respuesta->has('bug') ? $this->Html->link($respuesta->bug->id, ['controller' => 'Bugs', 'action' => 'view', $respuesta->bug->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Estadopeticione') ?></th>
            <td><?= $respuesta->has('estadopeticione') ? $this->Html->link($respuesta->estadopeticione->estado, ['controller' => 'Estadopeticiones', 'action' => 'view', $respuesta->estadopeticione->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Usuarioid') ?></th>
            <td><?= h($respuesta->usuarioid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Descripcion') ?></th>
            <td><?= h($respuesta->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $respuesta->has('user') ? $this->Html->link($respuesta->user->username, ['controller' => 'Users', 'action' => 'view', $respuesta->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($respuesta->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($respuesta->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Respuesta Anexos') ?></h4>
        <?php if (!empty($respuesta->respuesta_anexos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Imagen') ?></th>
                <th scope="col"><?= __('Tipo') ?></th>
                <th scope="col"><?= __('Tamano') ?></th>
                <th scope="col"><?= __('Respuesta Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($respuesta->respuesta_anexos as $respuestaAnexos): ?>
            <tr>
                <td><?= h($respuestaAnexos->id) ?></td>
                <td><?= h($respuestaAnexos->imagen) ?></td>
                <td><?= h($respuestaAnexos->tipo) ?></td>
                <td><?= h($respuestaAnexos->tamano) ?></td>
                <td><?= h($respuestaAnexos->respuesta_id) ?></td>
                <td><?= h($respuestaAnexos->created) ?></td>
                <td><?= h($respuestaAnexos->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'RespuestaAnexos', 'action' => 'view', $respuestaAnexos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'RespuestaAnexos', 'action' => 'edit', $respuestaAnexos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'RespuestaAnexos', 'action' => 'delete', $respuestaAnexos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $respuestaAnexos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
