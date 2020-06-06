
$.ajax({
    url: "http://worldtimeapi.org/api/timezone/Europe/Warsaw.txt",
    method: "get",
    success: function(response) {  console.log("Dane otrzymane: ", response); }
}).done(function(data){
    $('#time').append(JSON.stringify(data))
});



var $arrow = $("#arrow a");

var $arrowDown = $("#arrowDown a");


$("#arrow").on("click", function () {
    $("body, html").animate({
        scrollTop: $("main").offset().top
    }, 1000);
});

$("#arrowDown").on("click", function () {
    $("body, html").animate({
        scrollTop: -$("main").offset().top
    }, 1000);
});


const hamburger =document.querySelector('.hamburger');
const nav = document.querySelector('.navigation');

const handleClick = () => {
    hamburger.classList.toggle('hamburger--active');
    nav.classList.toggle('navigation--active');
}

hamburger.addEventListener('click', handleClick);

function validateForm() {
    var fname = document.forms["formoid"]["name"].value;
    var lname = document.forms["formoid"]["name2"].value;
    var message = document.forms["formoid"]["message"].value;
    if (fname == "" || lname =="" || message=="") {
        alert("All Fields must be filled out");
        return false;
    }
}






