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
                ['action' => 'delete', $estadopeticione->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $estadopeticione->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Estadopeticiones'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="estadopeticiones form large-9 medium-8 columns content">
    <?= $this->Form->create($estadopeticione) ?>
    <fieldset>
        <legend><?= __('Edit Estadopeticione') ?></legend>
        <?php
            echo $this->Form->control('estado');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
