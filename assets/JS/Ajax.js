$(document).ready(function(){
    
    /*Ajax para o formulário de cadastro */
    $("#register-form").on("submit",function(e){
        e.preventDefault();
        let btn = $("#register-btn");
        btn.prop("disabled",true);
        $("#load-register").toggleClass("spinner-border spinner-border-sm");
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
                    btn.prop("disabled",false);
                    $("#load-register").toggleClass("spinner-border spinner-border-sm");
                }else{
                    document.getElementById("ajax-message").style.backgroundColor = "red";
                    document.getElementById("ajax-message").innerText = data.message;
                    btn.prop("disabled",false);
                    $("#load-register").toggleClass("spinner-border spinner-border-sm");
                }
            },
            error: function(xhr,status,error){
                console.log("Erro ajax:",xhr.responseText,status,error);
            }


        })

    })
    /*---------------------------------------------------------------------- */

    /*Ajax para o formulário de login */
    $("#login-form").on("submit",function(e){
        e.preventDefault();
        let btn = $("#login-btn");
        btn.prop("disabled",true);
        $("#load-login").toggleClass("spinner-border spinner-border-sm");
        $.ajax({
            url:"../controllers/control-loginUser.php",
            type:"post",
            data:$(this).serialize(),

            success: function(response){
                console.log(response);
                let data = JSON.parse(response);
                console.log(data.message);
                if(data.status == "success"){
                    document.getElementById("ajax-message").style.backgroundColor = "green";
                    document.getElementById("ajax-message").innerText = data.message;
                    if(data.user_type == "Client"){
                        window.location.href = "../views/index.php";
                        btn.prop("disabled",false);
                        $("#load-login").toggleClass("spinner-border spinner-border-sm");
                    }else if(data.user_type == "Admin"){
                        window.location.href = "../views/index_adm.php";
                        btn.prop("disabled",false);
                        $("#load-login").toggleClass("spinner-border spinner-border-sm");
                    }
                }else{
                    document.getElementById("ajax-message").style.backgroundColor = "red";
                    document.getElementById("ajax-message").innerText = data.message;
                    btn.prop("disabled",false);
                    $("#load-login").toggleClass("spinner-border spinner-border-sm");
                }
            },
            error: function(xhr,status,error){
                console.log("erro ajax:",xhr.responseText,status,error);
            }
        })
    })
    /*---------------------------------------------------------------------- */

    /*Ajax para o formulário de cadastro feito pelo ADM*/
    $("#registerForm-adm").on("submit",function(e){
        e.preventDefault();
        let btn = $("#registerBtn-adm");
        btn.prop("disabled",true);
        $("#load-register").toggleClass("spinner-border spinner-border-sm");

        $.ajax({
            url: "../controllers/control-registerAdm.php", /*local do arquivo php*/
            type:"post", /*define o tipo de metódo usado para a comunicação, nesse caso POST*/
            data: $(this).serialize(), /*Envio do formulário para o php*/

            success: function(response){
                let data = JSON.parse(response);
                console.log(data.message);
                if(data.status == "success"){
                    document.getElementById("ajax-message").style.backgroundColor = "green";
                    document.getElementById("ajax-message").innerText = data.message;
                    btn.prop("disabled",false);
                    $("#load-register").toggleClass("spinner-border spinner-border-sm");
                }else{
                    document.getElementById("ajax-message").style.backgroundColor = "red";
                    document.getElementById("ajax-message").innerText = data.message;
                    btn.prop("disabled",false);
                    $("#load-register").toggleClass("spinner-border spinner-border-sm");
                }
            },
            error: function(xhr,status,error){
                console.log("Erro ajax:",xhr.responseText,status,error);
            }


        })

    })
    /*---------------------------------------------------------------------- */


})