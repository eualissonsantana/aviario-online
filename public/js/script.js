
if (window.screen.width > 500) {
    function defineActive(){
        document.getElementsByClassName('carousel-item')[0].classList.add('active')
        document.getElementsByClassName('bottom-carousel')[0].classList.add('active')
    }
}else {
    function defineActive(){
        document.getElementsByClassName('carousel-mobile')[0].classList.add('active')
        document.getElementsByClassName('bottom-carousel-mobile')[0].classList.add('active')
    }
}

