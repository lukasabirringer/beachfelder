//PASSWORD CHECK
var myInput = document.querySelector('.input__field--password');
var letter = document.getElementById('letter');
var capital = document.getElementById('capital');
var number = document.getElementById('number');
var length = document.getElementById('length');
var pwdstrength = document.getElementById('pwchecker');


// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) { 
    letter.classList.remove('password-strength--invalid');
    letter.classList.add('password-strength--valid');
  } else {
    letter.classList.remove('password-strength--valid');
    letter.classList.add('password-strength--invalid');
}

  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) { 
    capital.classList.remove('password-strength--invalid');
    capital.classList.add('password-strength--valid');
  } else {
    capital.classList.remove('password-strength--valid');
    capital.classList.add('password-strength--invalid');
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) { 
    number.classList.remove('password-strength--invalid');
    number.classList.add('password-strength--valid');
  } else {
    number.classList.remove('password-strength--valid');
    number.classList.add('password-strength--invalid');
  }

  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove('password-strength--invalid');
    length.classList.add('password-strength--valid');
  } else {
    length.classList.remove('password-strength--valid');
    length.classList.add('password-strength--invalid');
  }
}