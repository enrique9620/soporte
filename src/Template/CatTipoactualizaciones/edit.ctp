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
                ['action' => 'delete', $catTipoactualizacione->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $catTipoactualizacione->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Cat Tipoactualizaciones'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="catTipoactualizaciones form large-9 medium-8 columns content">
    <?= $this->Form->create($catTipoactualizacione) ?>
    <fieldset>
        <legend><?= __('Edit Cat Tipoactualizacione') ?></legend>
        <?php
            echo $this->Form->control('nombre');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
