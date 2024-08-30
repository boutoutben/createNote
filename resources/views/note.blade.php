<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
    <title>note</title>
</head>
<body>
    @include("navbar")
    <h3 class="margin-1">Bienvenue {{$name}} dans votre espace de note</h3>
    <h1 class="title">Espace note du thème {{$theme->name}}</h1>
    <div class="createNewEle">
        <div class="allBtn">
            <button class="returnTheme" onclick="window.location.href = '/theme'">Retourné dans les thèmes</button>
            <button class="btn-ele" onclick="showAndRemove('createNote')">Créer une note</button>    
        </div>
        
        <form method="post" action="/note/create/{{$id_theme}}" class="invisible" id="createNote">
            @csrf
            <table class="createForm">
                <tr>
                    <td><label for="">Nom de la note: </label> </td>
                    <td><input type="text" name='name' required></td>
                </tr>
                <tr>
                    <td><label for="">description: </label></td>
                    <td><input type="text" name="description" required></td>
                </tr>
            </table>
            <input type="submit" value="créer une note" class="btn-createForm">
        </form>
    </div>
    <div class="allNotes">
        @foreach($notes->get() as $note)
            @php($date = new dateTime($note->created_at))
            <div class="ele_drop">
               <div class="note">
                    <div class="title_date">
                        <h1 class="subtitle titleNote">{{$note->name}}</h1>
                        <p class="dateNote">{{$date->format("d/m/Y")}}</p>
                    </div>
                    <p>{{$note->description}}</p>
                </div>
                <div class="delete" onclick="redirectPost('/note/delete/'+{{$note->id}})">
                    <img src="/img/crossIcon.png" alt="" width="50%" class="crossImg">
                </div> 
            </div>
            
        @endforeach
    </div>
    @include("expiredSession")
    <script src="/js/btnCreate.js"></script>
    <script src="/js/redirect.js"></script>
</body>
</html>