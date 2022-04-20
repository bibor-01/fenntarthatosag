$(function () {
    //const token = $('meta[name="csrf-token"]').attr("content");
    let ajax = new AjaxHivas();

    let eleresiUt = "/api/bejegyzes";

    $(".kuldes").on("click", function () {
        console.log("küld!");
        let tevekenyseg = $("select[name=tevekenysegSelect]").val();
        let osztaly = $("select[name=osztalySelect]").val();
        let allapot = "0";

        let adat = {
            tevekenyseg_id: tevekenyseg,
            osztaly_id: osztaly,
            allapot: allapot,
        };
        console.log(adat);

        console.log(adat);
        ajax.postAjax(eleresiUt, adat);
    });

   function bejegyzesLista(tomb) {
       // console.log(tomb);
        tomb.forEach(function (adat) {
            console.log(adat);
            $(".table").append('<tr><td class="osztaly">'+adat.osztaly_id+'</td><td class="tevekenyseg">'+adat.tevekenyseg_id+'</td><td class="pont">'+adat.pontszam+'</td><td class="statusz">'+adat.allapot+'</td></tr>');
        });
    } 

    $(".osztalySelectKereses").change(() => {
        console.log("keres");
        $(".table").empty();
        $(".table").append(`<thead><tr>
			<th scope="col">osztály</th>
			<th scope="col">tevékenység</th>
			<th scope="col">pont</th>
            <th scope="col">státusz</th>
		</tr></thead>`);
        let vegpont = "/api/bejegyzes/" + $(".osztalySelectKereses").val();
        ajax.getAjax(vegpont,bejegyzesLista );
    });
});
