<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Note</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
    <link rel="shortcut icon" href="/favicon.ico">
</head>
<body>
<div class="container">
    <h1>Notes</h1>
    <p>every things worth memory</p>
    <div>
        <form action="/login/dologin" method="POST" class="form-horizontal">
            <table>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" class="form-control"/></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" class="form-control"/></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="login" class="btn btn-primary"/></td>
                </tr>
            </table>
        </form>

        <?php
        if (array_key_exists('msg', $_SESSION)) : ?>
        <div class="alert alert-danger"><?=htmlspecialchars(strip_tags($_SESSION['msg'])); ?></div>
        <?php
        endif; ?>
    </div>
</div>
</body>
</html>
