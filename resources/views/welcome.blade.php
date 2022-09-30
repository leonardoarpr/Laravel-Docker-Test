<!DOCTYPE html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="/script/index.js"></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="/css/index.css">
    </head>
    <body>
        <lable>Distance in Kilometers:</lable>
        <select id="distance" onchange="alterDistance()">
            <option>100</option>
            <option>500</option>
            <option>1000</option>
            <option>10000</option>
        </select>
        <table id="affiliates">
            <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
            </tr>
            </thead>
            <tbody></tbody>
        </table>
    </body>
</html>
