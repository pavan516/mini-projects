<!-- Search -->
<div class="col-lg-12">
  <div class="card">
    <div class="card-body" style="padding-bottom:0px;">

      <!-- Form -->
      <form action="<?php echo base_url();?>notifications/search" method="post" enctype="multipart/form-data">

          <!-- Select Category -->
          <div class="form-group">
            <label>Select Category</label>
            <select class="form-control" name="category_id" id="category_id">
              <option value="0">Select Category</option>
              <?php 
              if(!empty($categoryItems)) {
                foreach($categoryItems ?? [] as $category) {?>
                  <option value="<?php echo $category['id']; ?>"><?php echo $category['category_code']." ( ".$category['category_name']." )"; ?></option>
                <?php }
              }?>
            </select>
          </div>
          <!-- Select Category -->
                
          <!-- Search Button -->
          <div style="text-align:center;" class="form-group">
            <button type="submit" class="btn btn-primary">Search</button>
          </div>
          <!-- Search Button -->

      </form>
      <!-- Form -->
    
    </div>
  </div>
</div>
<!-- Search -->