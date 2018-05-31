<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	
	<style type="text/css">
		body{
    font-family: 'Ropa Sans', sans-serif;
    margin-top: 30px;
    /*background-color: #F0CA00;*/
    background-color: #809fff;
    /*background-color: #F3661C;*/
    text-align: center;
    color: #fff;
}
.error-heading{
    margin:auto;
    width: auto;
    border: 5px solid #fff;
    font-size: 126px;
    line-height: auto;
    border-radius: 30px;
    text-shadow: 6px 6px 5px #000;
}
.error-heading img{
    width: 100%;
}

.error-main h1{
    font-size: 72px;
    margin: 0px;
    color: #F3661C;
    text-shadow: 0px 0px 5px #fff;
}

	</style>
</head>
<body>
	<div class="error-main">
		<h1>Oops!</h1>
		<div class="error-heading"><?php echo $heading; ?></div>
		<p><?php echo $message; ?></p>
	</div>
</body>
</html>
