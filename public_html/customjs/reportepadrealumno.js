//variables y selectores

const btnViewReport=document.querySelector("#btnViewReport");
const idpadrealumno=document.querySelector("#id_padre_alumno");
const idalumno=document.querySelector("#id_alumno");
const idpadre=document.querySelector("#id_padre");
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
    API.get("reportepadrealumno/getFechasPorPadrealumnos").then(
        data=>{
            if (data.success) {
                console.log(data)
                idpadrealumno.innerHTML="";
                const optionPadrealumnos=document.createElement("option");
                optionPadrealumnos.value="0";
                optionPadrealumnos.textContent="Todos";
                idpadrealumno.append(optionPadrealumnos);
                data.records.forEach(
                    (item,index)=>{
                        const {id_padre_alumno,fecha}=item; 
                        const optionPadrealumnos=document.createElement("option");
                        optionPadrealumnos.value=id_padre_alumno;
                        optionPadrealumnos.textContent=fecha;
                        idpadrealumno.append(optionPadrealumnos);
                    }
                );
            }
            cargarAlumno();
        }
    ).catch(
        error=>{
            console.error("Error:", error);
        }
    );
}

function cargarAlumno() {
    API.get("alumno/getAll").then(
        data=>{
            if (data.success) {
                idalumno.innerHTML="";
                const optionAlumno=document.createElement("option");
                optionAlumno.value="0";
                optionAlumno.textContent="Todos";
                idalumno.append(optionAlumno);
                data.records.forEach(
                    (item,index)=>{
                        const {id_alumno,nombre_completo}=item;
                        const optionAlumno=document.createElement("option");
                        optionAlumno.value=id_alumno;
                        optionAlumno.textContent=nombre_completo;
                        idalumno.append(optionAlumno);
                    }
                );
            }
            cargarPadres();
        }
    ).catch(
        error=>{
            console.error("Error:", error);
        }
    );
}

function cargarPadres() {
    API.get("padre/getAll").then(
        data=>{
            if(data.success) {
                idpadre.innerHTML="";
                const optionPadre=document.createElement("option");
                optionPadre.value="0";
                optionPadre.textContent="Todos";
                idpadre.append(optionPadre);
                data.records.forEach(
                    (item,index)=>{
                        const {id_padre,nombre}=item;
                        const optionPadre=document.createElement("option");
                        optionPadre.value=id_padre;
                        optionPadre.textContent=nombre;
                        idpadre.append(optionPadre);
                    }
                );
            }
        }
    ).catch(
        error=>{
            console.error("Error:",error);
        }
    );
}

function verReporte(){
    switch (filtro.value) {
        case "1":
            frameReporte.src=`${BASE_API}reportepadrealumno/getReporte?id_padre_alumno=${idpadrealumno.value}&id_alumno=${idalumno.value}&id_padre=${idpadre.value}`;
            break;
        case "2":
            frameReporte.src=`${BASE_API}reportepadrealumno/getReporte?mes=${mesfiltro.value}&anio=${aniofiltro.value}&id_alumno=${idalumno.value}&id_padre=${idpadre.value}`;
            break;
        default:
            break;
    }
    
}