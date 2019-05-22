<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cat Importancia'), ['action' => 'edit', $catImportancia->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cat Importancia'), ['action' => 'delete', $catImportancia->id], ['confirm' => __('Are you sure you want to delete # {0}?', $catImportancia->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cat Importancias'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cat Importancia'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="catImportancias view large-9 medium-8 columns content">
    <h3><?= h($catImportancia->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($catImportancia->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($catImportancia->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($catImportancia->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($catImportancia->modified) ?></td>
        </tr>
    </table>
</div>
