<?php
    echo $this->Html->css
                            (
                                array
                                    (
                                        
                                        'theme-default/font-awesome.min.css',
                                        'theme-default/libs/DataTables/jquery.dataTables.css',
                                        'theme-default/libs/DataTables/TableTools.css'
                                    )
                            ); 
 ?>
<div class="cell auto-size padding20 bg-white" id="cell-content">
  <hr class="thin bg-grayLighter">
    <h1 class="text-light">Actualizaciones recientes<span class="mif-file-download place-right"></span></h1>
    <hr class="thin bg-grayLighter">
        <?php
        echo  $this->Html->link(
          'Nuevo '.$this->Html->tag('span','',array ('class'=>'mif-plus')),array ('action'=>'add'),
        array('escape'=>false,'class'=>'button primary place-right'));
        use Cake\I18n\Time;
        ?>
    <!-- <button class="button primary" onclick="pushMessage('info')"><span class="mif-plus"></span> Nuevo</button> -->
    <!-- <button class="button success" onclick="pushMessage('success')"><span class="mif-play"></span> Editar</button> -->
    <!-- <button class="button warning">Exportar <span class="mif-loop2"></span></button> -->
    <!-- <button class="button alert" onclick="pushMessage('alert')"> Eliminar</button> -->
    <table id="actualizaciones" class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Actualizacion</th>
                <th>Sistema</th>
                <th>Fecha</th>
                <th>Importancia</th>
                <th>Tipo</th>
                <th>Acciones</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($actualizaciones as $actualizacione): ?>
            <tr>
                <td><?php echo ($actualizacione['nombre']); ?></td>
                <td><?php echo ($actualizacione['sistema']); ?></td>
                <td><?php echo date_format(new Time($actualizacione['fecha']), 'Y-m-d'); ?></td>
                <td><?= h($actualizacione['importancia']) ?></td>
                <td><?= h($actualizacione['tipo']) ?></td>
                <td><?= $actualizacione['acciones'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    <script>DataTableGenerator('actualizaciones');</script>
    <script language="Javascript">
    function confirmDel()
    {
    var agree=confirm("¿Realmente desea eliminarlo? ");
    if (agree) return true ;
    return false;
    }
    </script>
</div>


