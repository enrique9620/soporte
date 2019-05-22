<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit R Seguimiento Directorio'), ['action' => 'edit', $rSeguimientoDirectorio->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete R Seguimiento Directorio'), ['action' => 'delete', $rSeguimientoDirectorio->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rSeguimientoDirectorio->id)]) ?> </li>
        <li><?= $this->Html->link(__('List R Seguimiento Directorio'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New R Seguimiento Directorio'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="rSeguimientoDirectorio view large-9 medium-8 columns content">
    <h3><?= h($rSeguimientoDirectorio->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($rSeguimientoDirectorio->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Usuario') ?></th>
            <td><?= h($rSeguimientoDirectorio->id_usuario) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Directorio') ?></th>
            <td><?= h($rSeguimientoDirectorio->id_directorio) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($rSeguimientoDirectorio->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($rSeguimientoDirectorio->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Comentario') ?></h4>
        <?= $this->Text->autoParagraph(h($rSeguimientoDirectorio->comentario)); ?>
    </div>
</div>
