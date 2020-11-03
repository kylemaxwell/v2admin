<?php
switch($_GET['id'])
{
   default:include "dashboard.php";
		 break;

    case "orders":
        include "orders.php";
    break;
    case "admin":
        include "admin.php";
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
