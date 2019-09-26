//Validacion formulario de inicio de sesion
function login_admin(){
    var usuario;
    var contraseña;

    usuario = $('#nombre_usuario').val();
    contraseña = $('#password').val();

    if(usuario == "" || contraseña == "" ){
        alert('Necesitas llenar todos los campos.');
        document.getElementById("nombre_usuario").focus();
        return 0;
    }
    
    else{
        document.getElementById("forma_login").submit();
        
    }
}

// validacion del formulario agregar libro

function agregar(){
    var tit;
    var anio;
    var autor;
    var isbn;
    var copias;
    var pais;
    var edit;
    var edi;

    tit = $('#title').val();
    anio = $('#year').val();
    autor = $('#autor').val();
    isbn = $('#isbn').val();
    pais = $('#pais').val();
    copias = $('#copias').val();
    edit = $('#edit').val();
    ed = $('#ed').val();

    if(tit == "" && anio == "" && autor == "" && isbn == "" && pais == "" && copias == "" && edit == "" && ed == ""){
        alert('Ingrese los datos del libro');
        document.getElementById("autor").focus(); 
        return 0;  
    }
    if( autor == ""){
        alert('Ingrese el autor del libro');
        document.getElementById("autor").focus(); 
        return 0;
    }
    if(tit == ""){
        alert('Ingrese el titulo del libro'); 
        document.getElementById("title").focus(); 
        return 0;  
    }
    if( ed == ""){
        alert('Ingrese a que edicion pertenece el libro');
        document.getElementById("ed").focus(); 
        return 0;
    }
    if( edit == ""){
        alert('Ingrese el nombre de la editorial del libro');
        document.getElementById("edit").focus(); 
        return 0;
    }
    if( anio == ""){
        alert('Ingrese el año de publicacion');
        document.getElementById("year").focus(); 
        return 0;
    }
    
     if( pais == ""){
        alert('Ingrese el pais de origen del libro');
        document.getElementById("pais").focus(); 
        return 0;
    }

    if( isbn == ""){
        alert('Ingrese el ISBN del libro');
        document.getElementById("isbn").focus(); 
        return 0;
    }

     if( copias == ""){
        alert('Ingrese el numero de copias disponible. Recuerde que debe ser un valor mayor o igual a 1');
        document.getElementById("copias").focus(); 
        return 0;     
    }
    
        document.getElementById("add").submit();  
}

//Funcion que valida el campo de busqueda
function buscar_libro(){
    var bus;
    bus = $('#query').val();

    if(bus == ""){
        alert('Ingrese datos de busqueda');
        document.getElementById("query").focus();
        return 0;
    }
    else{
        document.getElementById("search").submit();
    } 

}

function del(){

    var eliminar = window.confirm("¿Desea eliminar ese libro?")

    if(eliminar){
        alert('Libro eliminado');
    }
    
}

function save(){
    var guardar = window.confirm("¿Esta seguro de guardar los cambios?")
    if(guardar){
        alert("Cambios guardados");
        return 0;
    }  
}

function cancel(){
    var cancel = window.confirm("¿Desea cancelar?")
    if(cancel){
        alert("Cambios cancelados");
        return 0;
    }  
}
//Validaciones de los datos de un prestamo
function prestamo_libro(){
    var id_al;
    var nom;
    var pat;
    var titulo;
    var correo;
    var f_prestamo;
    //var curr = new Date();
    

    id_al = $("#id_alumno").val();
    nom = $("#name_st").val();
    pat = $("#ap_pat").val();
    correo = $("#correo").val();
    titulo = $("#title_pres").val();
    f_prestamo = $("#fecha").val();

    //f_prestamo = new Date(f_prestamo);

    if(id_al == "" && nom == "" && pat == "" && correo == "" && titulo == "" && f_prestamo== ""){
        alert("Ingrese datos del prestamo");
        document.getElementById("id_alumno").focus();
        return 0;
    }
    if(id_al == ""){
        alert("Ingrese el ID del alumno");
        document.getElementById("id_alumno").focus();
        return 0;
    }
    if(nom == ""){
        alert("Ingrese el nombre del alumno");
        document.getElementById("name_st").focus();
        return 0;
    }
    if(pat == ""){
        alert("Ingrese el apellido paterno del alumno");
        document.getElementById("ap_pat").focus();
        return 0;
    }

    if(correo == ""){
        alert("Ingrese el correo del alumno");
        document.getElementById("correo").focus();
        return 0;
    }
    else{
        var contador = 0;
        var contador2 = 0;
        for(i=1;i<correo.length; i++){
            if(correo.charAt(i-1) == "@"){
                contador++;
            }
            if(contador == 1){
                if(correo.charAt(i-1) == "."){
                    contador2++;
                }
            }
        }
        if(contador == 1 && contador2 == 2 || contador == 1){
        }else{
            alert("Ingrese un correo que sea valido");
            document.getElementById("correo").focus();
            return 0;
        }
         
    }
    
    if(titulo == ""){
        alert("Ingrese el titulo del libro que será prestado");
        document.getElementById("title_pres").focus();
        return 0;
    }
    

    if(f_prestamo == ""){
        alert("Ingrese la fecha del prestamo");
        document.getElementById("fecha").focus();
        return 0;
    }

    document.getElementById("prestamo").submit();

}

//funcion para validar la fecha de devolucion de un libro

function devolucion_pres(){
    var f_devolucion;

    f_devolucion = $('#fecha').val();

    if(f_devolucion == ""){
        alert("Ingrese la fecha del prestamo");
        document.getElementById('fecha').focus();
        return 0;
    }
    
        document.getElementById('devolver').submit();
}