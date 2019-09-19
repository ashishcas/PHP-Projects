<?php
      $conn =  mysqli_connect('localhost', 'root', '', 'attendance');
	    if(!$conn){
	    	echo "ds";
	    }
	if(!empty($_POST["save"])) {

		$itemCount = count($_POST["item_name"]);
		echo $itemCount;
		$itemValues=0;
		$query = "INSERT INTO item (item_name,item_price) VALUES ";
		$val1 = "";
		$val2 = "";
		$queryValue = "";
		for($i=0;$i<$itemCount;$i++) {
			if(!empty($_POST["item_name"][$i]) || !empty($_POST["item_price"][$i])) {
				$itemValues++;
				if($queryValue!="") {
					$queryValue .= ",";
				}
				$queryValue .= "('" . $_POST["item_name"][$i] . "', '" . $_POST["item_price"][$i] . "')";
				$val1 = $_POST["item_name"][$i] ;
				$val2 = $_POST["item_price"][$i] ;
				echo $queryValue;
			}
		}
		$sql = $query.$queryValue;
		// $sql = "INSERT INTO item (id,item_name,item_price) VALUES(1,'as',5)";
		// echo $itemValues;
		// $result = mysqli_query($conn, $sql);
		//     if($result){
		//     	echo "sucess";
		//     }
		if($itemValues!=0) {
		    $result = mysqli_query($conn, $sql);
		    if($result){
		    	echo "sucess";
		    }
			if(!empty($result)) $message = "Added Successfully.";
		}
	}
?>
<HTML>
<HEAD>
<TITLE>PHP jQuery Dynamic Textbox</TITLE>
<LINK href="style.css" rel="stylesheet" type="text/css" />
<SCRIPT src="http://code.jquery.com/jquery-2.1.1.js"></SCRIPT>
<SCRIPT>
function addMore() {
	$("<DIV>").load("input.php", function() {
			$("#product").append($(this).html());
	});	
}
function deleteRow() {
	$('DIV.product-item').each(function(index, item){
		jQuery(':checkbox', this).each(function () {
            if ($(this).is(':checked')) {
				$(item).remove();
            }
        });
	});
}
</SCRIPT>
</HEAD>
<BODY>
<FORM name="frmProduct" method="post" action="">
<DIV id="outer">
<DIV id="header">
<DIV class="float-left">&nbsp;</DIV>
<DIV class="float-left col-heading">Item Name</DIV>
<DIV class="float-left col-heading">Item Price</DIV>
</DIV>
<DIV id="product">
<?php require_once("input.php") ?>
</DIV>
<DIV class="btn-action float-clear">
<input type="button" name="add_item" value="Add More" onClick="addMore();" />
<input type="button" name="del_item" value="Delete" onClick="deleteRow();" />
<span class="success"><?php if(isset($message)) { echo $message; }?></span>
</DIV>
<DIV class="footer">
<input type="submit" name="save" value="Save" />
</DIV>
</DIV>
</form>
</BODY>
</HTML>