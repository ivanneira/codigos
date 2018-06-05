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

<select class="selectCIE10">

</body>

<script src="js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
</html>


<script>

    $(function () {

        $(".selectCIE10").select2({
            width: '100%',
            placeholder: "Busque motivo de intervención",
            ajax: {
                url: '127.0.0.1:3003/getcie10',
                type: 'GET',
                dataType: 'json',
                data: function (params) {
                    var query = {
                        q: params.term
                    };

                    // Query parameters will be ?1=[term]
                    return query;
                },
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.id10 + " - " + item.dec10,
                                id: item.id10
                            }
                        })
                    };
                }
            }
        });

    });


</script>