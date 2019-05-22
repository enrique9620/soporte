<script type="text/javascript">
    <?php 
          //$session = $this->request->session();
          $username = $this->request->session()->read('User.username');
          $correo = $this->request->session()->read('User.correo');
         ?>

    window.user_name = <?php echo "'".$username."'" ?>;
    window.email = <?php echo "'".$correo."'" ?>;
</script>
<?php
/**
  * @var \App\View\AppView $this
  */
        echo $this->Html->css
                            (
                                array
                                    (
                                        // 'tags.css',
                                        // // 'theme-default/libs/bootstrap-multiselect/bootstrap-multiselect.cc',
                                        // // 'theme-default/libs/bootstrap-datepicker/datepicker3.css?1424887858',
                                        // 'select2.css'
                                    )
                            );

        echo $this->Html->script
                                (
                                    array
                                        (
                                            // 'libs/select2.js',
                                            'chat/jquery-1.11.3.min.js',
                                            'chat/jquery-ui-1.10.4.custom.min.js',
                                            'chat/jquery.slimscroll.min.js',
                                            'chat/jquery.tipsy.js',
                                            'chat/jquery.main.js',
                                            'chat/config.js',
                                            'chat/i18n_en.js',
                                        )
                                );
?>
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">
<div id="cell-content">
    <h1 >Chat en línea! <span class="mif-bubbles place-right"></span></h1>
    <hr class="thin bg-grayLighter">
    <!-- <button class="button primary" onclick="window.location.href='/soporteRemake/asignados'" ><span class="mif-menu"></span> Listado</button> -->

    <hr class="thin bg-grayLighter">

    <!-- <section style="background-image: url('<?php echo $this->request->webroot; ?>img/login_soporte.jpg');background-size: 100% 100%;background-repeat: no-repeat;height:100%";></section> -->

    <div style="background-image: url('<?php echo $this->request->webroot; ?>img/login_soporte.jpg');background-size: 100% 100%;background-repeat: no-repeat;height:450px";></div>
</div>
</div>
</div>
</div>
</div>
