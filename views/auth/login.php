<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>TFE - Gestionnaire de Planning - Pipart Denis</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="/ressources/css/main.css" rel="stylesheet">
</head>
<body>
<div class="text-center">
    <img src="/ressources/img/planning-logo.jpg" alt="logo de l'application" width="50%" height="20%">
    <!-- Button HTML (to Trigger Modal) --><br>
    <a href="#myModal" class="trigger-btn" data-toggle="modal">Cliquez ici pour vous connecter</a>
</div>

<!-- Modal HTML -->
<div id="myModal" class="modal fade">
    <div class="modal-dialog modal-login">
        <div class="modal-content">
            <div class="modal-header">
                <div class="avatar">
                    <img src="/ressources/img/avatar.png" alt="Avatar">
                </div>
                <h4 class="modal-title">Member Login</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <form action="/aidepeda/login" method="post">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email"
                               required="required">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password"
                               required="required">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="route" value="<?= $_SERVER['REQUEST_URI']; ?>">
                        <button type="submit" class="btn btn-primary btn-lg btn-block login-btn">Se connecter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>