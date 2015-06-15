$( document ).ready(function() {
  // Compra de tickets

  
  // End Compra de tickets

  // Home slides
  $(".carousel-inner div").eq(0).addClass('active');
  // End Home slides

  // Slides e informacoes
  var qtdEventos = $('.carousel-inner .item').size();

  for(i = 0; i <= qtdEventos; i++) {
    $('.carousel-inner .item').eq(i).attr('id', 'event' + i);
    $('.info-container').eq(i).attr('id', 'event' + i + '-info');
  }

  var valorIngresso = parseInt($('.styled-select').attr('valor'));
  for(i = 1; i <= 10; i++) {
    (i == 1) ? $('.styled-select select').append("<option value='" + (valorIngresso * i) + "'>" + i + " ingresso: R$" + (valorIngresso * i) + "</option>") : $('.styled-select select').append("<option value='" + (valorIngresso * i) + "'>" + i + " ingressos: R$" + (valorIngresso * i) + "</option>");
    
    
  }

  

  $('.info-container').hide();
  $('.info-container').eq(0).show();
  var currentEvent = 0;

  $('.carousel-control').click(function(event) {
      $('.info-container').hide();

    if ($(this).hasClass('right')) {

      if (currentEvent == qtdEventos-1) {
        $('.info-container').eq(0).show();
        
        return currentEvent = 0;
      };
      currentEvent++;
      $("#" + $(".carousel-inner .active").next().attr('id') + "-info").show();
    };

    if ($(this).hasClass('left')) {
      if (currentEvent == 0) {
        $('.info-container').eq(qtdEventos-1).show();
        
        return currentEvent = qtdEventos-1;
      };
      currentEvent--;
      $("#" + $(".carousel-inner .active").prev().attr('id') + "-info").show();
    };
  });

  $('table').addClass('table table-striped table-hover table-condensed');

  // $('.info-container').hide();
  // $('.carousel-inner .item').each(function() {
  //   if ($(this).hasClass('active')) {
  //     $('#' + $(this).attr('id') + '-info').show();
  //   };
  // });

  // $('.carousel-control').click(function(event) {
  //   $('.info-container:visible').hide();
  //   $('.info-container').next().show();

  // });

  // $('.carousel-control').attr('data-slide', 'prev').click(function(event) {
  //   // console.log('test');
  //   $('.info-container').hide();
  //   $('.info-container').prev().show();
  // });

  // End Slides e informacoes

  // Numero de referencia
    /**
  * Função para gerar senhas aleatórias
  *
  * @author    Thiago Belem <contato@thiagobelem.net>
  *
  * @param integer $tamanho Tamanho da senha a ser gerada
  * @param boolean $maiusculas Se terá letras maiúsculas
  * @param boolean $numeros Se terá números
  * @param boolean $simbolos Se terá símbolos
  *
  * @return string A senha gerada
  */
//   function geraSenha(tamanho = 8, maiusculas = true, numeros = true, simbolos = false) {
//     lmin = 'abcdefghijklmnopqrstuvwxyz';
//     lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
//     num = '1234567890';
//     simb = '!@#$%*-';
//     retorno = '';
//     caracteres = '';

//     caracteres += lmin;
//     if (maiusculas) caracteres += lmai;
//     if (numeros) caracteres += num;
//     if (simbolos) caracteres += simb;

//     len = strlen(caracteres);
//     for (n = 1; n <= tamanho; n++) {
//     rand = mt_rand(1, len);
//     retorno += caracteres[rand-1];
//     }
//     return retorno;
//   }

// console.log(geraSenha(10));
  // End Numero de referencia

});
