<style>
  .colflex {
    flex-basis: 150px;
    border:0px solid green;
  }

  .containflex {
    display:flex;
    flex-wrap:wrap;
    justify-content:flex-start;
  }

  .filternote {
    font-size:12px;
    padding:3px;
    border:1px solid red;
    color:red;
  }
</style>

<div class="filternote">Please note that every item checked increases the time needed to calculate the report.</div>
<br>
<div class="containflex">

<div class="colflex"><input type="checkbox" id="order#" name="order#" value="order#"><label style="padding-left:5px" for="client"> Order #</label></div>
<div class="colflex"><input type="checkbox" id="client" name="client" value="client"><label style="padding-left:5px" for="client"> Client</label></div>
<div class="colflex"><input type="checkbox" id="salestax" name="salestax" value="salestax"><label style="padding-left:5px" for="salestax"> Sales Tax</label></div>
<div class="colflex"><input type="checkbox" id="orderdesc" name="orderdesc" value="orderdesc"><label style="padding-left:5px" for="orderdesc"> Order Description</label></div>
<div class="colflex"><input type="checkbox" id="cost" name="cost" value="cost"><label style="padding-left:5px" for="cost"> Cost</label></div>
<div class="colflex"><input type="checkbox" id="commission" name="commission" value="commission"><label style="padding-left:5px" for="commission"> Commission</label></div>
<div class="colflex"><input type="checkbox" id="netprofit" name="netprofit" value="netprofit"><label style="padding-left:5px" for="netprofit"> Net Profit</label></div>
<div class="colflex"><input type="checkbox" id="invdate" name="invdate" value="invdate"><label style="padding-left:5px" for="invdate"> Invoice Date</label></div>
<div class="colflex"><input type="checkbox" id="newclients" name="newclients" value="newclients"><label style="padding-left:5px" for="newclients"> New Clients Only</label></div>
<div class="colflex"><input type="checkbox" id="shipping" name="shipping" value="shipping"><label style="padding-left:5px" for="shipping"> Shipping</label></div>
<div class="colflex"><input type="checkbox" id="jentries" name="jentries" value="jentries"><label style="padding-left:5px" for="cost"> Journal Entries</label></div>
<div class="colflex"><input type="checkbox" id="newar" name="newar" value="newar"><label style="padding-left:5px" for="newar"> New A/R Charges</label></div>
<div class="colflex"><input type="checkbox" id="handling" name="handling" value="handling"><label style="padding-left:5px" for="handling"> Handling</label></div>
<div class="colflex"><input type="checkbox" id="taxable" name="taxable" value="taxable"><label style="padding-left:5px" for="taxable"> Taxable Sales</label></div>
<div class="colflex"><input type="checkbox" id="taxon" name="taxon" value="taxon"><label style="padding-left:5px" for="taxon"> Tax On Sales</label></div>
<div class="colflex"><input type="checkbox" id="notax" name="notax" value="notax"><label style="padding-left:5px" for="notax"> Non Tax Sales</label></div>
<div class="colflex"><input type="checkbox" id="deposits" name="deposits" value="deposits"><label style="padding-left:5px" for="deposits"> Deposits</label></div>
<div class="colflex"><input type="checkbox" id="arcurrent" name="arcurrent" value="arcurrent"><label style="padding-left:5px" for="arcurrent"> A/R Current</label></div>
<div class="colflex"><input type="checkbox" id="ar30" name="ar30" value="ar30"><label style="padding-left:5px" for="ar30"> A/R 30+</label></div>
<div class="colflex"><input type="checkbox" id="ar60" name="ar60" value="ar60"><label style="padding-left:5px" for="ar60"> A/R 60+</label></div>
<div class="colflex"><input type="checkbox" id="ar90" name="ar90" value="ar90"><label style="padding-left:5px" for="ar90"> A/R 90+</label></div>
<div class="colflex"><input type="checkbox" id="credbal" name="credbal" value="credbal"><label style="padding-left:5px" for="credbal"> Credit Balance</label></div>
<div class="colflex"><input type="checkbox" id="po" name="po" value="po"><label style="padding-left:5px" for="po"> Purchase Order #</label></div>

</div>