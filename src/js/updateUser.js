const $form = document.getElementById("updateUser");
const $id_user = document.getElementById("id_user");
const $tipo_cuenta = document.getElementById("tipo_cuenta");

$form.addEventListener("submit", (event) => {
    event.preventDefault();

    const data = new FormData();
    data.append("id_user",$id_user.value);
    data.append("tipo_cuenta",$tipo_cuenta.value);

    axios({
        method: "POST",
        url: '/proyecto/api/v1/Users/admin/updateUser.php',
        data,
        headers: { 'Content-Type': 'multipart/form-data',},
    }).then((response) => {
        alert(response.data.message);
    }).catch((error) =>{
        alert(error.response.data.message);
    });
});
