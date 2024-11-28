document.addEventListener("DOMContentLoaded", () => {
    const inicioForm = document.getElementById("inicioForm");
    const registerForm = document.getElementById("registerForm");
    const registerResult = document.getElementById("registerResult");
    const loginResult = document.getElementById("loginResult");
    
    const showInicioFormLink = document.getElementById("showInicioFormLink");
    const showRegisterFormLink = document.getElementById("showRegisterFormLink");
    
    showInicioFormLink.addEventListener("click", (e) => {
        e.preventDefault();
        inicioForm.classList.remove("hidden");
        registerForm.classList.add("hidden");
        registerResult.classList.add("hidden");
        loginResult.classList.add("hidden");
    });
    
    showRegisterFormLink.addEventListener("click", (e) => {
        e.preventDefault();
        registerForm.classList.remove("hidden");
        inicioForm.classList.add("hidden");
        registerResult.classList.add("hidden");
        loginResult.classList.add("hidden");
    });


    
  
});






