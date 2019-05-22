<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Chat'), ['action' => 'edit', $chat->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Chat'), ['action' => 'delete', $chat->id], ['confirm' => __('Are you sure you want to delete # {0}?', $chat->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Chat'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Chat'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="chat view large-9 medium-8 columns content">
    <h3><?= h($chat->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($chat->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('To') ?></th>
            <td><?= h($chat->to) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('From') ?></th>
            <td><?= h($chat->from) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($chat->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Datetime') ?></th>
            <td><?= h($chat->datetime) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Msj') ?></h4>
        <?= $this->Text->autoParagraph(h($chat->msj)); ?>
    </div>
</div>
