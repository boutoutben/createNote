<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/main.css">
    <title>home</title>
</head>
<body>
    <section>
        <div class="welcome">
            <h1 class="title">Bienvue dans notre espace de création de note</h1>
        </div>
        <div class="form">
            <h1 class="subtitle">Connection</h1>
            @if(session()->get("error")== "auth")
                <h3>L'username ou le mot de passé n'est pas correct.</h3>
            @endif
            <form method="post" action="{{route('home.connection')}}">
                @csrf
               <table>
                    <tr>
                        <td><label for="">username:</label></td>
                        <td><input type="text" name="username" required></td>
                    </tr>
                    <tr>
                        <td><label for="">mot de passe: </label></td>
                        <td><input type="password" name="password" required></td>
                    </tr>
                </table>
                <button type="input" class="btn-home">Connection</button> 
            </form>
        </div>
        <div class="form">
            <h1>Créer un compte</h1>
            <form method="post" action="{{route('home.create')}}">
                @csrf
                <table>
                    <tr>
                        <td><label for="">username:</label></td>
                        <td><input type="text" name="newUsername" required></td>
                    </tr>
                    <tr>
                        <td><label for="">mot de passe: </label></td>
                        <td><input type="password" name="newPassword" required></td>
                    </tr>
                </table>
                <input type="submit" value="créer un compte" class="btn-home">
            </form>
        </div>
    </section>
</body>
</html>