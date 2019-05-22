<?php
echo $this->Html->script
                        (
                            array
                                (
                                  'libs/jquery/jquery-3.1.0.min.js',
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
       }
   </style>
<section style="background-image: url('<?php echo $this->request->webroot; ?>img/login_soporte.jpg');background-size: 100% 100%;background-repeat: no-repeat;height:100%";>
   <div class="login-form padding20">
     <?php echo $this->Form->create('Usuario',array('class'=>'form floating-label','accept-charset'=>'utf-8'));?>
           <h1 class="text-light align-center">Inicio de Sesi&oacute;n</h1>
           <hr class="thin"/>
           <br />
           <div class="input-control text full-size" data-role="input">
               <label for="username">Usuario:</label>
               <!-- Nombre_ Usuario -->
               <?php echo $this->Form->text('username');?>
               <!-- <input type="text" name="user_login" id="user_login"> -->
               <button class="button helper-button clear"><span class="mif-cross"></span></button>
               <!-- Nombre_ Usuario -->
           </div>
           <br />
           <br />
           <div class="input-control password full-size" data-role="input">
               <label for="password">Clave de acceso:</label>
               <!-- Contraseña -->
               <?php   echo $this->Form->password('password');?>
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
