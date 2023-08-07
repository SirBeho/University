
// Obtener referencias a elementos del DOM
const boton = document.getElementById("control-menu"); // Botón para controlar el menú
const cuadro = document.getElementById("cuadro"); // Cuadro principal
const targetDiv = document.getElementById("menu"); // Menú desplegable
const modal_password = document.getElementById('passwordForm');
/* const password = document.getElementById("edit_password"); // Cambiar Contraseña */


document.getElementById('toggle').addEventListener('click', function() {
    console.log("hola")
    document.getElementById('slidebar').classList.toggle('toggle'); 
    document.getElementById('slidebar').classList.toggle('w-60'); 
    document.getElementById('slidebar').classList.toggle('w-14'); 

  });

// Agregar un evento de click al botón para mostrar/ocultar el menú desplegable
boton.addEventListener('click', function () {
    boton.querySelector('div').classList.toggle('rotate-180')
    targetDiv.classList.toggle("h-0"); 
    targetDiv.classList.toggle("h-36"); 
    targetDiv.classList.toggle("opacity-0"); 
});

// Agregar un evento al cuadro principal para ocultar el menú cuando se pasa el mouse sobre él
cuadro.addEventListener('mouseover', function () {
    targetDiv.classList.add("opacity-0"); 
    targetDiv.classList.add("h-0"); 
    targetDiv.classList.remove("h-36"); 
});

modal_password.addEventListener('submit', function(event) {
    const btn_modal = document.getElementById('btn_modal');
    event.preventDefault(); // Evita que el formulario se envíe automáticamente

    const password1 = modal_password.password1.value;
    const password2 = modal_password.password2.value;

    if (password1 !== password2) {
        // Las contraseñas no coinciden, muestra un mensaje de error
         if (!document.getElementById('msj')) {
            const errorMessage = document.createElement('p');
            errorMessage.id = 'msj';
            errorMessage.className = 'text-red-500 w-full text-center absolute mb-[2.3rem] transform duration-500 ease-in-out bottom-8';
            errorMessage.textContent = 'Las contraseñas no coinciden. Por favor, inténtelo nuevamente.';
            btn_modal.appendChild(errorMessage);
        }   

        Msj();

    } else {
        // Las contraseñas coinciden, puedes enviar el formulario
        this.submit();
    }
});


  

   
   