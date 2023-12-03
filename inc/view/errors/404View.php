<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=<?=CSS_URL."error-pages-buttons.css"?>>
    <title>401 Unauthorized Access</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            text-align: center;
            padding: 50px;
        }

        h1 {
            color: #e74c3c;
            font-size: 20em;
            margin: 0;
        }

        p {
            color: #7f8c8d;
            font-size: 3em;
        }
    </style>
</head>
<body>
    <h1>404</h1>
    <p>Not Found</p>
    <p>The resource requested could not be found on this server!<br></p>

    <form action = <?=BASE_URL."/register"?> method="POST">
        <button class = "return-button">Back to homepage</button> 
    </form>
</body>
</html>