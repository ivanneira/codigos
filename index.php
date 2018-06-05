<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 05/06/2018
 * Time: 15:56
 */
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buscador de códigos CIE10</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body>


<div class="container">
    <label for="exampleInputEmail1">Busque aquí por código CIE10 o descripción:</label>
    <input type="text" class="form-control" id="busqueda" placeholder="Ingrese búsqueda">
    <br>
    <button id="buscar" class="btn btn-primary btn-block">Buscar</button>
    <br>
    <table class="table table-striped table-hover text-center">
        <tbody id="tbody">

        </tbody>
    </table>

</div>


<div class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <p>Espere un momento mientras cargan los datos...</p>
            </div>

        </div>
    </div>
</div>


</body>

<script src="js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
<script src="js/cie10.js"></script>



</html>


<script>

    $(".modal").modal('show');

    $(function(){

        $(".modal").modal('hide');

        var data = DATA.RECORDS;

        $(document).keypress(function(e) {
            if(e.which == 13) {

                $("#buscar")
                    .click();
            }
        });

        $("#buscar").click(function(){

            $(".modal").modal('show');

            if( $("#busqueda").val().length < 2){

                alert("por favor ingrese mas de 3 caracteres")
            }else{

                var htmlString =
                    '<tr>' +
                    '   <th>Código</th>' +
                    '   <th>Descripción</th>' +
                    '</tr>';

                for(var index in data){

                    if(
                        data[index].id10.search(new RegExp($('#busqueda').val(), "i")) != -1
                        ||
                        data[index].dec10.search(new RegExp($('#busqueda').val(), "i")) != -1
                    ){

                        htmlString +=
                            '<tr>' +
                            '   <td><b>' + data[index].id10 + '</b></td>' +
                            '   <td>' + data[index].dec10 + '</td>' +
                            '</tr>';

                        $("#tbody")
                            .empty()
                            .append(htmlString);
                    }
                }

                $(".modal").modal('hide');
            }
        });


    });


</script>

<style>

    body{
        background-color: #03e2ff;
    }
</style>