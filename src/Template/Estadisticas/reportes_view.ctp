<?php
/**
  * @var \App\View\AppView $this
  */
        echo $this->Html->css
                            (
                                array
                                    (
                                        // 'theme-default/libs/bootstrap-datepicker/datepicker3.css?1424887858',
                                    )
                            );

        echo $this->Html->script
                                (
                                    array
                                        (
                                            // 'libs/bootstrap-datepicker/locales/bootstrap-datepicker.es.js',
                                        )
                                );
?>

<div class="cell auto-size padding20 bg-white" id="cell-content">
    <h1 class="text-light">Seleccione reporte<span class="mif-clipboard place-right"></span></h1>
    <hr class="thin bg-grayLighter">
    <?php
    $session = $this->request->session();
    $url = $this->request->session()->read('url');
     ?>
    <!-- <button class="button primary" onclick="window.location.href='<?= $url ?>actualizaciones'" ><span class="mif-menu"></span> Reporte General</button> -->
    <?php
      // echo $this->Html->link( 'Reporte general'.$this->Html->tag('span','',array ('class'=>'mif-opencart')), ['action' => 'reportes', '_ext' => 'pdf'], array
      //   (
      //     'class'=>'button primary',
      //     'target'=>'_blank'
      //   ));
      echo  $this->Html->link(
      'Reporte general '.$this->Html->tag('span','',array ('class'=>'mif-opencart')),array ('action' => 'reportes', '_ext' => 'pdf'),
    array('escape'=>false,'class'=>'button primary', 'target' => '_blank'));
    ?>
    <hr class="thin bg-grayLighter">
</div>

<!-- <script>
$('#fecha').datepicker({
        language: 'es',
        autoclose: true,
        todayHighlight: true,
        format: "dd-mm-yyyy"
      });
</script> -->