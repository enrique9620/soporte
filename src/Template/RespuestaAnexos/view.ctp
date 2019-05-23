<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\RespuestaAnexo $respuestaAnexo
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Respuesta Anexo'), ['action' => 'edit', $respuestaAnexo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Respuesta Anexo'), ['action' => 'delete', $respuestaAnexo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $respuestaAnexo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Respuesta Anexos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Respuesta Anexo'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Respuestas'), ['controller' => 'Respuestas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Respuesta'), ['controller' => 'Respuestas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="respuestaAnexos view large-9 medium-8 columns content">
    <h3><?= h($respuestaAnexo->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($respuestaAnexo->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tipo') ?></th>
            <td><?= h($respuestaAnexo->tipo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tamano') ?></th>
            <td><?= h($respuestaAnexo->tamano) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Respuesta') ?></th>
            <td><?= $respuestaAnexo->has('respuesta') ? $this->Html->link($respuestaAnexo->respuesta->id, ['controller' => 'Respuestas', 'action' => 'view', $respuestaAnexo->respuesta->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($respuestaAnexo->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($respuestaAnexo->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Imagen') ?></h4>
        <?= $this->Text->autoParagraph(h($respuestaAnexo->imagen)); ?>
    </div>
</div>
