<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Reportes Cerrados</h2>
                <div class="table-responsive">
    <table id="zero_config" class="table table-striped table-bordered">
      <thead>
            <tr>
                
                <th>Asunto</th>
                <th>Asignado</th>
                <th>Sistema</th>
                <th>Fecha inicio</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bugs as $bug): ?>
            <tr> 
                
                <td><?= $bug->asunto ?></td>
                <td><?= $bug->user->nombre ?> </td>
                <td><?= $bug->sistema->sistema ?> </td>
                <td><?= $bug->fecha_inicio ?> </td>
                <td><?= $bug->activo ?> </td>
                <td><?= $bug->acciones ?> </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
</div>
</div>
</div>
</div>


