<!DOCTYPE html>
<html>
  <head>
    <style type="text/css">
      html, body { height: 100%; margin: 2%; padding: 0; }
      #map { height: 50%; width:100% ;}
      #coords { background-color: black; color: white; padding: 5px; }
      #formulario{ background-color:#fff; }
    </style>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title></title>
        <link href="css/bootstrap.min.css" rel="stylesheet">       
        
  </head>
  <body>
  
  <div id="map"></div>
  <div id="coords"></div>
  
<div class="row">
  <div class="col-md-12">
  <div class="col-md-12" >
  <h1>Aporte Inteligente</h1>
  
  </div>
    <form method="post" onsubmit="return false">
                <div class="form-group">
    
                    <label for="nombre_empresa" class="col-lg-4 control-label">Nombre:</label>
                    <div class="col-lg-5">
                        <input type="text" class="form-control" style="margin-top:5px;margin-bottom:5px;" id="txt_nombre_empresa" placeholder="Nombre">
                    </div>
                </div>
                <div class="form-group">
    
                    <label for="nombre_empresa" class="col-lg-4 control-label">Telefono:</label>
                    <div class="col-lg-5">
                        <input type="text" class="form-control" style="margin-top:5px;margin-bottom:5px;" id="txt_nombre_empresa" placeholder="+569 25548952">
                    </div>
                </div>
                <div class="form-group">
    
                    <label for="nombre_empresa" class="col-lg-4 control-label">Correo:</label>
                    <div class="col-lg-5">
                        <input type="text" class="form-control" style="margin-top:5px;margin-bottom:5px;" id="txt_nombre_empresa" placeholder="ejemplo@ejemplo.cl">
                    </div>
                </div>
                <div class="form-group"  style="margin-top:15px;margin-bottom:15px;">
                <label for="localidad" class="col-lg-4 control-label">Seleccionar localidad del aporte</label>
                    <label for="region" class="col-lg-4 control-label"></label>
                    <div  class="col-lg-5">
                    <select id="region" class=" form-control" onchange="cargaprovincia()" >
                        <!--Regiones-->
                        <option id="-1">SELECCIONAR REGIÓN</option>
                        <?php
                        require_once ('include/conn.php');
                        $mysqli = getConn();
                        $query = "SELECT * FROM regiones";
                        $resultado=$mysqli->query($query);
                        while ($rows = $resultado->fetch_assoc()) {
                        ?>
                            <option value="<?php echo $rows['region_id']?>"><?php echo $rows['region_nombre']?></option>

                        <?php }?>
                    </select>
                    </div>
                    <label for="provincia" class="col-lg-4 control-label" ></label>
                    <div  class="col-lg-5">
                    <select id ="provincia" class=" form-control" onchange="cargaciudad()">
                        <option value="-1">SELECCIONAR PROVINCIA</option>
                    </select>
                        
                    </div>
                    <label for="ciudad" class="col-lg-4 control-label" ></label>
                    <div  class="col-lg-5">
                    <select id="ciudad" class=" form-control" onchange="cargacoord()">
                        <option id="-1">SELECCIONAR COMUNAS</option>
                    </select>
                        
                    </div>
                    <label for="nombre_empresa" class="col-lg-4 control-label"></label>
                    <div class="col-lg-5">
                        <input type="text"  class="form-control" style="margin-top:5px;margin-bottom:5px;" id="txt_nombre_empresa" placeholder="Longitud">
                    </div>
                    <label for="nombre_empresa" class="col-lg-4 control-label"></label>
                    <div class="col-lg-5" style="margin-bottom:20px;">
                        <input type="text"  class="form-control" 6 id="txt_nombre_empresa" placeholder="Latitud">
                    </div>
                </div>
              
             <div class="form-group">
                 <label class="col-lg-4 control-label">Aportes</label>                 
                 
                 <div class="col-lg-8">
                 
                        <div class="checkbox-inline col-lg-3">
                              <label><input type="checkbox" value="">Bototos de seguridad</label>
                        </div>
                        <div class="checkbox-inline col-lg-3">
                              <label><input type="checkbox" value="">Pollerón manga larga</label>
                        </div>
                        <div class="checkbox-inline col-lg-3">
                             <label><input type="checkbox" value="">Calcetines de hilo</label>
                        </div>
                 
                 
                 </div>
                 
               <div class="form-group">
                 
                    <label class="col-lg-4 control-label"></label>  
                 <div class="col-lg-8">
                 	
                        <div class="checkbox-inline col-lg-3">
                              <label><input type="checkbox" value="">Cascos</label>
                        </div>
                        <div class="checkbox-inline col-lg-3">
                              <label><input type="checkbox" value="">Gorro con protector de cuello</label>
                        </div>
                        <div class="checkbox-inline col-lg-3">
                             <label><input type="checkbox" value="">Mascarillas (trompas) con filtros para humo y polvo</label>
                        </div>
                 
                 
                 </div> 
              </div>
                
                  
              <div class="form-group">
                 
                    <label class="col-lg-4 control-label"></label>  
                    <div class="col-lg-8">
                 	
                        <div class="checkbox-inline col-lg-3">
                              <label><input type="checkbox" value="">Antiparras selladas</label>
                        </div>
                        <div class="checkbox-inline col-lg-3">
                              <label><input type="checkbox" value="">Guantes de cabritilla</label>
                        </div>
                        <div class="checkbox-inline col-lg-3">
                             <label><input type="checkbox" value="">Mascarillas N” 95</label>
                        </div>
                 
                 
                    </div> 
              </div>               
              <div class="form-group">
                 
                    <label class="col-lg-4 control-label"></label>  
                    <div class="col-lg-8">
                 	
                        <div class="checkbox-inline col-lg-3">
                              <label><input type="checkbox" value="">Suero fisiológico 95% (ampollas)</label>
                        </div>
                        <div class="checkbox-inline col-lg-3">
                              <label><input type="checkbox" value="">Vendas gasas</label>
                        </div>
                        <div class="checkbox-inline col-lg-3">
                             <label><input type="checkbox" value="">Apósitos de distintas Medidas</label>
                        </div>
                 
                 
                    </div> 
              </div> 
              <div class="form-group">
                 
                    <label class="col-lg-4 control-label"></label>  
                    <div class="col-lg-8">
                 	
                        <div class="checkbox-inline col-lg-3">
                              <label><input type="checkbox" value="">Guantes de procedimiento</label>
                        </div>
                        <div class="checkbox-inline col-lg-3">
                              <label><input type="checkbox" value="">Gasas de distintas medidas</label>
                        </div>
                        <div class="checkbox-inline col-lg-3">
                             <label><input type="checkbox" value="">Telas adhesivas (papel o micropore)</label>
                        </div>
                 
                 
                    </div> 
              </div> 
               <div class="form-group">
                 
                    <label class="col-lg-4 control-label"></label>  
                    <div class="col-lg-8">
                 	
                        <div class="checkbox-inline col-lg-3">
                              <label><input type="checkbox" value="">Bloqueador Solar</label>
                        </div>
                        <div class="checkbox-inline col-lg-3">
                              <label><input type="checkbox" value="">Protector labial</label>
                        </div>                       
                 
                 
                    </div> 
              </div> 
               <div class="form-group">
                 
                    <label class="col-lg-4 control-label"></label>  
                    <div class="col-lg-8">
                 	
                        <div class="checkbox-inline col-lg-3">
                              <label><input type="checkbox" value="">Bebidas Isotónica</label>
                        </div>
                        <div class="checkbox-inline col-lg-3">
                              <label><input type="checkbox" value="">Agua mineral (formato ½ litro sin gas)</label>
                        </div>   
                        <div class="checkbox-inline col-lg-3">
                              <label><input type="checkbox" value="">Barras de Cereales o proteicas sin azúcar</label>
                        </div>                       
                                     
                 
                 
                    </div> 
              </div> 
                
                
             </div>
                
                
      
                
                
            <div class="col-lg-10" style="margin-top:5px;margin-bottom:5px;" >
                <button class="btn btn-group " id="enviar">Enviar</button>
            </div>
    
    </form>
     
  </div>
  
</div>
  
  
    
    

   
   
   <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqLy2-132nvQ9gph8Xq_O1CCNV0v_2mik&libraries=places"></script>
   
   <script type="text/javascript" src="js/jquery.js" ></script>
   <script type="text/javascript" src="js/bootstrap.js" ></script>
   <script type="text/javascript" src="js/funciones.js" ></script>
  </body> 
</html>