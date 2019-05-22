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
    <h1 class="text-light">Supervisores<span class="mif-users place-right"></span></h1>
    <hr class="thin bg-grayLighter">
        <?php
        echo  $this->Html->link(
          'Nuevo '.$this->Html->tag('span','',array ('class'=>'mif-plus')),array ('action'=>'add'),
        array('escape'=>false,'class'=>'button primary place-right'));
        ?>
    <!-- <button class="button primary" onclick="pushMessage('info')"><span class="mif-plus"></span> Nuevo</button> -->
    <!-- <button class="button success" onclick="pushMessage('success')"><span class="mif-play"></span> Editar</button> -->
    <!-- <button class="button warning">Exportar <span class="mif-loop2"></span></button> -->
    <!-- <button class="button alert" onclick="pushMessage('alert')"> Eliminar</button> -->
    <table id="asignados" class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Usuario</th>
                <th>Acciones</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($asignados as $asignado): ?>
            <tr>
                <td><?=$asignado->nombre ?></td>
                <td><?=$asignado->correo ?></td>
                <td><?=$asignado->Users['username'] ?></td>
                <td><?=$asignado->acciones ?> </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


    </div>
    <script>DataTableGenerator('asignados');</script>
    <script language="Javascript">
    function confirmDel()
    {
    var agree=confirm("¿Realmente desea eliminarlo? ");
    if (agree) return true ;
    return false;
    }
    </script>
</div>


