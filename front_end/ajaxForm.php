<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post" >
        <div>
            Email:
            <input type="text" name="email">
        </div>

        <div>
            Password:
            <input type="text" name="password">
        </div>

        <button name="submit" id="sub" >Submit</button>
    </form>

    <script>

        element = document.getElementById("sub")

        
        element.addEventListener("click", (event) => {
            event.preventDefault();
            console.log("vfdgf")

            

        });
    </script>
</body>

</html>