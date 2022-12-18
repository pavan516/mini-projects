<!-- Search -->
<div class="col-lg-12">
  <div class="card">
    <div class="card-body" style="padding-bottom:0px;">

      <!-- Form -->
      <form action="<?php echo base_url();?>articles/search" method="post" enctype="multipart/form-data">

        <!-- Select Branches & Subjects -->
        <div class="form-row">

          <!-- Select Study Material -->
          <div class="form-group col-md-4">
            <select class="form-control" name="material_id" id="material_id" onchange="getMaterialSubjects(this)">
              <option value="0">Select Study Material</option>
              <?php 
              if(!empty($materialItems)) {
                foreach($materialItems ?? [] as $material) {?>
                  <option value="<?php echo $material['id']; ?>"><?php echo $material['material_code']." ( ".$material['material_name']." )"; ?></option>
                <?php }
              }?>
            </select>
          </div>
          <!-- Select Study Material -->

          <!-- Select Branch -->
          <div class="form-group col-md-6">
            <select class="form-control" name="branch_id" id="branch_id" onchange="getSubjects(this)">
              <option value="0">Select Branch</option>
              <?php 
              if(!empty($branchItems)) {
                foreach($branchItems ?? [] as $branch) {?>
                  <option value="<?php echo $branch['id']; ?>"><?php echo $branch['branch_code']." ( ".$branch['branch_name']." )"; ?></option>
                <?php }
              }?>
            </select>
          </div>
          <!-- Select Branch -->

          <!-- Select Subjects -->
          <div id="getsubjects" class="form-group col-md-6"></div>
          <!-- get subjects using script -->
          <script>
          function getSubjects(input_type) {

            // Assign tables & converted to js array 
            var subjects = <?php echo json_encode($subjectItems); ?>;
                                    
            console.log(subjects);
            // Get selected field name & value
            var selectedText = input_type.options[input_type.selectedIndex].innerHTML;
            var selectedValue = input_type.value;
            var str = "";
            str += '<select class="form-control" name="subject_id" id="subject_id">';
            str += '<option value="0">Select Subject</option>';
            for (i = 0; i < subjects.length; i++) {
              if(selectedValue == subjects[i].branch_id) {
                str += '<option value="'+subjects[i].id+'">'+subjects[i].subject_code+' ( '+subjects[i].subject_name+' )</option>';
              }
            }
            str += '</select>';
            document.getElementById('getsubjects').innerHTML = str;
          }
          function getMaterialSubjects(input_type) {
            // Assign tables & converted to js array 
            var subjects = <?php echo json_encode($subjectItems); ?>;
                                    
            console.log(subjects);
            // Get selected field name & value
            var selectedText = input_type.options[input_type.selectedIndex].innerHTML;
            var selectedValue = input_type.value;
            var str = "";
            str += '<select class="form-control" name="subject_id" id="subject_id">';
            str += '<option value="0">Select Subject</option>';
            for (i = 0; i < subjects.length; i++) {
              if(selectedValue == subjects[i].material_id) {
                str += '<option value="'+subjects[i].id+'">'+subjects[i].subject_code+' ( '+subjects[i].subject_name+' )</option>';
              }
            }
            str += '</select>';
            document.getElementById('getsubjects').innerHTML = str;
          }
          </script>
          <!-- get subjects using script -->
          <!-- Select Subjects -->

        </div>
        <!-- Select Branches & Subjects --> 

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