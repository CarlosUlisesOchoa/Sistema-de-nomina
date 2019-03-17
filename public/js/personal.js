$( "#btn-msg" ).click(function() {
    $('#alert-msg').fadeOut(400);
});

function showAlert() {
    $("#alert-msg").addClass("in");
}

window.setTimeout(function () {
    showAlert();
}, 500);

$('[data-toggle="password"]').each(function () { // Mostrar/Ocultar campos de contraseña
    var input = $(this);
    var eye_btn = $(this).parent().find('.input-group-text');
    eye_btn.css('cursor', 'pointer').addClass('input-password-hide');
    eye_btn.on('click', function () {
        if (eye_btn.hasClass('input-password-hide')) {
            eye_btn.removeClass('input-password-hide').addClass('input-password-show');
            eye_btn.find('.fa').removeClass('fa-eye').addClass('fa-eye-slash')
            input.attr('type', 'text');
        } else {
            eye_btn.removeClass('input-password-show').addClass('input-password-hide');
            eye_btn.find('.fa').removeClass('fa-eye-slash').addClass('fa-eye')
            input.attr('type', 'password');
        }
    });
});

$(".name").on("keyup", function(event){
    if($(this).val().length > 0) {
        $(this).val($(this).val().toLowerCase());
        var arr = $(this).val().split(' ');
        var result = '';
        for (var x = 0; x < arr.length; x++) {
            result += arr[x].substring(0, 1).toUpperCase() + arr[x].substring(1).toLowerCase() + ' ';
        }
        $(this).val(result.substring(0, result.length - 1));
    }
});

$(".curp-rfc").on("keyup", function(event){
    if($(this).val().length > 0) {
        $(this).val($(this).val().toUpperCase());
    }
});

function toMoney(amount) {
    let neg = false;
    if(amount < 0) {
        neg = true;
        amount = Math.abs(amount);
    }
    return ( (neg ? "-" : "") + "$ " + amount.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
}

function moneyToVar(moneyStr) {
    return parseFloat(moneyStr.replace("$ ", "").replace(",", ""));
}

$(".cash").click(function () {
    $(this).val(moneyToVar($(this).val()));
});

$(".cash").on("blur", function () {
    if (!$.isNumeric($(this).val()))
        $(this).val('0').trigger('change');

    let neg = false;
    if($(this).val().includes("-")) {
        neg = true;
        $(this).val($(this).val().replace("-", ""));
    }
    $(this).val( (neg ? "-" : "") + "$ " + parseFloat($(this).val(), 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
});


$(".letters-space").on("keydown", function(event){
// Allow controls such as backspace, tab etc.
var arr = [8,9,16,17,20,32,35,36,37,38,39,40,45,46];

// Allow letters
for(var i = 65; i <= 90; i++){
    arr.push(i);
}

// Prevent default if not in array
if(jQuery.inArray(event.which, arr) === -1){
    event.preventDefault();
}
});

$(".letters-space").on("input", function(){
    var regexp = /[^A-Za-z\s]/g;
    if($(this).val().match(regexp)){
        $(this).val( $(this).val().replace(regexp,'') );
    }
});

$(".digits-only").on("keydown", function(event){
// Allow: backspace, delete, tab, escape, enter and .
if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
  // Allow: Ctrl+A,Ctrl+C,Ctrl+V, Command+A
  ((e.keyCode == 65 || e.keyCode == 86 || e.keyCode == 67) && (e.ctrlKey === true || e.metaKey === true)) ||
  // Allow: home, end, left, right, down, up
  (e.keyCode >= 35 && e.keyCode <= 40)) {
  // let it happen, don't do anything
  return;
}
// Ensure that it is a number and stop the keypress
if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
  e.preventDefault();
}
});

$(".digits-only").on("input", function(){
    var regexp = /[^0-9]/g;
    if($(this).val().match(regexp)){
        $(this).val( $(this).val().replace(regexp,'') );
    }
});

$(".alpha-numeric").on("keydown", function(event){
// Allow controls such as backspace, tab etc.
var arr = [8,9,16,17,20,35,36,37,38,39,40,45,46];


// Allow letters & digits
for(var i = 48; i <= 105; i++){
    if(i >= 58 && i <= 64) continue;
    if(i >= 91 && i <= 95) continue;
    arr.push(i);
}

// Prevent default if not in array
if(jQuery.inArray(event.which, arr) === -1){
    event.preventDefault();
}
});

$(".alpha-numeric").on("input", function(){
    var regexp = /[^A-Za-z0-9]/g;
    if($(this).val().match(regexp)){
        $(this).val( $(this).val().replace(regexp,'') );
    }
});

$(".float").on("keydown", function(event){
// Allow: backspace, delete, tab, escape, enter, - and .
if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 109, 110, 189, 190]) !== -1 ||
  // Allow: Ctrl+A,Ctrl+C,Ctrl+V, Command+A
  ((e.keyCode == 65 || e.keyCode == 86 || e.keyCode == 67) && (e.ctrlKey === true || e.metaKey === true)) ||
  // Allow: home, end, left, right, down, up
  (e.keyCode >= 35 && e.keyCode <= 40)) {
  // let it happen, don't do anything
  return;
}
// Ensure that it is a number and stop the keypress
if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
  e.preventDefault();
}
});

$(".float").on("input", function(){
    var regexp = /[^0-9.-]/g;
    if($(this).val().match(regexp)){
        $(this).val( $(this).val().replace(regexp,'') );
    }
});

/***************** SLEEP FUNCTION *************/
const sleep = (milliseconds) => { //Pausa la ejecucion determinado numero de milisegundos
    return new Promise(resolve => setTimeout(resolve, milliseconds))
}
/* Usage:
sleep(500).then(() => {
    Do stuff...
})
***********************************************/