<?php
/** 
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\RespuestaAnexo $respuestaAnexo
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Respuesta Anexo'), ['action' => 'edit', $respuestaAnexo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Respuesta Anexo'), ['action' => 'delete', $respuestaAnexo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $respuestaAnexo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Respuesta Anexos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Respuesta Anexo'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Respuestas'), ['controller' => 'Respuestas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Respuesta'), ['controller' => 'Respuestas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="respuestaAnexos view large-9 medium-8 columns content">
    <h3><?= h($respuestaAnexo->id) ?></h3>
    </table>
    <div class="row" >
        <h4><?= __('Imagen') ?></h4>
        
    </div>
    <div class="row" >
        <img src="<?php echo $respuestaAnexo->imagen ?>" style="height:auto; width: auto;">
    </div>
</div>
