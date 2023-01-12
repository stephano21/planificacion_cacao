import {alert_login, input_only_numbers,alerts } from "./login.js";
$(function(){
    $("#login").submit((e) => {
        let user=$("#user").val() ;
        let password=$("#password").val() ;
        if (user==''|| password==''){
            console.log('vavio')
        }else{
            $.ajax({
                url:"php/scripts/login.php",
                type:"POST",
                data:{user,password},
                success: function(response){
                    if (response==1){
                        window.location="home";
                    }else{
                        alert_login(response)
                    }
                }
            })
        }
        e.preventDefault();
    });

    $("#user").keyup(function(e){
        input_only_numbers('user')
    });

    $("#id").keyup(function(e){
        input_only_numbers('id')
    });

    $("#create_account").submit((e) => {
        let id=$("#id").val() ;
        let name=$("#name").val() ;
        let lname=$("#lname").val() ;
        let email=$("#email").val() ;
        let password=$("#password").val() ;
        if (id==''|| password==''|| name==''|| lname=="",email==""){
            console.log('vacio')
        }else{
            let fullname=name+''+lname;
           $.ajax({
                url:"php/scripts/new_account.php",
                type:"POST",
                data:{id,fullname,email,password},
                success: function(response){
                    console.log(response)
                }
            })
        }
        e.preventDefault();
    });
    $("#material").submit((e) => {
        let flag = 1;
        let name= $("#m_name").val();
        let detail= $("#m_detail").val();
        let quantity= $("#m_quantity").val();
        let price= $("#m_price").val();
        let type= $("#m_type option:selected").text();
        console.log(type)
        $.ajax({
            url:"../php/scripts/register.php",
            type:"POST",
            data:{flag,name,detail,price,quantity,type},
            success: function(response){
                let data=JSON.parse(response);
                console.log(data.message)
                alerts(data.class, data.message);

            }
        })
        e.preventDefault()
    });
    $("#terreno").submit((e) => {
        let flag = 2;
        let name= $("#t_name").val();
        let plantas= $("#t_plant").val();
        let dim= $("#t_dim").val();
        $.ajax({
            url:"../php/scripts/register.php",
            type:"POST",
            data:{flag,name,plantas,dim},
            success: function(response){
                let data=JSON.parse(response);
                console.log(data.message)
                alerts(data.class, data.message);

            }
        })
        e.preventDefault()
    });
    $("#plan").submit((e) => {
        let flag = 3;
        let name= $("#t_name").val();
        let plantas= $("#t_plant").val();
        let dim= $("#t_dim").val();
        $.ajax({
            url:"../php/scripts/register.php",
            type:"POST",
            data:{flag,name,plantas,dim},
            success: function(response){
                let data=JSON.parse(response);
                console.log(data.message)
                alerts(data.class, data.message);

            }
        })
        e.preventDefault()
    });
})