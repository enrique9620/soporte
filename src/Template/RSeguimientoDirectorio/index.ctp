<?php
    echo $this->Html->css
                            (
                                array
                                    (

                                        'theme-default/font-awesome.min.css',
                                        'theme-default/libs/DataTables/jquery.dataTables.css',
                                        'theme-default/libs/DataTables/TableTools.css',
                                        'theme-default/libs/fileinput/fileinput.css',
                                        'theme-default/libs/fileinput/fileinput.min.css',
                                    )
                            );

    echo $this->Html->script
                                    (
                                        array
                                            (
                                                'bootstrap/bootstrap.js',
                                                'libs/fileinput/fileinput.js',
                                                'libs/fileinput/fileinput.min.js',
                                                'libs/jquery.validate',
                                            )
                                    );
 ?>
 <div class="cell auto-size padding20 bg-white" id="cell-content">
   <hr class="thin bg-grayLighter">
     <h1 class="text-light">Seguimiento<span class="mif-bookmarks place-right"></span></h1>
     <hr class="thin bg-grayLighter">
     <table id="seguimiento" class="table table-striped table hover">
       <thead>
             <tr>
                 <th>Usuario</th>
                 <th>Directorio</th>
                 <th>Cargo</th>
                 <th>Anotación</th>
                 <th>Creado</th>
                 <th>Activo</th>
                 <th>Acciones</th>
             </tr>
         </thead>
         <tbody>
             <?php foreach ($rSeguimientoDirectorio as $seguimiento): ?>

             <tr>
               <td><?= h($seguimiento->user->username) ?></td>
               <td><?= h(utf8_decode($seguimiento->directorio->nombre_completo)) ?></td>
               <td><?= h($seguimiento->directorio->cargo) ?></td>
               <td class="text-uppercase"><?= h(utf8_decode($seguimiento->comentario)) ?></td>
               <td><?= h($seguimiento->created) ?></td>
               <td><?php echo $seguimiento->activo ?></td>
               <td><?= $seguimiento->acciones ?> </td>
             </tr>
             <?php endforeach; ?>
         </tbody>
     </table>
</div>
<script>DataTableGenerator('seguimiento');</script>
<script language="Javascript">
function confirmDel()
{
var agree=confirm("¿Realmente desea eliminarlo? ");
if (agree) return true ;
return false;
}
</script>
