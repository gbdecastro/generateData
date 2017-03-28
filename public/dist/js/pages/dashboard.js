/*
 * Author: Abdullah A Almsaeed
 * Date: 4 Jan 2014
 * Description:
 *      This is a demo file used only for the main dashboard (index.html)
 **/
function isNumber(n) {
	return !isNaN(parseFloat(n)) && isFinite(n);
}
$(function () {

  $("#adicionarAzul").click(function(){
      valor = prompt("ADD Valor:");
      if(valor <= 0 || ! isNumber(valor)){
        alert('Valor inválido');
      }else{
        //BANCO
        referencia = prompt("Motivo:");
        if(referencia == null){
          return false;
        }        
        var dados = {
          valor: valor,
          idEquipe: 2,
          referencia: referencia
        }
        $.post('/jerusa/php/pontuar.php',dados,function(){
            alert("Pontuação efetivada");
        });
      }
  });

  $("#removerAzul").click(function(){
      valor = prompt("Remover Valor:");
      if(valor <= 0 || ! isNumber(valor)){
        alert('Valor inválido');
      }else{
        //BANCO
        referencia = prompt("Motivo:");
        if(referencia == null){
        	return false;
        }        
    		var dados = {
    			valor: valor*-1,
    			idEquipe: 2,
    			referencia: referencia
    		}
        $.post('/jerusa/php/pontuar.php',dados,function(){
            alert("Pontuação Retirada");
        });
      }
  });

  $("#adicionarAmarelo").click(function(){
      valor = prompt("Adicionar Valor:");
      if(valor <= 0 || ! isNumber(valor)){
        alert('Valor inválido');
      }else{
        //BANCO
        referencia = prompt("Motivo:");
        if(referencia == null){
          return false;
        }        
        var dados = {
          valor: valor,
          idEquipe: 1,
          referencia: referencia
        }
        $.post('/jerusa/php/pontuar.php',dados,function(){
            alert("Pontuação efetivada");
        });
      }
  });

  $("#removerAmarelo").click(function(){
      valor = prompt("Remover Valor:");
      if(valor <= 0 || ! isNumber(valor)){
        alert('Valor inválido');
      }else{
        //BANCO
        referencia = prompt("Motivo:");
        if(referencia == null){
        	return false;
        }        
    		var dados = {
    			valor: valor*-1,
    			idEquipe: 1,
    			referencia: referencia
    		}
        $.post('/jerusa/php/pontuar.php',dados,function(){
            alert("Pontuação Retirada");
        });
      }
  });

  $("#adicionarVerde").click(function(){
      valor = prompt("Adicionar Valor:");
      if(valor <= 0 || ! isNumber(valor)){
        alert('Valor inválido');
      }else{
        //BANCO
        referencia = prompt("Motivo:");
        if(referencia == null){
          return false;
        }        
        var dados = {
          valor: valor,
          idEquipe: 3,
          referencia: referencia
        }
        $.post('/jerusa/php/pontuar.php',dados,function(){
            alert("Pontuação efetivada");
        });
      }
  });

  $("#removerVerde").click(function(){
      valor = prompt("Remover Valor:");
      if(valor <= 0 || ! isNumber(valor)){
        alert('Valor inválido');
      }else{
        //BANCO
        referencia = prompt("Motivo:");
        if(referencia == null){
          return false;
        }        
        var dados = {
          valor: valor*-1,
          idEquipe: 3,
          referencia: referencia
        }
        $.post('/jerusa/php/pontuar.php',dados,function(){
            alert("Pontuação Retirada");
        });
      }
  });

  $("#adicionarVermelho").click(function(){
      valor = prompt("Adicionar Valor:");
      if(valor <= 0 || ! isNumber(valor)){
        alert('Valor inválido');
      }else{
        //BANCO
        referencia = prompt("Motivo:");
        if(referencia == null){
          return false;
        }        
        var dados = {
          valor: valor,
          idEquipe: 4,
          referencia: referencia
        }
        $.post('/jerusa/php/pontuar.php',dados,function(){
            alert("Pontuação efetivada");
        });
      }
  });

  $("#removerVermelho").click(function(){
      valor = prompt("Remover Valor:");
      if(valor <= 0 || ! isNumber(valor)){
        alert('Valor inválido');
      }else{
        //BANCO
        referencia = prompt("Motivo:");
        if(referencia == null){
          return false;
        }        
        var dados = {
          valor: valor*-1,
          idEquipe: 4,
          referencia: referencia
        }
        $.post('/jerusa/php/pontuar.php',dados,function(){
            alert("Pontuação Retirada");
        });
      }
  });  

});
