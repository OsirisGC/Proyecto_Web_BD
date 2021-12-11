const res = axios.get("/proyecto/api/v1/app/getreport.php");
const id = sessionStorage.dato;

res
  .then((result) => {
    console.log(result.data.data.length);

    i=0;
    while(i < result.data.data.length) {
        $reporte = result.data.data[i];
        if(result.data.data[i].id === id){
            document.getElementById("__titulo").innerHTML = $reporte.titulo;
            document.getElementById("__desc").innerHTML = $reporte.descripcion;
            document.getElementById("__ubi").innerHTML = $reporte.ubicacion;
            document.getElementById("__date").innerHTML = $reporte.fecha;
            document.getElementById("__status").innerHTML = `Estado: ` + $reporte.estatus;
            document.getElementById("__danger").innerHTML = `Peligro: ` + $reporte.peligro;
        }

        i++;
    }

  })
  .catch((err) => {
    console.error(err);
  });
