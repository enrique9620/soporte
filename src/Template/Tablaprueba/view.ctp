<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tablaprueba'), ['action' => 'edit', $tablaprueba->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tablaprueba'), ['action' => 'delete', $tablaprueba->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tablaprueba->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tablaprueba'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tablaprueba'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tablaprueba view large-9 medium-8 columns content">
    <h3><?= h($tablaprueba->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($tablaprueba->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nom') ?></th>
            <td><?= h($tablaprueba->nom) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Apt') ?></th>
            <td><?= h($tablaprueba->apt) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Apm') ?></th>
            <td><?= h($tablaprueba->apm) ?></td>
        </tr>
    </table>
</div>
