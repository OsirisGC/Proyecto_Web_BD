const logoutBtn = document.getElementById("btn");
logoutBtn.addEventListener("click", () => {
    axios({
        method: 'GET',
        url: '/proyecto/api/v1/users/logout.php',
    }).then((response) => {
        if(response.status === 200){
            location.href="/proyecto/src/login.php";
        }else{
            alert(response.data.message);
        }
    }).catch((error) => {
        if(error.response){
            alert(error.response.message);
        }
    });
});
