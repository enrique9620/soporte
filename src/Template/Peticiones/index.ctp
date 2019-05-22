<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Peticione'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Bugs'), ['controller' => 'Bugs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bug'), ['controller' => 'Bugs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Estadopeticiones'), ['controller' => 'Estadopeticiones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Estadopeticione'), ['controller' => 'Estadopeticiones', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="peticiones index large-9 medium-8 columns content">
    <h3><?= __('Peticiones') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bug_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('estadopeticion_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('descripcion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('peticionescol') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($peticiones as $peticione): ?>
            <tr>
                <td><?= h($peticione->id) ?></td>
                <td><?= $peticione->has('bug') ? $this->Html->link($peticione->bug->id, ['controller' => 'Bugs', 'action' => 'view', $peticione->bug->id]) : '' ?></td>
                <td><?= $peticione->has('estadopeticione') ? $this->Html->link($peticione->estadopeticione->id, ['controller' => 'Estadopeticiones', 'action' => 'view', $peticione->estadopeticione->id]) : '' ?></td>
                <td><?= h($peticione->descripcion) ?></td>
                <td><?= h($peticione->peticionescol) ?></td>
                <td><?= h($peticione->created) ?></td>
                <td><?= h($peticione->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $peticione->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $peticione->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $peticione->id], ['confirm' => __('Are you sure you want to delete # {0}?', $peticione->id)]) ?>
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
