<!DOCTYPE html>
<html>
<head>
    <title>js03</title>
</head>
<body>
        <input type="password" id="showText" >
        <button onclick="showPass()">Show Password</button><br>
        <h1 id ="show">
            the text is:
        </h1>
    <script>
        function showPass() 
        {
            var showpass = document.getElementById("showText").value;
            document.getElementById("show").innerHTML = "the text is : " + showpass ;
        }
    </script>
</body>
</html>