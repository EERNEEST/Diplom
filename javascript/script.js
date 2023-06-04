let offset = 0; //left
const sliderLine = document.querySelector('.slider-line');
let btnPrev = document.getElementById('slider-prev');
let btnNext = document.getElementById('slider-next');

btnNext.addEventListener('click', function(){
    offset +=276;

    if(offset > 1104){
        offset = 0;
    }
    sliderLine.style.left = -offset + 'px';
});
btnPrev.addEventListener('click', function(){
    offset -=276;

    if(offset < 0){
        offset = 1104;
    }
    sliderLine.style.left = -offset + 'px';
});
