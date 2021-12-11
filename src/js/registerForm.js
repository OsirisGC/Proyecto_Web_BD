console.log("Register is running");

const $name = document.getElementById("name");
const $lastname1 = document.getElementById("lastname1");
const $lastname2 = document.getElementById("lastname2");
const $email = document.getElementById("email");
const $birth = document.getElementById("birth");
const $password = document.getElementById("password");
const $registerForm = document.getElementById("registerForm");
const $btn = document.getElementById("btn");

$btn.addEventListener("click", () => {
  location.href = "/proyecto/src/login.php";
});

$registerForm.addEventListener("submit", (evt) => {
  evt.preventDefault();

  if (
    !$name.value &&
    !$lastname1.value &&
    !$lastname2.value &&
    !$email.value &&
    !$birth.value &&
    !$password.value
    ) 
  {
      alert("LLene todos los espacios correspondientes")

  } else {
    const data = new FormData();
    data.append("name", $name.value);
    data.append("lastname1", $lastname1.value);
    data.append("lastname2", $lastname2.value);
    data.append("email", $email.value);
    data.append("birth", $birth.value);
    data.append("password", $password.value);

    axios({
      method: "POST",
      url: "/proyecto/api/v1/users/register.php",
      data,
      headers: {
        "Content-Type": "multipart/form-data",
      },
    })
      .then((response) => {
        if (response.status === 200) {
          alert(response.data.message);
        } else {
          alert(response.data.message);
        }
      })
      .catch((error) => {
        if (error.response) {
          console.log(error.response);
          alert(error.response.message);
        }
      });
  }
});
