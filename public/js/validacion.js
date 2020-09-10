function validacion(input,alerta,validaciones=[]){
   var tmp=input.value;
    if(tmp){
      if(validaciones.length > 0){
          for (var i = 0; i < validaciones.length; i++) {
            switch (validaciones[i]) {

                          case 'numerico':
                            if(isNaN(tmp)){
                                num=tmp.toString().split('');

                                var number='';
                                for (var i = 0; i < num.length; i++) {
                                  if(!isNaN(num[i])){
                                  number+=num[i];
                                  }
                                }
                                

                              $('#'+alerta).html('<i class=" mdi mdi-comment-question-outline"><i> &nbsp;Este Campo Debe ser Solo Numerico! ejemplo: 10000 ó 10000.00');
                                $('#'+alerta).fadeIn();
                               input.focus();
                               input.value=number;
                            }
                          break;

                   

                          case 'mayor':
                           


                          

                          break;



                          case 'email':

                          

                          break;

                         

                }//fin switch
          return false;
          }
      }
     
 $('#'+alerta).hide();
    }else{
      
      $('#'+alerta).html('<i class=" mdi mdi-comment-question-outline"><i> &nbsp;Este Campo es Requerido!');
      $('#'+alerta).fadeIn();
      input.focus();
    }
}


function mil(num){
if(!isNaN(num)){
num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
num = num.split('').reverse().join('').replace(/^[\.]/,'');
return num;
}
}

var formato= {
 separador: ".", // separador para los miles
 sepDecimal: ',', // separador para los decimales
 formatear:function (num){
 num +='';
 var splitStr = num.split('.');
 var splitLeft = splitStr[0];
 var splitRight = splitStr.length > 1 ? this.sepDecimal + splitStr[1] : '';
 var regx = /(\d+)(\d{3})/;
 while (regx.test(splitLeft)) {
 splitLeft = splitLeft.replace(regx, '$1' + this.separador + '$2');
 }
 return this.simbol + splitLeft +splitRight;
 },
 new:function(num, simbol){
 this.simbol = simbol ||'';
 return this.formatear(num);
 }
}



 