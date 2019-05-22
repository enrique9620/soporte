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
                ['action' => 'delete', $actualizacione->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $actualizacione->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Actualizaciones'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="actualizaciones form large-9 medium-8 columns content">
    <?= $this->Form->create($actualizacione) ?>
    <fieldset>
        <legend><?= __('Edit Actualizacione') ?></legend>
        <?php
            echo $this->Form->control('descripcion');
            echo $this->Form->control('fecha', ['empty' => true]);
            echo $this->Form->control('cat_importancia_id');
            echo $this->Form->control('cat_tipoactualizacion_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
