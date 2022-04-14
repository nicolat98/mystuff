var colorSP = "Black";
var total_priceSP = 599.99;
var gb_SP = 32;
var model_SP = 5.4;
var assurance_SP = 0;
var quantity_SP = 1;
var deleteIdSP;

function changeImageSP(newImg) {
    document.getElementById("sp-img").src = newImg;

    if (newImg === "img/smartphones/sp-black.png") {
        colorSP = "Black";
    } else if (newImg === "img/smartphones/sp-blue.png") {
        colorSP = "Blue";
    } else if (newImg === "img/smartphones/sp-green.png") {
        colorSP = "Green";
    } else if (newImg === "img/smartphones/sp-red.png") {
        colorSP = "Red";
    } else {
        colorSP = "Beige";
    }
}

function changeTheText()
{
    //document.getElementById('title').text(text);
    //($('#btnradio6').is(':checked'))
    var base = 599.99;
    var ass = 49.99;
    var gb_SP_64 = 29.99;
    var gb_SP_128 = 59.99;
    var gb_SP_256 = 99.99;
    var p_61 = 69.99;


    $(document).ready(function ()
    {
        //capacità + resto base
        if (document.getElementById("btnradio1").checked && document.getElementById("btnradio5").checked && document.getElementById("btnradio7").checked)
        {
            total_priceSP = base;
            gb_SP=32;
            assurance_SP = 0;
            model_SP=5.4;
            $('#price').text("€ " + total_priceSP);
        }

        if (document.getElementById("btnradio2").checked && document.getElementById("btnradio5").checked && document.getElementById("btnradio7").checked)
        {
            total_priceSP = base + gb_SP_64;
            gb_SP=64;
            assurance_SP = 0;
            model_SP=5.4;
            $('#price').text("€ " + total_priceSP);
        }

        if (document.getElementById("btnradio3").checked && document.getElementById("btnradio5").checked && document.getElementById("btnradio7").checked)
        {
            total_priceSP = base + gb_SP_128;
            gb_SP=128;
            assurance_SP = 0;
            model_SP=5.4;
            $('#price').text("€ " + total_priceSP);
        }

        if (document.getElementById("btnradio4").checked && document.getElementById("btnradio5").checked && document.getElementById("btnradio7").checked)
        {
            total_priceSP = base + gb_SP_256;
            gb_SP=256;
            assurance_SP = 0;
            model_SP=5.4;
            $('#price').text("€ " + total_priceSP);
        }

        //capacità + 6.1"
        if (document.getElementById("btnradio1").checked && document.getElementById("btnradio6").checked && document.getElementById("btnradio7").checked)
        {
            total_priceSP = base + p_61;
            gb_SP=32;
            assurance_SP = 0;
            model_SP=6.1;
            $('#price').text("€ " + total_priceSP);
        }

        if (document.getElementById("btnradio2").checked && document.getElementById("btnradio6").checked && document.getElementById("btnradio7").checked)
        {
            total_priceSP=base + gb_SP_64 + p_61;
            gb_SP=64;
            assurance_SP = 0;
            model_SP=6.1;
            $('#price').text("€ " + total_priceSP);
        }

        if (document.getElementById("btnradio3").checked && document.getElementById("btnradio6").checked && document.getElementById("btnradio7").checked)
        {
            total_priceSP=base + gb_SP_128 + p_61;
            gb_SP=128;
            assurance_SP = 0;
            model_SP=6.1;
            $('#price').text("€ " + total_priceSP);
        }

        if (document.getElementById("btnradio4").checked && document.getElementById("btnradio6").checked && document.getElementById("btnradio7").checked)
        {
            total_priceSP=base + gb_SP_256 + p_61;
            gb_SP=256;
            assurance_SP = 0;
            model_SP=6.1;
            $('#price').text("€ " + total_priceSP);
        }

        //capacità+ 6.1"+ ass
        if (document.getElementById("btnradio1").checked && document.getElementById("btnradio6").checked && document.getElementById("btnradio8").checked)
        {
            total_priceSP=base + p_61 + ass;
            gb_SP=32;
            assurance_SP = 1;
            model_SP=6.1;
            $('#price').text("€ " + total_priceSP);
        }

        if (document.getElementById("btnradio2").checked && document.getElementById("btnradio6").checked && document.getElementById("btnradio8").checked)
        {
            total_priceSP=base + gb_SP_64 + p_61 + ass;
            gb_SP=64;
            assurance_SP = 1;
            model_SP=6.1;
            $('#price').text("€ " + total_priceSP);
        }

        if (document.getElementById("btnradio3").checked && document.getElementById("btnradio6").checked && document.getElementById("btnradio8").checked)
        {
            total_priceSP=base + gb_SP_128 + p_61 + ass;
            gb_SP=128;
            assurance_SP = 1;
            model_SP=6.1;
            $('#price').text("€ " + total_priceSP);
        }

        if (document.getElementById("btnradio4").checked && document.getElementById("btnradio6").checked && document.getElementById("btnradio8").checked)
        {
            total_priceSP=base + gb_SP_256 + p_61 + ass;
            gb_SP=256;
            assurance_SP = 1;
            model_SP=6.1;
            $('#price').text("€ " + total_priceSP);
        }

        //capacità+ass
        if (document.getElementById("btnradio1").checked && document.getElementById("btnradio5").checked && document.getElementById("btnradio8").checked)
        {
            total_priceSP=base + ass;
            gb_SP=32;
            assurance_SP = 1;
            model_SP=5.4;
            $('#price').text("€ " + total_priceSP);
        }

        if (document.getElementById("btnradio2").checked && document.getElementById("btnradio5").checked && document.getElementById("btnradio8").checked)
        {
            total_priceSP=base + gb_SP_64 + ass;
            gb_SP=64;
            assurance_SP = 1;
            model_SP=5.4;
            $('#price').text("€ " + total_priceSP);
        }

        if (document.getElementById("btnradio3").checked && document.getElementById("btnradio5").checked && document.getElementById("btnradio8").checked)
        {
            total_priceSP=base + gb_SP_128 + ass;
            gb_SP=128;
            assurance_SP = 1;
            model_SP=5.4;
            $('#price').text("€ " + total_priceSP);
        }

        if (document.getElementById("btnradio4").checked && document.getElementById("btnradio5").checked && document.getElementById("btnradio8").checked)
        {
            total_priceSP=base + gb_SP_256 + ass;
            gb_SP=256;
            assurance_SP = 1;
            model_SP=5.4;
            $('#price').text("€ " + total_priceSP);
        }
    }
    );
}

function changeModalBodyText() {
    var base = 599.99;
    var ass = 49.99;
    var gb_SP_64 = 29.99;
    var gb_SP_128 = 59.99;
    var gb_SP_256 = 99.99;
    var p_61 = 69.99;
    var total_priceSP;
    var new_quantity_SP = document.getElementById("selectQuantitySP").value;
    
    let lang = $('body').attr('lang');
    let capacity = new Map();
    capacity.set('it', 'Capacità');
    capacity.set('en', 'Capacity');
    let quantity = new Map();
    quantity.set('it', 'Quantità');
    quantity.set('en', 'Quantity');
    let model = new Map();
    model.set('it', 'Modello');
    model.set('en', 'Model');
    let assurance = new Map();
    assurance.set('it', 'Assicurazione');
    assurance.set('en', 'Assurance');
    let color = new Map();
    color.set('it', 'Colore');
    color.set('en', 'Color');
    let total = new Map();
    total.set('it', 'Totale');
    total.set('en', 'Total');

    $(document).ready(function ()
    {
        //$('#modal-confirm-sp').text("MENATE");

        //capacità + resto base
        if (document.getElementById("btnradio1").checked && document.getElementById("btnradio5").checked && document.getElementById("btnradio7").checked)
        {
            document.getElementById('modal-confirm-sp').innerHTML = '<table class="table table-bordered fs-4">\n\
                                                                        <tbody>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>'+capacity.get(lang)+': </b>32 GB</th>\n\
                                                                            <td align="center"><b>'+model.get(lang)+': </b>5.4"</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>'+assurance.get(lang)+': </b>No</th>\n\
                                                                            <td align="center"><b>'+color.get(lang)+': </b>' + colorSP + '</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>'+quantity.get(lang)+': </b>'+new_quantity_SP+'</th>\n\
                                                                            <td align="center"><b>'+total.get(lang)+': </b>' + base*new_quantity_SP +' € </th>\n\
                                                                        </tr>\n\
                                                                        </tbody>\n\ ';
            addProductToInput();
        }
        
        if (document.getElementById("btnradio2").checked && document.getElementById("btnradio5").checked && document.getElementById("btnradio7").checked)
        {
            document.getElementById('modal-confirm-sp').innerHTML = '<table class="table table-bordered fs-4">\n\
                                                                        <tbody>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>'+capacity.get(lang)+': </b>64 GB</th>\n\
                                                                            <td align="center"><b>'+model.get(lang)+': </b>5.4"</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>'+assurance.get(lang)+': </b>No</th>\n\
                                                                            <td align="center"><b>'+color.get(lang)+': </b>' + colorSP + '</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>'+quantity.get(lang)+': </b>'+new_quantity_SP+'</th>\n\
                                                                            <td align="center"><b>'+total.get(lang)+': </b>' + (base + gb_SP_64)*new_quantity_SP +' € </th>\n\
                                                                        </tr>\n\
                                                                        </tbody>\n\ ';

            addProductToInput();
        }

        if (document.getElementById("btnradio3").checked && document.getElementById("btnradio5").checked && document.getElementById("btnradio7").checked)
        {
            document.getElementById('modal-confirm-sp').innerHTML = '<table class="table table-bordered fs-4">\n\
                                                                        <tbody>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>'+capacity.get(lang)+': </b>128 GB</th>\n\
                                                                            <td align="center"><b>'+model.get(lang)+': </b>5.4"</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>'+assurance.get(lang)+': </b>No</th>\n\
                                                                            <td align="center"><b>'+color.get(lang)+': </b>' + colorSP + '</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>'+quantity.get(lang)+': </b>'+new_quantity_SP+'</th>\n\
                                                                            <td align="center"><b>'+total.get(lang)+': </b>' + (base + gb_SP_128)*new_quantity_SP +' € </th>\n\
                                                                        </tr>\n\
                                                                        </tbody>\n\ ';
                    
            addProductToInput();
        }

        if (document.getElementById("btnradio4").checked && document.getElementById("btnradio5").checked && document.getElementById("btnradio7").checked)
        {
            document.getElementById('modal-confirm-sp').innerHTML ='<table class="table table-bordered fs-4">\n\
                                                                        <tbody>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>'+capacity.get(lang)+': </b>256 GB</th>\n\
                                                                            <td align="center"><b>'+model.get(lang)+': </b>5.4"</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>'+assurance.get(lang)+': </b>No</th>\n\
                                                                            <td align="center"><b>'+color.get(lang)+': </b>' + colorSP + '</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>'+quantity.get(lang)+': </b>'+new_quantity_SP+'</th>\n\
                                                                            <td align="center"><b>'+total.get(lang)+': </b>' + (base + gb_SP_256)*new_quantity_SP +' € </th>\n\
                                                                        </tr>\n\
                                                                        </tbody>\n\ ';
                    
            addProductToInput();
        }

        //capacità + 6.1"
        if (document.getElementById("btnradio1").checked && document.getElementById("btnradio6").checked && document.getElementById("btnradio7").checked)
        {
            document.getElementById('modal-confirm-sp').innerHTML = '<table class="table table-bordered fs-4">\n\
                                                                        <tbody>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>'+capacity.get(lang)+': </b>32 GB</th>\n\
                                                                            <td align="center"><b>'+model.get(lang)+': </b>6.1"</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>'+assurance.get(lang)+': </b>No</th>\n\
                                                                            <td align="center"><b>'+color.get(lang)+': </b>' + colorSP + '</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>'+quantity.get(lang)+': </b>'+new_quantity_SP+'</th>\n\
                                                                            <td align="center"><b>'+total.get(lang)+': </b>' + (base + p_61)*new_quantity_SP +' € </th>\n\
                                                                        </tr>\n\
                                                                        </tbody>\n\ ';
                    
            addProductToInput();
        }

        if (document.getElementById("btnradio2").checked && document.getElementById("btnradio6").checked && document.getElementById("btnradio7").checked)
        {
            document.getElementById('modal-confirm-sp').innerHTML ='<table class="table table-bordered fs-4">\n\
                                                                        <tbody>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>'+capacity.get(lang)+': </b>64 GB</th>\n\
                                                                            <td align="center"><b>'+model.get(lang)+': </b>6.1"</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>'+assurance.get(lang)+': </b>No</th>\n\
                                                                            <td align="center"><b>'+color.get(lang)+': </b>' + colorSP + '</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>'+quantity.get(lang)+': </b>'+new_quantity_SP+'</th>\n\
                                                                            <td align="center"><b>'+total.get(lang)+': </b>' + (base + gb_SP_64 + p_61)*new_quantity_SP +' € </th>\n\
                                                                        </tr>\n\
                                                                        </tbody>\n\ ';

            addProductToInput();
        }

        if (document.getElementById("btnradio3").checked && document.getElementById("btnradio6").checked && document.getElementById("btnradio7").checked)
        {
            document.getElementById('modal-confirm-sp').innerHTML = '<table class="table table-bordered fs-4">\n\
                                                                        <tbody>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>'+capacity.get(lang)+': </b>128 GB</th>\n\
                                                                            <td align="center"><b>'+model.get(lang)+': </b>6.1"</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>'+assurance.get(lang)+': </b>No</th>\n\
                                                                            <td align="center"><b>'+color.get(lang)+': </b>' + colorSP + '</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>'+quantity.get(lang)+': </b>'+new_quantity_SP+'</th>\n\
                                                                            <td align="center"><b>'+total.get(lang)+': </b>' + (base + gb_SP_128 + p_61)*new_quantity_SP +' € </th>\n\
                                                                        </tr>\n\
                                                                        </tbody>\n\ ';
                    
            addProductToInput();
        }

        if (document.getElementById("btnradio4").checked && document.getElementById("btnradio6").checked && document.getElementById("btnradio7").checked)
        {
            document.getElementById('modal-confirm-sp').innerHTML = '<table class="table table-bordered fs-4">\n\
                                                                        <tbody>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>'+capacity.get(lang)+': </b>256 GB</th>\n\
                                                                            <td align="center"><b>'+model.get(lang)+': </b>6.1"</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>'+assurance.get(lang)+': </b>No</th>\n\
                                                                            <td align="center"><b>'+color.get(lang)+': </b>' + colorSP + '</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>'+quantity.get(lang)+': </b>'+new_quantity_SP+'</th>\n\
                                                                            <td align="center"><b>'+total.get(lang)+': </b>' + (base + gb_SP_256 + p_61)*new_quantity_SP +' € </th>\n\
                                                                        </tr>\n\
                                                                        </tbody>\n\ ';
            addProductToInput();
        }

        //capacità+ 6.1"+ ass
        if (document.getElementById("btnradio1").checked && document.getElementById("btnradio6").checked && document.getElementById("btnradio8").checked)
        {
            document.getElementById('modal-confirm-sp').innerHTML = '<table class="table table-bordered fs-4">\n\
                                                                        <tbody>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>'+capacity.get(lang)+': </b>32 GB</th>\n\
                                                                            <td align="center"><b>'+model.get(lang)+': </b>6.1"</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>'+assurance.get(lang)+': </b>Ok</th>\n\
                                                                            <td align="center"><b>'+color.get(lang)+': </b>' + colorSP + '</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>'+quantity.get(lang)+': </b>'+new_quantity_SP+'</th>\n\
                                                                            <td align="center"><b>'+total.get(lang)+': </b>' + (base + ass + p_61)*new_quantity_SP +' € </th>\n\
                                                                        </tr>\n\
                                                                        </tbody>\n\ ';
                    
                    
            addProductToInput();
        }

        if (document.getElementById("btnradio2").checked && document.getElementById("btnradio6").checked && document.getElementById("btnradio8").checked)
        {
            document.getElementById('modal-confirm-sp').innerHTML = '<table class="table table-bordered fs-4">\n\
                                                                        <tbody>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>'+capacity.get(lang)+': </b>64 GB</th>\n\
                                                                            <td align="center"><b>'+model.get(lang)+': </b>6.1"</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>'+assurance.get(lang)+': </b>Ok</th>\n\
                                                                            <td align="center"><b>'+color.get(lang)+': </b>' + colorSP + '</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>'+quantity.get(lang)+': </b>'+new_quantity_SP+'</th>\n\
                                                                            <td align="center"><b>'+total.get(lang)+': </b>' + (base + gb_SP_64 + ass + p_61)*new_quantity_SP +' € </th>\n\
                                                                        </tr>\n\
                                                                        </tbody>\n\ ';
                    
                    
                  
            addProductToInput();
        }

        if (document.getElementById("btnradio3").checked && document.getElementById("btnradio6").checked && document.getElementById("btnradio8").checked)
        {
            document.getElementById('modal-confirm-sp').innerHTML = '<table class="table table-bordered fs-4">\n\
                                                                        <tbody>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>'+capacity.get(lang)+': </b>128 GB</th>\n\
                                                                            <td align="center"><b>'+model.get(lang)+': </b>6.1"</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>'+assurance.get(lang)+': </b>Ok</th>\n\
                                                                            <td align="center"><b>'+color.get(lang)+': </b>' + colorSP + '</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>'+quantity.get(lang)+': </b>'+new_quantity_SP+'</th>\n\
                                                                            <td align="center"><b>'+total.get(lang)+': </b>' + (base + gb_SP_128 + ass + p_61)*new_quantity_SP +' € </th>\n\
                                                                        </tr>\n\
                                                                        </tbody>\n\ ';

            addProductToInput();
        }

        if (document.getElementById("btnradio4").checked && document.getElementById("btnradio6").checked && document.getElementById("btnradio8").checked)
        {
            document.getElementById('modal-confirm-sp').innerHTML = '<table class="table table-bordered fs-4">\n\
                                                                        <tbody>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>'+capacity.get(lang)+': </b>256 GB</th>\n\
                                                                            <td align="center"><b>'+model.get(lang)+': </b>6.1"</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>'+assurance.get(lang)+': </b>Ok</th>\n\
                                                                            <td align="center"><b>'+color.get(lang)+': </b>' + colorSP + '</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>'+quantity.get(lang)+': </b>'+new_quantity_SP+'</th>\n\
                                                                            <td align="center"><b>'+total.get(lang)+': </b>' + (base + gb_SP_256 + ass + p_61)*new_quantity_SP +' € </th>\n\
                                                                        </tr>\n\
                                                                        </tbody>\n\ ';

            addProductToInput();
        }

        //capacità+ass
        if (document.getElementById("btnradio1").checked && document.getElementById("btnradio5").checked && document.getElementById("btnradio8").checked)
        {
            document.getElementById('modal-confirm-sp').innerHTML = '<table class="table table-bordered fs-4">\n\
                                                                        <tbody>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>'+capacity.get(lang)+': </b>32 GB</th>\n\
                                                                            <td align="center"><b>'+model.get(lang)+': </b>5.4"</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>'+assurance.get(lang)+': </b>Ok</th>\n\
                                                                            <td align="center"><b>'+color.get(lang)+': </b>' + colorSP + '</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>'+quantity.get(lang)+': </b>'+new_quantity_SP+'</th>\n\
                                                                            <td align="center"><b>'+total.get(lang)+': </b>' + (base + ass)*new_quantity_SP +' € </th>\n\
                                                                        </tr>\n\
                                                                        </tbody>\n\ ';
                    
            addProductToInput();
        }

        if (document.getElementById("btnradio2").checked && document.getElementById("btnradio5").checked && document.getElementById("btnradio8").checked)
        {
            document.getElementById('modal-confirm-sp').innerHTML = '<table class="table table-bordered fs-4">\n\
                                                                        <tbody>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>'+capacity.get(lang)+': </b>64 GB</th>\n\
                                                                            <td align="center"><b>'+model.get(lang)+': </b>5.4"</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>'+assurance.get(lang)+': </b>Ok</th>\n\
                                                                            <td align="center"><b>'+color.get(lang)+': </b>' + colorSP + '</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>'+quantity.get(lang)+': </b>'+new_quantity_SP+'</th>\n\
                                                                            <td align="center"><b>'+total.get(lang)+': </b>' + (base + gb_SP_64 + ass)*new_quantity_SP +' € </th>\n\
                                                                        </tr>\n\
                                                                        </tbody>\n\ ';
                    
                    
            addProductToInput();
        }

        if (document.getElementById("btnradio3").checked && document.getElementById("btnradio5").checked && document.getElementById("btnradio8").checked)
        {
            document.getElementById('modal-confirm-sp').innerHTML = '<table class="table table-bordered fs-4">\n\
                                                                        <tbody>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>'+capacity.get(lang)+': </b>128 GB</th>\n\
                                                                            <td align="center"><b>'+model.get(lang)+': </b>5.4"</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>'+assurance.get(lang)+': </b>Ok</th>\n\
                                                                            <td align="center"><b>'+color.get(lang)+': </b>' + colorSP + '</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>'+quantity.get(lang)+': </b>'+new_quantity_SP+'</th>\n\
                                                                            <td align="center"><b>'+total.get(lang)+': </b>' + (base + gb_SP_128 + ass)*new_quantity_SP +' € </th>\n\
                                                                        </tr>\n\
                                                                        </tbody>\n\ ';

            addProductToInput();
        }

        if (document.getElementById("btnradio4").checked && document.getElementById("btnradio5").checked && document.getElementById("btnradio8").checked)
        {
            document.getElementById('modal-confirm-sp').innerHTML = '<table class="table table-bordered fs-4">\n\
                                                                        <tbody>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>'+capacity.get(lang)+': </b>256 GB</th>\n\
                                                                            <td align="center"><b>'+model.get(lang)+': </b>5.4"</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>'+assurance.get(lang)+': </b>Ok</th>\n\
                                                                            <td align="center"><b>'+color.get(lang)+': </b>' + colorSP + '</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>'+quantity.get(lang)+': </b>'+new_quantity_SP+'</th>\n\
                                                                            <td align="center"><b>'+total.get(lang)+': </b>' + (base + gb_SP_256 + ass)*new_quantity_SP +' € </th>\n\
                                                                        </tr>\n\
                                                                        </tbody>\n\ ';
                    
                    
            addProductToInput();
        }
    }
    );
}

/*
 function changeTheText2()
 {
 //document.getElementById('title').text(text);
 //($('#btnradio6').is(':checked'))
 var base = 599.99;
 var ass= 49.99;
 var gb_64 = 29.99;
 var gb_128 = 59.99;
 var gb_256 = 99.99;
 var gb_64 = 29.99;
 var p_61 = 69.99;
 var total_priceSP =0;
 
 $(document).ready(function()
 {
 //capacità + resto base
 if (document.getElementById("btnradio1").checked && document.getElementById("btnradio5").checked && document.getElementById("btnradio8").checked)
 {
 total_price=base;
 }
 
 if (document.getElementById("btnradio2").checked && document.getElementById("btnradio5").checked && document.getElementById("btnradio8").checked)
 {
 total_price=base+gb_64;
 }
 
 if (document.getElementById("btnradio3").checked && document.getElementById("btnradio5").checked && document.getElementById("btnradio8").checked)
 {
 total_price=base+gb_128;
 }
 
 if (document.getElementById("btnradio4").checked && document.getElementById("btnradio5").checked && document.getElementById("btnradio8").checked)
 {
 total_price=base+gb_256;
 }
 
 //capacità + 6.1"
 if (document.getElementById("btnradio1").checked && document.getElementById("btnradio6").checked && document.getElementById("btnradio8").checked)
 {
 total_price=base+p_61;
 }
 
 if (document.getElementById("btnradio2").checked && document.getElementById("btnradio6").checked && document.getElementById("btnradio8").checked)
 {
 total_price=base+gb_64+p_61;
 }
 
 if (document.getElementById("btnradio3").checked && document.getElementById("btnradio6").checked && document.getElementById("btnradio8").checked)
 {
 total_price=base+gb_128+p_61;
 }
 
 if (document.getElementById("btnradio4").checked && document.getElementById("btnradio6").checked && document.getElementById("btnradio8").checked)
 {
 total_price=base+gb_256+p_61;
 }
 
 //capacità+ 6.1"+ ass
 if (document.getElementById("btnradio1").checked && document.getElementById("btnradio6").checked && document.getElementById("btnradio7").checked)
 {
 total_price=base+p_61+ass;
 }
 
 if (document.getElementById("btnradio2").checked && document.getElementById("btnradio6").checked && document.getElementById("btnradio7").checked)
 {
 total_price=base+gb_64+p_61+ass;
 }
 
 if (document.getElementById("btnradio3").checked && document.getElementById("btnradio6").checked && document.getElementById("btnradio7").checked)
 {
 total_price=base+gb_128+p_61+ass;
 }
 
 if (document.getElementById("btnradio4").checked && document.getElementById("btnradio6").checked && document.getElementById("btnradio7").checked)
 {
 total_price=base+gb_256+p_61+ass;
 }
 
 //capacità+ass
 if (document.getElementById("btnradio1").checked && document.getElementById("btnradio5").checked && document.getElementById("btnradio7").checked)
 {
 total_price=base+ass;
 }
 
 if (document.getElementById("btnradio2").checked && document.getElementById("btnradio5").checked && document.getElementById("btnradio7").checked)
 {
 total_price=base+gb_64+ass;
 }
 
 if (document.getElementById("btnradio3").checked && document.getElementById("btnradio5").checked && document.getElementById("btnradio7").checked)
 {
 total_price=base+gb_128+ass;
 }
 
 if (document.getElementById("btnradio4").checked && document.getElementById("btnradio5").checked && document.getElementById("btnradio7").checked)
 {
 total_price=base+gb_256+ass;
 }
 
 return total_price;
 }
 );
 }*/

//document.getElementById("red").checked

function addProductToInput(){
    var type;
    if(model_SP===5.4){
        type = 54;
    }else{
        type = 61;
    }
    
    document.getElementById("inputNameSP").value = "sp-"+colorSP.toLowerCase()+"-"+type+"-"+gb_SP+"-a"+assurance_SP;
    document.getElementById("inputPriceSP").value = total_priceSP;
    document.getElementById("inputCategorySP").value = 1;
    document.getElementById("inputCapacitySP").value = gb_SP;
    document.getElementById("inputModelSP").value = model_SP;
    document.getElementById("inputAssuranceSP").value = assurance_SP;
    document.getElementById("inputColorSP").value = colorSP; 
    document.getElementById("inputQuantitySP").value = document.getElementById("selectQuantitySP").value; 
} 


// stelle feedback totali
$(function () {
    $("#feedbackStarsSP").rateYo({
        maxValue: 5,
        numStars: 5,
        starWidth: "40px",
        halfStar: false,
        readOnly: true
    });
});


$(function () {
    $("#userStarsSP1").rateYo({
        maxValue: 5,
        numStars: 5,
        starWidth: "22px",
        halfStar: false,
        readOnly: true
    });
});

$(function () {
    $("#userStarsSP2").rateYo({
        maxValue: 5,
        numStars: 5,
        starWidth: "22px",
        halfStar: false,
        readOnly: true
    });
});

$(function () {
    $("#userStarsSP3").rateYo({
        maxValue: 5,
        numStars: 5,
        starWidth: "22px",
        halfStar: false,
        readOnly: true
    });
});

$(function () {
    $("#userStarsSP4").rateYo({
        maxValue: 5,
        numStars: 5,
        starWidth: "22px",
        halfStar: false,
        readOnly: true
    });
});


function updateStarsSP(num_stars){
    //alert(num_stars);
    
    for($i=1; $i<=num_stars; $i++){
        $(function () {
            $("#userStarsSP"+($i+4)).rateYo({
                maxValue: 5,
                numStars: 5,
                starWidth: "22px",
                halfStar: false,
                readOnly: true
            });
        });
    }
    
}


