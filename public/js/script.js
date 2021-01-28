function carregaClasses() {
    defineBannerTop()
    defineBannerBottom()
    defineActiveComercio()
}

function defineBannerTop() {
    var div = document.getElementsByClassName('carousel-app')[0]
    var divMobile = document.getElementsByClassName('carousel-mobile')[0]
    var item = document.getElementsByClassName('carousel-app-item')[0]
    var mobile = document.getElementsByClassName('carousel-mobile-item')[0]


    if(div && div.offsetParent || divMobile && divMobile.offsetParent){
        if (window.screen.width > 500) {
            item.classList.add('active')
        }else {
            mobile.classList.add('active')     
        }
    }

    return
}

function defineBannerBottom() {
    var div = document.getElementsByClassName('bottom-carousel')[0]
    var divMobile = document.getElementsByClassName('bottom-carousel-mobile')[0]

    var bottom = document.getElementsByClassName('bottom-carousel-item')[0]
    var bottomMobile = document.getElementsByClassName('bottom-carousel-mobile-item')[0]
    
    if(div && div.offsetParent || divMobile && divMobile.offsetParent){
        console.log('teste')
        if (window.screen.width > 500) { 
            bottom.classList.add('active')
        }else {
            bottomMobile.classList.add('active')
        }
    }

    return
}

function defineActiveComercio() {
    var el = document.getElementsByClassName('comercio-carousel')[0]

    el.classList.add('active')


    return
}

