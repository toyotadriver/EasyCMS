window.addEventListener('load', function(){
//////////////

const content_af = document.getElementById('article_add_form')

content_af.addEventListener('click', show_add_form)


function show_add_form() {
    if (document.getElementById('form_add_article') == null){
        let xhr = new XMLHttpRequest()
        xhr.open('GET', 'js/article_add_form.html')
        xhr.onload = () => {
            // console.log(xhr.response)
           content_af.innerHTML = xhr.response
        }
        xhr.send()
    }
}

})

/////////////
