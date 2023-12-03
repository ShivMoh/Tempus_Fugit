<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=<?=CSS_URL."error-pages-buttons.css"?>>
    <title>404 Not Found</title>
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
    <h1>401</h1>
    <p>Unauthorized Access</p>
    <p>You are not authorized to access this page!<br></p>

    <form action = <?=BASE_URL."/register"?> method="POST">
        <button class = "return-button">Back to homepage</button> 
    </form>
</body>
</html>