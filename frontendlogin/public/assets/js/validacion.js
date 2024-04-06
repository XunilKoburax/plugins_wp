window.addEventListener("DOMContentLoaded",function(){
    console.log("Estoy bien");
    let $form = this.document.querySelector("#ValidationForm");

    $form.addEventListener("submit",function(e){
        e.preventDefault();

        let datos = new FormData($form);
        let datosParse = new URLSearchParams(datos);

        fetch("https://localhost:1443/miblog/wp-json/cbt/registro",
                {
                    method: "POST",
                    body: datosParse
                }
            )

        .then(res=>res.json())
        .then(json=>{
            console.log(json)
        })
        .catch(err=>{
            console.log("existe un error: ${err}")
        })
    })
})