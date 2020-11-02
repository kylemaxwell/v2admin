<?php
switch($_GET['id'])
{
   default:include "dashboard.php";
		 break;
   case "categories":
      include "categories.php";
   break;
   case "products":
      include "products.php";
   break;
   case "options":
      include "options.php";
   break;
   case "vieworders":
      include "view_orders.php";
   break;
}
?>
