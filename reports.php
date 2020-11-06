reports v1.2a
<br><br>
<form action="" method="post">
<div style="width:100%">

<label for="start">Start Date:</label>

<input type="date" id="start" name="trip-start"
       value="2018-07-22"
       min="2018-01-01" max="2018-12-31">
 to
 <input type="date" id="start" name="trip-start"
        value="2020-07-22"
        min="2018-01-01" max="2020-12-31">


<button class="btn btn-sm btn-success" name="btn_run">Run</button>
<button class="btn btn-sm btn-success">Schedule</button>
<button class="btn btn-sm btn-success">Create PDF</button>
<button class="btn btn-sm btn-success">Save Script</button>

</div>

	<input type="hidden" name="action" value="run_report">
</form>
<br><br>


<form action="/action_page.php">
<?php include_once 'report-filters.php'; ?>

</form>
<br><br>
<table id="#example" style="width:100%" class="table display no-wrap table-hover table-condensed table-bordered table-striped">
  <thead>
    <tr>
      <th>
Order #
      </th>
      <th>
Client
      </th>
      <th>
Sales Tax
      </th>
    </tr>
  </thead>
  <tbody>
	<?php
	if(isset($_POST['btn_run'])) :
		$start_date = strftime("%Y-%m-%d %H:%M:%S", strtotime('-7 days'));
		$r = $db->query("SELECT * FROM ag_order WHERE is_delete='0' AND order_date>='{$start_date}' AND status!='Estimate'");
		while($d = $db->fetch_assoc($r)) :
	?>
    <tr>
      <td>
        <?php echo $d['part_name']; ?>
      </td>
      <td>
        2
      </td>
      <td>
        3
      </td>
    </tr>
		<?php endwhile; ?>
	<?php endif; ?>
  </tbody>
</table>
