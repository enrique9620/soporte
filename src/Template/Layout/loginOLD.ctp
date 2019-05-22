<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            Sistema de soporte
        </title>

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
                                        'theme-default/bootstrap.css?1422792965',
                                        'theme-default/materialadmin.css?1425466319',
                                        'theme-default/font-awesome.min.css?1422529194',
                                        'theme-default/material-design-iconic-font.min.css?1421434286'
                                    )
                            );
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>

    </head>
    <body class="menubar-hoverable header-fixed ">

        <?php
        echo $this->Flash->render();
        echo $this->fetch('content');

        echo $this->Html->script
                                (
                                    array
                                        (
                                            'libs/jquery/jquery-1.11.2.min.js',
                                            'libs/jquery/jquery-migrate-1.2.1.min.js',
                                            'libs/bootstrap/bootstrap.min.js',
                                            'libs/spin.js/spin.min.js',
                                            'libs/autosize/jquery.autosize.min.js',
                                            'libs/nanoscroller/jquery.nanoscroller.min.js' ,
                                            'core/source/App.js',
                                            'core/source/AppNavigation.js',
                                            'core/source/AppOffcanvas.js',
                                            'core/source/AppCard.js',
                                            'core/source/AppForm.js',
                                            'core/source/AppNavSearch.js',
                                            'core/source/AppVendor.js',
                                            'core/demo/Demo.js',
                                        )
                                );
        ?>
    </body>
</html>

