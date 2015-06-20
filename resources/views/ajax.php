<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Container para nossa SPA</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
</head>
<body>
    <h1>Single Page Applications</h1>

    <div class="container">
        <table class="table table-bordered table-hover table-striped" id="listaProjetos">
            <thead>
                <tr>
                    <th>Nome do Projeto</th>
                    <th width="200">Criado em</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function()
        {
            var $listaProjetos = $('#listaProjetos');

            $.getJSON('/api/projects', function(data)
            {
                var markup = '';
                data.forEach(function(project)
                {
                    markup += '<tr>';
                    markup += '<td>'+project.name+'</td>';
                    markup += '<td>'+project.created_at+'</td>';
                    markup += '</tr>';
                });

                $listaProjetos.find('tbody').html(markup);

            });
        });
    </script>
</body>
</html>