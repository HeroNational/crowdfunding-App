//mobile navigation

if ($('#nav-menu-container').length) {
    var $mobile_nav = $('#nav-menu-container').clone().prop({
      id: 'mobile-nav'
    });

    $mobile_nav.find('> ul').attr({
      'class': '',
      'id': ''
    });
        

    $('body').append($mobile_nav);
    $('body').prepend('<button type="button" id="mobile-nav-toggle"><i class="lnr lnr-menu"  onclick="closemodalcon()" style="color:rgb(96, 221, 12);"></i></button>');
    $('body').append('<div id="mobile-body-overly" s></div>');
    $('#mobile-nav').find('.menu-has-children').prepend('<i class="lnr lnr-chevron-down"></i>');
    $('.menu-has-children i').nextAll('ul').eq(0).slideToggle();
    $('.menu-has-children i').nextAll('ul').eq(1).slideToggle();


    $(document).on('click', '.menu-has-children i', function(e) {
      $(this).next().toggleClass('menu-item-active');
      $(this).nextAll('ul').eq(0).slideToggle();
      $(this).toggleClass("lnr-chevron-down lnr-chevron-up");
    });
    $(document).on('click', '#mobile-nav-toggle', function(e) {
      $('body').toggleClass('mobile-nav-active');
      $('#mobile-nav-toggle i').toggleClass('lnr-cross lnr-menu');
      $('#mobile-body-overly').toggle();
    });

    $(document).click(function(e) {
      var container = $("#mobile-nav, #mobile-nav-toggle");
      if (!container.is(e.target) && container.has(e.target).length === 0) {
        if ($('body').hasClass('mobile-nav-active')) {
          $('body').removeClass('mobile-nav-active');
          $('#mobile-nav-toggle i').toggleClass('lnr-cross lnr-menu');
          $('#mobile-body-overly').fadeOut();
          $("span.lnr").hide();
        }
      }
    });
} else if ($("#mobile-nav, #mobile-nav-toggle").length) {
    $("#mobile-nav, #mobile-nav-toggle").hide();
    $("span.lnr").show();
}

//Scrolling blacker menu
function onScroll() {
  if($(window).scrollTop() < 250){
    $(".header-lg").css("position","absolute");
    $(".header-lg").css("background","transparent");
  }else{
      $(".header-lg").css("background","#000000df");
      $(".header-lg").css("position","fixed");
  }
}
window.addEventListener('scroll', onScroll, false);

// Initialisation de la libraire d'animation wow js
new WOW().init();

//loader et connexion invisible
function load(){
    var a= document.getElementById("loaderPri");
     var b=document.getElementById("connectm");
     var c=document.getElementById("loginm");
    a.style.display="none";
    b.style.visibility="hidden";
    c.style.visibility="hidden";
    /* 
    
      function GetCookie(name) {
        var startIndex = document.cookie.indexOf(name);
        if (startIndex != -1) {
            return unescape(document.cookie.substring(startIndex+name.length+1, endIndex));
        }
        else {
            return null;
        }
      }
      var cook= GetCookie("pays");
      if(cook != null){
        $("#cookiesBar").hide();
      }
    */
   
  function GetCookie(name) {
    var startIndex = document.cookie.indexOf(name);
    if (startIndex != -1) {
        returntrue;
    }
    else {
        return false;
    }
  }
  var cook= GetCookie("pays");
  if(cook == false){
    $("#cookiesBar").hide();
  }

}


  // modal
function modalcon(){
  var a=document.getElementById("connectm");
 a.style.visibility="visible";
}

function closemodalcon(){
  var a=document.getElementById("connectm");
 a.style.visibility="hidden";
}

function modallog(){
  var a=document.getElementById("loginm");
 a.style.visibility="visible";
}

function closemodallog(){
  var a=document.getElementById("loginm");
 a.style.visibility="hidden";
}


//Messenger

function openmessenger(){
  var a= document.getElementById("messenger");
  var b= document.getElementById("searchCont");
  a.style.visibility="visible";
  b.style.visibility="visible";
}

function closemessenger(){
  var b= document.getElementById("searchCont");
  var a= document.getElementById("messenger");
  a.style.visibility="hidden";
  b.style.visibility="hidden";
}


//Barre de choix cookies

function okCookies(){
  var a=document.getElementById("cookiesBar");
  a.style.visibility="hidden";
  function setCookies(name,value,days){
    var expire= new Date();
    expire.setTime(expire.getTime()+ (24*60*60*10) * days);
    document.cookie=name + "=" +trim(escape(value)) + "; expires=" +expire.toGMTString();
  }

  setCookies("pays", "Cameroun", 5);
}
function noCookies(){
  var a=document.getElementById("cookiesBar");
  a.style.visibility="hidden";
}


//button liker for blog

var b=1;
function liker(){
  var at= document.getElementById("thumbLiker");
  
  if(b==1){
    at.style.color="gray";
    at.style.background="lightgray";
    b=0;
  }else{
    at.style.color="white";
    at.style.background="rgb(250, 138, 14)";
    b=1;
  }

}

var tb=1;
function likero(){
  var att= document.getElementById("thumbLikero");
  
  if(tb==1){
    att.style.color="gray";
    att.style.background="lightgray";
    tb=0;
  }else{
    att.style.color="white";
    att.style.background="rgb(250, 138, 14)";
    tb=1;
  }

}

var ttb=1;
function likerd(){
  var attt= document.getElementById("thumbLikerd");
  
  if(ttb==1){
    attt.style.color="gray";
    attt.style.background="lightgray";
    ttb=0;
  }else{
    attt.style.color="white";
    attt.style.background="rgb(250, 138, 14)";
    ttb=1;
  }

}
