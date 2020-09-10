<html>

  <title>Articulos | SIS</title>

  <style >
  .center,.left,.right{
    display: inline-block;

    width: 35%;
  }
  .center {
  width: 30%;
  }
  #img{
    width: 400px;
    height: 120px;
    position: absolute;
    left: -20px;
    top: -25px;
    bottom: 10px;
  }
  .letra{
    color: #1d1d1d;
    font-family: 'Helvetica';
    font-size: 10px;
    padding: 0px;
    line-height: 3px;

  }
  .text-center{
    text-align: center
  }


  .text-left{
    text-align: left;
  }


  .text-right{
    text-align: right;
  }

  .top{
    position: absolute;
  
    top: -20px;
  }
  body{
    font-family: 'Helvetica';
    font-size: 12px;
    color:#5f5f5f;
  }

  .izq:after{ content: "";}

  #num{
    border: 1px solid #d1d1d1;
    width: 70%;
    margin:  auto;
    position: absolute;
    top: 50px;
    left: 30px;
    padding: 10px;
    color: red;
    font-weight: bold;
    border-top-left-radius: 25px;
    border-bottom-right-radius: 25px;
    

  }
  .input{
    width: 300px;
    border-bottom:1px solid #d0d0d0;
    margin-left: 10px;
    

  }

  .text-left{
    text-align: left;
    

  }
  .input-2{
    width: 180px;
    border-bottom:1px solid #d0d0d0;
    margin-left: 10px;
    

  }

  .input-3{
    width: 120px;
    border-bottom:1px solid #d0d0d0;
    margin-left: 10px;
    

  }

  .input-4{
    width: 60px;
    border-bottom:1px solid #d0d0d0;
    margin-left: 10px;
    

  }
  .float-left{
    position: absolute;
    left: 80px;
    top: 85px;
  }

  .col-7{
    width: 69%;
    display: inline-block;
  }
  .col-5{
    display: inline-block;
    width: 49%;
  }

  .col-6{
    width: 59%;
    display: inline-block;
  }
  .col-4{
    width: 39%;
    display: inline-block;
  }
  

  .well{
    padding: 10px;
    border:1px solid #d1d1d1;
    border-radius:5px;
    background: #f0f0f0;
  }

    header { position: fixed;
      left: 0px;
      top: -160px;
      right: 0px;
      height: 100px;
      background-color: #ddd;
      text-align: center;
    }
    header h1{
      margin: 10px 0;
    }
    header h2{
      margin: 0 0 10px 0;
    }
    footer {
      position: fixed;
      left: 0px;
      bottom: -10px;
      right: 0px;
      height: 40px;
      border-bottom: 2px solid #ddd;

    }
  
    .footer-form{
      text-align: center;
      font-size: 10px; font-family: Helvetica;
      color:#1d1d1d;
    }
    @page { counter-increment: page }
    .page:after {
    content: counter(page) ;
    }
   
    footer table {
      width: 100%;
    }
    footer p {
      text-align: right;
    }
    footer .izq {
      text-align: left;
    }

  </style>

<body>
 

  
<div class="left">
  <img src="./img/logo.jpeg" id="img">
<h1>hola</h1>
</div>


<div class="center letra text-center">

<table style="width: 100%; text-align:center;" border="0">
  <tr >
    <td style="height: 15px;"><b>{{$config->empresa}}</b></td>
    
  </tr>
  <tr>
    <td style="height: 10px;">NIT:{{$config->num_documento}}</td>
    </tr>
    <tr>

    <td style="height: 20px;">DIRECCION: {{$config->direccion}} <br><br><br>  {{$config->ciudad}} – COLOMBIA</td>
      
    </tr>

    <tr>

      <td style="height: 10px;">
    
  TELEFONO: +57 (1) {{$config->telefono}}
      </td>
      
    </tr>
    <tr>

      <td style="height: 10px;">
    
  CORREO:{{$config->correo}} 
      </td>
      
    </tr>

    
  
</table>
  
 
  
  
  


  
  
</div>

<div class="right text-center top">
  <h2><b></b></h2>
  
</div>

<hr style="margin-top: 10px;">
<!--<p style="" class="letra"> TELEFONO:  DIRECCION:  - contacto@mrbook.co </p>-->

<h2 style="text-align: center">LISTA DE CLIENTES</h2>


<table style= "width: 100%; text-align: center; border:1px solid #d0d0d0;height: 20px;border-radius:10px;">
  <thead>
    <tr style="background:#d0d0d0; border: 1px solid;height: 20px;">
      <th>ITEM</th>
      <th>NOMBRE /RAZON SOCIAL</th>
      <th>NIT / DOCUMENTO</th>
      <th>TIPO EMPRESA</th>
      <th>EMAIL</th>
      <th>CIUDAD</th>
      <th>ASESOR COMERCIAL</th>
    </tr>
    <?php $sub=0;$iva=0;$i=1; ?>
    

    @foreach($clientes as $c)
    <tr @if($i%2 == 0) style="background: #f0f0f0;" @endif>
      <th>{{($i++)}}</th>
      <th>{{strtoupper($c->nombres)}}</th>
      <th>{{$c->nit}} {{$c->numDocumento}}</th>
      <th>{{$c->tipoPersona}}</th>
      <th>{{$c->email}}</th>
      <th>{{$c->direccion->ciudad}}</th>
      <th>@if($c->asesor){{$c->asesor->nombre}}@endif</th>
   
    </tr>
    @endforeach
  </thead>
  <tbody>

  
</table>

<hr>
 
<br><br>




<footer>
    <table>
      <tr>
        <td style="width:200px">
            <p class="izq"></p>
        </td>

        <th style="text-align: center;">
            <p class="text-center ">Clientes Registrados </p>

        </th>
        <td style="width:150px">
          <p class="page">
            Página

          </p>

          
        </td>
      </tr>
      <tr>
      <td colspan="3" class="text-center footer-form">
    Fecha: {{Date('d/m/Y')}}
      
      </td></tr>
    </table>
  </footer>


</body>
</html>