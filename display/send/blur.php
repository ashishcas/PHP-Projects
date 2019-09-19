<!DOCTYPE html>
<html>
<body>

<p>This example uses the addEventListener() method to attach a "blur" event to an input element.</p>

<p>Write something in the input field, and then click outside the field to lose focus (blur).</p>

<input type="text" id="fname">

<script>
document.getElementById("fname").addEventListener("blur", myFunction);

function myFunction() {
    alert("Input field lost focus.");
	 var myWindow = window.open("", "", "width=200, height=100");
    myWindow.document.write("<p>A new window!</p>");
    myWindow.blur();
}
</script>

</body>
</html>

