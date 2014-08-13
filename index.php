<html>
<head>
	<title>Sample Checkout Form</title>
	<style>
		body {
			margin: 0;
			padding: 0;
		}
		
		#main_container {
			text-align: center;
		}
		
		#center_container {
			display: inline-block;
		}
		
		#content_container {
			text-align: left;
			width: 100%;
		}
		
		#shipping_address, #widget_container, #widget_result {
			width: 400px;
			height: 500px;
			display: block;
			float: left;
		}

		#widget_container, #widget_result {
			width: 360px;
			margin: 60px 20px 60px 20px;
		}
		
		.inputBlock input {
			width: 300px;
		}
		
		#widget_result {
			margin: 250px 20px 0 20px;
		}
		
	</style>
	<script src="https://widgets.dpd.nl/widgets/Scripts/checkoutWidget/init.js"></script>
	<script>
		function callback(data){
			var divResult = document.getElementById("widget_result");
			
			switch(data.product){
				case "DPDHome":
					divResult.innerHTML = "You have chosen for a Home Delivery on address: <br><strong>" + data.consumerInfo.address.street + " " + data.consumerInfo.address.houseNumber + ", " + data.consumerInfo.address.postalCode + " " + data.consumerInfo.address.city + "</strong>";
					break;
				case "DPDParcelshop":
					divResult.innerHTML = "You have chosen for a ParcelShop Delivery in shop: <strong>" + data.parcelShop.name + "</strong><br> with address: <br><strong>" + data.parcelShop.address.street + " " + data.parcelShop.address.houseNumber + ", " + data.parcelShop.address.postalCode + " " + data.parcelShop.address.city + "</strong>";
					break;
				default:
			}
		}
		
		function initWidget(){
			var config = {
				"order": {
					"orderNumber": "123456", 	// Your order number
					"orderPrice": "12.50", 		// Order price (used for table rate price calculation)
					"orderWeight": "2.5" 		// Order weight (used for price calculation)
				},
				"integrationType": "inline",
				"locale": "nl_BE",
				"apiKey": "", // YOUR API KEY
				"divId": 'dpd_widget_container',
				"consumerInfo": {
					"name": document.getElementById("txtCneeFirstName").value + " " + document.getElementById("txtCneeLastName").value,
					"email": document.getElementById("txtCneeEmail").value,
					"phoneNumber": document.getElementById("txtCneePhone").value,
					"address": {
					  "street": document.getElementById("txtCneeStreet").value,
					  "houseNumber": document.getElementById("txtCneeHouseNo").value,
					  "houseNumberAddition": null,
					  "postalCode": document.getElementById("txtCneeCode").value,
					  "city": document.getElementById("txtCneeCity").value,
					  "countryISO": "BE"
					}
				  }
				};
				
			startCheckoutWidget(config, callback);
		}
	</script>
</head>
<body>
	<div id="main_container">
		<div id="center_container">
			<div id="header_container">
				<img src="images/header.png" />
			</div>
			<div id="content_container">
				<div id="shipping_address">
					<h1>Billing Address</h1>
					<span class="inputBlock">
						<label>First Name</label><br><input type="text" id="txtCneeFirstName"><br>
					</span>
					<span class="inputBlock">
						<label>Last Name</label><br><input type="text" id="txtCneeLastName"><br>
					</span>
					<span class="inputBlock">
						<label>Email Address</label><br><input type="text" id="txtCneeEmail"><br>
					</span>
					<span class="inputBlock address">
						<label>Address</label><br><input maxlength="35" type="text" id="txtCneeStreet"><br>
					</span>
					<span class="inputBlock">
						<label>House Number</label><br><input maxlength="8" type="text" id="txtCneeHouseNo"><br>
					</span>
					<span class="inputBlock">
						<label>City</label><br><input type="text" id="txtCneeCity"><br>
					</span>
					<span class="inputBlock">
						<label>Zip Code</label><br><input type="text" id="txtCneeCode"><br>
					</span>
					<span class="inputBlock">
						<label>Telephone</label><br><input type="text" id="txtCneePhone"><br>
					</span>
					<a href="#" onclick="javascript:initWidget(); return false;">Click here to launch the widget</a>
				</div>
				<div id="widget_container">
					<div id="dpd_widget_container"></div>
				</div>
				<div id="widget_result"></div>
			</div>
		</div>
	</div>
</body>
</html>