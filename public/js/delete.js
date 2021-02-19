

(function(win, doc){
    
    function confirmDelUsers(event){
        event.preventDefault();
        let token = doc.getElementsByName("_token")[0].value;
        if(confirm("Deseja mesmo apagar?")){
            let ajax = new XMLHttpRequest();
            ajax.open("DELETE", event.target.parentNode.href);
            ajax.setRequestHeader("X-CSRF-TOKEN", token);

            ajax.onreadystatechange = function() {
                if(ajax.readyState === 4 && ajax.status === 200){
                    win.location.href = "usuarios";
                }
            }
            
            ajax.send();
        }else {
            return false;
        }
    }

    function confirmDelEmpresa(event){
        event.preventDefault();
        let token = doc.getElementsByName("_token")[0].value;
        
        if(confirm("Deseja mesmo apagar?")){
            let ajax = new XMLHttpRequest();
            ajax.open("DELETE", event.target.parentNode.href);
            ajax.setRequestHeader("X-CSRF-TOKEN", token);
            ajax.onreadystatechange = function() {
                if(ajax.readyState === 4 && ajax.status === 200){
                    win.location.href = "empresas";
                    console.log('entrou aqui')
                }
            }
            
            ajax.send();
        }else {
            return false;
        }
    }

    function confirmDelCategoriaEmpresa(event){
        event.preventDefault();
        let token = doc.getElementsByName("_token")[0].value;
        if(confirm("Deseja mesmo apagar?")){
            let ajax = new XMLHttpRequest();
            ajax.open("DELETE", event.target.parentNode.href);
            ajax.setRequestHeader("X-CSRF-TOKEN", token);

            ajax.onreadystatechange = function() {
                if(ajax.readyState === 4 && ajax.status === 200){
                    win.location.href = "categorias";
                }
            }
            
            ajax.send();
        }else {
            return false;
        }
    }

    function confirmDelCategoriaNoticia(event){
        event.preventDefault();
        let token = doc.getElementsByName("_token")[0].value;
        if(confirm("Deseja mesmo apagar?")){
            let ajax = new XMLHttpRequest();
            ajax.open("DELETE", event.target.parentNode.href);
            ajax.setRequestHeader("X-CSRF-TOKEN", token);

            ajax.onreadystatechange = function() {
                if(ajax.readyState === 4 && ajax.status === 200){
                    win.location.href = "categorias";
                }
            }
            
            ajax.send();
        }else {
            return false;
        }
    }

    function confirmDelPost(event){
        event.preventDefault();
        let token = doc.getElementsByName("_token")[0].value;
        if(confirm("Deseja mesmo apagar?")){
            let ajax = new XMLHttpRequest();
            ajax.open("DELETE", event.target.parentNode.href);
            ajax.setRequestHeader("X-CSRF-TOKEN", token);

            ajax.onreadystatechange = function() {
                if(ajax.readyState === 4 && ajax.status === 200){
                    win.location.href = "noticias";
                }
            }
            
            ajax.send();
        }else {
            return false;
        }
    }

    function confirmDelBanner(event){
        event.preventDefault();
        let token = doc.getElementsByName("_token")[0].value;
        if(confirm("Deseja mesmo apagar?")){
            let ajax = new XMLHttpRequest();
            ajax.open("DELETE", event.target.parentNode.href);
            ajax.setRequestHeader("X-CSRF-TOKEN", token);

            ajax.onreadystatechange = function() {
                if(ajax.readyState === 4 && ajax.status === 200){
                    win.location.href = "banners";
                }
            }
            
            ajax.send();
        }else {
            return false;
        }
    }

    function confirmDelEnquete(event){
        
        event.preventDefault();
        let token = doc.getElementsByName("_token")[0].value;
        if(confirm("Deseja mesmo apagar?")){
            let ajax = new XMLHttpRequest();
            ajax.open("DELETE", event.target.parentNode.href);
            ajax.setRequestHeader("X-CSRF-TOKEN", token);

            ajax.onreadystatechange = function() {
                if(ajax.readyState === 4 && ajax.status === 200){
                    win.location.href = "enquetes";
                }
            }
            
            ajax.send();
        }else {
            return false;
        }
    }
    
    if(doc.querySelector('.js-del-user')){
        let btn = doc.querySelectorAll('.js-del-user')

        for(let i=0; i < btn.length; i++) {
            btn[i].addEventListener('click', confirmDelUsers, false);
        }
    } else if(doc.querySelector('.js-del-emp')){
        console.log("teste")
        let btn = doc.querySelectorAll('.js-del-emp')

        for(let i=0; i < btn.length; i++) {
            btn[i].addEventListener('click', confirmDelEmpresa, false);
        }
    } else if (doc.querySelector('.js-del-emp-cat')){
        let btn = doc.querySelectorAll('.js-del-emp-cat')

        for(let i=0; i < btn.length; i++) {
            btn[i].addEventListener('click', confirmDelCategoriaEmpresa, false);
        }
    } else if (doc.querySelector('.js-del-not-cat')){
        let btn = doc.querySelectorAll('.js-del-not-cat')

        for(let i=0; i < btn.length; i++) {
            btn[i].addEventListener('click', confirmDelCategoriaNoticia, false);
        }
    } else if (doc.querySelector('.js-del-post')){
        let btn = doc.querySelectorAll('.js-del-post')

        for(let i=0; i < btn.length; i++) {
            btn[i].addEventListener('click', confirmDelPost, false);
        }
    } else if (doc.querySelector('.js-del-banner')){
        let btn = doc.querySelectorAll('.js-del-banner')

        for(let i=0; i < btn.length; i++) {
            btn[i].addEventListener('click', confirmDelBanner, false);
        }
    } else if (doc.querySelector('.js-del-enquete')){
        let btn = doc.querySelectorAll('.js-del-enquete')

        for(let i=0; i < btn.length; i++) {
            btn[i].addEventListener('click', confirmDelEnquete, false);
        }
    }
})(window, document)


