
<!DOCTYPE html>
<html>
<head>
<title>Add or Remove text boxes with jQuery</title>
<script type="text/javascript" src="//code.jquery.com/jquery-latest.js"></script>
</head>
<body>
<div id="main">
    <h1>Add or Remove text boxes with jQuery</h1>
    <div class="my-form">
        <form action = "Dynamic.php" method="post">
            <p class="text-box">
                <label for="box1">Box <span class="box-number">1</span></label>
                <input type="text" name="boxes[]" value="" id="box1" />
                <a class="add-box" href="#">Add More</a>
            </p>
            <p><input type="submit" value="submit" /></p>
        </form>
    </div>
</div>
<script type="text/javascript">
jQuery(document).ready(function($){
    $('.my-form .add-box').click(function(){
        var n = $('.text-box').length + 1;
        if( 5 < n ) {
            alert('Stop it!');
            return false;
        }
        var box_html = $('<p class="text-box"><label for="box' + n + '">Box <span class="box-number">' + n + '</span></label> <input type="text" name="boxes[]" value="" id="box' + n + '" /> <a href="#" class="remove-box">Remove</a></p>');
        box_html.hide();
        $('.my-form p.text-box:last').after(box_html);
        box_html.fadeIn('slow');
        return false;
    });
    $('.my-form').on('click', '.remove-box', function(){
        $(this).parent().css( 'background-color', '#FF6C6C' );
        $(this).parent().fadeOut("slow", function() {
            $(this).remove();
            $('.box-number').each(function(index){
                $(this).text( index + 1 );
            });
        });
        return false;
    });
});
</script>
</body>
</html>


<?php ?>

