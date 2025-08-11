function connect(formData){
     return fetch('controller/login2.php',{
        method: "post",
        body: formData
    })
.then(response => response.json());
}

function error (response){
    //alert(response.mensagem.join("\n"));
    let divError = document.querySelector("#div-error");
    let message = document.querySelector("#error-message");

    divError.style.display = "block";

    if(Array.isArray(response.mensagem)){
        message.innerHTML = response.mensagem.join("<br>");
    }else{
         message.innerHTML = response.mensagem;
    }
    
}
function sucess (){
    document.location.href = "./";
}

(function() { 
    
    var formLogin = document.querySelector("#form-login");

    formLogin.addEventListener("submit", async function(event){
        event.preventDefault();

        let divError = document.querySelector("#div-error");
        divError.style.display = "none";

        let formData= new FormData(this);
        await connect(formData).then((response) =>{
        if(!response.status){
            console.log(response);
            error(response);
            return;
        }
        sucess();
        });
    });
})();

   /* document.querySelector("#recuperar-senha").addEventListener("click", function(event){
        event.preventDefault();

        console.log("clicou");
    });
})();
*/
