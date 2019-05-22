<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Tablaprueba'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tablaprueba index large-9 medium-8 columns content">
    <h3><?= __('Tablaprueba') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nom') ?></th>
                <th scope="col"><?= $this->Paginator->sort('apt') ?></th>
                <th scope="col"><?= $this->Paginator->sort('apm') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tablaprueba as $tablaprueba): ?>
            <tr>
                <td><?= h($tablaprueba->id) ?></td>
                <td><?= h($tablaprueba->nom) ?></td>
                <td><?= h($tablaprueba->apt) ?></td>
                <td><?= h($tablaprueba->apm) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tablaprueba->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tablaprueba->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tablaprueba->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tablaprueba->id)]) ?>
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
