<?php
	
	class OrderComments extends model {
		var $table = 'order_comments';
		
		function getOrderComments($orderid = null){
            $sql = "SELECT order_comments.*, users.name AS postedBy, users.image AS image FROM `order_comments`

            LEFT JOIN users ON
            order_comments.createdby = users.id
            
            WHERE 1=1";

            if (!empty($orderid)) {
                $sql .=" and order_comments.orderid = $orderid";
            }
            // debug($sql);
            return fetchRows($sql);
        }
	}	