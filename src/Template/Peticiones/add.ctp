<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Peticiones'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Bugs'), ['controller' => 'Bugs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bug'), ['controller' => 'Bugs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Estadopeticiones'), ['controller' => 'Estadopeticiones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Estadopeticione'), ['controller' => 'Estadopeticiones', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="peticiones form large-9 medium-8 columns content">
    <?= $this->Form->create($peticione) ?>
    <fieldset>
        <legend><?= __('Add Peticione') ?></legend>
        <?php
            echo $this->Form->control('bug_id', ['options' => $bugs]);
            echo $this->Form->control('estadopeticion_id', ['options' => $estadopeticiones]);
            echo $this->Form->control('descripcion');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
