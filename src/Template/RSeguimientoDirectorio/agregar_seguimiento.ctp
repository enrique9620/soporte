<?php echo $this->Html->css
                    (
                        array
                            (
                                'theme-default/font-awesome.min.css',
                                'theme-default/libs/DataTables/jquery.dataTables.css',
                                'theme-default/libs/DataTables/TableTools.css'
                            )
                    );
echo $this->Html->script
                        (
                            array
                                (
                                    'helpers/DataTableGenerator.js',
                                )
                        );

echo $this->Html->script('libs/DataTables/jquery.dataTables.min.js');
?>
<div class="cell auto-size padding20 bg-white" id="cell-content">
  <table class="table table-striped table-hover" style="overflow-y: scroll;" id="seguimiento">
    <thead>
      <th>Fecha</th>
      <th>Seguimiento</th>
      <th>Archivo</th>
    </thead>
    <tbody>
      <?php foreach ($seguimientos as $key => $seguimiento): ?>
        <tr>
          <td><?php echo $seguimiento->created?></td>
          <td class="text-uppercase">
            Agregado por: <span class="label label-success"><?php echo $seguimiento->user->username?></span>
            <br>
            <?php echo utf8_decode($seguimiento->comentario)?>
          </td>
          <td>
            <?php if ($seguimiento->archivo): ?>
              <?= $seguimiento->acciones ?>
              <?php else: ?>
                <i class="fa fa-ban"></i>
            <?php endif; ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
<script>DataTableGeneratorSimple('seguimiento');</script>
