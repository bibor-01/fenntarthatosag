$(function () {
    let ajax = new AjaxHivas();
    let eleresiUt = "/api/tevekenyseg";
    const osztalyTomb =['SZF1A','SZF2A','SZF1B','SZF2B'];


    osztalyTomb.forEach(element => {
        $(".osztalySelect").append("<option name='osztaly'>" + element + "</option>");
        $(".osztalySelectKereses").append("<option name='osztaly'>" + element + "</option>");
    });
    
    function tevekenysegLista(tomb) {
        const szuloElem = $("select[name=tevekenysegSelect]");
        const sablonElem = $(".tevekenysegElem");
    
        tomb.forEach(function (adat) {
            /* console.log(adat); */
            let ujElem = sablonElem.clone().appendTo(szuloElem);
            const ujFennt = new Tevekenyseg(ujElem, adat);
        });
        sablonElem.remove(); 
    }
    ajax.getAjax(eleresiUt, tevekenysegLista);
  
    

});