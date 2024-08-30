<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
    <title>themes</title>
</head>
<body>
    @include("navbar")
    <h3 class="margin-1">bienvenue {{$name}} sur vos thèmes de notes</h3>
    <h1 class="title">Votre différent thème</h1>
    <div class="createNewEle">
        <button class="btn-ele" onclick="showAndRemove('createTheme')">Créer un thème</button>
        <form method="post" action="theme/create" class="invisible" id="createTheme">
            @csrf
            <table class="createForm">
                <tr>
                    <td><label for="">Nom du thème: </label> </td>
                    <td><input type="text" name='name' required></td>
                </tr>
                <tr>
                    <td><label for="">description: </label></td>
                    <td><input type="text" name="description" required></td>
                </tr>
            </table>
            <input type="submit" value="créer une thème" class="btn-createForm">
        </form>    
    </div>
    @if($theme->first() == null)
        <h3 class="text">Il n'y a pas encore de thème mais vous pouvais en créer avec le boutton au dessus.</h3>
    @endif
    <div class="allTheme">
        @foreach($allTheme as $theme)
            <div class="ele_drop">
                <div class="theme" onclick="window.location.href ='note/{{$theme->id}}' ">
                    <h3 class="subtitle">{{$theme->name}}</h3>
                    <p>{{$theme->description}}</p>
                </div>
                <div class="delete" onclick="redirectPost('/theme/delete/'+{{$theme->id}})">
                    <img src="/img/crossIcon.png" alt="" width="50%" class="crossImg">
                </div>
            </div>
            
        @endforeach
    </div>
    
    @include("expiredSession")
    <script src="js/btnCreate.js"></script>
    <script src="/js/redirect.js"></script>
</body>
</html>