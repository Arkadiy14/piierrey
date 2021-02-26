<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Browser</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet">
</head>
<body bgcolor="#424242">
<div class="parent">
<div class="block">
<form name="browser" method="post" action="<?=$_SERVER['SCRIPT_NAME'];?>">
<h3><div id="query">Enter Query:</div></h3>
<input type="text" size="40" name="query" id="enter">
<p><input type="submit" name="action" value="Google" class="b1">
<input type="submit" name="action" value="Youtube" class="b1">
<input type="submit" name="action" value="Wikipedia" class="b1"></p>
</form>
</div>
</div>
<style type="text/css">
	body {
		font-family: 'Roboto', sans-serif;
		margin: 0;
		padding: 0;
	} 

	p {
		color: #FAFAFA;
	}

	.b1 {
		width: 160px;
		height: 40px;
		font-weight: 700;
        color: #FAFAFA;
        text-decoration: none;
        padding: .8em 1em calc(.8em + 3px);
        border-radius: 3px;
        background: rgb(64,199,129);
        box-shadow: 0 -3px rgb(53,167,110) inset;
        outline: none;
        border: none;
        margin-right: 20px;
	}

	#enter {
		border:1px;
        box-shadow: 0px 0px 3px #ccc, 0 10px 15px #eee inset;
        border-radius:2px;
        height: 25px;
        width: 523px;
	}

	#query {
		color: #FAFAFA;
		text-align: left;
	}

	.parent {
        width: 100%;
        height: 100%;
        position: fixed;
        top: 0;
        left: 0;
        display: flex;
        align-items: center;
        align-content: center; 
        justify-content: center; 
        overflow: auto;   
    }

    .block {
        display: block;
}s
</style>
</body>
</html>

<?php
if(isset($_POST['query'])) {
	$query = $_POST['query']; 

function makeQuery($string) {
	$explode_query = explode(" ", $string);
	$new_query = implode("+", $explode_query);

	return $new_query;
}

function wiki($string) {
	$explode_query = explode(" ", $string);
	$new_query = implode("_", $explode_query);

	return $new_query;
}

if(isset($_POST['action']) && $_POST['action'] == 'Google') {
	$google = makeQuery($query);
	header("location: https://www.google.com/search?q=$google");
}elseif(isset($_POST['action']) && $_POST['action'] == "Youtube") {
	$youtube = makeQuery($query);
	header("location: https://www.youtube.com/results?search_query=$youtube");
}elseif(isset($_POST['action']) && $_POST['action'] == "Wikipedia") {
	$wiki = wiki($query);
	header("location: https://en.wikipedia.org/wiki/$wiki");
}
}

?>