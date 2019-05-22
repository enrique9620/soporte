<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Respuesta[]|\Cake\Collection\CollectionInterface $respuestas
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Respuesta'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Bugs'), ['controller' => 'Bugs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bug'), ['controller' => 'Bugs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Estadopeticiones'), ['controller' => 'Estadopeticiones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Estadopeticione'), ['controller' => 'Estadopeticiones', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Respuesta Anexos'), ['controller' => 'RespuestaAnexos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Respuesta Anexo'), ['controller' => 'RespuestaAnexos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="respuestas index large-9 medium-8 columns content">
    <h3><?= __('Respuestas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bug_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('estadopeticion_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('usuarioid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('descripcion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('users_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($respuestas as $respuesta): ?>
            <tr>
                <td><?= h($respuesta->id) ?></td>
                <td><?= $respuesta->has('bug') ? $this->Html->link($respuesta->bug->id, ['controller' => 'Bugs', 'action' => 'view', $respuesta->bug->id]) : '' ?></td>
                <td><?= $respuesta->has('estadopeticione') ? $this->Html->link($respuesta->estadopeticione->estado, ['controller' => 'Estadopeticiones', 'action' => 'view', $respuesta->estadopeticione->id]) : '' ?></td>
                <td><?= h($respuesta->usuarioid) ?></td>
                <td><?= h($respuesta->descripcion) ?></td>
                <td><?= $respuesta->has('user') ? $this->Html->link($respuesta->user->username, ['controller' => 'Users', 'action' => 'view', $respuesta->user->id]) : '' ?></td>
                <td><?= h($respuesta->created) ?></td>
                <td><?= h($respuesta->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $respuesta->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $respuesta->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $respuesta->id], ['confirm' => __('Are you sure you want to delete # {0}?', $respuesta->id)]) ?>
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
