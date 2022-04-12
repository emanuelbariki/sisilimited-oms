<?
  class Cars extends model{
    var $table = 'cars';

      function getAllCars(){
          $sql = "SELECT cars.*, brands.name AS brandName, makes.name AS makeName FROM `cars`

                INNER JOIN brands ON
                brands.id = cars.brandid

                INNER JOIN makes ON
                makes.id = cars.makeid

                WHERE cars.status = 'active'";

          return fetchRows($sql);
        }
  }
