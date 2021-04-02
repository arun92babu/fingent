 <link href="<?=base_url()?>/assets/css/jquery.dataTables1.css" rel="stylesheet">
    <div class="pageheader">
      <h2>Printers List</h2>
      <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li><a href="<?=base_url('dashboard')?>">Dashboard</a></li>
          <li class="active">Printers List</li>
        </ol>
      </div>
    </div>

    <div class="contentpanel">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                
                <div class="col-md-12">
                    <div class="table-responsive">
                        <?php if(!empty($printers)){  ?>
                        <table class="table table-bordered table-striped mb30" id="searchTable" cellspacing="0" width="100%" class="opensans">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Printer Name</th>
                                    <th>IP Address</th>
                                    <th>Port Number</th>
                                    <th>Subnet Mask</th>
                                    <th>Deafult Gateway</th>
                                    <th>Action</th>
                                    <!-- <th width="30%">Actions</th> -->
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($printers as $each_item) {?>
                            <tr>
                                <td></td>
                                <td><?= $each_item['name'];?></td>
                                <td><?= $each_item['ip_address'];?></td>
                                <td><?= $each_item['port_number'];?></td>
                                <td><?= $each_item['subnet_mask'];?></td>
                                <td><?= $each_item['default_gateway'];?></td>
                                <td><a href="<?=base_url('printers/test_print/'.$each_item['ip_address'])?>" class="btn btn-success">Test Print</a></td>
                                
                            </tr>
                            <?php } ?>
                            </tbody>
                            
                        </table>
                        <?php }else{?>
                            <h5 class="text-center">No Printers found.</h5>
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


