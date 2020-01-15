function lagXHRobjekt() {
  var XHRobjekt = null;
  
  try {
    ajaxRequest = new XMLHttpRequest(); // Firefox, Opera, ...
  } catch(err1) {
    try {
      ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP"); // Noen IE v.
    } catch(err2) {
      try {
          ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP"); // Noen IE v.
      } catch(err3) {
        ajaxRequest = false;
      }
    }
  }
  return ajaxRequest;
}


function menu_updatesort_size(jsonstring) {

  mittXHRobjekt = lagXHRobjekt();

  if (mittXHRobjekt) {
    mittXHRobjekt.onreadystatechange = function() { 
      if(ajaxRequest.readyState == 4){
        var ajaxDisplay = document.getElementById('sortDBfeedback');
        // ajaxDisplay.innerHTML = ajaxRequest.responseText;
      } else {
        // Uncomment this an refer it to a image if you want the loading gif
        // document.getElementById('sortDBfeedback').innerHTML = "<img style='height:11px;' src='images/ajax-loader.gif' alt='ajax-loader' />";
      }
    }
   
    ajaxRequest.open("GET", "new_product_rang_size.php?jsonstring_size=" + jsonstring + "&rand=" + Math.random()*9999, true);
    ajaxRequest.send(null); 
  }
}

//
// function menu_updatesort(jsonstring1) {
//
//   mittXHRobjekt = lagXHRobjekt();
//
//   if (mittXHRobjekt) {
//     mittXHRobjekt.onreadystatechange = function() {
//       if(ajaxRequest.readyState == 4){
//         var ajaxDisplay = document.getElementById('sortDBfeedback');
//         // ajaxDisplay.innerHTML = ajaxRequest.responseText;
//       } else {
//         // Uncomment this an refer it to a image if you want the loading gif
//         // document.getElementById('sortDBfeedback').innerHTML = "<img style='height:11px;' src='images/ajax-loader.gif' alt='ajax-loader' />";
//       }
//     }
//
//     ajaxRequest.open("GET", "new_product_rang_size.php?jsonstring1=" + jsonstring1 + "&rand=" + Math.random()*9999, true);
//     ajaxRequest.send(null);
//   }
// }
