// Get the modal
const modals = [
    document.getElementById("myModal-visit-location"),
    document.getElementById('myModal-first-mod'),
    document.getElementById('myModal-second-mod'),
    document.getElementById('myModal-thurd-mod'),
    document.getElementById('myModal-forth-mod'),
    document.getElementById('myModal-fifth-mod'),
    document.getElementById('myModal-six-mod'),
    document.getElementById('myModal-seven-mod'),
    document.getElementById('myModal-confirmed-mod'),
    document.getElementById('myModal-game-mod'),
    document.getElementById('myModal-secondp-mod'),
];

const buttons = [
    document.querySelector(".visit-location"),
    document.querySelector(".first-mod"),
    document.querySelector(".second-mod"),
    document.querySelector(".thurd-mod"),
    document.querySelector(".forth-mod"),
    document.querySelector(".fifth-mod"),
    document.querySelector(".six-mod"),
    document.querySelector(".seven-mod"),
    document.querySelector(".confirmed-mod"),
]

buttons.forEach(button => {
    button.addEventListener('click', () => {
        const modal = document.querySelector(`#${button.dataset.modalId}`);
        modal.style.display = 'block';
    });
});

// When the user clicks on <span> (x), close the modal
modals.forEach(modal => {
    modal.querySelector('.close').addEventListener('click', () => {
        modal.style.display = 'none';
    });
});