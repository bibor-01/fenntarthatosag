class Tevekenyseg{
    constructor(elem, adat) {
		this.elem = elem;
		this.adat = adat;
        this.elem.html(this.adat.tevekenyseg_nev);  
        this.elem.val(this.adat.id);   
    }


}