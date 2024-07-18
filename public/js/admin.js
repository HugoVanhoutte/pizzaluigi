let bookingButton = document.querySelector('#booking-button');
let bookingDiv = document.querySelector('#booking-div');

let newsButton = document.querySelector('#news-button');
let newsDiv = document.querySelector('#news-div');

let notesButton = document.querySelector('#notes-button');
let notesDiv = document.querySelector('#notes-div');

bookingButton.addEventListener('click', (event) => {
    bookingDiv.classList.toggle('hidden');
    bookingButton.classList.toggle('active');

    //Disables other buttons and divs
    newsDiv.classList.add('hidden');
    newsButton.classList.remove('active');
    notesDiv.classList.add('hidden');
    notesButton.classList.remove('active');
})
newsButton.addEventListener('click', (event) => {
    newsDiv.classList.toggle('hidden');
    newsButton.classList.toggle('active');

    //Disables other buttons and divs
    bookingDiv.classList.add('hidden');
    bookingButton.classList.remove('active');

    notesDiv.classList.add('hidden');
    notesButton.classList.remove('active');
})
notesButton.addEventListener('click', (event) => {
    notesDiv.classList.toggle('hidden');
    notesButton.classList.toggle('active');

    //Disables other buttons and divs
    bookingDiv.classList.add('hidden');
    bookingButton.classList.remove('active');

    newsDiv.classList.add('hidden');
    newsButton.classList.remove('active');
})