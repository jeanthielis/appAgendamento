$(document).ready(function () {
    mostrarAgenda();
    

  function mostrarAgenda(){
    $.ajax({
        url:"mostrarAgenda.php",
        beforeSend:function(){
          $("#resultado").html('<div class="text-center text-secondary"><div class="spinner-border" role="status"><span class="visually-hidden"></span></div><br>Carregando...</div>');
        },
        success:function(data){
          $("#resultado").html(data);
        },
        error: function(result) {
          $("#resultado").html('');

          alertConfirm('error','Erro','Entra em contato com o suporte');


      }
    }); 
   };


   $(document).on('click','#pesquisar',function(){  
    var dataInicio = $("#dataInicio").val();
    var dataFim = $("#dataFim").val();

    $.ajax({
        url:"pesquisaAgenda.php",
        type:'post',
        data:{dataInicio:dataInicio,dataFim:dataFim},
        beforeSend:function(){
          $("#resultado").html('<div class="text-center text-secondary"><div class="spinner-border" role="status"><span class="visually-hidden"></span></div><br>Carregando...</div>');

        },
        success:function(data){
            $("#resultado").html(data);
            $('#basicExampleModal2').modal('hide');
        },
        error: function(result) {
          alertConfirm('error','Erro','Entrar em contato com o suporte');
      }
    });

   
;})





   
   
   $(document).on('click','.menu-item',function(){  
      $(".menu-item").removeClass("nav");
      $(this).addClass("nav");
  ;})


   function mostrarAnalise(){
    $.ajax({
        url:"analise.php",
        beforeSend:function(){
          $("#resultado").html('<div class="text-center text-secondary"><div class="spinner-border" role="status"><span class="visually-hidden"></span></div><br>Carregando...</div>');

        },
        success:function(data){
            $("#resultado").html(data);
           },
        error: function(result) {
          alertConfirm('error','Erro','Entra em contato com o suporte');
      }
    }); 
 
   };

   function mostrarDespesa(){
    $.ajax({
        url:"despesa.html",
        beforeSend:function(){
          $("#resultado").html('<div class="text-center text-secondary"><div class="spinner-border" role="status"><span class="visually-hidden"></span></div><br>Carregando...</div>');

        },
        success:function(data){
            $("#resultado").html(data);
           },
        error: function(result) {
          alertConfirm('error','Erro','Entra em contato com o suporte');
      }
    }); 
 
   };


 
  $("#celular").mask("+00 00 00000-0000");

   $(document).on('click','#concluidos',function(){
      $.ajax({
        url:"mostrarConcluidos.php",
        beforeSend:function(){
          $("#resultado").html('<div class="text-center text-secondary"><div class="spinner-border" role="status"><span class="visually-hidden"></span></div><br>Carregando...</div>');

        },
        success:function(data){
          
          $("#resultado").html('<h3>Festas Concluídas</h3><hr>'+data);
        },
        error: function(result) {
          alertConfirm('error','Erro','Entra em contato com o suporte');
      }
        
      }); 
   })

    $(document).on('click','#agendados',function(){mostrarAgenda();})
    $(document).on('click','#analise',function(){mostrarAnalise();})
    $(document).on('click','#despesa',function(){mostrarDespesa();})


   

    function alertConfirm(tipo,titulo,mensagem,time){
        Swal.fire({
            title: titulo,
            icon: tipo,
            text:mensagem,
            showConfirmButton: false,
            timer: time,
          })
    
       };


    $("#salvar").click(function(){
       var data = $("#data").val();
       var hora = $("#hora").val();
       var cliente = $("#cliente").val();
       var servico = $("#servico").val();
       var valor = $("#valor").val();
       var entrada = $("#entrada").val();
       var cores = $("#cores").val();
       var bairro = $("#bairro").val();
       var cidade = $("#cidade").val();
       var celular = $("#celular").val();
       var restante = parseFloat(valor)-parseFloat(entrada);
       var dados = {data:data,hora:hora,cliente:cliente,celular:celular,servico:servico,valor:valor,entrada:entrada,restante:restante,cores:cores,bairro:bairro,cidade:cidade}
        $.ajax({
            url:"cadastrar.php",
            type:'post',
            data:dados,
            dataType:'html',
            beforeSend:function(){
              $('#btn-carregando').css("display","block")
              $('#salvar').css("display","none")

            },
            success:function(response){
             $('#cadastroForm')[0].reset();
             alertConfirm("success","Agendado",false,3000);
             $('#btn-carregando').css("display","none")
              $('#salvar').css("display","block")
             mostrarAgenda();


            },
            error: function(result) {
              alertConfirm('error','Erro','Entra em contato com o suporte');
              $('#carregando').css("display","none")
          }
     
        });
     
    });


    $(document).on('click','#salvarDespesa',function(){
      var valorDespesa = $("#valorDespesa").val();
      var descricaoDespesa = $("#descricaoDespesa").val();
      var tipoDespesa = $("#tipoDespesa").val();
      var dados = {valor:valorDespesa,descricao:descricaoDespesa,tipo:tipoDespesa}

        $.ajax({
            url:"cadastrarDespesa.php",
            type:'post',
            data:dados,
            dataType:'html',
            beforeSend:function(){
              $('#btn-carregando').css("display","block")
              $('#salvarDespesa').css("display","none")

            },
            success:function(response){
             $('#formDespesa')[0].reset();
             alertConfirm("success","Agendado",false,3000);
             $('#btn-carregando').css("display","none")
              $('#salvarDespesa').css("display","block")
             


            },
            error: function(result) {
              alertConfirm('error','Erro','Entra em contato com o suporte');
              $('#carregando').css("display","block")
              $('#salvarDespesa').css("display","none")

          }
     
        });
     
    });



  
    $(document).on("click",".deletar",function(){
        var id = this.id;
        Swal.fire({
            title: "Deseja apagar esse agendamento?",
            icon: "warning",
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: "Sim",
            denyButtonText: 'Nao'
          }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.ajax({
                    url:"deletar.php",
                    type:'post',
                    data:{id:id},
                    dataType:'html',
                    success:function(response){
                     mostrarAgenda();
                    }
                })  
              Swal.fire("Apago com sucesso!", "", "success");
            } else if (result.isDenied) {
              Swal.fire("Agendamento nao foi removido", "", "info");
            }
          });
        
    });
    $(document).on("click",".concluido",function(){
        var id = this.id;
        Swal.fire({
            title: "Atenção",
            text: "Deseja marcar essa festa como conlcuido",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sim, pode marcar!"
           
          }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.ajax({
                    url:"concluido.php",
                    type:'post',
                    data:{id:id},
                    dataType:'html',
                    success:function(response){
                     mostrarAgenda();
                    }
                })  
              Swal.fire("Festa concluida com sucesso!", "", "success");
            } else if (result.isDenied) {
              Swal.fire("Festa nao foi marcada como concluida", "", "info");
            }
          });
        
    });
   
   
    
});