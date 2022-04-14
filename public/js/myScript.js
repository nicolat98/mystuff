/* global toastr */

function confirm_product_deletion(element, cart_line_id) {
    $.confirm({
        //icon: '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16"><path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/></svg>',
        title: 'Attention!',
        content: 'You are deleting this product. Are you sure?',
        //type:red,
        //typeAnimated: true,
        //columnClass: 'large',
        buttons: {
            somethingElse: {
                text: 'Confirm',
                btnClass: 'btn-red',
                action: function () {
                    //window.location.href = element.href;
                    removeCartLine(cart_line_id);
                }
            },
            cancel: function () {},

        },

    });
}




function confirm_button(element) {
    let lang = $('body').attr('lang');
    let msg = new Map();
    msg.set('it', 'Vuoi procedere con l\'ordine?');
    msg.set('en', 'Do you want to proceed with the order?');
    let title = new Map();
    title.set('it', 'Attenzione!');
    title.set('en', 'Attention!');
    $.confirm({
        //icon: 'bi bi-exclamation-triangle',
        title: title.get(lang),
        content: msg.get(lang),
        type: 'green',
        typeAnimated: true,
        buttons: {
            somethingElse: {
                text: 'Confirm',
                btnClass: 'btn-green',
                action: function () {
                    window.location.href = element.href;
                }
            },
            cancel: function () {}
        }

    });
}

var previousHidden = -1;
function details_table_order(order_id) {
    //alert($("#"+order_id).attr("id"));
    if (previousHidden === -1) {
        previousHidden = order_id;
    } else {
        document.getElementById(previousHidden).hidden = true;
        previousHidden = order_id;
    }
    document.getElementById(order_id).hidden = false;
}




function removeCartLine(cart_line_id) {
    let lang = $('body').attr('lang');
    let success_msg = new Map();
    success_msg.set('it', 'Articolo rimosso dal carrello.');
    success_msg.set('en', 'Item removed from cart.');

    $.ajax({
        url: '/cart/removeLine',
        type: 'GET',
        data: {
            cart_line_id: cart_line_id
        },
        success: function (data) {
            if (data.done) {
                $('#msg_success_text').html(success_msg.get(lang));
                $('#msg_success').show();
                $('#li' + cart_line_id).remove();

                if (data.num_cart_lines !== 0) {
                    $('#totalPriceCart').html(data.total_price);
                    $('#cartBadge').html(data.num_cart_lines);
                } else {
                    $('#lastRowCart').remove();
                    $('#hiddenCartEmpty').show();
                    $('#cartBadge').remove();
                }

            }
        }
    });
}

function confirm_change_status(element, shipment_id, new_status, old_status, order_id) {
    let lang = $('body').attr('lang');
    let title_msg = new Map();
    title_msg.set('it', 'Attenzione!');
    title_msg.set('en', 'Attention!');
    let content_msg = new Map();
    content_msg.set('it', 'Vuoi davvero cambiare lo stato dell\'ordine?');
    content_msg.set('en', 'Do you really want to change your order status?');
    $.confirm({
        title: title_msg.get(lang),
        content: content_msg.get(lang),
        type: 'orange',
        //typeAnimated: true,
        //columnClass: 'large',
        buttons: {
            somethingElse: {
                text: 'Confirm',
                btnClass: 'btn-orange',
                action: function () {
                    //window.location.href = element.href;
                    //removeCartLine(cart_line_id);
                    changeStatus(shipment_id, new_status, old_status, order_id);
                }
            },
            cancel: function () {},

        },

    });
}

//var i=0;
let old = new Map();
function changeStatus(shipment_id, new_status, old_status, order_id) {
    let lang = $('body').attr('lang');

    let purchased = new Map();
    purchased.set('it', 'Acquistato');
    purchased.set('en', 'Purchased');
    let takingCharge = new Map();
    takingCharge.set('it', 'Preso in carico');
    takingCharge.set('en', 'Taking charge');
    let sent = new Map();
    sent.set('it', 'Spedito');
    sent.set('en', 'Sent');
    let delivered = new Map();
    delivered.set('it', 'Consegnato');
    delivered.set('en', 'Delivered');


    //old.get(order_id);

    if (!old.has(order_id)) {
        old.set(order_id, old_status);
        //i++;
        //console.log(i+"ciao i");
        //console.log("vuoto");
    }

    //console.log(old.get(order_id)+""+order_id+"ciao");

    $.ajax({
        url: '/order/updateOrder',
        type: 'GET',
        data: {
            shipment_id: shipment_id,
            status: new_status
        },
        success: function (data) {
            if (data.done) {
                //alert("fatto");
                $('#selectedItem' + order_id + "s" + old.get(order_id)).attr("id", "selectedItem" + order_id + "s" + new_status);
                if (new_status == 0) {
                    $('#span1' + order_id).html(purchased.get(lang).toUpperCase());
                    $('#span2' + order_id).html(purchased.get(lang).toUpperCase());
                } else if (new_status == 1) {
                    $('#span1' + order_id).html(takingCharge.get(lang).toUpperCase());
                    $('#span2' + order_id).html(takingCharge.get(lang).toUpperCase());
                } else if (new_status == 2) {
                    $('#span1' + order_id).html(sent.get(lang).toUpperCase());
                    $('#span2' + order_id).html(sent.get(lang).toUpperCase());
                } else if (new_status == 3) {
                    $('#span1' + order_id).html(delivered.get(lang).toUpperCase());
                    $('#span2' + order_id).html(delivered.get(lang).toUpperCase());
                }

                old.set(order_id, new_status);
                //old = new_status;

            }
        }
    });
}




function createOrder(id_cart) {
    let lang = $('body').attr('lang');
    let success_msg = new Map();
    success_msg.set('it', 'Ordine effettuato!');
    success_msg.set('en', 'Order placed!');

    $.ajax({
        url: '/cart/order',
        type: 'GET',
        data: {
            id_cart: id_cart
        },
        success: function (data) {
            if (data.done) {
                $('#msg_success_text_order').html(success_msg.get(lang));
                $('#msg_success_order').show();

                $('#lastRowCart').remove();
                $('#hiddenCartEmpty').show();
                $('#cartBadge').remove();
                $('#ulID').remove();

            }
        }
    });
}




function changeIcon(order_id) {

    if ($('#icon' + order_id).attr("xlink:href") === "fonts/bootstrap-icons.svg#plus-lg") {
        $('#icon' + order_id).attr("xlink:href", "fonts/bootstrap-icons.svg#dash-lg");
    } else {
        $('#icon' + order_id).attr("xlink:href", "fonts/bootstrap-icons.svg#plus-lg");
    }
}

function showPurchaseForm() {
    $('#hiddenPurchaseForm').show();
}

function disableButton(element) {
    $('#' + element).attr("disabled", true);

}

function activatePaymentForm() {
    //button
    $('#btnShipment').attr("class", "btn btn-outline-primary btn-circle btn-lg");
    $('#svgArrow2').attr("class", "bi text-primary");
    $('#btnPayment').attr("class", "btn btn-primary btn-circle btn-lg");
    $('#btnPayment').attr("disabled", false);
    $('#textPayment').attr("class", "col-8 fs-4 my-auto text-dark");

    $('#svgArrow3').attr("class", "bi text-secondary");
    $('#btnSummary').attr("class", "btn btn-outline-secondary btn-circle btn-lg");
    $('#btnSummary').attr("disabled", true);
    $('#textSummary').attr("class", "col-8 fs-4 my-auto");

    //form
    $('#shipmentForm').collapse('hide');
    $('#collapseSummaryForm').collapse('hide');

    setTimeout(function () {

        $('#collapsePaymentForm').collapse('show');

    }, 500);
}

function activateShipmentForm() {
    //button
    $('#btnShipment').attr("class", "btn btn-primary btn-circle btn-lg");
    $('#svgArrow2').attr("class", "bi text-secondary");
    $('#btnPayment').attr("class", "btn btn-outline-secondary btn-circle btn-lg");
    $('#btnPayment').attr("disabled", true);
    $('#textPayment').attr("class", "col-8 fs-4 my-auto");

    $('#svgArrow3').attr("class", "bi text-secondary");
    $('#btnSummary').attr("class", "btn btn-outline-secondary btn-circle btn-lg");
    $('#btnSummary').attr("disabled", true);
    $('#textSummary').attr("class", "col-8 fs-4 my-auto");

    //form
    $('#collapsePaymentForm').collapse('hide');
    $('#collapseSummaryForm').collapse('hide');


    setTimeout(function () {

        $('#shipmentForm').collapse('show');

    }, 500);
}

function activateSummaryForm() {
    //button
    $('#btnPayment').attr("class", "btn btn-outline-primary btn-circle btn-lg");
    $('#svgArrow3').attr("class", "bi text-primary");
    $('#btnSummary').attr("class", "btn btn-primary btn-circle btn-lg");
    $('#btnSummary').attr("disabled", false);
    $('#textSummary').attr("class", "col-8 fs-4 my-auto text-dark");


    //form
    $('#collapsePaymentForm').collapse('hide');


    setTimeout(function () {

        $('#collapseSummaryForm').collapse('show');

    }, 500);
}



function checkInputShipment() {

    var regExpWord = new RegExp("^([a-zA-Z]+)[\"']?([a-zA-Z]+)?$", "g");
    var regExpWordNum = new RegExp("^[a-zA-Z]+([0-9]+)$", "g");
    var regExpNum5 = new RegExp("^([0-9]{5})$", "g");
    var regExpNum10 = new RegExp("^([0-9]{10})$", "g");
    var regExp2letters = new RegExp("^([A-Z]{2})$", "g");
    var regExpMail = new RegExp("^(.+@.+\.[a-z]+)$", "g");

    var name = $('#nameInput').val().trim();
    var surname = $('#surnameInput').val().trim();
    var street = $('#streetInput').val().trim().replace(/ /g, '');
    var city = $('#cityInput').val().trim().replace(/ /g, '');
    var cap = $('#capInput').val().trim();
    var province = $('#provinceInput').val().trim().toUpperCase();
    var country = $('#countryInput').val().trim().replace(/ /g, '');
    var mail = $('#mailInput').val().trim();
    var cellNumber = $('#cellNumberInput').val().trim();


    //alert(street);
    var allCorrect = true;
    if (!name.match(regExpWord)) {
        $('#nameInput').attr("class", "form-control is-invalid");
        allCorrect = false;
    } else {
        $('#nameInput').attr("class", "form-control is-valid");
    }

    if (!surname.match(regExpWord)) {
        $('#surnameInput').attr("class", "form-control is-invalid");
        allCorrect = false;
    } else {
        $('#surnameInput').attr("class", "form-control is-valid");
    }

    if (!street.match(regExpWordNum)) {
        $('#streetInput').attr("class", "form-control is-invalid");
        allCorrect = false;
    } else {
        $('#streetInput').attr("class", "form-control is-valid");
    }

    if (!city.match(regExpWord)) {
        $('#cityInput').attr("class", "form-control is-invalid");
        allCorrect = false;
    } else {
        $('#cityInput').attr("class", "form-control is-valid");
    }

    if (!cap.match(regExpNum5)) {
        $('#capInput').attr("class", "form-control is-invalid");
        allCorrect = false;
    } else {
        $('#capInput').attr("class", "form-control is-valid");
    }

    if (!province.match(regExp2letters)) {
        $('#provinceInput').attr("class", "form-control is-invalid");
        allCorrect = false;
    } else {
        $('#provinceInput').attr("class", "form-control is-valid");
    }

    if (!country.match(regExpWord)) {
        $('#countryInput').attr("class", "form-control is-invalid");
        allCorrect = false;
    } else {
        $('#countryInput').attr("class", "form-control is-valid");
    }

    if (!mail.match(regExpMail)) {
        $('#mailInput').attr("class", "form-control is-invalid");
        allCorrect = false;
    } else {
        $('#mailInput').attr("class", "form-control is-valid");
    }

    if (!cellNumber.match(regExpNum10)) {
        $('#cellNumberInput').attr("class", "form-control is-invalid");
        allCorrect = false;
    } else {
        $('#cellNumberInput').attr("class", "form-control is-valid");
    }


    //MODIFICARE
    if (allCorrect) {
        document.getElementById("shipmentSpinner").hidden = false;
        document.getElementById("shipmentBtnText").hidden = true;
        setTimeout(function () {

            document.getElementById("nameInputPay").value = $('#nameInput').val();
            document.getElementById("surnameInputPay").value = $('#surnameInput').val();
            activatePaymentForm();

            document.getElementById("shipmentSpinner").hidden = true;
            document.getElementById("shipmentBtnText").hidden = false;

        }, 1000);
    }
}

function checkInputPurchase() {
    var namePay = $('#nameInputPay').val().trim();
    var surnamePay = $('#surnameInputPay').val().trim();
    var cardNumber = $('#cardNumberInput').val().trim().replace(/ /g, '');
    var expiration = $('#expirationInput').val().trim().replace(/ /g, '');
    var cvv = $('#cvvInput').val().trim();

    var regExpWord = new RegExp("^([a-zA-Z]+)[\"']?([a-zA-Z]+)?$", "g");
    var regExpWordNum = new RegExp("^[a-zA-Z]+([0-9]+)$", "g");
    var regExpNum16 = new RegExp("^([0-9]{16})$", "g");
    var regExpMMYY = new RegExp("^((01|02|03|04|05|06|07|08|09|10|11|12)/[0-9]{2})$", "g");
    var regExpNum3 = new RegExp("^([0-9]{3})$", "g");

    var allCorrect = true;
    if (!namePay.match(regExpWord)) {
        $('#nameInputPay').attr("class", "form-control is-invalid");
        allCorrect = false;
    } else {
        $('#nameInputPay').attr("class", "form-control is-valid");
    }

    if (!surnamePay.match(regExpWord)) {
        $('#surnameInputPay').attr("class", "form-control is-invalid");
        allCorrect = false;
    } else {
        $('#surnameInputPay').attr("class", "form-control is-valid");
    }

    if (!cardNumber.match(regExpNum16)) {
        $('#cardNumberInput').attr("class", "form-control is-invalid");
        allCorrect = false;
    } else {
        $('#cardNumberInput').attr("class", "form-control is-valid");
    }

    if (!expiration.match(regExpMMYY)) {
        $('#expirationInput').attr("class", "form-control is-invalid");
        allCorrect = false;
    } else {
        $('#expirationInput').attr("class", "form-control is-valid");
    }

    if (!cvv.match(regExpNum3)) {
        $('#cvvInput').attr("class", "form-control is-invalid");
        allCorrect = false;
    } else {
        $('#cvvInput').attr("class", "form-control is-valid");
    }

    //MODIFICARE
    if (allCorrect) {
        $('#msg_valid_card').hide();
        $('#msg_not_valid_card').hide();
        document.getElementById("purchaseSpinner").hidden = false;
        document.getElementById("purchaseBtnText").hidden = true;

        checkPaymentCardInfo(cardNumber, expiration, cvv);
    }
}

function checkPaymentCardInfo(cardNumber, expiration, cvv) {
    let lang = $('body').attr('lang');
    let success_msg = new Map();
    success_msg.set('it', 'La carta è valida!');
    success_msg.set('en', 'The card is valid!');
    let error_msg = new Map();
    error_msg.set('it', 'La carta non è valida...');
    error_msg.set('en', 'The card is not valid...');

    //alert("ok");
    $.ajax({
        url: '/payment/check',
        type: 'GET',
        data: {
            cardNumber: cardNumber,
            expiration: expiration,
            cvv: cvv
        },
        success: function (data) {
            //alert("ok");
            if (data.done) {
                //alert(data.cardNumber);
                //alert("ok");
                setTimeout(function () {

                    activateSummaryForm();

                    $('#msg_valid_card_text').html(success_msg.get(lang));
                    $('#msg_valid_card').show();

                    document.getElementById("purchaseSpinner").hidden = true;
                    document.getElementById("purchaseBtnText").hidden = false;

                }, 1000);

            } else {
                //alert("not ok");
                $('#msg_not_valid_card_text').html(error_msg.get(lang));
                $('#msg_not_valid_card').show();
                document.getElementById("purchaseSpinner").hidden = true;
                document.getElementById("purchaseBtnText").hidden = false;
            }
        }
    });
}



function confirmOrder() {
    //alert("ciao");
    //$('#svgBoxConfirmOrder').hidden = true;
    document.getElementById("svgBoxConfirmOrder").hidden = true;
    document.getElementById("textAskConfirmOrder").hidden = true;
    document.getElementById("textLoading").hidden = false;
    document.getElementById("spinnerConfirmOrder").hidden = false;
    document.getElementById("modalFooter").hidden = true;
    /*
     setTimeout(function () {
     document.getElementById("svgBoxConfirmOrder").hidden = true;
     document.getElementById("spinnerConfirmOrder").hidden = false;
     }, 500);*/

    setTimeout(function () {
        document.getElementById("spinnerConfirmOrder").hidden = true;
        document.getElementById("textLoading").hidden = true;
        document.getElementById("textOrderConfirmed").hidden = false;
        document.getElementById("svgCheckConfirmOrder").hidden = false;
    }, 1500);

    setTimeout(function () {
        $('#orderInfoForm').submit();
    }, 1500);
}



function confirmFeedback() {
    document.getElementById("feedbackBodyToHide").hidden = true;
    document.getElementById("feedbackHeaderToHide").hidden = true;
    document.getElementById("textLoadingFeedback").hidden = false;
    document.getElementById("spinnerConfirmFeedback").hidden = false;
    document.getElementById("textAreaToHide").hidden = true;
    document.getElementById("feedbackFooter").hidden = true;

    setTimeout(function () {
        document.getElementById("spinnerConfirmFeedback").hidden = true;
        document.getElementById("textLoadingFeedback").hidden = true;
        document.getElementById("textFeedbackConfirmed").hidden = false;
        document.getElementById("svgCheckConfirmFeedback").hidden = false;
    }, 1500);


    setTimeout(function () {
        $('#feedbackForm').submit();
    }, 1500);
}


// stelle nuovo feedback
$(function () {
    $("#newFeedback").rateYo({
        maxValue: 5,
        numStars: 5,
        starWidth: "40px",
        rating: "0",
        halfStar: false,

        onInit: function (rating, rateYoInstance) {
            //console.log("RateYo initialized! with " + rating);
        },

        onSet: function (rating, rateYoInstance) {
            $("#newScoreFeedback").text("(" + rating + "/5.0)");
            document.getElementById("newScoreForm").value = rating;
        },

        onChange: function (rating, rateYoInstance) {

            $("#newScoreForm").value = rating;
            //document.getElementById("newScoreForm").value = rating;
        }
    });
});

function changeCategoryID(id) {
    document.getElementById("idCategoryForm").value = id;
}


//Get the button
var mybutton = document.getElementById("btnToTop");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
    scrollFunction()
};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
    } else {
        mybutton.style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}


function statusSelection() {
    var status = $('#inputGroupSelectStatus').find('option').filter(':selected').val();
    console.log(status);
    if (status == 0) {
        document.querySelectorAll('[id^="selectedItem"]').forEach(function (x) {
            x.hidden = false;
        });
    }
    if (status == 1) {
        document.querySelectorAll('[id^="selectedItem"]').forEach(function (x) {
            x.hidden = true;
        });
        /*
         document.querySelectorAll('[id^="collapse"]').forEach(function (x) {
         x.collapse('hide');
         });*/

        document.querySelectorAll('[id^="selectedItem"][id$="s0"]').forEach(function (x) {
            x.hidden = false;
        });
    }
    if (status == 2) {
        document.querySelectorAll('[id^="selectedItem"]').forEach(function (x) {
            x.hidden = true;
        });
        document.querySelectorAll('[id^="selectedItem"][id$="s1"]').forEach(function (x) {
            x.hidden = false;
        });
    }
    if (status == 3) {
        document.querySelectorAll('[id^="selectedItem"]').forEach(function (x) {
            x.hidden = true;
        });
        document.querySelectorAll('[id^="selectedItem"][id$="s2"]').forEach(function (x) {
            x.hidden = false;
        });
    }
    if (status == 4) {
        document.querySelectorAll('[id^="selectedItem"]').forEach(function (x) {
            x.hidden = true;
        });
        document.querySelectorAll('[id^="selectedItem"][id$="s3"]').forEach(function (x) {
            x.hidden = false;
        });
    }
    
}




