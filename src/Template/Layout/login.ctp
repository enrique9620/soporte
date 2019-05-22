
 <!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            Sistema de Soporte
        </title>
        <!-- BEGIN META -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="your,keywords">
        <meta name="description" content="Short explanation about this website">

        <?php
        echo $this->Html->meta('icon');

        echo $this->Html->css
                            (
                                array
                                    (
                                        'metro-ui/metro.css',
                                        'metro-ui/metro-icons.css',
                                        'metro-ui/metro-responsive.css',
                                        // // 'theme-default/bootstrap.css?1422792965',
                                        // // 'theme-default/materialadmin.css?1425466319',
                                        // 'theme-default/font-awesome.min.css?1422529194',
                                        // 'theme-default/material-design-iconic-font.min.css?1421434286',
                                        //'letras_logueo.css'
                                    )
                            );
        //echo $this->Html->script(array('jquery'));
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>

    </head>
    <body>

        <?php
        echo $this->Flash->render();
        echo $this->fetch('content');

        echo $this->Html->script
                                (
                                    array
                                        (
                                          'libs/jquery/jquery-3.1.0.min.js',
                                          'metro-ui/metro.js',
                                            // 'libs/metro-ui/metro.js',
                                            // 'libs/jquery/jquery-3.1.0.min.js',
                                            // 'libs/jquery/jquery-migrate-1.2.1.min.js',
                                            // 'libs/bootstrap/bootstrap.min.js',
                                            // 'libs/spin.js/spin.min.js',
                                            // 'libs/autosize/jquery.autosize.min.js',
                                            // 'libs/nanoscroller/jquery.nanoscroller.min.js' ,
                                            // 'core/source/App.js',
                                            // 'core/source/AppNavigation.js',
                                            // 'core/source/AppOffcanvas.js',
                                            // 'core/source/AppCard.js',
                                            // 'core/source/AppForm.js',
                                            // 'core/source/AppNavSearch.js',
                                            // 'core/source/AppVendor.js',
                                            // 'core/demo/Demo.js',
                                        )
                                );
        ?>
    </body>
</html>
