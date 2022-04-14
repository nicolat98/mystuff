var colorWA = "Black";
var priceWA = 399.99;
//var gb = 128;
//var model = 13;
//var assurance = 0;
var quantity = 1;
//var deleteId;

function changeImageWA(newImg) {
    document.getElementById("wa-img").src = newImg;

    if (newImg === "img/watches/wa-black.png") {
        colorWA = "Black";
    } else if (newImg === "img/watches/wa-blue.png") {
        colorWA = "Blue";
    } else if (newImg === "img/watches/wa-red.png") {
        colorWA = "Red";
    } else {
        colorWA = "White";
    }
}

function changeModalBodyTextWA() {

    var new_quantity = document.getElementById("selectQuantityWA").value;
    let lang = $('body').attr('lang');
    let quantity = new Map();
    quantity.set('it', 'Quantità');
    quantity.set('en', 'Quantity');
    let color = new Map();
    color.set('it', 'Colore');
    color.set('en', 'Color');
    let total = new Map();
    total.set('it', 'Totale');
    total.set('en', 'Total');

    $(document).ready(function ()
    {


        document.getElementById('modal-confirm-wa').innerHTML = '<table class="table table-bordered fs-4">\n\
                                                                        <tbody>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>' + color.get(lang) + ': </b>' + colorWA + '</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>' + quantity.get(lang) + ': </b>' + new_quantity + '</th>\n\
                                                                        </tr>\n\
                                                                        <tr>\n\
                                                                            <td align="center"><b>' + total.get(lang) + ': </b>' + priceWA * new_quantity + ' € </th>\n\
                                                                        </tr>\n\
                                                                        </tbody>\n\ ';
        addProductToInputWA();

    }
    );
}

function addProductToInputWA() {
    document.getElementById("inputNameWA").value = "wa-" + colorWA.toLowerCase();
    document.getElementById("inputPriceWA").value = priceWA;
    document.getElementById("inputCategoryWA").value = 3;
    document.getElementById("inputCapacityWA").value = 0;
    document.getElementById("inputModelWA").value = 0;
    document.getElementById("inputAssuranceWA").value = 0;
    document.getElementById("inputColorWA").value = colorWA;
    document.getElementById("inputQuantityWA").value = document.getElementById("selectQuantityWA").value;
}

// stelle nuovo feedback 
$(function () {
    $("#newFeedbackWA").rateYo({
        maxValue: 5,
        numStars: 5,
        starWidth: "40px",
        rating: "0",
        halfStar: false,

        onInit: function (rating, rateYoInstance) {
            console.log("RateYo initialized! with " + rating);
        },

        onSet: function (rating, rateYoInstance) {
            $("#newScoreWA").text(rating + "/5.0");
            document.getElementById("newScoreForm").value = rating;
        },

        onChange: function (rating, rateYoInstance) {

            $("#newScoreForm").value = rating;
        }
    });
});

// stelle feedback totali
$(function () {
    $("#feedbackStarsWA").rateYo({
        maxValue: 5,
        numStars: 5,
        starWidth: "40px",
        halfStar: false,
        readOnly: true
    });
});


$(function () {
    $("#userStarsWA1").rateYo({
        maxValue: 5,
        numStars: 5,
        starWidth: "22px",
        halfStar: false,
        readOnly: true
    });
});

$(function () {
    $("#userStarsWA2").rateYo({
        maxValue: 5,
        numStars: 5,
        starWidth: "22px",
        halfStar: false,
        readOnly: true
    });
});

$(function () {
    $("#userStarsWA3").rateYo({
        maxValue: 5,
        numStars: 5,
        starWidth: "22px",
        halfStar: false,
        readOnly: true
    });
});

$(function () {
    $("#userStarsWA4").rateYo({
        maxValue: 5,
        numStars: 5,
        starWidth: "22px",
        halfStar: false,
        readOnly: true
    });
});


function updateStarsWA(num_stars) {
    //alert(num_stars);

    for ($i = 1; $i <= num_stars; $i++) {
        $(function () {
            $("#userStarsWA" + ($i + 4)).rateYo({
                maxValue: 5,
                numStars: 5,
                starWidth: "22px",
                halfStar: false,
                readOnly: true
            });
        });
    }

}