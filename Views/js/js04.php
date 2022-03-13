<!DOCTYPE html>
<html>
<head>
    <title>js04</title>
</head>
<body>
    <img onmouseover = "Shadow(this)" src="https://e7.pngegg.com/pngimages/774/118/png-clipart-green-frog-character-illustration-pepe-the-frog-sweden-4chan-pol-internet-meme-frog-animals-hand.png" width = "150px" height = "150px" onmouseout ="normal(this)">&emsp;
    <img  onmouseover = "Shadow(this)" src="https://c.tenor.com/i3Qc4TdcXwMAAAAC/duck-meme.gif" width = "150px" height = "150px"  onmouseout ="normal(this)">&emsp;
    <img  onmouseover = "Shadow(this)" src="https://images.uncyc.org/th/thumb/e/e1/%E0%B8%AD%E0%B8%B2%E0%B8%88%E0%B8%B2%E0%B8%A3%E0%B8%A2%E0%B9%8C%E0%B9%81%E0%B8%94%E0%B8%87.jpg/300px-%E0%B8%AD%E0%B8%B2%E0%B8%88%E0%B8%B2%E0%B8%A3%E0%B8%A2%E0%B9%8C%E0%B9%81%E0%B8%94%E0%B8%87.jpg" width = "150px" height = "150px" onmouseout ="normal(this)">
   <script>
       function Shadow(pic){
           pic.style.boxShadow = "10px 20px 30px black";
       }
       function normal(pic){
           pic.style.boxShadow = "10px 20px 30px white";
       }
   </script>
</body>
</html>