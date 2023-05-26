const deleteButton = document.querySelector('.delete-button');
const confirmationPanel = document.querySelector('.confirmation-panel');
const confirmButton = document.querySelector('.confirm-button');
const cancelButton = document.querySelector('.cancel-button');

deleteButton.addEventListener('click', function() {
  confirmationPanel.style.display = 'block';
});

confirmButton.addEventListener('click', function() {
  // l'action de suppression 
  confirmationPanel.style.display = 'none';
});

cancelButton.addEventListener('click', function() {
  confirmationPanel.style.display = 'none';
});
