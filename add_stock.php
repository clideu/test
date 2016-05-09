<?php
include_once("init.php");

?>
<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>ACON - Add Stock Category</title>
	
	<!-- Stylesheets -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
	<link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="js/date_pic/date_input.css">
        <link rel="stylesheet" href="lib/auto/css/jquery.autocomplete.css">
	
	<!-- Optimize for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
	<!-- jQuery & JS files -->
	<?php include_once("tpl/common_js.php"); ?>
	<script src="js/script.js"></script>  
        <script src="js/date_pic/jquery.date_input.js"></script>  
        <script src="lib/auto/js/jquery.autocomplete.js "></script>  
 
		<script>
	/*$.validator.setDefaults({
		submitHandler: function() { alert("submitted!"); }
	});*/
	$(document).ready(function() {
		$("#supplier").autocomplete("supplier1.php", {
		width: 160,
		autoFill: true,
		selectFirst: true
	});
		$("#category").autocomplete("category.php", {
		width: 160,
		autoFill: true,
		selectFirst: true
	});
	$('#expdate').jdPicker();
		// validate signup form on keyup and submit
		$("#form1").validate({
			rules: {
				name: {
					required: true,
					minlength: 3,
					maxlength: 200
				},
				stockid: {
					required: true,
					minlength: 3,
					maxlength: 200
				},
				cost: {
					required: true,
					
				},
				sell: {
					required: true,
					
				}
			},
			messages: {
				name: {
					required: "Please Enter Stock Name",
					minlength: "Category Name must consist of at least 3 characters"
				},
				stockid: {
					required: "Please Enter Stock ID",
					minlength: "Category Name must consist of at least 3 characters"
				},
				sell: {
					required: "Please Enter Selling Price",
					minlength: "Category Name must consist of at least 3 characters"
				},
				cost: {
					required: "Please Enter Cost Price",
					minlength: "Category Name must consist of at least 3 characters"
				}
			}
		});
	
	});
	
function numbersonly(e){
        var unicode=e.charCode? e.charCode : e.keyCode
        if (unicode!=8 && unicode!=46 && unicode!=37 && unicode!=38 && unicode!=39 && unicode!=40 && unicode!=9){ //if the key isn't the backspace key (which we should allow)
        if (unicode<48||unicode>57)
        return false
    }
    }
	</script>
	</script>

</head>
<body>

	<!-- TOP BAR -->
	<?php include_once("tpl/top_bar.php"); ?>
	<!-- end top-bar -->
	
	
	
	<!-- HEADER -->
	<div id="header-with-tabs">
		
		<div class="page-full-width cf">
	
			<ul id="tabs" class="fl">
				<li><a href="dashboard.php" class="dashboard-tab">Dashboard</a></li>
				<li><a href="view_sales.php" class="sales-tab">Issuance</a></li>
				<li><a href="view_customers.php" class=" customers-tab">Customers</a></li>
				<li><a href="view_purchase.php" class="purchase-tab">Receive Items</a></li>
				<li><a href="view_supplier.php" class=" supplier-tab">Supplier</a></li>
				<li><a href="view_product.php" class="active-tab stock-tab">Stocks / Products</a></li>
				<li><a href="view_payments.php" class="payment-tab">Payments / Outstandings</a></li>
				<li><a href="view_report.php" class="report-tab">Reports</a></li>
			</ul> <!-- end tabs -->
			
			<!-- Change this image to your own company's logo -->
			<!-- The logo will automatically be resized to 30px height. -->
			<a href="#" id="company-branding-small" class="fr"><img src="images/Acon_Logo.gif" alt="Point of Sale" /></a>
			
		</div> <!-- end full-width -->	

	</div> <!-- end header -->
	
	
	
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">

			<div class="side-menu fl">
				
				<h3>Stock Management</h3>
				<ul>
					<li><a href="add_stock.php">Add Stock/Product</a></li>
					<li><a href="view_product.php">View Stock/Product</a></li>
					<li><a href="add_category.php">Add Stock Category</a></li>
					<li><a href="view_category.php">view Stock Category</a></li>
                                        <li><a href="view_stock_availability.php">view Stock Available</a></li>
				
                                  
                                </ul>
                               
                                
			</div> <!-- end side-menu -->
                        
			<div class="side-content fr">
			
				<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Add Stock </h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
                                                <div style="margin-top: 15px;margin-left: 150px"></div>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
						<div class="content-module-main cf">
				
							
					<?php
					//Gump is libarary for Validatoin
					
					if(isset($_POST['name'])){
					$_POST = $gump->sanitize($_POST);
					$gump->validation_rules(array(
						'name'    	  => 'required|max_len,100|min_len,3',
						'stockid'     => 'required|max_len,200',
						'sell'     => 'required|max_len,200',
						'cost'     => 'required|max_len,200',
						'supplier'     => 'max_len,200',
						'category'     => 'max_len,200',
						'category_2'     => 'max_len,200',
						'location'     => 'max_len,200',
						'expdate'     => 'max_len,200',
						'uom'     => 'max_len,200',
						'alert'     => 'max_len,200',
						'reorder'     => 'max_len,200'

					));
				
					$gump->filter_rules(array(
						'name'    	  => 'trim|sanitize_string|mysql_escape',
						'stockid'     => 'trim|sanitize_string|mysql_escape',
						'sell'     => 'trim|sanitize_string|mysql_escape',
						'cost'     => 'trim|sanitize_string|mysql_escape',
						'category'     => 'trim|sanitize_string|mysql_escape',
						'supplier'     => 'trim|sanitize_string|mysql_escape',
						'category_2'     => 'trim|sanitize_string|mysql_escape',
						'location'     => 'trim|sanitize_string|mysql_escape',
						'expdate'     => 'trim|sanitize_string|mysql_escape',
						'uom'     => 'trim|sanitize_string|mysql_escape',
						'alert'     => 'trim|sanitize_string|mysql_escape',
						'reorder'     => 'trim|sanitize_string|mysql_escape'

					));
				
					$validated_data = $gump->run($_POST);
					$name 		= "";
					$stockid 	= "";
					$sell       = "";
					$cost    	= "";
					$supplier 	= "";
					$category 	= "";
					$category_2	= "";
					$location 	= "";
					$expdate 	= "";
					$uom    	= "";
					$alert    	= "";
					$reorder   	= "";
			

					if($validated_data === false) {
							echo $gump->get_readable_errors(true);
					} else {
						
						
							$name=mysql_real_escape_string($_POST['name']);
							$stockid=mysql_real_escape_string($_POST['stockid']);
							$sell=mysql_real_escape_string($_POST['sell']);
							$cost=mysql_real_escape_string($_POST['cost']);
							$supplier=mysql_real_escape_string($_POST['supplier']);
							$category=mysql_real_escape_string($_POST['category']);
							$category_2=mysql_real_escape_string($_POST['category_2']);
							$location=mysql_real_escape_string($_POST['location']);
							$date=  date("d M Y h:i A") ;
							$uom=mysql_real_escape_string($_POST['uom']);
							$alert=mysql_real_escape_string($_POST['alert']);
							$reorder=mysql_real_escape_string($_POST['reorder']);
							
							$selected_date=$_POST['date'];
		  	$selected_date=strtotime( $selected_date );
			$date = date( 'Y-m-d H:i:s', $selected_date ); 
						
						$count = $db->countOf("stock_details", "stock_name ='$name'");
		if($count>1)
			{
	        $data='Dublicat Entry. Please Verify';
                                            $msg='<p style=color:red;font-family:gfont-family:Georgia, Times New Roman, Times, serif>'.$data.'</p>';//
                                            ?>
                                                    
 <script  src="dist/js/jquery.ui.draggable.js"></script>
<script src="dist/js/jquery.alerts.js"></script>
<script src="dist/js/jquery.js"></script>
<link rel="stylesheet"  href="dist/js/jquery.alerts.css" >
                                                  
                                            <script type="text/javascript">
	
					jAlert('<?php echo  $msg; ?>', 'POSNIC');
			
</script>
                                                        <?php
			}
			else
			{
				
			if($db->query("insert into stock_details(stock_id,stock_name,stock_quatity,supplier_id,company_price,selling_price,category,category_2,location,expire_date,uom,alert,reorder) values('$stockid','$name',0,'$supplier',$cost,$sell,'$category','$category_2','$location','$date','$uom','$alert','$reorder')"))
			{ 
				$db->query("insert into stock_avail(name,quantity) values('$name',0)");
                                  $msg=" $name Stock Details Added" ;
				header("Location: add_stock.php?msg=$msg");
                        }else
			echo "<br><font color=red size=+1 >Problem in Adding !</font>" ;
			
			}
			
			
			}
							
							}
						
				if(isset($_GET['msg'])){
                                             $data=$_GET['msg'];
                                            $msg='<p style=color:#153450;font-family:gfont-family:Georgia, Times New Roman, Times, serif>'.$data.'</p>';//
                                            ?>
                                                    
 <script  src="dist/js/jquery.ui.draggable.js"></script>
<script src="dist/js/jquery.alerts.js"></script>
<script src="dist/js/jquery.js"></script>
<link rel="stylesheet"  href="dist/js/jquery.alerts.css" >
                                                  
                                            <script type="text/javascript">
	
					jAlert('<?php echo  $msg; ?>', 'POSNIC');
			
</script>
                                                        <?php
                                         }
				
				?>
				
				<form name="form1" method="post" id="form1" action="">
                  
                
                  <table class="form"  border="0" cellspacing="0" cellpadding="0">
                    <tr>
                          <?php
					  $max = $db->maxOfAll("id", "stock_details");
					  $max=$max+1;
					  $autoid="SD".$max."";
					  ?>
                      <td><span class="man">*</span>Stock ID:</td>
                      <td><input name="stockid" type="text" id="stockid" readonly maxlength="200"  class="round default-width-input" value="<?php echo $autoid; ?>" /></td>
                       
                      <td><span class="man">*</span>Name:</td>
                      <td><input name="name"placeholder="ENTER CATEGORY NAME" type="text" id="name" maxlength="200"  class="round default-width-input" value="<?php echo $name; ?>" /></td>
                       
                    </tr>
                    <tr>
                      <td><span class="man">*</span>Cost:</td>
                      <td><input name="cost" placeholder="ENTER COST PRICE" type="text" id="cost"  maxlength="200"  class="round default-width-input" onkeypress="return numbersonly(event)" value="<?php echo $cost; ?>" /></td>
                       
                      <td><span class="man">*</span>Sell:</td>
                      <td><input name="sell" placeholder="ENTER SELLING PRICE" type="text" id="sell" maxlength="200"  class="round default-width-input" onkeypress="return numbersonly(event)" value="<?php echo $sell; ?>" /></td>
                       
                    </tr>
                    <tr>
                      <td>Supplier:</td>
                      <td><input name="supplier" placeholder="ENTER SUPPLIER NAME" type="text" id="supplier"  maxlength="200"  class="round default-width-input" value="<?php echo $supplier; ?>" /></td>
                       
                      <td>Category1:</td>
                      <td><select name="category_2" size="1" class="form" id="category_2">
                            <option value="N/A">N/A</option>
                            <option value="Office Supplies">Office Supplies</option>
                            <option value="Printed Materials">Printed Materials</option>
                      </select></td>                       
                    </tr>
                   
                    <tr>
                      <td>Location:</td>
                      <td><input name="location" placeholder="ENTER LOCATION" type="text" id="loc"  maxlength="200"  class="round default-width-input" value="<?php echo $location; ?>" /></td>
                      <td>Category2:</td>
                      <td><!--input name="category_2" placeholder="ENTER CATEGORY2 NAME" type="text" id="category_2" maxlength="200"  class="round default-width-input" value="<?php echo $category_2; ?>" /--><input name="category" placeholder="ENTER CATEGORY2 NAME" type="text" id="category" maxlength="200"  class="round default-width-input" value="<?php echo $category; ?>" />
                          </td>
                    </tr>
                    
                    <tr>
                      <td>Expiry Date:</td>
                      <td><input type="text" name="expdate" id="expdate" value="<?php echo date('d-m-Y');?>" class="round"></td>
                       
                      <td>UOM:</td>
                      <td><select name="uom" size="1" class="form" id="uom">
                        <option value="N/A">N/A</option>
                        <option value="Each">Each</option>
                        <option value="Bundle">Bundle</option>
                        <option value="Box">Box</option>
                      </select></td>                       
                    </tr>
                    
                    <tr>
                      <td>Alert Qty:</td>
                      <td><input name="alert" placeholder="ENTER ALERT QTY" type="text" id="alert"  maxlength="200"  class="round default-width-input" value="<?php echo $alert; ?>" /></td>
                       
                      <td>Reorder:</td>
                      <td><input name="reorder" placeholder="ENTER REORDER" type="text" id="reorder" maxlength="200"  class="round default-width-input" value="<?php echo $reorder; ?>" /></td>                       
                    </tr>
                    
                    <tr>
                      <!--td>&nbsp;
					 
					  </td-->
                      <td>
                        <input  class="button round blue image-right ic-add text-upper" type="submit" name="Submit" value="Add">
						(Control+S)
					  
					  <td align="right"><input class="button round red   text-upper"  type="reset" name="Reset" value="Reset"> </td>
                    </tr>
                  </table>
                </form>  
						
				
					</div> <!-- end content-module-main -->
							
				
				</div> <!-- end content-module -->
				
				
		
		</div> <!-- end full-width -->
		  	
	</div> <!-- end content -->
	
	
	
	<!-- FOOTER -->	
</body>
</html>