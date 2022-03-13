<!DOCTYPE html>
<html>
<head>
    <title>js02</title>
</head>
<body>
        <button id="Red">Red</button>
        <button id="Blue">Blue</button>
        <button id="Green">Green</button>
        <h1>
            <div id="show">The Text</div>
        </h1>
    <script>
        document.getElementById("Red").onclick = function()
        {
            document.getElementById("show").style.color = 'red';
        }
        document.getElementById("Blue").onclick = function()
        {
            document.getElementById("show").style.color = 'blue';
        }
        document.getElementById("Green").onclick = function()
        {
            document.getElementById("show").style.color = 'green';
        }
    </script>
</body>
</html>