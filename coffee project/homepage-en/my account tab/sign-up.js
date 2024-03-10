
document.querySelector('.input-style-button').addEventListener('click',() =>{


  var fname = document.querySelector('.firstname-js').value;
  var lname = document.querySelector('.lastname-js').value;
  var email = document.querySelector('.input-style-email').value;
  var age = document.querySelector('.input-style-age').value;
  var username = document.querySelector('.input-style-username').value;
  var password = document.querySelector('.input-style-password').value;

  if (fname === '')
  {
    alert('Please Fill The Required Information');
  }
  else if (lname === '')
  {
    alert('Please Fill The Required Information');
  }
  else if (email === '')
  {
    alert('Please Fill The Required Information');
  }
 else if (age === '')
  {
    alert('Please Fill The Required Information');
  }
  else if (username === '')
  {
    alert('Please Fill The Required Information');
  }
  else if (password === '')
  {
    alert('Please Fill The Required Information');
  }

  
  else{
    window.location.replace("/homepage.html");

  }

 
})

