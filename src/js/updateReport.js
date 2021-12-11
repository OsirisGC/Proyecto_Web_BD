const $updateReport = document.getElementById("updateReport");
const $id_report = document.getElementById("id_report");
const $tipo_reporte = document.getElementById("tipo_reporte");

$updateReport.addEventListener("submit", (event) => {
    event.preventDefault();

    const data = new FormData();
    data.append("id_report",$id_report.value);
    data.append("tipo_reporte",$tipo_reporte.value);

    axios({
        method: "POST",
        url: '/proyecto/api/v1/Users/admin/updateReport.php',
        data,
        headers: { 'Content-Type': 'multipart/form-data',},
    }).then((response) => {
        alert(response.data.message);
    }).catch((error) =>{
        alert(error.response.data.message);
    });
});