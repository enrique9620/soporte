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
                ['action' => 'delete', $tablaprueba->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tablaprueba->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Tablaprueba'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="tablaprueba form large-9 medium-8 columns content">
    <?= $this->Form->create($tablaprueba) ?>
    <fieldset>
        <legend><?= __('Edit Tablaprueba') ?></legend>
        <?php
            echo $this->Form->control('nom');
            echo $this->Form->control('apt');
            echo $this->Form->control('apm');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
