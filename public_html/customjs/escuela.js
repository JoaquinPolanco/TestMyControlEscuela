//Variables globales y selectores
const btnNew=document.querySelector("#btnAgregar");
const panelDatos=document.querySelector("#contentList");
const panelForm=document.querySelector("#contentForm");
const btnCancelar=document.querySelector("#btnCancelar");
const formEscuela=document.querySelector("#formEscuela");
const tableContent=document.querySelector("#contentTable table tbody");
const searchText=document.querySelector("#txtSearch");
const pagination=document.querySelector(".pagination");
const divFoto=document.querySelector("#divfoto");
const inputFoto=document.querySelector("#foto");
const API=new Api();
const objDatos={
    records:[],
    recordsFilter:[],
    currentPage:1,
    recordsShow:10,
    filter:""
}

//Configuracion de eventos
eventListiners();

function eventListiners() {
    btnNew.addEventListener("click",agregarEscuela);
    btnCancelar.addEventListener("click",cancelarEscuela);
    //console.log("Antes de cargar");
    document.addEventListener("DOMContentLoaded",cargarDatos);
    //console.log("Despues de cargar");
    searchText.addEventListener("input",aplicarFiltro);
    formEscuela.addEventListener("submit",guardarEscuela);
    divFoto.addEventListener("click",agregarFoto);
    inputFoto.addEventListener("change",actualizarFoto);

}

//Funciones

function actualizarFoto(el) {
    if (el.target.files && el.target.files[0]) {
        const reader=new FileReader();
        reader.onload=e=>{
            divFoto.innerHTML=`<img src="${e.target.result}" class="h-100 w-100" style="object-fit:contain;">`;
        }
        reader.readAsDataURL(el.target.files[0]);
    }
}

function agregarFoto() {
    inputFoto.click();
}

function guardarEscuela(event) {
    event.preventDefault();
    const formData=new FormData(formEscuela);
    //console.log(formData);
    API.post(formData,"escuela/save").then(
        data=>{
            //console.log(data.msg);
            if (data.success) {
                cancelarEscuela();
                Swal.fire({
                    icon:"info",
                    text:data.msg
                });
            } else {
                Swal.fire({
                    icon:"error",
                    title:"Error",
                    text:data.msg
                });
            }
        }
    ).catch(
        error=> {
            console.log("Error:",error);
        }
    );
}

function cargarDatos() {
    API.get("escuela/getAll").then(
        data=>{
            //console.log(data.records);
            if (data.success) {
                objDatos.records=data.records;
                objDatos.currentPage=1;
                crearTabla();
                cargarUsuarios();
            } else {
                console.log("Error al recuperar los registros");
            }
        }
    ).catch(
        error=>{
            console.error("Error en la llamada:",error);
        }
    );
}

function cargarUsuarios() {
    API.get("usuarios/getAll").then(
        data=>{
            if(data.success) {
                const txtUsuario=document.querySelector("#id_usr");
                txtUsuario.innerHTML="";
                data.records.forEach(
                    (item,index)=>{
                        const {id_usr,nombres}=item;
                        const optionUsuario=document.createElement("option");
                        optionUsuario.value=id_usr;
                        optionUsuario.textContent=nombres;
                        txtUsuario.append(optionUsuario);
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


function crearPaginacion() {
    //Borrar elementos
    pagination.innerHTML="";
    //Boton Anterior
    const elAnterior=document.createElement("li");
    elAnterior.classList.add("page-item");
    elAnterior.innerHTML=`<a class="page-link" href="#">Previous</a>`;
    elAnterior.onclick=()=>{
        objDatos.currentPage=(objDatos.currentPage==1 ? 1 : --objDatos.currentPage);
        crearTabla();
    }
    pagination.append(elAnterior);
    //Agregando los numeros de pagina
    const totalPage=Math.ceil(objDatos.recordsFilter.length/objDatos.recordsShow);
    for (let i=1; i<=totalPage;i++) {
        const el=document.createElement("li");
        el.classList.add("page-item");
        el.innerHTML=`<a class="page-link" href="#">${i}</a>`;
        el.onclick=()=> {
            objDatos.currentPage=i;
            crearTabla();
        }
        pagination.append(el);
    }
    //Boton siguiente
    const elSiguiente=document.createElement("li");
    elSiguiente.classList.add("page-item");
    elSiguiente.innerHTML=`<a class="page-link" href="#">Next</a>`;
    elSiguiente.onclick=()=>{
        objDatos.currentPage=(objDatos.currentPage==totalPage ? totalPage : ++objDatos.currentPage);
        crearTabla();
    }
    pagination.append(elSiguiente);
}

function crearTabla() {
    if (objDatos.filter==""){
        objDatos.recordsFilter=objDatos.records.map(item=>item);
    } else {
        objDatos.recordsFilter=objDatos.records.filter(
            item=>{
                const {nombre, direccion, email, latitud, longitud, fecha, nombres}=item;
                if (nombre.toUpperCase().search(objDatos.filter.toLocaleUpperCase())!=-1){
                    return item;
                }
                if (direccion.toUpperCase().search(objDatos.filter.toLocaleUpperCase())!=-1){
                    return item;
                }
                if (email.toUpperCase().search(objDatos.filter.toLocaleUpperCase())!=-1){
                    return item;
                }
                if (latitud.toUpperCase().search(objDatos.filter.toLocaleUpperCase())!=-1){
                    return item;   
                }
                if (longitud.toUpperCase().search(objDatos.filter.toLocaleUpperCase())!=-1){
                    return item;
                }
                if (fecha.toUpperCase().search(objDatos.filter.toLocaleUpperCase())!=-1){
                    return item;
                }
                if (nombres.toUpperCase().search(objDatos.filter.toLocaleUpperCase())!=-1){
                    return item;
                }
                             
            }
        );
    }

    const recordIni=(objDatos.currentPage*objDatos.recordsShow)-objDatos.recordsShow;
    const recordFin=(recordIni+objDatos.recordsShow)-1;

    let html="";
    objDatos.recordsFilter.forEach(
        (item,index)=>{
            if ((index>=recordIni) && (index<=recordFin)){                    
                html+=`
                    <tr>
                    <td>${item.id_school}</td>
                    <td><a href="escuelamapa?id_school=${item.id_school}">${item.nombre}</a></td>
                    <td>${item.direccion}</td>
                    <td>${item.email}</td>
                    <td>${item.latitud}</td>
                    <td>${item.longitud}</td>
                    <td>${item.fecha}</td>
                    <td>${item.nombres}</td>
                    <td>
                        <button type="button" class="btn btn-dark btncolor" onclick="editarEscuela(${item.id_school})"><i class="bi bi-pencil-square"></i></button>
                        <button type="button" class="btn btn-danger btncolor" onclick="eliminarEscuela(${item.id_school})"><i class="bi bi-trash"></i></button>
                    </td>
                    </tr>                
                `;
            }
        }
    );
    //console.log(html);
    tableContent.innerHTML=html;
    crearPaginacion(); 
}

function editarEscuela(id) {
    limpiarForm(1);
    panelDatos.classList.add("d-none");
    panelForm.classList.remove("d-none");
    API.get("escuela/getOneEscuela?id="+id).then(
        data=>{
            if (data.success) {
                mostrarDatosForm(data.records[0]);
                // Obtener las coordenadas del registro y actualizar el marcador en el mapa
                const { latitud, longitud } = data.records[0];
                actualizarMarcadorMapa(parseFloat(latitud), parseFloat(longitud));
            } else {
                Swal.fire({
                    icon:"error",
                    title:"Error",
                    text:data.msg
                });
            }
        }
    ).catch(
        error=>{
            console.error("Error:",error);
        }
    );
}


function eliminarEscuela(id) {
    Swal.fire({
        title:"¿Ésta seguro de eliminar el registro?",
        showDenyButton:true,
        confirmButtonText:"Si",
        denyButtonText:"No"
    }).then(
        resultado=>{
            console.log(resultado.isConfirmed);
            if (resultado.isConfirmed) {
                API.get("escuela/deleteEscuela?id="+id).then(
                    data=>{
                        if (data.success) {
                            cancelarEscuela();
                            Swal.fire({
                                icon:"info",
                                text:data.msg
                            });
                        } else {
                            Swal.fire({
                                icon:"error",
                                title:"Error",
                                text:data.msg
                            });
                        }
                    }
                ).catch(
                    error=>{
                        console.log("Error:",error);
                    }
                );
            }
        }       
    );
    console.log("Mensaje de texto");
}

function agregarEscuela() {
    panelDatos.classList.add("d-none");
    panelForm.classList.remove("d-none");
    limpiarForm();
}

function limpiarForm(op) {
    formEscuela.reset();
    document.querySelector("#id_school").value="0";
    divFoto.innerHTML="";
}

function cancelarEscuela() {
    panelDatos.classList.remove("d-none");
    panelForm.classList.add("d-none");
    cargarDatos();
}

function aplicarFiltro(element) {
    element.preventDefault();
    objDatos.filter=this.value;
    crearTabla();
}

function mostrarDatosForm(record) {
    const {id_school, nombre, direccion, email, latitud, longitud, fecha, id_usr, foto}=record;
    document.querySelector("#id_school").value=id_school;
    document.querySelector("#nombre").value=nombre;
    document.querySelector("#direccion").value=direccion;
    document.querySelector("#email").value=email;
    document.querySelector("#latitud").value=latitud;
    document.querySelector("#longitud").value=longitud;
    document.querySelector("#fecha").value=fecha;
    document.querySelector("#id_usr").value=id_usr;
    divFoto.innerHTML=`<img src="${foto}" class="h-100 w-100" style="object-fit:contain;">`;

    // Actualizar la posición del marcador en el mapa
    actualizarMarcadorMapa(parseFloat(latitud), parseFloat(longitud));
}

function actualizarMarcadorMapa(latitud, longitud) {
    // Asegúrate de que el mapa y el marcador estén inicializados
    if (mapa && marcador) {
        // Actualiza la posición del marcador
        var nuevaPosicion = new google.maps.LatLng(latitud, longitud);
        marcador.setPosition(nuevaPosicion);

        // Centra el mapa en la nueva posición del marcador
        mapa.setCenter(nuevaPosicion);
    }
}
