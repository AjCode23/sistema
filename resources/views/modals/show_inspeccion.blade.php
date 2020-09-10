<!-- Modal -->
<div class="modal fade"  id="show_inspeccion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="background: #fff">
      <div class="modal-header">
        <h4 class="modal-title center" id="myModalLabel"><i class="mdi mdi-receipt-circle"></i>Visualizacion de Inspeccion. <b id="num"></b> </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
          <table class="table table-bordered">
            <tr>
              <td rowspan="2" style="width: 300px">
                <img src="{{asset('img/logo.jpeg')}}" style="width: 300px" alt="">
              </td>
              <th>Código:</th>
              <th>Versión:</th>
              <th>Aprobación</th>
              <th>Página</th>
            </tr>
            <tr>
              <td>R-IE-005</td>
              <td>1</td>
              <td>2020-09-02</td>
              <td>1 de 1</td>
            </tr>
            
          </table>         
          <table class="table ">
            <tr>
              
              <td><b>CLIENTE:</b> &nbsp;<span id="clt"></span> </td>
              <td><b>EQUIPO:</b>&nbsp; <span id="equi"></span></td>
              <td><b>MARCA:</b> &nbsp;<span id="mar"></span></td>
              <td><b>SERIE:</b>&nbsp;<span id="ser"></span> </td>
            </tr>
            <tr><td colspan="4"><b>Usuario:</b>&nbsp;<span id="usuario_ver"></span></td> </tr>
          </table>
          <table class="table table-bordered table-hover">
              <tr style="background: #f0f0f0;" class="text-center">
                <th>FACTOR</th>
                <th>REVISION</th>
                <th>OBSERVACIONES</th>
              </tr>


              <tr>
                <th>Se recibe con accesorios</th>
                <td class="text-center">
                  <span id="opcion_1"></span>
                </td>
                <td class="text-center">
                  <span id="observacion_1"></span>
                </td>
              </tr>


              <tr >
                <th>Se entrega con accesorios</th>
               <td class="text-center">
                  <span id="opcion_2"></span>
                </td>
                <td class="text-center">
                  <span id="observacion_2"></span>
                </td>
              </tr>

              <tr  style="background: #f0f0f0;">
                <th colspan="3">Estado de:</th>
                
              </tr>

              <tr >
                <th>Carcasa</th>
                <td class="text-center">
                  <span id="opcion_3"></span>
                </td>
                <td class="text-center">
                  <span id="observacion_3"></span>
                </td>
                 </tr>

              <tr >
                <th>Pintura</th>
              <td class="text-center">
                  <span id="opcion_4"></span>
                </td>
                <td class="text-center">
                  <span id="observacion_4"></span>
                </td>
              </tr>


              <tr >
                <th>Botoneria</th>
                <td class="text-center">
                  <span id="opcion_5"></span>
                </td>
                <td class="text-center">
                  <span id="observacion_5"></span>
                </td>
              </tr>

              <tr >
                <th>Tornilleria</th>
               <td class="text-center">
                  <span id="opcion_6"></span>
                </td>
                <td class="text-center">
                  <span id="observacion_6"></span>
                </td>
              </tr>

              <tr >
                <th>Conectores INPUT/OUTPUT</th>
              <td class="text-center">
                  <span id="opcion_7"></span>
                </td>
                <td class="text-center">
                  <span id="observacion_7"></span>
                </td>
              </tr>

              <tr >
                <th>El Equipo enciende-apaga</th>
               <td class="text-center">
                  <span id="opcion_8"></span>
                </td>
                <td class="text-center">
                  <span id="observacion_8"></span>
                </td>
              </tr>

              <tr >
                <th>Equipo refleja información en Pantalla</th>
                <td class="text-center">
                  <span id="opcion_9"></span>
                </td>
                <td class="text-center">
                  <span id="observacion_9"></span>
                </td>
              </tr>

              <tr >
                <th>Estado de la Bateria</th>
               <td class="text-center">
                  <span id="opcion_10"></span>
                </td>
                <td class="text-center">
                  <span id="observacion_10"></span>
                </td>
              </tr>

              <tr >
                <th>Estado del Display</th>
              <td class="text-center">
                  <span id="opcion_11"></span>
                </td>
                <td class="text-center">
                  <span id="observacion_11"></span>
                </td>
              </tr>

              <tr >
                <th>Desinfección y Limpieza</th>
               <td class="text-center">
                  <span id="opcion_12"></span>
                </td>
                <td class="text-center">
                  <span id="observacion_12"></span>
                </td>
              </tr>

        <tr >
                <th>Sello Calibración</th>
                <td class="text-center">
                  <span id="opcion_13"></span>
                </td>
                <td class="text-center">
                  <span id="observacion_13"></span>
                </td>
              </tr>


              <tr >
                <th>Estado de sello de mantenimiento Garantía</th>
                <td class="text-center">
                  <span id="opcion_14"></span>
                </td>
                <td class="text-center">
                  <span id="observacion_14"></span>
                </td>
              </tr>
               <tr  style="background: #f0f0f0;">
                <th colspan="3">Otras Observaciones:</th>
                
              </tr>

               <tr  >
                <td colspan="3"><span id="observaciones"></span></td>
                
              </tr>
          </table>
    
      </div>
      <div class="modal-footer">
        
        
        <button type="button" on class="btn btn-default btn-flat" data-dismiss="modal">Salir</button>
      

   
        
      </div>
    </div>
  </div>
</div>