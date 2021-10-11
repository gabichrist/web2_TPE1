<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <base href='{$BASE_URL}'>
    <title>Libreria</title>
</head>

<body>
    <nav>
        <ul>
            <li><a href="libros">Libros</a></li>
            <li><a href="escritores">Escritores</a></li>
            <li><a href="admin">Admin</a></li>
            {if isset($isLogged) && $isLogged}
                <li><a href="logout">Logout</a></li>
            {/if}
        </ul>
    </nav>