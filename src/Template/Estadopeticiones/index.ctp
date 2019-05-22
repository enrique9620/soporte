<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Estadopeticione'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="estadopeticiones index large-9 medium-8 columns content">
    <h3><?= __('Estadopeticiones') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('estado') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($estadopeticiones as $estadopeticione): ?>
            <tr>
                <td><?= h($estadopeticione->id) ?></td>
                <td><?= h($estadopeticione->estado) ?></td>
                <td><?= h($estadopeticione->created) ?></td>
                <td><?= h($estadopeticione->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $estadopeticione->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $estadopeticione->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $estadopeticione->id], ['confirm' => __('Are you sure you want to delete # {0}?', $estadopeticione->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
