document.addEventListener("DOMContentLoaded", function() {
    console.log("Soy el validador");
    let form = document.querySelector("#estadisticasForm");

    form.addEventListener("submit", function(event) {
        event.preventDefault();

        let formData = new FormData(form);
        let datosParse = new URLSearchParams(formData);
        let msg = document.querySelector(".msg");

        fetch("https://localhost:1443/miblog/wp-json/cbt/insertarwp", {
            method: "POST",
            body: datosParse,
            
        })
        .then(res=>res.json())
        .then(json=>{
            console.log(json)
            msg.innerHTML = json.message;
            form.reset();
        })
        .catch(err=>{
            console.log("existe un error: ${err}")
        })
    })
})




        
