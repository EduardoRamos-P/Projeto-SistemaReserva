$(document).ready(function(){
    $("#register-form").on("submit",function(e){
        e.preventDefault();
        $.ajax({
            url: "../controllers/control-registerUser.php", /*local do arquivo php*/
            type:"post", /*define o tipo de metódo usado para a comunicação, nesse caso POST*/
            data: $(this).serialize(), /*Envio do formulário para o php*/

            success: function(response){
                let data = JSON.parse(response);
                console.log(data.message);
                if(data.status == "success"){
                    document.getElementById("ajax-message").style.backgroundColor = "green";
                    document.getElementById("ajax-message").innerText = data.message;
                }else{
                    document.getElementById("ajax-message").style.backgroundColor = "red";
                    document.getElementById("ajax-message").innerText = data.message;
                }
            },
            error: function(xhr,status,error){
                console.log("Erro ajax:",xhr.responseText,status,error);
            }


        })

    })

    $("#login-form").on("submit",function(e){
        e.preventDefault();
        $.ajax({
            url:"../controllers/control-loginUser.php",
            type:"post",
            data:$(this).serialize(),

            success: function(response){
                let data = JSON.parse(response);
                console.log(data.message);
                if(data.status == "success"){
                    document.getElementById("ajax-message").style.backgroundColor = "green";
                    document.getElementById("ajax-message").innerText = data.message;
                    window.location.href = "../views/index.php";
                }else{
                    document.getElementById("ajax-message").style.backgroundColor = "red";
                    document.getElementById("ajax-message").innerText = data.message;
                }
            },
            error: function(xhr,status,error){
                console.log("erro ajax:",xhr.responseText,status,error);
            }
        })
    })

})