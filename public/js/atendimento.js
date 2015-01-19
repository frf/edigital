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