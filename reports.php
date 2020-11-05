reports v1.2
<br><br>
<div style="width:100%">

<label for="start">Start Date:</label>

<input type="date" id="start" name="trip-start"
       value="2018-07-22"
       min="2018-01-01" max="2018-12-31">
 to
 <input type="date" id="start" name="trip-start"
        value="2020-07-22"
        min="2018-01-01" max="2020-12-31">


<button class="btn btn-sm btn-success">Run</button>
<button class="btn btn-sm btn-success">Schedule</button>
<button class="btn btn-sm btn-success">Create PDF</button>
<button class="btn btn-sm btn-success">Save Script</button>


</div>
<br><br>

<?php include "report-filters.php"; ?>

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
  <thead>
  <tbody>
    <tr>
      <td>
        1
      </td>
      <td>
        2
      </td>
      <td>
        3
      </td>
    </tr>
    <tr>
      <td>
        1
      </td>
      <td>
        2
      </td>
      <td>
        3
      </td>
    </tr>
    <tr>
      <td>
        1
      </td>
      <td>
        2
      </td>
      <td>
        3
      </td>
    </tr>
  </tbody>
</table>
