function VerEnMapa(prov, dire, loc)
{    
    var punto = dire +", " +  loc  +", " +  prov +", Argentina";
    console.log(punto);
    var funcionAjax=$.ajax({
    url:"nexo.php",
    type:"post",
    data:{
      queHago:"VerEnMapa"
    }
  });
    funcionAjax.done(function(retorno){
    $("#content").html(retorno);
        $("#punto").val(punto);           
  });
}