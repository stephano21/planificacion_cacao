import { alert_login, input_only_numbers, alerts } from "./login.js";
$(function () {
    load_materiales();
    load_terreno();
    load_terrenoStatus()
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
                load_materiales()
                let data = JSON.parse(response);
                console.log(data.message)
                alerts(data.class, data.message);
                $("#terreno")[0].reset();

            }
        })
        e.preventDefault()
    });
    $("#plan").submit((e) => {
        let flag = 3;
        let name = $("#p_name").val();
        let plantas = $("#t_plant").val();

        let dim = $("#t_dim").val();
        $.ajax({
            url: "../php/scripts/register.php",
            type: "POST",
            data: { flag, name, plantas, dim },
            success: function (response) {
                let data = JSON.parse(response);
                console.log(data.message)
                alerts(data.class, data.message);

            }
        })
        e.preventDefault()
    });
    /* ---------------------loaders ------------------------ */
    function load_terrenoStatus() {
        let template = `<option selected value="0">Seleccionar Terreno</option>`;
        $.ajax({
            url: "../php/scripts/load_terreno.php",
            type: "GET",
            success: function (response){
                let data = JSON.parse(response);
                data.forEach(item => {
                    template+=`<option value="${item.id}">${item.name}</option>`;
                });
                $("#p_terreno").append(template);
            }
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