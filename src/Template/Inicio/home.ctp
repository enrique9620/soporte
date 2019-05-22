<?php use Cake\Routing\Router;?>
<div class="row">
<div class="col-12">
<div class="card">
    <div class="card-body">
        <h1 class="card-title">SISTEMA DE SOPORTE</h1><br>
        <h3 class="card-title">Operaciones</h3>
        <div class="row">
            <!-- Column -->
            <div class="col-sm-3">
                <div class="card card-hover">
                    <div class="box bg-cyan text-center">
                        <a href="<?php echo Router::url(['action'=>'index','controller'=>'bugs'])?>"  class="font-light text-white">
                        <h1 class="font-light text-white"><i class="mdi mdi-folder-multiple"></i></h1>
                        <h6 class="text-white">Reportes Abiertos</h6>
                    </a>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-sm-3">
                <div class="card card-hover">
                    <div class="box bg-success text-center">
                        <a href="<?php echo Router::url(['action'=>'finalizados','controller'=>'bugs'])?>"  class="font-light text-white">
                        <h1 class="font-light text-white"><i class="mdi mdi-folder-remove"></i></h1>
                        <h6 class="text-white">Reportes Cerrados</h6>
                    </a>
                    </div>
                </div>
            </div>
             <!-- Column -->
            <div class="col-sm-3">
                <div class="card card-hover">
                    <div class="box bg-warning text-center">
                        <a href="<?php echo Router::url(['action'=>'all','controller'=>'bugs'])?>"  class="font-light text-white">
                        <h1 class="font-light text-white"><i class="mdi mdi-format-list-numbers"></i></h1>
                        <h6 class="text-white">Todos los Reportes</h6>
                    </a>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-sm-3">
                <div class="card card-hover">
                    <div class="box bg-danger text-center">
                        <a href="<?php echo Router::url(['action'=>'chat','controller'=>'users'])?>"  class="font-light text-white">
                        <h1 class="font-light text-white"><i class="mdi mdi-message-text"></i></h1>
                        <h6 class="text-white">Chats</h6>
                    </a>
                    </div>
                </div>
            </div>

        </div>
        <!-- fin operaciones-->
        <div class="row">
          <div class="col-sm-6"><h3 class="card-title">Configuraciones</h3></div>
          <div class="col-sm-6"><h3 class="card-title">Estadísticas</h3></div>
        </div> 
        <div class="row">
            <!-- Column -->
            <div class="col-sm-3">
                <div class="card card-hover">
                    <div class="box bg-info text-center">
                        <a href="<?php echo Router::url(['action'=>'index','controller'=>'sistemas'])?>"  class="font-light text-white">
                        <h1 class="font-light text-white"><i class="mdi mdi-television-guide"></i></h1>
                        <h6 class="text-white">Sistemas</h6>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card card-hover">
                    <div class="box bg-danger text-center">
                        <a href="<?php echo Router::url(['action'=>'listado','controller'=>'Users'])?>"  class="font-light text-white">
                        <h1 class="font-light text-white"><i class="mdi mdi-account"></i></h1>
                        <h6 class="text-white">Supervisores</h6></a>
                    </div>
                </div>
            </div>
             <!-- Column -->
             <div class="col-sm-3">
                <div class="card card-hover">
                    <div class="box bg-cyan text-center">
                        <a href="<?php echo Router::url(['action'=>'index','controller'=>'Estadisticas'])?>"  class="font-light text-white">
                        <h1 class="font-light text-white"><i class="mdi mdi-chart-bar"></i></h1>
                        <h6 class="text-white">Gráficas</h6>
                    </a>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-sm-3">
                <div class="card card-hover">
                    <div class="box bg-success text-center">
                        <a href="<?php echo Router::url(['action'=>'reportes','controller'=>'estadisticas','_ext' => 'pdf'],['escape'=>false,'class'=>'', 'target' => '_blank'] )?>" class="sidebar-link">
                        <h1 class="font-light text-white"><i class="mdi mdi-file"></i></h1>
                        <h6 class="text-white">Reportes</h6></a>
                    </div>
                </div>
            </div>
            </div>
            <!--fin configuracion-->        
            <h3 class="card-title">Actualizaciones</h3>
        <div class="row">
            <!-- Column -->
            <div class="col-sm-3">
                <div class="card card-hover">
                    <div class="box bg-cyan text-center">
                        <a href="<?php echo Router::url(['action'=>'recientes','controller'=>'actualizaciones'])?>"  class="font-light text-white">
                        <h1 class="font-light text-white"><i class="mdi mdi-arrow-down-bold-circle"></i></h1>
                        <h6 class="text-white">Recientes</h6></a>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-sm-3">
                <div class="card card-hover">
                    <div class="box bg-success text-center">
                        <a href="<?php echo Router::url(['action'=>'add','controller'=>'actualizaciones'])?>"  class="font-light text-white">
                        <h1 class="font-light text-white"><i class="mdi mdi-sync"></i></h1>
                        <h6 class="text-white">Nueva Actualización</h6></a>
                    </div>
                </div>
            </div>
             <!-- Column -->
            <div class="col-sm-3">
                <div class="card card-hover">
                    <div class="box bg-warning text-center">
                        <a href="<?php echo Router::url(['action'=>'index','controller'=>'actualizaciones'])?>"  class="font-light text-white">
                        <h1 class="font-light text-white"><i class="mdi mdi-checkbox-marked-circle-outline"></i></h1>
                        <h6 class="text-white">Todas las Actualizaciones</h6></a>
                    </div>
                </div>
            </div>
        </div>
        <!---fin actualizaciones-->
        <h3 class="card-title">Centro de Atención</h3>
        <div class="row">
            <!-- Column -->
            <div class="col-sm-3">
                <div class="card card-hover">
                    <div class="box bg-cyan text-center">
                        <h1 class="font-light text-white"><i class="mdi mdi-account-box"></i></h1>
                        <h6 class="text-white">Directorio</h6>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-sm-3">
                <div class="card card-hover">
                    <div class="box bg-success text-center">
                        <h1 class="font-light text-white"><i class="mdi mdi-bookmark-check"></i></h1>
                        <h6 class="text-white">Seguimiento</h6>
                    </div>
                </div>
            </div>
            </div>
            <!--fin configuracion-->
</div>
</div>
</div>

</div>
