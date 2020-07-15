var myUser = document.getElementById("user_name");
var mancity = document.getElementById("mancity");

myUser.onfocus = function() {
    document.getElementById("message_2").style.display = "block";
}

myUser.onblur = function() {
    document.getElementById("message_2").style.display = "none";
}

myUser.onkeyup = function() {
var lowerCaseLetters = /[a-z]/g;
  if(myUser.value.match(lowerCaseLetters)) {
    mancity.classList.remove("invalid");
    mancity.classList.add("valid");
  }
  else {
    mancity.classList.remove("valid");
    mancity.classList.add("invalid");
  }

  var upperCaseLetters = /[A-Z]/g;
  if(myUser.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }
}


var myInput = document.getElementById("password");
var length = document.getElementById("length");

myInput.onfocus = function() {
    document.getElementById("message_3").style.display = "block";
}

myInput.onblur = function() {
    document.getElementById("message_3").style.display = "none";
}

myInput.onkeyup = function() {
  if(myInput.value.length >= 6 && myInput.value.length <= 12) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  }
  else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}


var myConfirm = document.getElementById("confirm");
var equal = document.getElementById("equal");

myConfirm.onfocus = function() {
    document.getElementById("message_4").style.display = "block";
}

myConfirm.onblur = function() {
    document.getElementById("message_4").style.display = "none";
}
myConfirm.onkeyup = function() {
  if(myInput.value == myConfirm.value)
  {
    equal.classList.remove("invalid");
    equal.classList.add("valid");
    document.getElementById("button").style.display = "block";
    document.getElementById("button_1").style.display = "none";
  }
  else {
    equal.classList.remove("valid");
    equal.classList.add("invalid");
    document.getElementById("button_1").style.display = "block";
    document.getElementById("button").style.display = "none";
  }
}