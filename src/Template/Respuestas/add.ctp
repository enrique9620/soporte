<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Respuestas'), ['action' => 'index']) ?></li>
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
<div class="respuestas form large-9 medium-8 columns content">
    <?= $this->Form->create($respuesta) ?>
    <fieldset>
        <legend><?= __('Add Respuesta') ?></legend>
        <?php
            echo $this->Form->control('bug_id', ['options' => $bugs, 'empty' => true]);
            echo $this->Form->control('estadopeticion_id', ['options' => $estadopeticiones, 'empty' => true]);
            echo $this->Form->control('usuarioid');
            echo $this->Form->control('descripcion');
            echo $this->Form->control('users_id', ['options' => $users, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
