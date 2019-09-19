<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Your HTML, CSS, and JavaScript playground.">
    <title>HTML, CSS, JS Playground</title>
	<meta content="width=device-width, initialscale=1" name="viewport">	
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" rel="stylesheet">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" type="text/javascript"></script>
	
	<script>
	$(document ).ready(function() {
		$('#btnSave').click(function() {
  if ('Blob' in window) {
    var fileName = prompt('Please enter file name to save', 'Untitled.txt');
    if (fileName) {
      var textToWrite = $('#exampleTextarea').val().replace(/n/g, 'rn');
      var textFileAsBlob = new Blob([textToWrite], { type: 'text/plain' });

      if ('msSaveOrOpenBlob' in navigator) {
        navigator.msSaveOrOpenBlob(textFileAsBlob, fileName);
      } else {
        var downloadLink = document.createElement('a');
        downloadLink.download = fileName;
        downloadLink.innerHTML = 'Download File';
		
        if ('webkitURL' in window) {
          // Chrome allows the link to be clicked without actually adding it to the DOM.
          downloadLink.href = window.webkitURL.createObjectURL(textFileAsBlob);
        } else {
          // Firefox requires the link to be added to the DOM before it can be clicked.
          downloadLink.href = window.URL.createObjectURL(textFileAsBlob);
          downloadLink.click(function(){
          	document.body.removeChild(event.target);
          }); 
		  
          downloadLink.style.display = 'none';
          document.body.appendChild(downloadLink);
        }
        downloadLink.click();
      }
    }
  } else {
    alert('Your browser does not support the HTML5 Blob.');
  }
});
		//Put your java script here
	});
	</script>
</head>
<body>
	<div class="container">		
		<h1>Reading and Creating Text Files Using the HTML5 File API and jQuery</h1>
		<div class="form-group">			
			<button type="button" class="btn btn-default" id="btnOpen">Open...</button>
			<button type="button" class="btn btn-default" id="btnSave">Save</button>
		</div>		
		<input type="file" id="exampleInputFile" accept=".txt,.csv,.xml" class="hidden">
		<div class="form-group">
		  <textarea class="form-control" rows="15" id="exampleTextarea"></textarea>		  
		</div>
	</div>
</body>