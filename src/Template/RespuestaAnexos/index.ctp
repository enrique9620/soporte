<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\RespuestaAnexo[]|\Cake\Collection\CollectionInterface $respuestaAnexos
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Respuesta Anexo'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Respuestas'), ['controller' => 'Respuestas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Respuesta'), ['controller' => 'Respuestas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="respuestaAnexos index large-9 medium-8 columns content">
    <h3><?= __('Respuesta Anexos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tipo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tamano') ?></th>
                <th scope="col"><?= $this->Paginator->sort('respuesta_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($respuestaAnexos as $respuestaAnexo): ?>
            <tr>
                <td><?= h($respuestaAnexo->id) ?></td>
                <td><?= h($respuestaAnexo->tipo) ?></td>
                <td><?= h($respuestaAnexo->tamano) ?></td>
                <td><?= $respuestaAnexo->has('respuesta') ? $this->Html->link($respuestaAnexo->respuesta->id, ['controller' => 'Respuestas', 'action' => 'view', $respuestaAnexo->respuesta->id]) : '' ?></td>
                <td><?= h($respuestaAnexo->created) ?></td>
                <td><?= h($respuestaAnexo->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $respuestaAnexo->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $respuestaAnexo->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $respuestaAnexo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $respuestaAnexo->id)]) ?>
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
