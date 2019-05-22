 <!---tabla de sistemas -->
 <?php use Cake\I18n\Time;?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Actualizaciones</h2>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <!-- <a href="#Modal2" class="btn btn-success" data-toggle="modal"><i class="mdi mdi-plus-circle"></i> <span>Nuev o</span></a> -->
                            
                            <?= $this->Html->link(__('<i class="mdi mdi-file-document-box"></i> Listado'), ['controller'=>'Actualizaciones','action' => 'index'],['escape'=>false, 'class'=>'btn btn-info']) ?><p><br>
                              <?= $this->Html->link(__('<i class="mdi mdi-plus-circle"></i> Nueva Act.'), ['controller'=>'actualizaciones','action' => 'add'],['escape'=>false, 'class'=>'btn btn-success']) ?>
                            <tr>
                                <!-- <th>id</th> -->
                                 <th>Actualización</th>
                                 <th>Sistema</th>
                                 <th>Fecha</th>
                                 <th>Importancia</th>
                                 <th>Tipo</th>
                                <!-- <th scope="col" class="actions"><?= __('Acciones') ?></th> -->
                            </tr>
                        </thead>
                        <tbody>
                      <?php foreach ($actualizaciones as $actualizacion): ?>

                      <tr>
                
                <td><?php echo ($actualizacion['nombre']); ?></td>
                <td><?php echo ($actualizacion['sistema']); ?></td>
                <td><?php echo date_format(new Time($actualizacion['fecha']), 'Y-m-d'); ?></td>
                <td><?= h($actualizacion['importancia']) ?></td>
                <td><?= h($actualizacion['tipo']) ?></td>
                        <!--  <td class="actions">
                         <?= $this->Html->link(__('<i class="mdi mdi-border-color"></i>'), ['action' => 'edit', $actualizacion->id],['class'=>'btn btn-warning btn-sm', 'escape'=>false]) ?>
                         <?= $this->Form->postLink(__('<i class="mdi mdi-close-circle"></i>'), ['action' => 'delete', $actualizacion->id],['class'=>'btn btn-danger btn-sm','escape'=>false], ['confirm' => __('Are you sure you want to delete # {0}?', $actualizacion->id)]) ?> 
                        </td>-->
                        </tr>
                      <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
