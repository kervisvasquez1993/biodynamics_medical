
var boton=document.getElementById("icono"),enlaces=document.getElementById("enlaces"),contador=0,render=document.getElementById("render"),single=document.getElementById("single");if(boton.addEventListener("click",function(){0==contador?(enlaces.className="enlaces dos",contador=1):(enlaces.classList.remove("dos"),enlaces.className="enlaces uno",contador=0)}),window.addEventListener("resize",function(){screen.width>980&&(enlaces.classList.remove("dos"),enlaces.className="enlaces uno",contador=0)}),single){var icono_footer=document.getElementById("menos"),icono_footer2=document.getElementById("menos2"),icono_footer3=document.getElementById("menos3"),icono_footer4=document.getElementById("menos4"),click_toggle=document.getElementById("click_toggle"),click_toggle2=document.getElementById("click_toggle2"),click_toggle3=document.getElementById("click_toggle3"),click_toggle4=document.getElementById("click_toggle4"),contador_toggle=0,contador_toggle2=0,contador_toggle3=0,contador_toggle4=0;click_toggle.addEventListener("click",function(){0==contador_toggle?(icono_footer.classList.remove("fa-plus"),icono_footer.classList.add("fa-minus"),contador_toggle=1):(icono_footer.classList.remove("fa-minus"),icono_footer.classList.add("fa-plus"),contador_toggle=0)}),click_toggle2.addEventListener("click",function(){0==contador_toggle2?(icono_footer2.classList.remove("fa-plus"),icono_footer2.classList.add("fa-minus"),contador_toggle2=1):(icono_footer2.classList.remove("fa-minus"),icono_footer2.classList.add("fa-plus"),contador_toggle2=0)}),click_toggle3.addEventListener("click",function(){0==contador_toggle3?(icono_footer3.classList.remove("fa-plus"),icono_footer3.classList.add("fa-minus"),contador_toggle3=1):(icono_footer3.classList.remove("fa-minus"),icono_footer3.classList.add("fa-plus"),contador_toggle3=0)}),click_toggle4.addEventListener("click",function(){0==contador_toggle4?(icono_footer4.classList.remove("fa-plus"),icono_footer4.classList.add("fa-minus"),contador_toggle4=1):(icono_footer4.classList.remove("fa-minus"),icono_footer4.classList.add("fa-plus"),contador_toggle4=0)})}var stickymenu=document.getElementById("menu-auto"),stickymenuoffset=stickymenu.offsetTop;window.addEventListener("scroll",function(t){requestAnimationFrame(function(){window.pageYOffset>stickymenuoffset?stickymenu.classList.add("stickymenu"):stickymenu.classList.remove("stickymenu")})});


let filtro = document.querySelector('.filtr-container')
if(filtro)
{
window.filterizr = new window.Filterizr('.filtr-container', {
    controlsSelector: '.fltr-controls',
    gutterPixels: 15,
    spinner: {
      enabled: true,
    },
  });

}