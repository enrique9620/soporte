<section class="section-account">
    <div class="img-backdrop" style="background-image: url('<?php echo $this->request->webroot; ?>img/soporte.jpg')"></div>
    <div class="spacer"></div>
    <div class="card contain-sm style-transparent">
        <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
                <br/>
                <span class="text-lg text-bold text-primary">INICIO DE SESI&Oacute;N</span>
                <br/><br/>
                <?php
                echo $this->Form->create('Usuario',array('class'=>'form floating-label','accept-charset'=>'utf-8'));
                    ?>
                    <div class="form-group">

                        <?php
                                echo $this->Form->input(
                                                        'username',
                                                        array(
                                                            'autocomplete'=>'off',
                                                            'div'=>false,
                                                            'label'=>false,
                                                            'class'=>'form-control')

                                                        );
                        ?>

                        <label for="username">Nombre de Usuario</label>
                    </div>

                    <div class="form-group">
                        <?php
                            echo $this->Form->input(
                                                    'password',
                                                    array('div'=>false,
                                                    'label'=>false,
                                                    'class'=>'form-control')
                                                );
                        ?>

                        <label for="password">Clave de acceso</label>
                    </div>
                    <?php
                    $this->Flash->render('auth')
                    ?>
                    <br/>
                    <div class="row">
                        <div class="col-sm-6 text-left">

                        </div><!--end .col -->
                        <div class="col-sm-6 text-right">
                            <button class="btn btn-primary btn-raised" type="submit">Iniciar Sesi&oacute;n</button>
                        </div><!--end .col -->
                    </div><!--end .row -->

				<?= $this->Form->end(); ?>
            </div><!--end .col -->
            </div><!--end .row -->
        </div><!--end .card-body -->
    </div><!--end .card -->
</section>

<script type="text/javascript">
var Login = document.getElementById("username").value;
document.getElementById('password').value="";
if(Login == "")
{
    document.getElementById("username").focus();

}
else
{
    document.getElementById("password").focus();
}
</script>
