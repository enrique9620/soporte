<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cat Tipoactualizacione'), ['action' => 'edit', $catTipoactualizacione->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cat Tipoactualizacione'), ['action' => 'delete', $catTipoactualizacione->id], ['confirm' => __('Are you sure you want to delete # {0}?', $catTipoactualizacione->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cat Tipoactualizaciones'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cat Tipoactualizacione'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="catTipoactualizaciones view large-9 medium-8 columns content">
    <h3><?= h($catTipoactualizacione->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($catTipoactualizacione->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($catTipoactualizacione->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($catTipoactualizacione->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($catTipoactualizacione->modified) ?></td>
        </tr>
    </table>
</div>
