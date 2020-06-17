window.onload = function(){
    window.setInterval(function(){
         var now = new Date();
          var clock = document.getElementById("main_clock");
        clock.innerHTML = now.toLocaleTimeString();
    }, 1000);
   };
