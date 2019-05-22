<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="description" content="particles.js is a lightweight JavaScript library for creating particles.">
  <meta name="author" content="Vincent Garreau" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <!-- <link rel="stylesheet" media="screen" href="css/style.css"> -->
  <?php
  echo $this->Html->css
                            (
                                array
                                    (
                                        'particles.css',
                                    )
                            );
   ?>
   <style>
       .login-form {
           width: 25rem;
           height: 18.75rem;
           position: fixed;
           top: 50%;
           margin-top: -9.375rem;
           left: 50%;
           margin-left: -12.5rem;
           background-color: #ffffff;
           opacity: 0;
           -webkit-transform: scale(.8);
           transform: scale(.8);
           /*agregado */
           border-radius: 10px 10px 10px 10px;
          -moz-border-radius: 10px 10px 10px 10px;
          -webkit-border-radius: 10px 10px 10px 10px;
           border: 0px solid #000000;
       }
   </style>
</head>
<body>

<!-- count particles -->
<!-- <div class="count-particles">
  <span class="js-count-particles">--</span> particles
</div> -->

<!-- particles.js container -->
<div id="particles-js" style="background-color: #312d2d;"></div>

<section>
   <div class="login-form padding20">
     <?php echo $this->Form->create('Usuario',array('class'=>'form floating-label','accept-charset'=>'utf-8'));?>
           <h1 class="align-center">Inicio de Sesi&oacute;n</h1>
           <hr class="thin"/>
           <br />
           <div class="input-control text full-size" data-role="input">
               <label for="username">Usuario:</label>
               <!-- Nombre_ Usuario -->
               <?php echo $this->Form->text('username',['placeholder'=>'Usuario']);?>
               <!-- <input type="text" name="user_login" id="user_login"> -->
               <button class="button helper-button clear"><span class="mif-cross"></span></button>
               <!-- Nombre_ Usuario -->
           </div>
           <br />
           <br />
           <div class="input-control password full-size" data-role="input">
               <label for="password">Clave de acceso:</label>
               <!-- Contraseña -->
               <?php   echo $this->Form->password('password',['placeholder'=>'Clave de acceso']);?>
               <!-- <input type="password" name="user_password" id="user_password"> -->
               <button class="button helper-button reveal"><span class="mif-looks"></span></button>
               <!-- Contraseña -->
           </div>
           <br />
           <br />
           <div class="form-actions">
               <button type="submit" class="button primary">Ingresar...</button>
           </div>
       <?= $this->Form->end(); ?>
   </div>
</section>

<!-- scripts -->
<!-- <script src="../particles.js"></script>
<script src="js/app.js"></script> -->
<?php
echo $this->Html->script
                        (
                            array
                                (
                                    'particles.js',
                                    'app.js',
                                    'libs/jquery/jquery-3.1.0.min.js',
                                    // 'stats.js',
                                )
                        );
 ?>

<!-- stats.js -->
<!-- <script src="js/lib/stats.js"></script> -->
<script>
  var count_particles, stats, update;
  stats = new Stats;
  stats.setMode(0);
  stats.domElement.style.position = 'absolute';
  stats.domElement.style.left = '0px';
  stats.domElement.style.top = '0px';
  document.body.appendChild(stats.domElement);
  count_particles = document.querySelector('.js-count-particles');
  update = function() {
    stats.begin();
    stats.end();
    if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) {
      count_particles.innerText = window.pJSDom[0].pJS.particles.array.length;
    }
    requestAnimationFrame(update);
  };
  requestAnimationFrame(update);
</script>
<script>
     $(function(){
         var form = $(".login-form");
         form.css({
             opacity: 1,
             "-webkit-transform": "scale(1)",
             "transform": "scale(1)",
             "-webkit-transition": ".5s",
             "transition": ".5s"
         });
     });
</script>

</body>
</html>
