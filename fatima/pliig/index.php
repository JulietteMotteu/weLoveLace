<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <!-- les script de plug -->
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="./jQuery-Plugin/jquery.confirmon.min.js"></script>
    <script src="./jQuery-Plugin/confirmon.jquery.json"></script>
    <script src="./jQuery-Plugin/jquery.confirmon.js"></script>
</head>
<style type="text/css">
	.confirmon-overlay {

	background-color: black;

	background-color: rgba(0, 0, 0, 0.60);

	width: 100%;

	height: 100%;

	margin: 0;

	top: 0;

	left: 0;

	position: fixed;

	z-index: 150;

	display: none;

	}

	.confirmon-box {

	background-color: #6a397c;
    border-radius: 4px;

	color: #ddd;

	border: solid 1px #666666;

	box-shadow: 0px 1px 10px #222;

	padding: 20px 10px 35px 10px;

	text-align: center;

	font-weight: bold;

	font-size: 15px;

	z-index: 151;

	display: none;

	position: absolute;

	margin-left: -15%;

	width: 30%;
	left: 50%;
	top: 185px;
	}
	.confirmon-box button {
	margin: 10px 5px;
	padding: 5px 10px;
	text-align: center;
	background-color: #6a397c;
    border-radius: 4px;
	border: 1px solid #ddd;
	color: #ddd;
	font-weight: bold;
	}
	.confirmon-box button:hover {
	background-color: #e95a24;
    border: 1px solid #e95a24;
	cursor: pointer;
	}
</style>
<body>
	<button id="demo">inscrire</button>
	<script>
		$(function() {
		$('#demo').confirmOn('click', function() {
//		$(this).remove();
			});
		});
	</script>
</body>
</html>