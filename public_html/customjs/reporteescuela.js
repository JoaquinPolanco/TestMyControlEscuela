//variables y selectores

const btnViewReport=document.querySelector("#btnViewReport");
const Schoolselect= document.querySelector("#id_school");
const mesfiltro=document.querySelector("#mes");
const aniofiltro=document.querySelector("#anio");
const frameReporte=document.querySelector("#framereporte");
const filtro=document.querySelector("#filtro");
const API=new Api()

eventListener();

function eventListener(){
    document.addEventListener("DOMContentLoaded", cargarDatos);
    btnViewReport.addEventListener("click", verReporte);
    filtro.addEventListener("change",mostrarFiltro)
}

//Funciones

function mostrarFiltro() {
    switch (filtro.value) {
        case "1":
            document.querySelectorAll(".filtrodia").forEach(item=>item.classList.remove("d-none"));
            document.querySelectorAll(".filtromes").forEach(item=>item.classList.add("d-none"));
            break;
        case "2":
            document.querySelectorAll(".filtrodia").forEach(item=>item.classList.add("d-none"));
            document.querySelectorAll(".filtromes").forEach(item=>item.classList.remove("d-none"));
            break;
        default:
            break;
    }
}

function cargarDatos() {
    API.get("reporteescuela/getFechasPorEscuelas").then(
        data=>{
            if (data.success) {
                console.log(data)
                Schoolselect.innerHTML="";
                const optionEscuela=document.createElement("option");
                optionEscuela.value="0";
                optionEscuela.textContent="Todos";
                Schoolselect.append(optionEscuela);
                data.records.forEach(
                    (item,index)=>{
                        const {id_school,fecha}=item;
                        const optionEscuela=document.createElement("option");
                        optionEscuela.value=id_school;
                        optionEscuela.textContent=fecha;
                        Schoolselect.append(optionEscuela);
                    }
                );
            }
        }
    ).catch(
        error=>{
            console.error("Error:", error);
        }
    );
}

function verReporte(){
    switch (filtro.value) {
        case "1":
            frameReporte.src=`${BASE_API}reporteescuela/getReporte?id_school=${id_school.value}`;
            break;
        case "2":
            frameReporte.src=`${BASE_API}reporteescuela/getReporte?mes=${mesfiltro.value}&anio=${aniofiltro.value}`;
            break;
        default:
            break;
    }
    
}