// ACCORDION
const accordion = document.querySelectorAll('.accordion')

accordion.forEach(el => {
    el.addEventListener('click', () => {
        el.classList.toggle('active')
    })
})
// vkladki
const tabsButtons = document.querySelectorAll('.tabs__button');

tabsButtons.forEach(btn => {
    btn.addEventListener('click', () => {
        const prevActiveItem = document.querySelector('.tabs__item._active');
        const prevActiveButton = document.querySelector('.tabs__button._active');
        if (prevActiveButton) {
            prevActiveButton.classList.remove('_active');
        }
        if (prevActiveItem) {
            prevActiveItem.classList.remove('_active');
        }
        const nextActiveItemId = `#${btn.getAttribute('data-tab')}`;
        const nextActiveItem = document.querySelector(nextActiveItemId);
        btn.classList.add('_active');
        nextActiveItem.classList.add('_active');
    });
})

// madalka
function example() {
    el = document.getElementById("example");
    el.style.visibility = (el.style.visibility == "visible") ? "hidden" : "visible";
}
// DEFERRED CALL

const timeBlock = document.querySelector('.time-block')
const timeBtn = document.querySelector('.time-button')
const countEl = document.querySelector('.count')

setTimeout(() => {
    countFunc()
}, 2000);

timeBtn.addEventListener('click', (() => {
    countFunc()
}))

function countFunc() {
    timeBlock.classList.add('active')
    let count = 5
    countHtml(count)
    timeBtn.classList.remove('active')
    const countInterval = setInterval(() => {
        count = count - 1
        countHtml(count)

        if (count === 0) {
            clearInterval(countInterval)
            timeBlock.classList.remove('active')
            timeBtn.classList.add('active')
        }

    }, 1000)
}

function countHtml(value) {
    countEl.innerHTML = value
}
// слайдер 
const slides = document.querySelectorAll('.slide');
let currentSlide = 0;

function showSlide(n) {
    slides[currentSlide].classList.remove('active');
    currentSlide = (n + slides.length) % slides.length;
    slides[currentSlide].classList.add('active');
}

document.getElementById('prev').addEventListener('click', () => {
    showSlide(currentSlide - 1);
});

document.getElementById('next').addEventListener('click', () => {
    showSlide(currentSlide + 1);
});

showSlide(currentSlide);


