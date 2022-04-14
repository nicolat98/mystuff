var color = "Blue";
var total_price = 599.99;
var gb = 128;
var model = 13;
var assurance = 0;
var quantity = 1;
var deleteId;

function changeImagePC(newImg) {
    document.getElementById("pc-img").src = newImg;

    if (newImg === "img/computers/pc-blue.png") {
        color = "Blue";
    } else if (newImg === "img/computers/pc-orange.png") {
        color = "Orange";
    } else {
        color = "White";
    }
}

function changeTheTextPC()
{
    //document.getElementById('title').text(text);
    //($('#btnradio6').is(':checked'))
    var base = 599.99;
    var ass = 49.99;
    var gb_256 = 49.99;
    var gb_512 = 99.99;
    var tb = 149.99;
    var p_16 = 119.99;


    $(document).ready(function ()
    {
        //capacità + resto base
        if (document.getElementById("btnradio1").checked && document.getElementById("btnradio5").checked && document.getElementById("btnradio8").checked)
        {
            total_price = base;
            gb = 128;
            assurance = 0;
            model = 13;
            $('#price').text("€ " + total_price);
        }

        if (document.getElementById("btnradio2").checked && document.getElementById("btnradio5").checked && document.getElementById("btnradio8").checked)
        {
            total_price = base + gb_256;
            gb = 256;
            assurance = 0;
            model = 13;
            $('#price').text("€ " + total_price);
        }

        if (document.getElementById("btnradio3").checked && document.getElementById("btnradio5").checked && document.getElementById("btnradio8").checked)
        {
            total_price = base + gb_512;
            gb = 512;
            assurance = 0;
            model = 13;
            $('#price').text("€ " + total_price);
        }

        if (document.getElementById("btnradio4").checked && document.getElementById("btnradio5").checked && document.getElementById("btnradio8").checked)
        {
            total_price = base + tb;
            gb = 1024;
            assurance = 0;
            model = 13;
            $('#price').text("€ " + total_price);
        }

        //capacità + 16"
        if (document.getElementById("btnradio1").checked && document.getElementById("btnradio6").checked && document.getElementById("btnradio8").checked)
        {
            total_price = base + p_16;
            gb = 128;
            assurance = 0;
            model = 16;
            $('#price').text("€ " + total_price);
        }

        if (document.getElementById("btnradio2").checked && document.getElementById("btnradio6").checked && document.getElementById("btnradio8").checked)
        {
            total_price = base + gb_256 + p_16;
            gb = 256;
            assurance = 0;
            model = 16;
            $('#price').text("€ " + total_price);
        }

        if (document.getElementById("btnradio3").checked && document.getElementById("btnradio6").checked && document.getElementById("btnradio8").checked)
        {
            total_price = base + gb_512 + p_16;
            gb = 512;
            assurance = 0;
            model = 6.1;
            $('#price').text("€ " + total_price);
        }

        if (document.getElementById("btnradio4").checked && document.getElementById("btnradio6").checked && document.getElementById("btnradio8").checked)
        {
            total_price = base + tb + p_16;
            gb = 1024;
            assurance = 0;
            model = 16;
            $('#price').text("€ " + total_price);
        }

        //capacità+ 6.1"+ ass
        if (document.getElementById("btnradio1").checked && document.getElementById("btnradio6").checked && document.getElementById("btnradio7").checked)
        {
            total_price = base + p_16 + ass;
            gb = 128;
            assurance = 1;
            model = 16;
            $('#price').text("€ " + total_price);
        }

        if (document.getElementById("btnradio2").checked && document.getElementById("btnradio6").checked && document.getElementById("btnradio7").checked)
        {
            total_price = base + gb_256 + p_16 + ass;
            gb = 256;
            assurance = 1;
            model = 16;
            $('#price').text("€ " + total_price);
        }

        if (document.getElementById("btnradio3").checked && document.getElementById("btnradio6").checked && document.getElementById("btnradio7").checked)
        {
            total_price = base + gb_512 + p_16 + ass;
            gb = 512;
            assurance = 1;
            model = 16;
            $('#price').text("€ " + total_price);
        }

        if (document.getElementById("btnradio4").checked && document.getElementById("btnradio6").checked && document.getElementById("btnradio7").checked)
        {
            total_price = base + tb + p_16 + ass;
            gb = 1024;
            assurance = 1;
            model = 16;
            $('#price').text("€ " + total_price);
        }

        //capacità+ass
        if (document.getElementById("btnradio1").checked && document.getElementById("btnradio5").checked && document.getElementById("btnradio7").checked)
        {
            total_price = base + ass;
            gb = 128;
            assurance = 1;
            model = 13;
            $('#price').text("€ " + total_price);
        }

        if (document.getElementById("btnradio2").checked && document.getElementById("btnradio5").checked && document.getElementById("btnradio7").checked)
        {
            total_price = base + gb_256 + ass;
            gb = 256;
            assurance = 1;
            model = 13;
            $('#price').text("€ " + total_price);
        }

        if (document.getElementById("btnradio3").checked && document.getElementById("btnradio5").checked && document.getElementById("btnradio7").checked)
        {
            total_price = base + gb_512 + ass;
            gb = 512;
            assurance = 1;
            model = 13;
            $('#price').text("€ " + total_price);
        }

        if (document.getElementById("btnradio4").checked && document.getElementById("btnradio5").checked && document.getElementById("btnradio7").checked)
        {
            total_price = base + tb + ass;
            gb = 1024;
            assurance = 1;
            model = 13;
            $('#price').text("€ " + total_price);
        }
    }
    );
}

function changeModalBodyTextPC() {

    var total_price;

    var base = 599.99;
    var ass = 49.99;
    var gb_256 = 49.99;
    var gb_512 = 99.99;
    var tb = 149.99;
    var p_16 = 119.99;
    var new_quantity = document.getElementById("selectQuantityPC").value;

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
    let colorText = new Map();
    colorText.set('it', 'Colore');
    colorText.set('en', 'Color');
    let total = new Map();
    total.set('it', 'Totale');
    total.set('en', 'Total');

    $(document).ready(function ()
    {
        //$('#modal-confirm-sp').text("MENATE");

        //capacità + resto base
        if (document.getElementById("btnradio1").checked && document.getElementById("btnradio5").checked && document.getElementById("btnradio8").checked)
        {
            document.getElementById('modal-confirm-pc').innerHTML = '<table class="table table-bordered fs-4">\n\
                                                                        <tbody>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>' + capacity.get(lang) + ': </b>128 GB</th>\n\
                                                                            <td align="center"><b>' + model.get(lang) + ': </b>13"</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>' + assurance.get(lang) + ': </b>No</th>\n\
                                                                            <td align="center"><b>' + colorText.get(lang) + ': </b>' + color + '</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>' + quantity.get(lang) + ': </b>' + new_quantity + '</th>\n\
                                                                            <td align="center"><b>' + total.get(lang) + ': </b>' + base * new_quantity + ' €</th>\n\
                                                                        </tr>\n\
                                                                        </tbody>\n\ ';
            addProductToInputPC();
        }

        if (document.getElementById("btnradio2").checked && document.getElementById("btnradio5").checked && document.getElementById("btnradio8").checked)
        {
            document.getElementById('modal-confirm-pc').innerHTML = '<table class="table table-bordered fs-4">\n\
                                                                        <tbody>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>' + capacity.get(lang) + ': </b>256 GB</th>\n\
                                                                            <td align="center"><b>' + model.get(lang) + ': </b>13"</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>' + assurance.get(lang) + ': </b>No</th>\n\
                                                                            <td align="center"><b>' + colorText.get(lang) + ': </b>' + color + '</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>' + quantity.get(lang) + ': </b>' + new_quantity + '</th>\n\
                                                                            <td align="center"><b>' + total.get(lang) + ': </b>' + (base + gb_256) * new_quantity + ' €</th>\n\
                                                                        </tr>\n\
                                                                        </tbody>\n\ ';

            addProductToInputPC();
        }

        if (document.getElementById("btnradio3").checked && document.getElementById("btnradio5").checked && document.getElementById("btnradio8").checked)
        {
            document.getElementById('modal-confirm-pc').innerHTML = '<table class="table table-bordered fs-4">\n\
                                                                        <tbody>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>' + capacity.get(lang) + ': </b>512 GB</th>\n\
                                                                            <td align="center"><b>' + model.get(lang) + ': </b>13"</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>' + assurance.get(lang) + ': </b>No</th>\n\
                                                                            <td align="center"><b>' + colorText.get(lang) + ': </b>' + color + '</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>' + quantity.get(lang) + ': </b>' + new_quantity + '</th>\n\
                                                                            <td align="center"><b>' + total.get(lang) + ': </b>' + (base + gb_512) * new_quantity + ' €</th>\n\
                                                                        </tr>\n\
                                                                        </tbody>\n\ ';

            addProductToInputPC();
        }

        if (document.getElementById("btnradio4").checked && document.getElementById("btnradio5").checked && document.getElementById("btnradio8").checked)
        {
            document.getElementById('modal-confirm-pc').innerHTML = '<table class="table table-bordered fs-4">\n\
                                                                        <tbody>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>' + capacity.get(lang) + ': </b>1 TB</th>\n\
                                                                            <td align="center"><b>' + model.get(lang) + ': </b>13"</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>' + assurance.get(lang) + ': </b>No</th>\n\
                                                                            <td align="center"><b>' + colorText.get(lang) + ': </b>' + color + '</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>' + quantity.get(lang) + ': </b>' + new_quantity + '</th>\n\
                                                                            <td  align="center"><b>' + total.get(lang) + ': </b>' + (base + tb) * new_quantity + ' €</th>\n\
                                                                        </tr>\n\
                                                                        </tbody>\n\ ';


            addProductToInputPC();
        }

        //capacità + 6.1"
        if (document.getElementById("btnradio1").checked && document.getElementById("btnradio6").checked && document.getElementById("btnradio8").checked)
        {
            document.getElementById('modal-confirm-pc').innerHTML = '<table class="table table-bordered fs-4 ">\n\
                                                                        <tbody>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>' + capacity.get(lang) + ': </b>128 GB</th>\n\
                                                                            <td align="center"><b>' + model.get(lang) + ': </b>16"</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>' + assurance.get(lang) + ': </b>No</th>\n\
                                                                            <td align="center"><b>' + colorText.get(lang) + ': </b>' + color + '</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>' + quantity.get(lang) + ': </b>' + new_quantity + '</th>\n\
                                                                            <td align="center"><b>' + total.get(lang) + ': </b>' + (base + p_16) * new_quantity + ' €</th>\n\
                                                                        </tr>\n\
                                                                        </tbody>\n\ ';

            addProductToInputPC();
        }

        if (document.getElementById("btnradio2").checked && document.getElementById("btnradio6").checked && document.getElementById("btnradio8").checked)
        {
            document.getElementById('modal-confirm-pc').innerHTML = '<table class="table table-bordered fs-4">\n\
                                                                        <tbody>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>' + capacity.get(lang) + ': </b>256 GB</th>\n\
                                                                            <td align="center"><b>' + model.get(lang) + ': </b>16"</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>' + assurance.get(lang) + ': </b>No</th>\n\
                                                                            <td align="center"><b>' + colorText.get(lang) + ': </b>' + color + '</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>' + quantity.get(lang) + ': </b>' + new_quantity + '</th>\n\
                                                                            <td align="center"><b>' + total.get(lang) + ': </b>' + (base + gb_256 + p_16) * new_quantity + ' €</th>\n\
                                                                        </tr>\n\
                                                                        </tbody>\n\ ';

            addProductToInputPC();
        }

        if (document.getElementById("btnradio3").checked && document.getElementById("btnradio6").checked && document.getElementById("btnradio8").checked)
        {
            document.getElementById('modal-confirm-pc').innerHTML = '<table class="table table-bordered fs-4">\n\
                                                                        <tbody>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>' + capacity.get(lang) + ': </b>512 GB</th>\n\
                                                                            <td align="center"><b>' + model.get(lang) + ': </b>16"</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>' + assurance.get(lang) + ': </b>No</th>\n\
                                                                            <td align="center"><b>' + colorText.get(lang) + ': </b>' + color + '</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>' + quantity.get(lang) + ': </b>' + new_quantity + '</th>\n\
                                                                            <td  align="center"><b>' + total.get(lang) + ': </b>' + (base + gb_512 + p_16) * new_quantity + ' €</th>\n\
                                                                        </tr>\n\
                                                                        </tbody>\n\ ';


            addProductToInputPC();
        }

        if (document.getElementById("btnradio4").checked && document.getElementById("btnradio6").checked && document.getElementById("btnradio8").checked)
        {
            document.getElementById('modal-confirm-pc').innerHTML = '<table class="table table-bordered fs-4">\n\
                                                                        <tbody>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>' + capacity.get(lang) + ': </b>1 TB</th>\n\
                                                                            <td align="center"><b>' + model.get(lang) + ': </b>16"</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>' + assurance.get(lang) + ': </b>No</th>\n\
                                                                            <td align="center"><b>' + colorText.get(lang) + ': </b>' + color + '</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>' + quantity.get(lang) + ': </b>' + new_quantity + '</th>\n\
                                                                            <td align="center"><b>' + total.get(lang) + ': </b>' + (base + tb + p_16) * new_quantity + ' €</th>\n\
                                                                        </tr>\n\
                                                                        </tbody>\n\ ';
            addProductToInputPC();
        }

        //capacità+ 6.1"+ ass
        if (document.getElementById("btnradio1").checked && document.getElementById("btnradio6").checked && document.getElementById("btnradio7").checked)
        {
            document.getElementById('modal-confirm-pc').innerHTML = '<table class="table table-bordered fs-4">\n\
                                                                        <tbody>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>' + capacity.get(lang) + ': </b>128 GB</th>\n\
                                                                            <td align="center"><b>' + model.get(lang) + ': </b>16"</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>' + assurance.get(lang) + ': </b>Ok</th>\n\
                                                                            <td align="center"><b>' + colorText.get(lang) + ': </b>' + color + '</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>' + quantity.get(lang) + ': </b>' + new_quantity + '</th>\n\
                                                                            <td align="center"><b>' + total.get(lang) + ': </b>' + (base + ass + p_16) * new_quantity + ' €</th>\n\
                                                                        </tr>\n\
                                                                        </tbody>\n\ ';


            addProductToInputPC();
        }

        if (document.getElementById("btnradio2").checked && document.getElementById("btnradio6").checked && document.getElementById("btnradio7").checked)
        {
            document.getElementById('modal-confirm-pc').innerHTML = '<table class="table table-bordered fs-4">\n\
                                                                        <tbody>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>' + capacity.get(lang) + ': </b>256 GB</th>\n\
                                                                            <td align="center"><b>' + model.get(lang) + ': </b>16"</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>' + assurance.get(lang) + ': </b>Ok</th>\n\
                                                                            <td align="center"><b>' + colorText.get(lang) + ': </b>' + color + '</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>' + quantity.get(lang) + ': </b>' + new_quantity + '</th>\n\
                                                                            <td align="center"><b>' + total.get(lang) + ': </b>' + (base + gb_256 + ass + p_16) * new_quantity + ' €</th>\n\
                                                                        </tr>\n\
                                                                        </tbody>\n\ ';



            addProductToInputPC();
        }

        if (document.getElementById("btnradio3").checked && document.getElementById("btnradio6").checked && document.getElementById("btnradio7").checked)
        {
            document.getElementById('modal-confirm-pc').innerHTML = '<table class="table table-bordered fs-4">\n\
                                                                        <tbody>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>' + capacity.get(lang) + ': </b>512 GB</th>\n\
                                                                            <td align="center"><b>' + model.get(lang) + ': </b>16"</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>' + assurance.get(lang) + ': </b>Ok</th>\n\
                                                                            <td align="center"><b>' + colorText.get(lang) + ': </b>' + color + '</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>' + quantity.get(lang) + ': </b>' + new_quantity + '</th>\n\
                                                                            <td align="center"><b>' + total.get(lang) + ': </b>' + (base + gb_512 + ass + p_16) * new_quantity + ' €</th>\n\
                                                                        </tr>\n\
                                                                        </tbody>\n\ ';

            addProductToInputPC();
        }

        if (document.getElementById("btnradio4").checked && document.getElementById("btnradio6").checked && document.getElementById("btnradio7").checked)
        {
            document.getElementById('modal-confirm-pc').innerHTML = '<table class="table table-bordered fs-4">\n\
                                                                        <tbody>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>' + capacity.get(lang) + ': </b>1 TB</th>\n\
                                                                            <td align="center"><b>' + model.get(lang) + ': </b>16"</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>' + assurance.get(lang) + ': </b>Ok</th>\n\
                                                                            <td align="center"><b>' + colorText.get(lang) + ': </b>' + color + '</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>' + quantity.get(lang) + ': </b>' + new_quantity + '</th>\n\
                                                                            <td align="center"><b>' + total.get(lang) + ': </b>' + (base + tb + ass + p_16) * new_quantity + ' €</th>\n\
                                                                        </tr>\n\
                                                                        </tbody>\n\ ';

            addProductToInputPC();
        }

        //capacità+ass
        if (document.getElementById("btnradio1").checked && document.getElementById("btnradio5").checked && document.getElementById("btnradio7").checked)
        {
            document.getElementById('modal-confirm-pc').innerHTML = '<table class="table table-bordered fs-4">\n\
                                                                        <tbody>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>' + capacity.get(lang) + ': </b>128 GB</th>\n\
                                                                            <td align="center"><b>' + model.get(lang) + ': </b>13"</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>' + assurance.get(lang) + ': </b>Ok</th>\n\
                                                                            <td align="center"><b>' + colorText.get(lang) + ': </b>' + color + '</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>' + quantity.get(lang) + ': </b>' + new_quantity + '</th>\n\
                                                                            <td align="center"><b>' + total.get(lang) + ': </b>' + (base + ass) * new_quantity + ' €</th>\n\
                                                                        </tr>\n\
                                                                        </tbody>\n\ ';

            addProductToInputPC();
        }

        if (document.getElementById("btnradio2").checked && document.getElementById("btnradio5").checked && document.getElementById("btnradio7").checked)
        {
            document.getElementById('modal-confirm-pc').innerHTML = '<table class="table table-bordered fs-4">\n\
                                                                        <tbody>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>' + capacity.get(lang) + ': </b>256 GB</th>\n\
                                                                            <td align="center"><b>' + model.get(lang) + ': </b>13"</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>' + assurance.get(lang) + ': </b>Ok</th>\n\
                                                                            <td align="center"><b>' + colorText.get(lang) + ': </b>' + color + '</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>' + quantity.get(lang) + ': </b>' + new_quantity + '</th>\n\
                                                                            <td align="center"><b>' + total.get(lang) + ': </b>' + (base + gb_256 + ass) * new_quantity + ' €</th>\n\
                                                                        </tr>\n\
                                                                        </tbody>\n\ ';


            addProductToInputPC();
        }

        if (document.getElementById("btnradio3").checked && document.getElementById("btnradio5").checked && document.getElementById("btnradio7").checked)
        {
            document.getElementById('modal-confirm-pc').innerHTML = '<table class="table table-bordered fs-4">\n\
                                                                        <tbody>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>' + capacity.get(lang) + ': </b>512 GB</th>\n\
                                                                            <td align="center"><b>' + model.get(lang) + ': </b>13"</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>' + assurance.get(lang) + ': </b>Ok</th>\n\
                                                                            <td align="center"><b>' + colorText.get(lang) + ': </b>' + color + '</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>' + quantity.get(lang) + ': </b>' + new_quantity + '</th>\n\
                                                                            <td align="center"><b>' + total.get(lang) + ': </b>' + (base + gb_512 + ass) * new_quantity + ' €</th>\n\
                                                                        </tr>\n\
                                                                        </tbody>\n\ ';

            addProductToInputPC();
        }

        if (document.getElementById("btnradio4").checked && document.getElementById("btnradio5").checked && document.getElementById("btnradio7").checked)
        {
            document.getElementById('modal-confirm-pc').innerHTML = '<table class="table table-bordered fs-4">\n\
                                                                        <tbody>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>' + capacity.get(lang) + ': </b>1 TB</th>\n\
                                                                            <td align="center"><b>' + model.get(lang) + ': </b>13"</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>' + assurance.get(lang) + ': </b>Ok</th>\n\
                                                                            <td align="center"><b>' + colorText.get(lang) + ': </b>' + color + '</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>' + quantity.get(lang) + ': </b>' + new_quantity + '</th>\n\
                                                                            <td align="center"><b>' + total.get(lang) + ': </b>' + (base + tb + ass) * new_quantity + ' €</th>\n\
                                                                        </tr>\n\
                                                                        </tbody>\n\ ';


            addProductToInputPC();
        }
    }
    );
}

function addProductToInputPC() {
    var type;
    if (model === 13) {
        type = 13;
    } else {
        type = 16;
    }

    document.getElementById("inputNamePC").value = "pc-" + color.toLowerCase() + "-" + type + "-" + gb + "-a" + assurance;
    document.getElementById("inputPricePC").value = total_price;
    document.getElementById("inputCategoryPC").value = 2;
    document.getElementById("inputCapacityPC").value = gb;
    document.getElementById("inputModelPC").value = model;
    document.getElementById("inputAssurancePC").value = assurance;
    document.getElementById("inputColorPC").value = color;
    document.getElementById("inputQuantityPC").value = document.getElementById("selectQuantityPC").value;
}

// stelle nuovo feedback 
$(function () {
    $("#newFeedbackPC").rateYo({
        maxValue: 5,
        numStars: 5,
        starWidth: "40px",
        rating: "0",
        halfStar: false,

        onInit: function (rating, rateYoInstance) {
            console.log("RateYo initialized! with " + rating);
        },

        onSet: function (rating, rateYoInstance) {
            $("#newScorePC").text(rating + "/5.0");
            document.getElementById("newScoreForm").value = rating;
        },

        onChange: function (rating, rateYoInstance) {

            $("#newScoreForm").value = rating;
        }
    });
});

// stelle feedback totali
$(function () {
    $("#feedbackStarsPC").rateYo({
        maxValue: 5,
        numStars: 5,
        starWidth: "40px",
        halfStar: false,
        readOnly: true
    });
});


$(function () {
    $("#userStarsPC1").rateYo({
        maxValue: 5,
        numStars: 5,
        starWidth: "22px",
        halfStar: false,
        readOnly: true
    });
});

$(function () {
    $("#userStarsPC2").rateYo({
        maxValue: 5,
        numStars: 5,
        starWidth: "22px",
        halfStar: false,
        readOnly: true
    });
});

$(function () {
    $("#userStarsPC3").rateYo({
        maxValue: 5,
        numStars: 5,
        starWidth: "22px",
        halfStar: false,
        readOnly: true
    });
});

$(function () {
    $("#userStarsPC4").rateYo({
        maxValue: 5,
        numStars: 5,
        starWidth: "22px",
        halfStar: false,
        readOnly: true
    });
});

function updateStarsPC(num_stars) {
    //alert(num_stars);

    for ($i = 1; $i <= num_stars; $i++) {
        $(function () {
            $("#userStarsPC" + ($i + 4)).rateYo({
                maxValue: 5,
                numStars: 5,
                starWidth: "22px",
                halfStar: false,
                readOnly: true
            });
        });
    }

}