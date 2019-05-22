<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List R Seguimiento Directorio'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="rSeguimientoDirectorio form large-9 medium-8 columns content">
    <?= $this->Form->create($rSeguimientoDirectorio) ?>
    <fieldset>
        <legend><?= __('Add R Seguimiento Directorio') ?></legend>
        <?php
            echo $this->Form->control('id_usuario');
            echo $this->Form->control('id_directorio');
            echo $this->Form->control('comentario');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
