console.log('Login is running');

const $email = document.getElementById('email');
const $password = document.getElementById('password');
const $loginForm = document.getElementById('loginForm');
const $btn = document.getElementById('btn');

$btn.addEventListener('click',()=>{
    location.href = "/proyecto/src/register.php";
});

$loginForm.addEventListener('submit',(event)=>{
    event.preventDefault();
    const data = new FormData();
    data.append("email", $email.value);
    data.append("password", $password.value);
    
    axios({
        method: 'POST',
        url: '/proyecto/api/v1/Users/login.php',
        data,
        headers: {
            "Content-Type": "multipart/form-data",
        },
    }).then((response) => {
        if(response.status === 200){
            location.href = "/proyecto/src/index.php";
        }else{
            alert(response.data)
        }
    }).catch((error) => {
        if(error.response){
            console.log(error.response)
            alert(error.response.data.message);
        }
    })
});

