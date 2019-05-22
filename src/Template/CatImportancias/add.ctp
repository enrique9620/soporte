<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Cat Importancias'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="catImportancias form large-9 medium-8 columns content">
    <?= $this->Form->create($catImportancia) ?>
    <fieldset>
        <legend><?= __('Add Cat Importancia') ?></legend>
        <?php
            echo $this->Form->control('nombre');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
