/**
 * Created by robson on 16/01/15.
 */

function info_atendimento(id)
{
    if(!$('#info'+id).is(":visible")){
        $('#info'+id).show();
    }else{
        $('#info'+id).hide();
    }
}

$(document).ready(function(){

    $('#submit').attr('disabled', 'disabled');
    $('#cad_chamado').click(function(){
        var categoria   = $('#cat').val();
        var titulo      = $('#titulo').val();
        var descricao   = $('#descricao').val();

        if(categoria !== ""){
            $('#categoria_cadastro').hide();
            if(titulo !== ""){
                $('#titulo_cadastro').hide();
                if(descricao !== ""){
                    $('#descricao_cadastro').hide();
                    $('#submit').removeAttr('disabled');
                }else{
                    $('#descricao_cadastro').show();
                    $('#titulo_cadastro').hide();
                    $('#categoria_cadastro').hide();
                    $('#submit').attr('disabled', 'disabled');
                }
            }else{
                $('#categoria_cadastro').hide();
                $('#titulo_cadastro').show();
                $('#descricao_cadastro').hide();
                $('#submit').attr('disabled', 'disabled');
            }
        }else{
            $('#categoria_cadastro').show();
            $('#titulo_cadastro').hide();
            $('#descricao_cadastro').hide();
            $('#submit').attr('disabled', 'disabled');
        }
    });

    $('#sav_cat').attr('disabled', 'disabled');

    $('#form_cat').change(function() {
        var nova_cat = $('#nova_cat').val();
        if(nova_cat !== ""){
            $('#sav_cat').removeAttr('disabled');
            $('#no_cat').hide();
        }else{
            $('#sav_cat').attr('disabled', 'disabled');
            $('#no_cat').show();
        }
    });

    $('#cat_editar').attr('disabled', 'disabled');
    $('#form_edit_cat').change(function() {
        var nova_cat = $('#nova_cat').val();
        if(nova_cat !== ""){
            $('#cat_editar').removeAttr('disabled');
            $('#no_cat').hide();
        }else{
            $('#cat_editar').attr('disabled', 'disabled');
            $('#no_cat').show();
        }
    });

    $('#salvar').attr('disabled', 'disabled');
    $('#salvar_his').mouseenter(function() {
        var mensagem = $('#mensagem').val();
        if(mensagem !== ""){
            $('#salvar').removeAttr('disabled');
            $('#mensagem_his').hide();
        }else{
            $('#salvar').attr('disabled', 'disabled');
            $('#mensagem_his').show();
        }
    });

});




