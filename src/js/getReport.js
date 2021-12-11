const response = axios.get("/proyecto/api/v1/app/getreport.php");

$_bg = "bg-gray-800 cursor-pointer border-2 border-gray-500 h-auto p-3 rounded-xl mx-0 sm:mx-2 mb-2 overflow-hidden w-full";
$_h2 = "w-full bg-gray-800 px-3 py-1 text-white rounded-lg border-2 border-gray-500";
$_des = "my-4 w-full bg-gray-800 px-3 py-1 text-white rounded-lg border-2 border-gray-500";
$_h3 = "m-0 flex bg-blue-300 text-md px-3 py-1 text-blue-600 rounded-lg border-2 border-blue-500";
$_div = "ml-auto bg-gray-800 px-3 py-1 text-white rounded-lg border-2 border-gray-500";
$_success = "bg-blue-300 w-auto px-3 py-1 text-blue-600 rounded-lg border-2 border-blue-500 ";
$_icon = `<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
<path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
<path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
</svg>`;

response
  .then((result) => {
    console.log(result.data.data.length);

    $cantidad = result.data.data.length;

    i = 0;
    while (i < $cantidad) {

      if(result.data.data[i].isactive == "1"){
        result.data.data[i].isactive = "0";
      }
      
      console.log(result.data.data[i]);

      $reporte = result.data.data[i];

      if (
        $reporte.estatus === "solucionado" ||
        $reporte.estatus === "rechazado"
      ) {
      } else {
        const div = document.createElement("div");
        const h2 = document.createElement("h2");
        const div_des = document.createElement("div");
        const div_mid = document.createElement("div");
        const h3 = document.createElement("h3");
        const span = document.createElement("span");
        const div_low = document.createElement("div");
        const div_status = document.createElement("div");
        const div_danger = document.createElement("div");
        const h4_status = document.createElement("h4");
        const h4_danger = document.createElement("h4");

        div.className = $_bg;
        div.id = $reporte.id;

        (h2.className = $_h2), (h2.innerHTML = $reporte.titulo);

        div_des.className = $_des;
        div_des.innerHTML =
          `<span>Descripcion:</span><hr class="text-gray-500">` +
          $reporte.descripcion;

        div_mid.className = `w-full flex flex-wrap`;
        h3.className = $_h3 + " gap-2";
        h3.innerHTML = $_icon + `` + $reporte.ubicacion;
        span.className = $_div;
        span.innerHTML = $reporte.fecha;
        div_mid.appendChild(h3);
        div_mid.appendChild(span);

        div_low.className = `w-full flex flex-wrap mt-3`;
        div_status.className = $_success;
        div_danger.className = $_div;
        h4_status.innerHTML = `Estado: ` + $reporte.estatus;
        h4_danger.innerHTML = `Peligro: ` + $reporte.peligro + `/10`;
        div_status.appendChild(h4_status);
        div_danger.appendChild(h4_danger);
        div_low.appendChild(div_status);
        div_low.appendChild(div_danger);

        div.appendChild(h2);
        div.appendChild(div_des);
        div.appendChild(div_mid);
        div.appendChild(div_low);

        div.addEventListener('click', () => {
          // location.href = "/proyecto/src/details.php";
          sessionStorage.setItem('dato',div.id);
          goDetail();
        });

        if (document.querySelector("#contenedor-principal")) {
          document.querySelector("#contenedor-principal").appendChild(div);
        }
      }
      i++;
    }
  })
  .catch((err) => {
    console.log(err);
  });

  function goDetail(){
    location.href = "/proyecto/src/details.php"
  }
