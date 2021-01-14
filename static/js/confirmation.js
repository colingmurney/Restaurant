const dateObj = new Date();
dateObj.setMinutes(dateObj.getMinutes() + 30);

function formatReadyTime(date) {
  var hours = date.getHours();
  var minutes = date.getMinutes();
  var ampm = hours >= 12 ? "PM" : "AM";
  hours = hours % 12;
  hours = hours ? hours : 12; // the hour '0' should be '12'
  minutes = minutes < 10 ? "0" + minutes : minutes;
  var strTime = hours + ":" + minutes + " " + ampm;
  return strTime;
}

const currentTime = formatReadyTime(dateObj);

const currentText = document.querySelector("#ready-time");
currentText.innerHTML += currentTime;
