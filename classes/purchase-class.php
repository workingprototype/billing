<?php
/**
 * Purchase Entry class
 */
class Purchase
{
  #properties
  private $r = " "; //Return Variable

  #methods
  public function echo()
  {
    $this->form();
    return $this->r;
  }
  public function form()
  {
    $this->r .="<div class='row'><div class='col-md-4'><label>Add Purchase Into :</label><select class='form-control'><option>Business A</option></select></div></div>";
    $this->r .="
    <div class='content'>
      <br>
      <div class='row'>
        <div class='col-md-10'>
          <div class='form-group has-feedback'>
            <i class='glyphicon glyphicon-search form-control-feedback'></i>
            <input type='text' class='form-control' placeholder='Start typing Product ID or Product Name of The Product to be Added' />
          </div>
        </div>
        <button class='btn btn-primary'><i class='glyphicon glyphicon-plus '></i> Add</button>
      </div>
    <div>";
  }
}
?>
