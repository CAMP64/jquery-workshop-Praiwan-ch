<!DOCTYPE html>
<html>

<head>
	<title>jquery02</title>
	<style>
		label {
			font-size: 2em;
			font-weight: bold;
		}

		td {
			font-size: 4em;
			font-weight: bold;
			text-align: center;
			background-color: red;
		}

		table.fixed {
			table-layout: fixed;
		}

		table.fixed td {
			overflow: hidden;
			word-wrap: break-word;
		}
	</style>
	<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
</head>

<body>
	<label>Timer: </label>
	<label id="minutes">00</label>
	<label id="colon">:</label>
	<label id="seconds">00</label><br><br>
	<button id="b1">Pause</button><br><br>
	<table class="fixed" width="420"><br>
		<tr height="140">
			<td>1</td>
			<td>2</td>
			<td>3</td>
		</tr>
		<tr height="140">
			<td>4</td>
			<td>5</td>
			<td>6</td>
		</tr>
		<tr height="140">
			<td>7</td>
			<td>8</td>
			<td>9</td>
		</tr>
	</table>
	<h1 id="over"></h1>
	<h1><a id="click"></a></h1>

	<script type="text/javascript">
		let click = 1;
		var minutesLabel = document.getElementById("minutes");
		var secondsLabel = document.getElementById("seconds");
		var totalSeconds = 0;
		let refreshIntervalId = setInterval(setTime, 1000);

		function setTime(pause) 
		{
			++totalSeconds;
			secondsLabel.innerHTML = pad(totalSeconds % 60);
			minutesLabel.innerHTML = pad(parseInt(totalSeconds / 60));
		}

		function pad(val) 
		{
			var valString = val + "";
			if (valString.length < 2) 
			{
				return "0" + valString;
			} 
			else 
			{
				return valString;
			}
		}
		$(document).ready(function() 
		{
			$('#b1').click(function() 
			{
				click = 0;
				$('#over').text('Game Over');
				clearInterval(refreshIntervalId);
			});
		});

		var nums = [1, 2, 3, 4, 5, 6, 7, 8, 9], 
			ranNums = [],
			i = nums.length,
			j = 0;

		while (i--) 
		{
			j = Math.floor(Math.random() * (i + 1));
			ranNums.push(nums[j]);
			nums.splice(j, 1);
		}
		console.log(ranNums);
		for (let i = 0; i < ranNums.length; i++) 
		{
			$('td').eq(i).html(ranNums[i]);
		}

		$('td').click(function() 
		{
			if ($(this).text() == click) 
			{
				$(this).text('').css('backgroundColor', 'white');
				click++;
				if (click == 10) 
				{
					$('#over').text('Victory, you win');
					clearInterval(refreshIntervalId);
				}
			} 
			else 
			{
				click = 0;
				$('#over').text('Game Over');
				clearInterval(refreshIntervalId);
			}
		})
	</script>


</body>

</html>