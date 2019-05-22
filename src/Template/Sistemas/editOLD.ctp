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
                ['action' => 'delete', $sistema->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $sistema->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Sistemas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Bugs'), ['controller' => 'Bugs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bug'), ['controller' => 'Bugs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sistemas form large-9 medium-8 columns content">
    <?= $this->Form->create($sistema) ?>
    <fieldset>
        <legend><?= __('Edit Sistema') ?></legend>
        <?php
            echo $this->Form->control('sistema');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
