<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Chat'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="chat form large-9 medium-8 columns content">
    <?= $this->Form->create($chat) ?>
    <fieldset>
        <legend><?= __('Add Chat') ?></legend>
        <?php
            echo $this->Form->control('to');
            echo $this->Form->control('from');
            echo $this->Form->control('msj');
            echo $this->Form->control('datetime');
            echo $this->Form->control('type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
