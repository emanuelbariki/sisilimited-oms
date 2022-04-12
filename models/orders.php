<?
  class Orders extends model{
    var $table = 'orders';

    function getAllOrders($orderid="", $ordertype="", $clientID="", $eta="", $etd="", $userid=""){
      $sql = "SELECT orders.*, order_status.name AS orderstatus, clients.name AS clientname, brands.name AS brandName, makes.name AS makeName, cars.year AS year, users.name AS createdBy, fromports.name AS fromPort, toports.name AS toPort, date_format(orders.date,'%d-%M-%Y') as issue_date FROM `orders`

      INNER JOIN ports AS fromports ON
      orders.fromport = fromports.id

      INNER JOIN ports AS toports ON
      orders.toport = toports.id

      INNER JOIN cars ON
      orders.carid = cars.id

      INNER JOIN brands ON
      cars.brandid = brands.id

      INNER JOIN makes ON
      cars.makeid = makes.id

      INNER JOIN clients ON
      orders.clientid = clients.id

      LEFT JOIN order_status ON
      orders.statusid = order_status.id

      INNER JOIN users ON
      orders.createdby = users.id

      WHERE 1=1";

      if (!empty($orderid)) {
        $sql .=" and orders.id = '$orderid'";
      }

      if (!empty($clientID)) {
        $sql .=" and clients.id = '$clientID'";
      }

      if (!empty($eta)) {
        $sql .=" and orders.eta = '$eta'";
      }

      if (!empty($etd)) {
        $sql .=" and orders.etd = '$etd'";
      }

      if (!empty($userid)) {
        $sql .=" and orders.createdby = '$userid'";
      }

      $sql .="  ORDER BY `orders`.`id` DESC";
    //   debug($sql);
			return fetchRows($sql);
    }

    function maxID(){
      $sql = "SELECT MAX(id) AS maxID FROM orders";
			return fetchRow($sql);
    }

    function getAllOrders_c($value=''){ // C for Containers
      # code...
      $sql = "SELECT orders.*, order_status.name AS orderstatus, clients.name AS clientname, users.name AS createdBy, fromports.name AS fromPort, toports.name AS toPort, date_format(orders.date,'%d-%M-%Y') as issue_date FROM `orders`

      INNER JOIN ports AS fromports ON
      orders.fromport = fromports.id

      INNER JOIN ports AS toports ON
      orders.toport = toports.id

      INNER JOIN clients ON
      orders.clientid = clients.id

      LEFT JOIN order_status ON
      orders.statusid = order_status.id

      INNER JOIN users ON
      orders.createdby = users.id

      WHERE 1=1";

      if (!empty($orderid)) {
        $sql .=" and orders.id = '$orderid'";
        # code...
      }

      $sql .="  ORDER BY `orders`.`id` DESC";
      // debug($sql);
      return fetchRows($sql);
    }
  }
