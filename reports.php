reports v1.6
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


<form action="/action_page.php">
<div style="display:flex;justify-content:space-between;">
<div><input type="checkbox" id="order#" name="order#" value="order#"><label style="padding-left:5px" for="order#"> Order #</label></div>
<div><input type="checkbox" id="client" name="client" value="client"><label style="padding-left:5px" for="client"> Client</label></div>
<div><input type="checkbox" id="salestax" name="salestax" value="salestax"><label style="padding-left:5px" for="salestax"> Sales Tax</label></div>
<div><input type="checkbox" id="orderdesc" name="orderdesc" value="orderdesc"><label style="padding-left:5px" for="orderdesc"> Order Description</label></div>
<div><input type="checkbox" id="cost" name="cost" value="cost"><label style="padding-left:5px" for="cost"> Cost</label></div>
<div><input type="checkbox" id="commission" name="commission" value="commission"><label style="padding-left:5px" for="commission"> Commission</label></div>
<div><input type="checkbox" id="netprofit" name="netprofit" value="netprofit"><label style="padding-left:5px" for="netprofit"> Net Profit</label></div>
<div><input type="checkbox" id="invdate" name="invdate" value="invdate"><label style="padding-left:5px" for="invdate"> Invoice Date</label></div>
<br><br>
</div>
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
