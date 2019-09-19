<!DOCTYPE HTML>
<html>

<head>
<link rel="stylesheet" type="text/css" href="form.css">
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add Issue</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>

$(function () {
            $("#datepicker").datepicker({ dateFormat: "yy-mm-dd", changeMonth: true, changeYear: true });
        });
  </script>
</head>
<body>
<fieldset>
<legend><span class="number">1</span> Due Date</legend>
<input type="text" name="datepicker" id="datepicker">
</fieldset>
</body>
</html>

<?php
 
    echo 'datepicker';
	?>