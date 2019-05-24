<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Respuesta $respuesta
  */
?>
<div class="card">
<div class="card-body">
<div class="alert alert-info">
    <h4><?= __('Respuesta') ?></h4> 
    <table class="vertical-table">
        <tr <?= h($respuesta->id) ?>>
        </tr>
        <tr>
            <th scope="row"><?= __('Asunto Bug') ?></th>
            <td><?= h($respuesta->bug->asunto ) ?></td>
        </tr>
       <tr>
        <th scope="row"><?= __('Descripción Bug') ?></th>
            <td><?= h($respuesta->bug->descripcion ) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Respuesta') ?></th>
            <td><?= h($respuesta->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nom. del Asignado') ?></th>
            <td><?= h($respuesta->user->nombre) ?></td>
        </tr>
    </table>
    <h4><?= __('Captura') ?></h4>
    <div>
        <?php if (!empty($respuesta->respuesta_anexos)): ?>
        <?php foreach ($respuesta->respuesta_anexos as $respuestaAnexos): ?>
        <img src="<?php echo $respuestaAnexos->imagen ?>" style="height:auto; width: auto;">
        <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <div class="related">
        <?php if (!empty($respuesta->respuesta_anexos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <!-- <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Tipo') ?></th>
                <th scope="col"><?= __('Tamano') ?></th>
                <th scope="col"><?= __('Respuesta Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th> -->
            </tr>
            <?php foreach ($respuesta->respuesta_anexos as $respuestaAnexos): ?>
            <tr>
                <!-- <td><?= h($respuestaAnexos->id) ?></td>
                <td><?= h($respuestaAnexos->tipo) ?></td>
                <td><?= h($respuestaAnexos->tamano) ?></td>
                <td><?= h($respuestaAnexos->respuesta_id) ?></td>
                <td><?= h($respuestaAnexos->created) ?></td>
                <td><?= h($respuestaAnexos->modified) ?></td> -->
            </tr>
            <?php endforeach; ?>
        </table>
        <div><!-- <img src="<//?php echo $respuestaAnexos->imagen ?>" style="height:auto; width: auto;"> -->
    </div>
       <?php endif; ?>
</div>

</div>
</div>