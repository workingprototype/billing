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
                <input class='form-control' id='CGST'>
            </div>
            <div class='form-groups'>
                <label>SGST</label>
                <input class='form-control' id='SGST'>
            </div>
            <div class='form-groups'>
                <label>IGST</label>
                <input class='form-control' id='IGST'>
            </div>
            <div class='form-groups'>
                <label>VAT</label>
                <input class='form-control' id='VAT'>
            </div>
            <div class='form-groups'>
                <label>Price Inclusive/Exclusive of Tax</label>
                <select id='incex' class='form-control'>
                    <option value='1'>Price Inclusive of Tax</option>
                    <option value='0'>Price Exclusive of Tax</option>
                </select>
            </div>
            <div class='form-groups'>
                <label>Selling Price</label>
                <input onkeyup='changePrice()' class='form-control' id='price'>
            </div>
        </div>
        </div>
        <div class='col-md-4' >
            <h4>Product Info</h4>
            <div id='pinfo'> </div>
        </div>
        <div class='col-md-8 divider'></div>

        </div>
        ";
    }
    public function script()
    {
        $this->return .="
        <script>
            var incex;
            var pinfo = document.getElementById('pinfo');
            var productinfo=[];
            function changeProfit(){
                productinfo[7] = document.getElementById('profit').value;
                productinfo[5] = document.getElementById('cost').value;
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

                pinfo.innerHTML= \"<p>\"+productinfo[0]+\"</p> \
                <p>Brand :  \"+productinfo[1]+\"</p>\
                <p>Units :  \"+productinfo[2]+\"</p>\
                <p>Category :  \"+productinfo[3]+\"</p>\
                <p>Sub-Category :  \"+productinfo[4]+\"</p>\
                <p>Cost :  \"+productinfo[5]+\"</p>\
                <p>Price :  \"+productinfo[6]+\"</p>\
                <p>Profit Margin :  \"+productinfo[7]+\"</p>\
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