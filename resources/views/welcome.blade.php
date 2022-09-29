<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        #affiliates td, #affiliates th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #affiliates tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #affiliates tr:hover {
            background-color: #ddd;
        }

        #affiliates th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
        select:focus {
            box-shadow: 0 0 0 0;
            border: 0 none;
            outline: 0;
        }
        select {
            border-style: none;
        }
    </style>
</head>
<body>
<lable>Distance in Kilometers: </lable>
<select id="distance" onchange="alterDistance()">
    <option>100</option>
    <option>500</option>
    <option>1000</option>
    <option>10000</option>
</select>

</select>
<table id="affiliates">
    <thead>
    <tr>
        <td>id</td>
        <td>name</td>
    </tr>
    </thead>
    <tbody></tbody>
</table>
</body>
<script>
    let createTable = (distance) => {
        fetch('http://localhost/affiliates/distance/'+distance).then(function (response) {
            return response.json();
        }).then(function (affiliates) {
            let html = ''
            for (let i in affiliates) {
                html += '<tr>';
                html += '    <td>' + affiliates[i]["affiliate_id"] + '</td>';
                html += '    <td>' + affiliates[i]["name"] + '</td>';
                html += '<tr>';
            }
            $('#affiliates tbody').html(html);
        }).catch(function (e) {
            console.log(e);
        });
    }
    function alterDistance () {
        let distance = $('#distance').val();
        createTable(distance);
    }

    $(function () {
        let distance = $('#distance').val();
        createTable(distance);
    });

</script>
</html>
