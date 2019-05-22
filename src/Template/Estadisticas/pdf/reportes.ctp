<style type="text/css">
  @page { margin: 130px 50px; font-family: Arial; font-size: 25px; }
  @page { size: letter portrait; }

   body {border:0px solid #000; margin-top: 100px; margin-bottom: 60px; width: 90%; margin-left: 4.5%;}

   #header  {position: fixed;top: -100px;height: 120px;}

   #content{ }

   #InfoPiePagina
   {
     position: fixed;
     bottom: -20px;
     height: 100px;
     left: -50px;
     right: -50px;
     text-align: center;
   }
   footer
   {
     position: fixed;
     bottom: -125px;
     height: 200px;
     left: -50px;
     right: -50px;
   }
   #container {  }

   table  {border-collapse: collapse;}

</style>
  <div id="header">
    <center>
        <table border="0" style="width:100%; height: 150px;">
          <tr>
            <th width=25% style="text-align:center;">
              <!-- <?php echo $this->Html->image('qroo.png', ['alt' => 'CakePHP', 'fullBase' => true, 'width' => '130px']); ?> -->
              <!-- <img width=100 height=70  src="../../../webroot/img/qroo.png" alt="sesa"> -->
            </th>

            <th width=50%>
              <h2 style="text-align:center; font-size:25px;">REPORTE GENERAL DE SOPORTE</h2>
            </th>

            <th width=25% style="text-align:center;">
              <!-- <?php echo $this->Html->image('ceiba.png', ['alt' => 'CakePHP', 'fullBase' => true, 'width' => '130px']); ?> -->
              <!-- <img width=100 height=70  src="../../../webroot/img/ceiba.png" alt="sesa"> -->
            </th>
          </tr>
        </table>
    </center>
  </div>

    <footer>
      <table border="0" style="width:100%; height: 100px;">
        <tr>
          <th width="100%">
            <!-- <?php echo $this->Html->image('pie_page.jpg', ['alt' => 'CakePHP', 'fullBase' => true, 'width' => '1630px', 'height' => '200px']); ?> -->
        </tr>
      </table>
    </footer>

    <div id="InfoPiePagina">
      <br>
      <p><font color="blue">Consultoría Integral SM2 Innovación</font><br>
      Calle Héroes Col.Centro C.P.77000, Chetumal,Quintana Roo, M&eacute;xico <br>
      Tel: (983) 1161061<br>
      https://sm2consultores.com/</p>
    </div>

<?php //print_r($getcp); ?>

<table style="width:100%;" border=1>
  <tbody>
    <tr style="background-color:#013ADF; color:#ffffff">
      <th colspan="2">INFORMACI&Oacute;N</th>
    </tr>

    <tr>
      <td style="background-color:#D8D8D8;">Reportes</td>
      <td><?php echo sizeof($bugs->toArray()); ?></td>
    </tr>

    <tr>
      <td style="background-color:#D8D8D8;">Reportes atendidos</td>
      <td><?php echo sizeof($bugsAtendidos->toArray()); ?></td>
    </tr>

    <tr>
      <td style="background-color:#D8D8D8;">Reportes no revisados</td>
      <td><?php echo sizeof($bugs->toArray())-sizeof($bugsAtendidos->toArray()); ?></td>
    </tr>

    <tr>
      <td style="background-color:#D8D8D8;">Reportes abiertos</td>
      <td><?php echo sizeof($bugsAbiertos->toArray()); ?></td>
    </tr>

    <tr>
      <td style="background-color:#D8D8D8;">Reportes cerrados</td>
      <td><?php echo sizeof($bugsCerrados->toArray()); ?></td>
    </tr>

    <tr style="background-color:#013ADF; color:#ffffff">
      <th colspan="2">Reportes atendidos por usuario</th>
    </tr>

     <?php
    	$asignados = $asignados->toArray();
    	foreach ($asignados as $key => $asignado) {
    		$cont = 0;
    		echo "<tr>";
    		echo '<td style="background-color:#D8D8D8;">'.$asignados[$key].'</td>';
    		foreach ($bugs as $key2 => $bug) {
    			if ($bug->users_id == $key) {
    				$cont++;
    			}
    		}
    		echo "<td>".$cont."</td>";
    		echo "</tr>";
    	}
     ?> 
  </tbody>
</table>