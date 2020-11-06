<style>
  .colflex {
    flex-basis: 150px;
    border:0px solid green;
  }

  .colflex1 {
    flex-basis: 250px;
    padding:3px 0px;
  }

  .containflex {
    display:flex;
    flex-wrap:wrap;
    justify-content:flex-start;
  }

  .filternote {
    font-size:12px;

    color:red;
    margin-right:auto;
  }
</style>

<form action="/action_page.php">

<div class="filternote"><i style="font-weight:bolder"  class="far icon-pin"></i> Please note that every item checked increases the time needed to calculate the report.</div>
<br>
<div class="containflex">

<div class="colflex" data-toggle="tooltip" title="Displays the Order ID number."><input type="checkbox" id="order#" name="order#" value="order#"><label style="padding-left:3px" for="client"> Order #</label></div>
<div class="colflex"><input type="checkbox" id="client" name="client" value="client"><label style="padding-left:3px" for="client"> Client Name</label></div>
<div class="colflex"><input type="checkbox" id="salestax" name="salestax" value="salestax"><label style="padding-left:3px" for="salestax"> Sales Tax</label></div>
<div class="colflex"><input type="checkbox" id="orderdesc" name="orderdesc" value="orderdesc"><label style="padding-left:3px" for="orderdesc"> Order Description</label></div>
<div class="colflex"><input type="checkbox" id="cost" name="cost" value="cost"><label style="padding-left:3px" for="cost"> Cost</label></div>
<div class="colflex"><input type="checkbox" id="commission" name="commission" value="commission"><label style="padding-left:3px" for="commission"> Commission</label></div>
<div class="colflex"><input type="checkbox" id="netprofit" name="netprofit" value="netprofit"><label style="padding-left:3px" for="netprofit"> Net Profit</label></div>
<div class="colflex"><input type="checkbox" id="invdate" name="invdate" value="invdate"><label style="padding-left:3px" for="invdate"> Invoice Date</label></div>
<div class="colflex"><input type="checkbox" id="newclients" name="newclients" value="newclients"><label style="padding-left:3px" for="newclients"> New Clients Only</label></div>
<div class="colflex"><input type="checkbox" id="shipping" name="shipping" value="shipping"><label style="padding-left:3px" for="shipping"> Shipping</label></div>
<div class="colflex"><input type="checkbox" id="jentries" name="jentries" value="jentries"><label style="padding-left:3px" for="cost"> Journal Entries</label></div>
<div class="colflex" data-toggle="tooltip" title="New Accounts Receivable charges."><input type="checkbox" id="newar" name="newar" value="newar"><label style="padding-left:3px" for="newar"> New A/R</label></div>
<div class="colflex"><input type="checkbox" id="handling" name="handling" value="handling"><label style="padding-left:3px" for="handling"> Handling</label></div>
<div class="colflex"><input type="checkbox" id="taxable" name="taxable" value="taxable"><label style="padding-left:3px" for="taxable"> Taxable Sales</label></div>
<div class="colflex"><input type="checkbox" id="taxon" name="taxon" value="taxon"><label style="padding-left:3px" for="taxon"> Tax On Sales</label></div>
<div class="colflex"><input type="checkbox" id="notax" name="notax" value="notax"><label style="padding-left:3px" for="notax"> Non Tax Sales</label></div>
<div class="colflex"><input type="checkbox" id="deposits" name="deposits" value="deposits"><label style="padding-left:3px" for="deposits"> Deposits</label></div>
<div class="colflex"><input type="checkbox" id="arcurrent" name="arcurrent" value="arcurrent"><label style="padding-left:3px" for="arcurrent"> A/R Current</label></div>
<div class="colflex"><input type="checkbox" id="ar30" name="ar30" value="ar30"><label style="padding-left:3px" for="ar30"> A/R 30+</label></div>
<div class="colflex"><input type="checkbox" id="ar60" name="ar60" value="ar60"><label style="padding-left:3px" for="ar60"> A/R 60+</label></div>
<div class="colflex"><input type="checkbox" id="ar90" name="ar90" value="ar90"><label style="padding-left:3px" for="ar90"> A/R 90+</label></div>
<div class="colflex"><input type="checkbox" id="credbal" name="credbal" value="credbal"><label style="padding-left:3px" for="credbal"> Credit Balance</label></div>
<div class="colflex"><input type="checkbox" id="po" name="po" value="po"><label style="padding-left:3px" for="po"> Purchase Order #</label></div>
<div class="colflex"><input type="checkbox" id="subtotal" name="subtotal" value="subtotal"><label style="padding-left:3px" for="subtotal"> Subtotal</label></div>
<div class="colflex"><input type="checkbox" id="status" name="status" value="status"><label style="padding-left:3px" for="status"> Status</label></div>
<div class="colflex"><input type="checkbox" id="invdate" name="invdate" value="invdate"><label style="padding-left:3px" for="invdate"> Inventory Date</label></div>
<div class="colflex"><input type="checkbox" id="paydate" name="paydate" value="paydate"><label style="padding-left:3px" for="paydate"> Pay Date</label></div>
<div class="colflex"><input type="checkbox" id="compercent" name="compercent" value="compercent"><label style="padding-left:3px" for="compercent"> Commission %</label></div>
<div class="colflex"><input type="checkbox" id="clientage" name="clientage" value="clientage"><label style="padding-left:3px" for="clientage"> Client Age</label></div>
<div class="colflex"><input type="checkbox" id="clientageatoo" name="clientageatoo" value="clientageatoo"><label style="padding-left:3px" for="clientageatoo"> Client Age ATOO</label></div>
<div class="colflex"><input type="checkbox" id="gbu" name="gbu" value="gbu"><label style="padding-left:3px" for="gbu"> GBU</label></div>
<div class="colflex"><input type="checkbox" id="payment" name="payment" value="payment"><label style="padding-left:3px" for="payment"> Payment</label></div>
<div class="colflex"><input type="checkbox" id="paydate" name="paydate" value="paydate"><label style="padding-left:3px" for="paydate"> Payment Date</label></div>
<div class="colflex" data-toggle="tooltip" title="Displays the reason the Estimate wasn't awarded."><input type="checkbox" id="rna" name="rna" value="rna"><label style="padding-left:3px" for="rna"> RNA</label></div>
<div class="colflex" data-toggle="tooltip" title="Displays client's first order date."><input type="checkbox" id="fod" name="fod" value="fod"><label style="padding-left:3px" for="fod"> First Order</label></div>
<div class="colflex" data-toggle="tooltip" title="Displays client's last order date."><input type="checkbox" id="lod" name="fod" value="lod"><label style="padding-left:3px" for="lod"> Last Order</label></div>
<div class="colflex" data-toggle="tooltip" title="Displays client's phone number."><input type="checkbox" id="phone" name="phone" value="phone"><label style="padding-left:3px" for="phone"> Phone</label></div>
<div class="colflex" data-toggle="tooltip" title="Displays client's primary contact."><input type="checkbox" id="contact" name="contact" value="contact"><label style="padding-left:3px" for="contact"> Contact</label></div>
<div class="colflex" data-toggle="tooltip" title="Displays client's email address."><input type="checkbox" id="email" name="email" value="email"><label style="padding-left:3px" for="email"> Email</label></div>
<div class="colflex" data-toggle="tooltip" title="Displays client's street address."><input type="checkbox" id="address" name="address" value="address"><label style="padding-left:3px" for="address"> Address</label></div>
<div class="colflex" data-toggle="tooltip" title="Displays client's city and state."><input type="checkbox" id="citystate" name="citystate" value="citystate"><label style="padding-left:3px" for="citystate"> City/State</label></div>

</div>

<hr style="border-top:1px solid #cccccc">

<div class="containflex">
  <div class="colflex1"><label style="padding-right:3px" for="salesagent"> Agent:</label><select id="salesagent" name="salesagent" value="salesagent">
    <option selected>All</option>
    <option>Agent List</option>
  </select></div>

  <div class="colflex1"><label style="padding-right:3px" for="storeloc"> Location:</label><select id="storeloc" name="storeloc" value="storeloc">
    <option selected>All</option>
    <option >Store Locations</option>
  </select></div>

  <div class="colflex1"><label style="padding-right:3px" for="paystatus"> Pay Status:</label><select id="paystatus" name="paystatus" value="paystatus">
    <option selected>All</option>
    <option>Paid</option>
    <option>Unpaid</option>
    <option>Partial</option>
  </select></div>

  <div class="colflex1"><label style="padding-right:3px" for="clientfilter"> Clients:</label><select id="clientfilter" name="clientfilter" value="clientfilter">
    <option selected>All</option>
    <option>Active</option>
    <option>Inactive</option>
  </select></div>

  <div class="colflex1"><label style="padding-right:3px" for="ordertype"> Order Type:</label><select id="ordertype" name="ordertype" value="ordertype">
    <option selected>All</option>
    <option>Estimates</option>
    <option>Invoices</option>
    <option>Recent</option>
  </select></div>

  <div class="colflex1"><label style="padding-right:3px" for="awardstatus"> Awarded:</label><select id="awardstatus" name="awardstatus" value="awardstatus">
    <option selected>All</option>
    <option>Awarded</option>
    <option>Not Awarded</option>
  </select></div>

  <div class="colflex1"><label style="padding-right:3px" for="awardstatus"> Activity:</label><select id="awardstatus" name="awardstatus" value="awardstatus">
    <option selected>All</option>
    <option>Recent Orders</option>
    <option>No Recent Orders</option>
    <option>Active This Year</option>
    <option>Active 6 Months</option>
  </select></div>

  <div class="colflex1"><label style="padding-right:3px" for="commissions"> Commissions:</label><select id="commissions" name="commissions" value="commissions">
    <option selected>All</option>
    <option>Paid Only</option>
    <option>Unpaid Only</option>
  </select></div>

  <div class="colflex1"><label style="padding-right:3px" for="moneyvalue"> Value:</label><input placeholder="$0.00" style="width:70px" type="text"> to <input placeholder="$0.00" style="width:70px" type="text"></div>

</div>

<hr style="border-top:1px solid #cccccc">
<i style="font-weight:bolder;color:black;font-size:16px"  class="fa icon-search"></i>  <input style="border:1px solid #999999;max-width:400px" type="text" class="form-control" placeholder="Search Report Results">


</form>
