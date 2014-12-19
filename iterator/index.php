<html>
<head>
	<title>Iterator</title>
<head>
<body>
	<script>
	var startTime = new Date().getTime();
	var count = 0;
	//ºÄÊ±ÈÎÎñ
	setInterval(function(){
		var i = 0;
		while(i++ < 100000000);
	}, 0);
	/* setInterval(function(){
		count++;
		console.info(new Date().getTime() - (startTime + count * 1000));
	}, 1000); */
	function fixed() {
		count++;
		var offset = new Date().getTime() - (startTime + count * 1000);
		var nextTime = 1000 - offset;
		if (nextTime < 0) nextTime = 0;
		setTimeout(fixed, nextTime);
		 
		console.info(new Date().getTime() - (startTime + count * 1000));
	}
	</script>
</body>
</html
	
