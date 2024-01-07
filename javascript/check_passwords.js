const pass_repeat = document.getElementById("repeat");
const pass = document.getElementById("pass");
form = document.getElementById("reg");

pass_repeat.addEventListener("input", check);
pass.addEventListener("input", check);

function check(e)
{
    const wrong = document.getElementById("wrong");

    if(form.password.value == "" || form.password.value == null){
        form.password_repeat.value = "";
        form.password_repeat.disabled = true;
        
        wrong.style.display = 'none';

    } else {
        form.password_repeat.disabled = false;

        if(form.password.value !== form.password_repeat.value){
        wrong.style.display = 'block';
        } else {
            wrong.style.display = 'none';
        }
    }            
}