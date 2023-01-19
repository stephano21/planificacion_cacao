import { alert_login, input_only_numbers, alerts ,update_alert} from "./login.js";
$(function () {
    var  material=[];
    var  terreno=[];
    var  trabajador=[];
    load_materiales();
    load_terreno();
    $("#login").submit((e) => {
        let user = $("#user").val();
        let password = $("#password").val();
        if (user == '' || password == '') {
            console.log('empty')
        } else {
            $.ajax({
                url: "php/scripts/login.php",
                type: "POST",
                data: { user, password },
                success: function (response) {
                    if (response == 1) {
                        window.location = "home";
                    } else {
                        alert_login(response)
                    }
                }
            })
        }
        e.preventDefault();
    });

    $("#user").keyup(function (e) {
        input_only_numbers('user')
    });

    $("#id").keyup(function (e) {
        input_only_numbers('id')
    });
    $("#t_plant").keyup(function (e) {
        input_only_numbers('t_plant')
    });
/* -------------------COSECHA -------------------------- */
$("#planing_c").change(function () {
    if ($("#p_material option:selected").val()!=0 ) {
        let id=$("#planing_c option:selected").val();
        load_terreno_c(id);
    }
    
});
    /* ----------planing -------------------------- */
    $("#p_material").change(function () {
        if ($("#p_material option:selected").val()!=0 ) {
           let data=[$("#p_material option:selected").val(),$("#p_material option:selected").text()]
        material.push(data);
        load_material();
        }
        
    });
    $("#p_terreno").change(function () {
        if ($("#p_terreno option:selected").val()!=0) {
            let data=[$("#p_terreno option:selected").val(),$("#p_terreno option:selected").text()]
        terreno.push(data);
        load_terrenop();
        }
        
    });
    $("#p_trabajador").change(function () {
        if ($("#p_trabajador option:selected").val()!=0) {
            let data=[$("#p_trabajador option:selected").val(),$("#p_trabajador option:selected").text()]
        trabajador.push(data);
        load_trabajadorp();
        }
        
    });
    $("#create_account").submit((e) => {
        let id = $("#id").val();
        let name = $("#name").val();
        let lname = $("#lname").val();
        let email = $("#email").val();
        let password = $("#password").val();
        if (id == '' || password == '' || name == '' || lname == "", email == "") {
            console.log('vacio')
        } else {
            let fullname = name + '' + lname;
            $.ajax({
                url: "php/scripts/new_account.php",
                type: "POST",
                data: { id, fullname, email, password },
                success: function (response) {
                    console.log(response)
                }
            })
        }
        e.preventDefault();
    });
    /* ---------------------- REGISTER || FLAGS---------------------------- */
    $("#cosecha").submit((e) => {
        let  template ='';
        $("input[name='qts']").each(function() {
            console.log($(this).val());
            //console.log($(this).attr("id"));
            console.log($(this).attr("table"));
            if(!update_production($(this).val(),$(this).attr("table"))){
                //lerts('success',$(this).attr("terr")+' Resistrado exitrosamente');
                template+=update_alert('success',$(this).attr("terr")+' Resistrado exitrosamente')
            }
        });
        $("#alert").html(template);
        
        let terrenos = $(".qts");
        for (let i = 0; i < terrenos.length; i++) {
            const element = terrenos[i];
            
            console.log(element)
        }
        e.preventDefault();
    });
    $("#material").submit((e) => {
        let flag = 1;
        let name = $("#m_name").val();
        let detail = $("#m_detail").val();
        let quantity = $("#m_quantity").val();
        let price = $("#m_price").val();
        let type = $("#m_type option:selected").text();
        console.log(type)
        $.ajax({
            url: "../php/scripts/register.php",
            type: "POST",
            data: { flag, name, detail, price, quantity, type },
            success: function (response) {
                let data = JSON.parse(response);
                console.log(data.message)
                alerts(data.class, data.message);
                $("#material")[0].reset();

            }
        })
        e.preventDefault()
    });
    $("#terreno").submit((e) => {
        let flag = 2;
        let name = $("#t_name").val();
        let plantas = $("#t_plant").val();
        let cultivo = $("#t_cultivo option:selected").text();
        let dim = $("#t_dim").val();
        $.ajax({
            url: "../php/scripts/register.php",
            type: "POST",
            data: { flag, name, plantas, cultivo, dim },
            success: function (response) {
                let data = JSON.parse(response);
                console.log(data.message)
                alerts(data.class, data.message);
                $("#terreno")[0].reset();

            }
        })
        e.preventDefault()
    });
    $("#planing").submit((e) => {
        let flag = 3;
        let name = $("#p_name").val();
        let inicio = $("#p_inicio").val();
        let fin = $("#p_fin").val();
        let tipo = $("#p_tipo option:selected").text();

        $.ajax({
            url: "../php/scripts/register.php",
            type: "POST",
            data: { flag, name, inicio, fin, tipo, material,terreno,trabajador,},
            success: function (response) {
                console.log(response)
                let data = JSON.parse(response);
                console.log(data.message)
                alerts(data.class, data.message);
                material=[];
                terreno=[];
                trabajador=[];
                $("#lt_mat").html('');
                $("#lt_ter").html('');
                $("#lt_tra").html('');
                $("#planing")[0].reset();

            }
        });
        e.preventDefault()
    });
    /* ---------------------loaders ------------------------ */
    function update_production(cantidad, id){
        $.ajax({
            url:"../php/scripts/update_production.php",
            type: "POST",
            data: {id, cantidad,},
            success:function(response){
                return JSON.parse(response);
            }
        });
    }
    function load_terreno_c(id){
        let template =`<h5>Terrenos</h5>`;
        $.ajax({
            url: "../php/scripts/load_terreno_c.php",
            type: "GET",
            data: {id,},
            success: function (response) {
                let data = JSON.parse(response);
                console.log(data);
                data.forEach(item => {
                    template += `
                    <div class="input-group mb-3" >
                        <span class="input-group-text">${item.name}</span>
                        <input type="text" class="form-control" table="${item.id_table}" terr="${item.name}" id="${item.id}" placeholder="Libras producidas" name="qts" aria-label="Username" aria-describedby="basic-addon1" required>
                    </div>`;
                });
                $("#terrenos_c").html(template);
            }
        });
    }
    function load_material(){
        let template='';
        material.forEach(item => {
            template+=`
            <div class="alert alert-secondary alert-dismissible fade show col-sm-3 m-1 p-3" role="alert">
                <strong>${item[1]}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            `;
            $("#lt_mat").html(template);
        });
    }
    function load_terrenop(){
        let template='';
        terreno.forEach(item => {
            template+=`
            <div class="alert alert-secondary alert-dismissible fade show col-sm-3 m-1 p-3" role="alert">
                <strong>${item[1]}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            `;
            $("#lt_ter").html(template);
        });
    }
    function load_trabajadorp(){
        let template='';
        trabajador.forEach(item => {
            template+=`
            <div class="alert alert-secondary alert-dismissible fade show col-sm-3 m-1 p-3" role="alert">
                <strong>${item[1]}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            `;
            $("#lt_tra").html(template);
        });
    }
    function load_terreno() {
        let template = '';
        $.ajax({
            url: "../php/scripts/load_terreno.php",
            type: "GET",
            success: function (response) {
                let data = JSON.parse(response);
                console.log(data);
                data.forEach(item => {
                    if (item.status == 0) {
                        template += `
                        <tr id="${item.id}">
                            <th scope="row">${item.name}</th>
                            <td>${item.unit}</td>
                            <td>${item.type}</td>
                            <td>${item.dim}</td>
                            <td class="bg-success p-2 text-white bg-opacity-50"></td>
                            
                            <td>
                                <button class="btn btn-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                    </svg>
                                </button>
                                <button class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        `;
                    }else{
                        template+=`
                   <tr id="${item.id}">
                        <th scope="row">${item.name}</th>
                        <td>${item.unit}</td>
                        <td>${item.type}</td>
                        <td>${item.dim}</td>
                        <td class="bg-danger p-2 text-white bg-opacity-50"></td>
                        
                        <td>
                            <button class="btn btn-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                </svg>
                            </button>
                            <button class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                   `; 
                    }
                });
                $("#terreno_item").html(template);
            }
        });
    }
    function load_materiales() {
        let template = '';
        $.ajax({
            url: "../php/scripts/load_materiales.php",
            type: "GET",
            success: function (response) {
                let data = JSON.parse(response);
                console.log(data);
                data.forEach(item => {
                    template += `
                        <tr id="${item.id}">
                            <th scope="row">${item.name}</th>
                            <td>${item.detail}</td>
                            <td>${item.price}</td>
                            <td>${item.unit}</td>
                            <td>${item.type}</td>
                            
                            <td>
                                <button class="btn btn-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                    </svg>
                                </button>
                                <button class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        `;
                });
                $("#materiales").html(template);
            }
        });
    }
})