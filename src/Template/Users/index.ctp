<!---tabla de sistemas -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Supervisores</h2>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <a href="#Modal2" class="btn btn-success" data-toggle="modal"><i class="mdi mdi-plus-circle"></i> <span>Nuevo</span></a>
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('correo') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr<?= h($user->id) ?>>
                <td><?= h($user->username) ?></td>
                <td><?= h($user->nombre) ?></td>
                <td><?= h($user->correo) ?></td>
                <td class="actions">
                    <!-- <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?> -->
                    <?= $this->Html->link(__('<i class="mdi mdi-border-color"></i>'), ['action' => 'edit', $user->id],['class'=>'btn btn-warning btn-sm', 'escape'=>false]) ?>
                    <?= $this->Form->postLink(__('<i class="mdi mdi-close-circle"></i>'), ['action' => 'delete', $user->id],['class'=>'btn btn-danger btn-sm','escape'=>false], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
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
                <?= $this->Form->create(null,[ 'type' => 'post', 'url' => ['controller' => 'Users','action' => 'add']]) ?>
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nuevo supervisor</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label>Usuario</label>
                        <?= $this->Form->text('username',['class'=>'form-control form-control-user','placeholder'=>'Usuario','maxlength'=>'100']) ?>
                    </div>
                    <div class="modal-body">
                        <?= $this->Form->control('password',['class'=>'form-control form-control-user','placeholder'=>'Contraseña','maxlength'=>'100']) ?>
                    </div>
                    <div class="modal-body">
                        <label>Nombre</label>
                        <?= $this->Form->text('nombre',['class'=>'form-control form-control-user','placeholder'=>'Nombre','maxlength'=>'100']) ?>
                    </div>
                    <div class="modal-body">
                        <?= $this->Form->control('correo',['class'=>'form-control form-control-user','placeholder'=>'Correo','maxlength'=>'100']) ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        <?= $this->Form->button(__('Añadir'),['class'=>'btn btn-success']) ?>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
