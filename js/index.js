$('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
// google map

function initMap() {
  var kampala = {
    lat: 0.3476,
    lng: 32.5825
  };
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 10,
    center: kampala
  });
  var marker = new google.maps.Marker({
    position: kampala,
    map: map
  });
}


//dropdown
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

window.onclick = function (e) {
  if (!e.target.matches('.dropbtn')) {
    var myDropdown = document.getElementById("myDropdown");
    if (myDropdown.classList.contains('show')) {
      myDropdown.classList.remove('show');
    }
  }
}

function upFunction() {
  document.getElementById("myDropup").classList.toggle("show");
}
window.onclick = function (e) {
  if (!e.target.matches('.dropbtn')) {
    var myDropup = document.getElementById("myDropup");
    if (myDropup.classList.contains('show')) {
      myDropup.classList.remove('show');
    }
  }
}
