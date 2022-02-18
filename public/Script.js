/* --------------------INTRODUCTION-------------------- */

var i = 0;
function move() {
  if (i == 0) {
    i = 1;
    var width = 1;
    var id = setInterval(frame, 15);
    function frame() {
      if (width >= 100) {
        clearInterval(id);
        i = 0;
        setTimeout(function () {
          document.getElementById("myProgress").style.display = "none";
          document.getElementById("overlay").style.backgroundColor = "rgba(0,0,0,0)";
          // document.getElementById("overlay").style.removeProperty = "backgroundcolor";
          document.getElementById("text").style.opacity = "1";
          document.getElementById("text").style.zIndex = "100";
          document.getElementById("overlay").style.cursor = "pointer";
          document.getElementById("overlay").style.pointerEvents = "all";
        }, 10);
      } else {
        width++;
        document.getElementById("myBar").style.width = width + "%";
      }
    }
  }

  // for (var i = 0; i < 101; i++){
  //   setInterval(document.getElementById("myBar").style.width = i + "%", 10);
  //   // document.getElementById("myBar").style.width = i + "%";
  // }
}

/* --------------------PRESENTATION-------------------- */

var i = 0;
var txt = "Je suis Chandler NGUYEN Élève de Bachelor Informatique à Sophia Ynov Campus"; /* The text */
// var speed = 50;

function typeWriter() {
  if (i < txt.length) {
    if (i == 7) {
      document.getElementById("presentation").innerHTML += "<br>";
    }
    if (i == 23) {
      document.getElementById("presentation").innerHTML += "<br><br>";
    }
    document.getElementById("presentation").innerHTML += txt.charAt(i);
    i++;
    setTimeout(typeWriter, 50);
  }
}

/* --------------------MAIN BURGER-------------------- */

function burger_menu() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

/* --------------------SIDE BURGER-------------------- */

function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("myTopnav").style.height = "0";
}
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("myTopnav").style.height = "70px";
}

/* --------------------SKILLS BAR-------------------- */

// var skill_all = document.getElementById("skills_all");

// var already = 0;

// function skillbar() {
//   // var c = document.getElementById("c");
//   // var web = document.getElementById("web");
//   // var php = document.getElementById("php");

//   if (already == 0){
//     document.getElementById("c").style.width = "95%";
  
//     var skill_cible = document.getElementById("c");
//     var avancement = 0;
//     var number = 95;
//     skillavancement();
  
//     function skillavancement() {
//       skill_cible.innerText = avancement + "%";
//       if (avancement < number) {
//         avancement++;
//         setTimeout(skillavancement, 13);
//       }
//       else {
//         if (number == 95){
//           number = 90;
//           avancement = 0;
//           skill_cible = document.getElementById("web");
//         }
//         else{
//           number = 85;
//           avancement = 0;
//           skill_cible = document.getElementById("php");
//         }
//         // setTimeout(skillavancement, 15);
//       }
//     }
  
//     setTimeout(function () {
//       document.getElementById("web").style.width = "90%";
//       skillavancement();
//     }, 250);
//     setTimeout(function () {
//       document.getElementById("php").style.width = "85%";
//       skillavancement();
//     }, 500);
//   }

// }

/* --------------------TRAVAUX-------------------- */

// function description(i) {
//   document.getElementById("prj_03").style.height = "100%";
// }

// function description_out(i) {
//   document.getElementById("prj_03").style.height = "0%";
// }

/* --------------------MODAL-------------------- */

var modal; // Get the modal
var span = document.getElementsByClassName("close")[0]; // Get the <span> element that closes the modal
var git = document.getElementById("git");

// When the user clicks the button, open the modal 
function img(i) {
  switch (i) {
    case 0: modal = document.getElementById("git");
      modal.style.display = "block"; break;
    case 1: modal = document.getElementById("the_prison");
      modal.style.display = "block"; break;
    case 2: modal = document.getElementById("dessinator");
      modal.style.display = "block"; break;
    case 3: modal = document.getElementById("portfolio_php");
      modal.style.display = "block"; break;
  }
  document.getElementById("scroll").style.overflow = "hidden";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
  modal.style.display = "none";
  document.getElementById("scroll").style.overflow = "visible";
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
    document.getElementById("scroll").style.overflow = "visible";
  }
}
















window.onscroll = function () { scroll_function() };
window.onload = setTimeout(move, 500);

var navbar = document.getElementById("myTopnav");
var sticky = navbar.offsetTop;

var skill_position = document.getElementById("skills_all").offsetTop;

var travaux_width = document.getElementById("Travaux2").offsetWidth;


function scroll_function() {
  if (window.scrollY >= sticky) {   // pageYOffset
    navbar.classList.add("sticky");
    // document.getElementById("my_prog").classList.add("sticky");
  } else {
    navbar.classList.remove("sticky");
    // document.getElementById("my_prog").classList.remove("sticky");
  }
  
  // if (window.scrollY = skill_position) {
  //   skillbar();
  //   already = 1;
  // }

  // if(window.width < travaux_width){
  //   document.getElementById("portfolio_php").classList.add("dis");
  // }


  var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
  var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
  var scrolled = (winScroll / height) * 100;
  document.getElementById("my_prog").style.width = scrolled + "%";
}


function off() {
  document.getElementById("overlay_right").style.width = "0";
  document.getElementById("overlay_left").style.width = "0";
  document.getElementById("text").style.opacity = "0";
  setTimeout(function () {
    document.getElementById("overlay").style.display = "none";
    document.getElementById("scroll").style.overflow = "visible";
    typeWriter();
  }, 1000);
  // setTimeout(function () { document.getElementById("scroll").style.overflow = "visible"; }, 1000);
  // document.getElementById("scroll").style.overflow = "visible";
  // setTimeout(function () { document.getElementsByTagName("body").style.overflow = "visible"; }, 1000);
}