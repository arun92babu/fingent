    <div class="pageheader">
      <h2><?= $usertype?> Dashboard</h2>
      <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li class="active">Home</li>
        </ol>
      </div>
    </div>

    <div class="contentpanel">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row"> 
              <div><center><h4>Organization</h4>
              <?= (!empty($this->session->flashdata('success_message')))? '<div class="alert alert-success">'.$this->session->flashdata('success_message').'</div>':'' ?>
              <?= (!empty($this->session->flashdata('error_message')))? '<div class="alert alert-danger">'.$this->session->flashdata('error_message').'</div>':'' ?>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                  <?=form_open_multipart('dashboard/upload','id="uploadform"');?>  
                    <table>
                        <tr>
                          <td> Choose your file: </td>
                          <td>
                              <input type="file" class="form-control" name="userfile" accept=".csv"  align="center"/>
                          </td>
                          <td>
                              <div class="col-md-12">
                                <button type="submit" name="submit" class="btn btn-info">Upload</button>
                              </div>
                          </td>
                        </tr>
                    </table> 
                  <?= form_close();?>
              </div>
            </div>
            <div class="row">
                
                <div class="col-md-12">
                    <div class="table-responsive">
                        <?php if(!empty($allemployee)){ ?>
                        <table class="table table-bordered table-striped mb30" id="searchTable" cellspacing="0" width="100%" class="opensans">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Employee Code</th>
                                    <th>Employee Name</th>
                                    <th>Department Name</th>
                                    <th>Date of Birth</th>
                                    <th>Age</th>
                                    <th>Date Of Joining</th>
                                    <th>Experience</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($allemployee as $each_item) { ?>
                            <tr>
                                <td></td>
                                <td><?= $each_item['employee_code'];?></td>
                                <td><?= $each_item['employee_name'];?></td>
                                <td><?= $each_item['department_name'];?></td>
                                <td><?= $each_item['employee_dob'];?></td>
                                <td><?= $each_item['age'];?></td>
                                <td><?= $each_item['employee_doj'];?></td>
                                <td><?= (!empty($each_item['exyear']) && $each_item['exyear']!=0)?$each_item['exyear'].' Years':''; ?></td>
                                <td><?= ($each_item['status'] ==1)?'<span class="label label-success">Active</span>':'<span class="label label-danger">Disabled</span>';?></td>
                                
                            </tr>
                            <?php } ?>
                            </tbody>
                            
                        </table>
                        <?php }else{?>
                            <h5 class="text-center">No Employees found.</h5>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<script src="<?=base_url()?>assets/js/jquery.js"></script>
<script src="<?=base_url()?>assets/js/jquery.dataTables.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        var t = $('#searchTable').DataTable( {
            "columnDefs": [ {
                "searchable": false,
                "orderable": false,
                "targets": 0
            } ],
            //"order": [[ 1, 'asc' ]]
        } );
     
        t.on( 'order.dt search.dt', function () {
            t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();
    } );
    
</script>



