<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Respuesta Anexos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Respuestas'), ['controller' => 'Respuestas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Respuesta'), ['controller' => 'Respuestas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="respuestaAnexos form large-9 medium-8 columns content">
    <?= $this->Form->create($respuestaAnexo) ?>
    <fieldset>
        <legend><?= __('Add Respuesta Anexo') ?></legend>
        <?php
            echo $this->Form->control('imagen');
            echo $this->Form->control('tipo');
            echo $this->Form->control('tamano');
            echo $this->Form->control('respuesta_id', ['options' => $respuestas, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
