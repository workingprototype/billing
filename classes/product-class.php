<?php
/**
 * undocumented class
 */
class ProductMan
{
    protected $business = "default";  
    protected $titles = ["product_name","brand","unit","category","sub-category","tax", "notes"];
    protected $taxes = ["CGST", "IGST", "SGST", "VAT"];
    protected $props = [];
    protected $return='';
    public function form()
    {
        $this->return .= "
        <style>
        </style>
        <div class='row'>
        <div class='col-md-4 rows'>
            <h4>Product Details</h4>
            <div class='form-groups'>
                <label>Product Name</label>
                <input class='form-control' onkeyup='display()' id='product_name'>
            </div>
            <div class='form-groups'>
                <label>Product Brand</label>
                <input class='form-control' onkeyup='display()' id='brand'>
            </div>
            <div class='form-groups'>
                <label>Units</label>
                <select class='form-control' onchange='display()' id='unit'>
                <option>Pcs</option>
                <option>Boxes</option>
                </select>
            </div>
            <div class='form-groups'>
                <label>Product Category</label>
                <input class='form-control' onkeyup='display()' id='category'>
            </div>
            <div class='form-groups'>
                <label>Product Sub-Category</label>
                <input class='form-control' onkeyup='display()' id='sub-category'>
            </div>
            <div class='form-groups'>
                <label>Buying Cost (Per Unit)</label>
                <input onkeyup='display()' class='form-control' id='cost'>
            </div>
            <div class='form-groups'>
            <label>Profit Margin </label>
            <input onkeyup='changeProfit()' class='form-control' id='profit'>
            </div>
        </div>
        <div class=' col-md-4  rows'>
        <h4>Tax Details</h4>
        <div class='form-groups'>
                <label>CGST</label>
                <input onkeyup='display()' class='form-control' id='CGST'>
            </div>
            <div class='form-groups'>
                <label>SGST</label>
                <input onkeyup='display()' class='form-control' id='SGST'>
            </div>
            <div class='form-groups'>
                <label>IGST</label>
                <input onkeyup='display()' class='form-control' id='IGST'>
            </div>
            <div class='form-groups'>
                <label>VAT</label>
                <input onkeyup='display()' class='form-control' id='VAT'>
            </div>
            <div class='form-groups'>
                <label>Price Inclusive/Exclusive of Tax</label>
                <select onchange='display()' id='incex' class='form-control'>
                    <option value='1'>Price Inclusive of Tax</option>
                    <option value='0'>Price Exclusive of Tax</option>
                </select>
            </div>
            <div class='form-groups'>
                <label>Selling Price</label>
                <input onkeyup='changePrice()' class='form-control' id='price'>
            </div>
        </div>
        
        <div class='col-md-8 divider'></div>
        </div>
        <button onclick='sendform()' class='btn btn-primary'>Add Product</button>
        <div >
            <h4>Product Info</h4>
            <div display='none' id='pinfo'> </div>
        </div>
        ";
    }
    public function script()
    {
        $this->return .="
        <script>
            var temp;
            var pinfo = document.getElementById('pinfo');
            var productinfo=[];
            function sendform(){
                display();
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                  }
                };
                var data = JSON.stringify(productinfo);
                xhttp.open(\"POST\", \"./function/add_product\", true);
                xhttp.setRequestHeader(\"Content-type\", \"application/x-www-form-urlencoded\");
                xhttp.send(\"data=\"+ data);
            }
            function changeProfit(){
                productinfo[12] = document.getElementById('incex').value;
                productinfo[7] = document.getElementById('profit').value;
                productinfo[5] = document.getElementById('cost').value;
                productinfo[8] = document.getElementById('CGST').value;
                productinfo[9] = document.getElementById('SGST').value;
                productinfo[10] = document.getElementById('IGST').value;
                productinfo[11] = document.getElementById('VAT').value; 
                document.getElementById('price').value = (Number(productinfo[5])*Number(productinfo[7])/100)+Number(productinfo[5]);
                display();
            }
            function changePrice(){
                productinfo[6] = document.getElementById('price').value;
                productinfo[5] = document.getElementById('cost').value;
                document.getElementById('profit').value = ((Number(productinfo[6])-Number(productinfo[5]))*100)/Number(productinfo[5]);
                display();
            }
            function display(){
                productinfo[0] = document.getElementById('product_name').value;
                productinfo[1] = document.getElementById('brand').value;
                productinfo[2] = document.getElementById('unit').value;
                productinfo[3] = document.getElementById('category').value;
                productinfo[4] = document.getElementById('sub-category').value;
                productinfo[5] = document.getElementById('cost').value;
                productinfo[6] = document.getElementById('price').value;
                productinfo[7] = document.getElementById('profit').value;

                productinfo[8] = document.getElementById('CGST').value;
                productinfo[9] = document.getElementById('SGST').value;
                productinfo[10] = document.getElementById('IGST').value;
                productinfo[11] = document.getElementById('VAT').value;


                pinfo.innerHTML= \"<p>\"+productinfo[0]+\"</p> \
                <p>Brand :  \"+productinfo[1]+\"</p>\
                <p>Units :  \"+productinfo[2]+\"</p>\
                <p>Category :  \"+productinfo[3]+\"</p>\
                <p>Sub-Category :  \"+productinfo[4]+\"</p>\
                <p>Cost :  \"+productinfo[5]+\"</p>\
                <p>Price :  \"+productinfo[6]+\"</p>\
                <h4>Tax Info</h4>\
                <p>CGST :  \"+productinfo[8]+\"</p>\
                <p>SGST :  \"+productinfo[9]+\"</p>\
                <p>IGST :  \"+productinfo[10]+\"</p>\
                <p>VAT :  \"+productinfo[11]+\"</p>\
                \"
            }
        </script>
        
        ";
    }
    public function echo()
    {
        $this->form();
        $this->script();
        return $this->return;
    }
}


?>