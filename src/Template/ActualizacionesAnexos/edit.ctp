<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $actualizacionesAnexo->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $actualizacionesAnexo->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Actualizaciones Anexos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Actualizaciones'), ['controller' => 'Actualizaciones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Actualizacione'), ['controller' => 'Actualizaciones', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="actualizacionesAnexos form large-9 medium-8 columns content">
    <?= $this->Form->create($actualizacionesAnexo) ?>
    <fieldset>
        <legend><?= __('Edit Actualizaciones Anexo') ?></legend>
        <?php
            echo $this->Form->control('imagen_anterior');
            echo $this->Form->control('imagen_nueva');
            echo $this->Form->control('tipo');
            echo $this->Form->control('tamano');
            echo $this->Form->control('actualizaciones_id', ['options' => $actualizaciones, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
