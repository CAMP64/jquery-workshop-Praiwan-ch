<!DOCTYPE html>
<html>

<head>
	<title>jq01</title>
	<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
</head>
<body>
	<button>เพิ่มแถว</button>
	<div id = "add"></div>
	<script>
		$(document).ready(function(){
			var i=1;
			$('button').click(function(){
				$('#add').append(`คนที่ ${i} ชื่อ<input type='text'>นามสกุล<input type='text'><br>`);
				i++;
			})
		})
	</script>
</body>

</html>