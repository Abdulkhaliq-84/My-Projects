document.querySelector('.changepass-button-js').addEventListener('click',() =>{


  var pass1 = document.querySelector('.newpass-js').value;
  var pass2 = document.querySelector('.repass-js').value;
  

  if (pass1 === '')
  {
    alert('Please Fill The Required Information');
  }
  else if (pass2 === '')
  {
    alert('Please Fill The Required Information');
  }
  else if(pass1 != pass2)
  {
      alert('The passwords you enterd does not match!!!');
  }
  
  else{
    window.location.replace("/homepage.html");

  }

 
})
