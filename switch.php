<?php
switch($_GET['id'])
{
   default:include "dashboard.php";
		 break;

    case "child":
        include "child.php";
    break;
    case "orders":
        include "orders.php";
    break;
    case "admin":
        include "admin.php";
    break;
    case "reports":
        include "reports.php";
    break;
    case "cfo":
        include "cfo.php";
    break;
    case "clients":
        include "clients.php";
    break;
    case "Time Clock":
        include "timeclock.php";
    break;
    case "frontend":
        include "frontend.php";
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
