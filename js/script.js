$(document).ready(function() {
  var nav = document.getElementById("nav");
  var btn = document.getElementById("sgbtn");
  var cn = document.getElementById("cn");
  var ab = document.getElementById("ab");
  var lg = document.getElementById("lg");
  var ic = document.getElementById("collapseIcon");
  nav.style.background = "white";
  $("#here").waypoint(
    function(direction) {
      if (direction == "down") {
        nav.style.background = "#4842B7";
        cn.style.color = "#fff";
        ab.style.color = "#fff";
        lg.style.color = "#fff";
        ic.style.color = "#fff";
        sgbtn.style.background = "#1c2331";
        sgbtn.style.color = "#fff";
      } else {
        nav.style.background = "white";
        cn.style.color = "#1c2331";
        ab.style.color = "#1c2331";
        ic.style.color = "#1c2331";
        lg.style.color = "#1c2331";
      }
    },
    {
      offset: "130px"
    }
  );
});
