<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="./login.css">
</head>
<body>
    <div class="login-wrapper">
        <form action="/admin/login/formHandler.php" method="POST">
            <div>
                <input type="text" name="login" placeholder="login">
            </div>
            <div>
                <input type="password" name="password" placeholder="password">
            </div>
            <div>
                <button>
                    Submit
                </button>
            </div>
        </form>
    </div> 
</body>
</html>