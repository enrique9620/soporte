<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Cat Importancia'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="catImportancias index large-9 medium-8 columns content">
    <h3><?= __('Cat Importancias') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($catImportancias as $catImportancia): ?>
            <tr>
                <td><?= h($catImportancia->id) ?></td>
                <td><?= h($catImportancia->nombre) ?></td>
                <td><?= h($catImportancia->created) ?></td>
                <td><?= h($catImportancia->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $catImportancia->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $catImportancia->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $catImportancia->id], ['confirm' => __('Are you sure you want to delete # {0}?', $catImportancia->id)]) ?>
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
