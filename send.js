const form = document.getElementById('contact-form');
const nameInput = document.getElementById('name');
const numberInput = document.getElementById('number');
const messageInput = document.getElementById('message');

form.addEventListener('submit', function(event) {
  event.preventDefault(); 

  const xhr = new XMLHttpRequest();
  xhr.open('POST', 'sendmail.php'); 


  const formData = new FormData();
  formData.append('name', nameInput.value);
  formData.append('number', numberInput.value);
  formData.append('message', messageInput.value);


  xhr.send(formData);

  xhr.onload = function() {
    if (xhr.status === 200) {
      alert('Заявка отправлена, скоро с вами свяжемся.');
      form.reset(); 
    } else {
      alert('Ошибка отправки: ' + xhr.statusText);
    }
  };
});
xhr.open('POST', './sendmail.php'); 

