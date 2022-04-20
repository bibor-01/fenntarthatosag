class AjaxHivas {
    constructor(token) {
        this.token = token;
    }
    getAjax(eleresiUt, myCallback) {
        const tomb = [];
        $.ajax({
            url: eleresiUt,
            type: "GET",
            success: function (result) {
                //console.log(result);
                result.forEach((element) => {
                    tomb.push(element);
                });

                myCallback(tomb);
            },
        });
    }
    postAjax(eleresiUt, adat) {
        $.ajax({
            url: eleresiUt,
            type: "POST",

            data: adat,
            success: function (result) {
                console.log(result);
            },
            error: function (result) {
                console.log(result);
            },
        });
    }
    putAjax(eleresiUt, adat, id) {
        console.log(adat);
        $.ajax({
            url: eleresiUt + "/" + id,
            type: "PUT",
            data: adat,
            success: function (result) {},
        });
    }
    deleteAjax(eleresiUt, id) {
        $.ajax({
            url: eleresiUt + "/" + id,
            type: "DELETE",
            success: function (result) {},
        });
    }
}
