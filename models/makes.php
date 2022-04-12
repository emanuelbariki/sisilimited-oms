<?
  class Makes extends model{
    var $table = 'makes';

      function getAllMakes(){
          $sql = "SELECT makes.*, brands.name as brandName FROM makes
          
          INNER JOIN brands ON
          brands.id = makes.brandid
          
          WHERE makes.status='active'";

		  return fetchRows($sql);
    }
  }
