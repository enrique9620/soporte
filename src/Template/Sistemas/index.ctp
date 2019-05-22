<!---tabla de sistemas -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Sistemas</h2>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <a href="#Modal2" class="btn btn-success" data-toggle="modal"><i class="mdi mdi-plus-circle"></i> <span>Nuevo</span></a>
                            <tr>
                                <!-- <th>id</th> -->
                                <th>Sistema</th>
                                <th scope="col" class="actions"><?= __('Acciones') ?>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                      <?php foreach ($sistemas as $sistema): ?>
                        <tr <?=$sistema->id ?>>
                         
                          <td><?=$sistema->sistema ?></td>
                         <td class="actions">
                           <!-- <?= $this->Html->link(__('Ver'), ['action' => 'view', $sistema->id],['class'=>'btn btn-info btn-sm']) ?> -->
                         <?= $this->Html->link(__('<i class="mdi mdi-border-color"></i>'), ['action' => 'edit', $sistema->id],['class'=>'btn btn-warning btn-sm', 'escape'=>false]) ?>
                         <?= $this->Form->postLink(__('<i class="mdi mdi-close-circle"></i>'), ['action' => 'delete', $sistema->id],['class'=>'btn btn-danger btn-sm','escape'=>false], ['confirm' => __('Are you sure you want to delete # {0}?', $sistema->id)]) ?>
                        </td>
                        </tr>
                      <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<!--modal para añadir nuevo-->
<div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <?= $this->Form->create(null,[ 'type' => 'post', 'url' => ['controller' => 'sistemas','action' => 'add']]) ?>
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nuevo Sistema</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?= $this->Form->text('sistema',['class'=>'form-control form-control-user','placeholder'=>'Nombre','maxlength'=>'100']) ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        <?= $this->Form->button(__('Añadir'),['class'=>'btn btn-success']) ?>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
