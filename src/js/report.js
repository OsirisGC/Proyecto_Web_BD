const $title = document.getElementById("title");
const $description = document.getElementById("description");
const $date = document.getElementById("date");
const $location = document.getElementById("location");
const $danger = document.getElementById("danger");
const sendbtn = document.getElementById("sendbtn");

sendbtn.addEventListener("click", (evt) => {
  evt.preventDefault();

  if ($danger.value < 0 || $danger.value > 10) {
    alert("Error - tiene usted un error en el 'Peligro'");
  } else if (
    !$title.value &&
    !$description.value &&
    !$location.value &&
    !$date.value &&
    !$danger.value
  ) {
    alert("Favor de completar el formulario");
  } else {
    const data = new FormData();
    data.append("title", $title.value);
    data.append("description", $description.value);
    data.append("date", $date.value);
    data.append("location", $location.value);
    data.append("danger", $danger.value);

    axios({
      method: "POST",
      url: "/proyecto/api/v1/users/verified/reportar.php",
      data,
      headers: {
        "Content-Type": "multipart/form-data",
      },
    })
      .then((response) => {
        alert(response.message);
      })
      .catch((error) => {
        alert(error.response.message);
      });
  }
});
