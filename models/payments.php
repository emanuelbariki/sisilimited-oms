<?
  class Payments extends model{
    var $table = 'payments';

      function getPaymentDetails($paymentid="", $orderid=""){
          $sql = "SELECT payments.*, clients.id AS clientID, orders.id AS orderID, payment_methods.name AS paymentMethod, users.name as createdby FROM `payments`

			INNER JOIN orders ON
			orders.id = payments.orderid

			INNER JOIN clients ON
			orders.clientid = clients.id

			INNER JOIN payment_methods ON
			payment_methods.id = payments.payment_type

			INNER JOIN users ON
			users.id = payments.recievedby
			WHERE 1=1";

			if (!empty($paymentid)) {
				$sql .=" and payments.id = '$paymentid'";
				# code...
			}
			if (!empty($orderid)) {
				$sql .=" and payments.orderid = '$orderid'";
				# code...
			}
			// debug($sql);

          return fetchRows($sql);
      }

      function paymentReport($orderno='', $paymentid="", $clientid="", $paymentmethod="", $carid="", $recievedby="", $from="", $to=""){
      	$sql = "SELECT payments.*, orders.orderno as orderno, orders.container_size AS containerSize, brands.name AS brandName, makes.name AS makeName, clients.name AS clinetName, payment_methods.name AS paymeneMethod, consignment_types.name AS consignment_type, users.name AS recievedBy FROM `payments`

			INNER JOIN orders ON
			payments.orderid = orders.id

			INNER JOIN cars ON
			orders.carid = cars.id

			INNER JOIN brands ON
			cars.brandid = brands.id

			INNER JOIN makes ON
			cars.makeid = makes.id

			INNER JOIN clients ON
			orders.clientid = clients.id

			INNER JOIN payment_methods ON
			payments.payment_type = payment_methods.id

			INNER JOIN consignment_types on 
			orders.consignment_type = consignment_types.id

			INNER JOIN users on
			users.id = payments.recievedby
			WHERE 1=1";

			if (!empty($orderno)) {
				$sql .=" and orders.orderno = '$orderno'";
			}
			if (!empty($paymentid)) {
				$sql .=" and payments.id = '$paymentid'";
			}
			if (!empty($clientid)) {
				$sql .=" and orders.clientid = '$clientid'";
			}
			if (!empty($paymentmethod)) {
				$sql .=" and payments.payment_type = '$paymentmethod'";
			}
			if (!empty($carid)) {
				$sql .=" and orders.carid = '$carid'";
			}
			if (!empty($recievedby)) {
				$sql .=" and payments.recievedby = '$recievedby'";
			}
			if (!empty($from)) {
				$sql .=" and payments.doc >= '$from'";
			}
			if (!empty($to)) {
				$sql .=" and payments.doc <= '$to'";
			}
			// debug($sql);
			return fetchRows($sql);
      }


    }
