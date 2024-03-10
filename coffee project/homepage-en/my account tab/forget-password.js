document.querySelector('.forgetpass-button-js').addEventListener('click',() =>{


  var email = document.querySelector('.forgetpass-email-js').value;
  var verfaction = document.querySelector('.verfaction-input-js').value;
  

  if (email === '')
  {
    alert('Please Fill The Required Information');
  }
  else if (verfaction === '')
  {
    alert('Please Fill The Required Information');
  }
  
  else{
    window.location.replace("/change-password.html");

  }

 
})
