<?php
echo $this->Html->script
                        (
                            array
                                (
                                    './charts/highcharts.js',
                                    './charts/highcharts-3d.js',
                                    './charts/exporting.js',
                                    './charts/data.js',
                                    './charts/drilldown.js',
                                    './charts/data.js',
                                    './charts/drilldown.js'
                                )
                        );
?> 
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

  <hr class="thin bg-grayLighter">
  <h1>Gr&aacute;ficas <span class="mif-chart-bars place-right"></span></h1>
  <hr class="thin bg-grayLighter">
  <div class="tabcontrol" data-role="tabcontrol">
        <ul id="tabsJustified" class="nav nav-tabs">
                    <li><a class="nav-link small text-uppercase" href="" data-target="#datos_p"data-toggle="tab">Atentidos/No atendidos</a></li>
                    <li class="nav-item"><a href="" data-target="#datos_d" data-toggle="tab" class="nav-link small text-uppercase ">Abiertos/Cerrados</a></li>
                    <li class="nav-item"><a href="" data-target="#datos_t" data-toggle="tab" class="nav-link small text-uppercase ">Por usuario</a></li>
         </ul>
        <br>
  <!--- grafica por atendidos-->
      <!-- <div class="frames bg-grayLight">
          <div class="frame" id="datos_p">
 -->
 <div id="tabsJustifiedContent" class="tab-content">
          <div id="datos_p" class="tab-pane fade">
            <div class="grid condensed">
              <div class="row cells12">
                <!-- celda1 -->
                <div class="cell colspan7 bg-white">
                  <!--  -->
                  <div class="" id="pormunicipio_primera">
                    <?php
                    $resultadosMun = array();
                    $sueldoquincenalcargos = Array (
                      Array ('CatMunicipio'=>Array('name'=> 'Atendidos'),Array ('total' => $grafica1['atendidos'])),
                      Array ('CatMunicipio'=>Array('name' => 'Sin revisar' ),Array ('total'=> $grafica1['sinrevisar']))
                      );
                    foreach($sueldoquincenalcargos  as $apg)
                    {
                        $resultadosMun[$apg['CatMunicipio']['name']] = $apg[0]['total'];
                    }
                    ?>
                    <h3 class="paddin10" style="text-align:center;">
                        Gráfica atendidos
                    </h3>
                    <div id="containerpormunicipio_primera" style="min-width:600px;max-width:1600px;height:600px;"></div>
                  </div>
                  <!--  -->
                </div>
                <!-- celda1 -->
                <!-- celda2 -->
                <div class="cell colspan5 bg-white padding40">
                  <!--  -->
                  <table class="table striped hovered cell-hovered border bordered" id="tabla1">
                      <thead>
                          <tr>
                              <th>Concepto</th>
                              <th>Total</th>
                          </tr>
                      </thead>
                      <tbody>

                          <?php
                          $tipoCMun = array();
                          $dataTipoMun = array();
                          $totalPorTipoDeAsuntoMun = 0;
                          foreach($sueldoquincenalcargos as $apt)
                          {
                              $totalPorTipoDeAsuntoMun += $apt[0]['total'];
                              $dataTipoMun[] = array('name'=>$apt['CatMunicipio']['name'],'y'=>(int)$apt[0]['total']);
                              $tipoCMun[] = '"'.$apt['CatMunicipio']['name'].'"';
                              ?>
                              <tr>
                                  <td><?php echo $apt['CatMunicipio']['name']; ?></td>
                                  <td><?php echo number_format($apt[0]['total']); ?></td>
                              </tr>
                              <?php
                          }
                          ?>
                          <tr>
                              <td>TOTAL</td>
                              <td class="text-bold" style="font-weight:bold;"><?php echo number_format($grafica1['total']); ?></td>
                          </tr>
                      </tbody>
                  </table>
                  <!--  -->
                </div>
                <!-- celda2 -->
              </div>
            </div>
          </div>
<!-- grafica de Abiertos/Cerrados -->
          <!-- <div class="frame" id="datos_d"> -->
            <div id="datos_d" class="tab-pane fade">
            <div class="grid condensed">
              <div class="row cells12">
                <!-- celda1 -->
                <div class="cell colspan7 bg-white">
                  <!--  -->
                  <div class="" id="pormunicipio_segunda">
                    <?php
                    $resultadosMun = array();
                    $sueldoquincenalcargos = Array (
                      Array ('CatMunicipio'=>Array('name'=> 'Abiertos'),Array ('total' => $grafica2['abiertos'])),
                      Array ('CatMunicipio'=>Array('name' => 'Cerrados' ),Array ('total'=> $grafica2['cerrados']))
                      );
                    foreach($sueldoquincenalcargos  as $apg)
                    {
                        $resultadosMun[$apg['CatMunicipio']['name']] = $apg[0]['total'];
                    }
                    ?>
                    <h3 class="paddin10" style="text-align:center;">
                        Gráfica atendidos
                    </h3>
                    <div id="containerpormunicipio_segunda" style="min-width:600px;max-width:1600px;height:600px;"></div>
                  </div>
                  <!--  -->
                </div>
                <!-- celda1 -->
                <!-- celda2 -->
                <div class="cell colspan5 bg-white padding40">
                  <!--  -->
                  <table class="table striped hovered cell-hovered border bordered" id="tabla1">
                      <thead>
                          <tr>
                              <th>Concepto</th>
                              <th>Total</th>
                          </tr>
                      </thead>
                      <tbody>
                            <!-- <tr>
                                <td>Atendidos</td>
                                <td><?php echo $grafica1['atendidos']; ?></td>
                            </tr>
                            <tr>
                                <td>Sin revisar</td>
                                <td><?php echo $grafica1['sinrevisar']; ?></td>
                            </tr> -->
                            <?php 
                            // $tipoCMun = array('Atendidos', 'Sin revisar'); 
                            // $dataTipoMun = array(); 
                            // array_push($dataTipoMun, array('name' => 'atendidos','y' => (int)$grafica1['atendidos'] ));
                            // array_push($dataTipoMun, array('name' => 'sinrevisar','y' => (int)$grafica1['sinrevisar'] ));
                            ?>
                          <?php
                          $tipoCMunDos = array();
                          $dataTipoMunDos = array();
                          $totalPorTipoDeAsuntoMun = 0;
                          foreach($sueldoquincenalcargos as $apt)
                          {
                              $totalPorTipoDeAsuntoMun += $apt[0]['total'];
                              $dataTipoMunDos[] = array('name'=>$apt['CatMunicipio']['name'],'y'=>(int)$apt[0]['total']);
                              $tipoCMunDos[] = '"'.$apt['CatMunicipio']['name'].'"';
                              ?>
                              <tr>
                                  <td><?php echo $apt['CatMunicipio']['name']; ?></td>
                                  <td><?php echo number_format($apt[0]['total']); ?></td>
                              </tr>
                              <?php
                          }
                          ?>
                          <tr>
                              <td>TOTAL</td>
                              <td class="text-bold" style="font-weight:bold;"><?php echo number_format($grafica1['total']); ?></td>
                          </tr>
                      </tbody>
                  </table>
                  <!--  -->
                </div>
                <!-- celda2 -->
              </div>
            </div>
          </div>
<!-- grafica de atendidos/no atendidos -->
          <!-- <div class="frame" id="datos_t"> -->
            <div id="datos_t" class="tab-pane fade">
            <div class="grid condensed">
              <div class="row cells12">
                <!-- celda1 -->
                <div class="cell colspan7 bg-white">
                  <!--  -->
                  <div class="" id="pormunicipio_tercera">
                    <?php
                    $resultadosMun = array();
                    // $sueldoquincenalcargos = Array (
                    //   Array ('CatMunicipio'=>Array('name'=> 'Abiertos'),Array ('total' => $grafica2['abiertos'])),
                    //   Array ('CatMunicipio'=>Array('name' => 'Cerrados' ),Array ('total'=> $grafica2['cerrados']))
                    //   );
                    $sueldoquincenalcargos = Array ();
                    $asignados = $asignados->toArray();
                    foreach ($asignados as $key => $asignado) {
                        $cont = 0;
                        // echo "<tr>";
                        // echo '<td style="background-color:#D8D8D8;">'.$asignados[$key].'</td>';
                        foreach ($bugs as $key2 => $bug) {
                            if ($bug->asignado_id == $key) {
                                $cont++;
                            }
                        }
                        // echo "<td>".$cont."</td>";
                        // echo "</tr>";
                        $auxArreglo = Array ('CatMunicipio'=>Array('name'=> $asignados[$key]),Array ('total' => $cont));
                        array_push($sueldoquincenalcargos, $auxArreglo);
                    }

                    //print_r($resultadosMun);

                    foreach($sueldoquincenalcargos  as $apg)
                    {
                        $resultadosMun[$apg['CatMunicipio']['name']] = $apg[0]['total'];
                    }
                    ?>
                    <h3 class="paddin10" style="text-align:center;">
                        Gráfica atendidos
                    </h3>
                    <div id="containerpormunicipio_tercera" style="min-width:600px;max-width:1600px;height:600px;"></div>
                  </div>
                  <!--  -->
                </div>
                <!-- celda1 -->
                <!-- celda2 -->
                <div class="cell colspan5 bg-white padding40">
                  <!--  -->
                  <table class="table striped hovered cell-hovered border bordered" id="tabla1">
                      <thead>
                          <tr>
                              <th>Concepto</th>
                              <th>Total</th>
                          </tr>
                      </thead>
                      <tbody>
                            <!-- <tr>
                                <td>Atendidos</td>
                                <td><?php echo $grafica1['atendidos']; ?></td>
                            </tr>
                            <tr>
                                <td>Sin revisar</td>
                                <td><?php echo $grafica1['sinrevisar']; ?></td>
                            </tr> -->
                            <?php 
                            // $tipoCMun = array('Atendidos', 'Sin revisar'); 
                            // $dataTipoMun = array(); 
                            // array_push($dataTipoMun, array('name' => 'atendidos','y' => (int)$grafica1['atendidos'] ));
                            // array_push($dataTipoMun, array('name' => 'sinrevisar','y' => (int)$grafica1['sinrevisar'] ));
                            ?>
                          <?php
                          $tipoCMunTres = array();
                          $dataTipoMunTres = array();
                          $totalPorTipoDeAsuntoMun = 0;
                          foreach($sueldoquincenalcargos as $apt)
                          {
                              $totalPorTipoDeAsuntoMun += $apt[0]['total'];
                              $dataTipoMunTres[] = array('name'=>$apt['CatMunicipio']['name'],'y'=>(int)$apt[0]['total']);
                              $tipoCMunTres[] = '"'.$apt['CatMunicipio']['name'].'"';
                              ?>
                              <tr>
                                  <td><?php echo $apt['CatMunicipio']['name']; ?></td>
                                  <td><?php echo number_format($apt[0]['total']); ?></td>
                              </tr>
                              <?php
                          }
                          ?>
                          <tr>
                              <td>TOTAL</td>
                              <td class="text-bold" style="font-weight:bold;"><?php echo number_format($grafica1['total']); ?></td>
                          </tr>
                      </tbody>
                  </table>
                  <!--  -->
                </div>
                <!-- celda2 -->
              </div>
            </div>
          </div>
          <div class="frame" id="datos_pa">
          </div>
      </div>
  </div>
</div>

</div>
</div>
</div>
<script>DataTableGeneratorSimple('tabla1');</script>
<script type="text/javascript">
$(function () {
    // octava gráfica
Highcharts.chart('containerpormunicipio_primera', {
    chart: {
        type: 'column',
        options3d: {
            enabled: true,
            alpha: 10,
            beta: 25,
            depth: 70
        },
    },
    title: {
        text: 'Reportes'
    },
    subtitle: {
        text: 'por atendidos'
    },
    xAxis: {
        categories: [
            <?php echo implode(',',$tipoCMun); ?>
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Reportes'
        }
    },

    plotOptions: {
        column: {
            depth: 25,
        }
    },
    legend: {
        enabled: false
    },
    series: [{
        name: 'Total',
        colorByPoint: true,
        data: <?php echo json_encode($dataTipoMun); ?>

    }]
});

Highcharts.chart('containerpormunicipio_segunda', {
    chart: {
        type: 'column',
        options3d: {
            enabled: true,
            alpha: 10,
            beta: 25,
            depth: 70
        },
    },
    title: {
        text: 'Reportes'
    },
    subtitle: {
        text: 'por estado'
    },
    xAxis: {
        categories: [
            <?php echo implode(',',$tipoCMunDos); ?>
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Reportes'
        }
    },

    plotOptions: {
        column: {
            depth: 25,
        }
    },
    legend: {
        enabled: false
    },
    series: [{
        name: 'Total',
        colorByPoint: true,
        data: <?php echo json_encode($dataTipoMunDos); ?>

    }]
});

Highcharts.chart('containerpormunicipio_tercera', {
    chart: {
        type: 'column',
        options3d: {
            enabled: true,
            alpha: 10,
            beta: 25,
            depth: 70
        },
    },
    title: {
        text: 'Reportes'
    },
    subtitle: {
        text: 'por usuario'
    },
    xAxis: {
        categories: [
            <?php echo implode(',',$tipoCMunTres); ?>
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Reportes'
        }
    },

    plotOptions: {
        column: {
            depth: 25,
        }
    },
    legend: {
        enabled: false
    },
    series: [{
        name: 'Total',
        colorByPoint: true,
        data: <?php echo json_encode($dataTipoMunTres); ?>

    }]
});
// octava gráfica
});
</script>


