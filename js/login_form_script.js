window.addEventListener('load', function(){

const login_form = document.getElementById('login_form')
const login_btn = document.getElementById('login_menu_button')
const menu_line = document.getElementById('menu_line')

const login_btn_r = login_btn.getBoundingClientRect()

console.log('x: ' + login_btn_r.x + ' y: ' + login_btn_r.y)
console.log('right: ' + login_btn_r.right + ' left: ' + login_btn_r.left)

login_btn.onclick = (log_btn_click) => {
    if (login_form.style.display = 'none')
    {
        login_form.style.display = 'inline-block';
        login_form.style.top = login_btn_r.bottom + "px";
        login_form.style.left = login_btn_r.right - 200 + "px";
        console.log('open login form');
        //Здесь можно сделать нормально, но это долго, так как компьютед стайл
    }
}
document.addEventListener('click', (anywhere_click) => {
    console.log(anywhere_click.composedPath())
    let withinBoundaries = anywhere_click.composedPath().includes(login_form);
    let onLoginMenuButton = anywhere_click.composedPath().includes(login_btn);

    if (!withinBoundaries && !onLoginMenuButton) {
        login_form.style.display = 'none'
        console.log('close login form')
    }
})

logout = function()
{
    location.href = "php/logout.php"
}
}
)