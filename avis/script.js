
/* $('li').on('click', fuction(event){
  $('li').removeClass("o1");*/
    
 
  $('.numero li').on('click', function (event) {
  // j'enleve .o1 a tous
  $('.numero li').removeClass("color");
  // j'ajoute .o1 a la li cliquée
  $(event.currentTarget).addClass('color');
  
  //
  // articles
  //
  
  var indexOnglet = $('.numero li').index(event.currentTarget);
  console.log('indexOnglet', indexOnglet);
  
  $('main').removeClass('active');
  $('main').eq(indexOnglet).addClass('active');
});


$( function() {
    var myIndex = 0;
    carousel();
    function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides2");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        myIndex++;
        if (myIndex > x.length) {
            myIndex = 1
        }
        x[myIndex - 1].style.display = "block";
        setTimeout(carousel, 4000);
    }
  } );

  /*************************fix menu 1****/
  var header = document.getElementById("verlay") ;
    sticky = header.offsetTop ;

  document.addEventListener("scroll",function(){

    if (window.pageYOffset  >= sticky) {
      header.classList.add("sticky")
    } else{
      header.classList.remove('sticky');
    }
  });

$(function(){
  var  duration= 450;
  var  offest= 200;
  $(window).scroll(function(){
    if($(this).scrollTop() > duration){
      $('#header,.reservation').fadeOut(offest);
    }else{
        $('#header,.reservation').fadeIn(offest);
  }
  });
    $('#header,.reservation').click(function(){
      $('body').animate({scroll:1},offest);
    })
});


$('div.togglemenu').on('click', function () {
  $('.INFO').toggle();
});


$('.burger').on('click', function () {
  $('.navmenu').toggle();
});


function myFunction(x) {
  x.classList.toggle("change");
}


$(function () {
    
    $('#contact-form').submit(function(e) {
        e.preventDefault();
        $('.comments').empty();
        var postdata = $('#contact-form').serialize();
        
        $.ajax({
            type: 'POST',
            url: 'php/contact.php',
            data: postdata,
            dataType: 'json',
            success: function(json) {
                 
                if(json.isSuccess) 
                {
                    $('#contact-form').append("<p class='thank-you'>Votre message a bien été envoyé. Merci de m'avoir contacté :)</p>");
                    $('#contact-form')[0].reset();
                }
                else
                {
                    $('#firstname + .comments').html(json.firstnameError);
                    $('#name + .comments').html(json.nameError);
                    $('#email + .comments').html(json.emailError);
                    $('#phone + .comments').html(json.phoneError);
                    $('#message + .comments').html(json.messageError);
                }                
            }
        });
    });

})