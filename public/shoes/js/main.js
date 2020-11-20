function scrollFunction() {
  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
    document.getElementById("nav-logo-img").style.width = "20%";
  } else {
    document.getElementById("nav-logo-img").style.width = "25%";
  }
};
//owl carousel
$(document).ready(function(){
    //slide header
    $('.owl-one').owlCarousel({
        loop:true,
        nav:false,
        items:1,
        autoplay:true,
        autoplayTimeout:5000,
        autoplaySpeed:1000,
    });
    //product new
    $('.owl-two').owlCarousel({
        loop:true,
        margin:20,
        dots: false,
        nav:true,
        autoplay:true,
        autoplayHoverPause: true,
        autoplayTimeout:2000,
        autoplaySpeed:500,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:4
            }
        }
    });
    //popover
    $('[data-toggle="popover"]').popover({
        html: true,
        content: function() {
            return $('#popover-content').html();
        }
    });
    //flickity
    $('.main-carousel').flickity({
        // options
        cellAlign: 'left',
        contain: true
    });
});

function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "container-fluid") {
        x.className += " responsive";
    } else {
        x.className = "container-fluid";
    }
}
/*cart*/
function incrementCart()
{
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    if(value<10){
        value++;
        document.getElementById('number').value = value;
    }
}
function decrementCart()
{
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    if(value>1){
        value--;
        document.getElementById('number').value = value;
    }

}
