<?php $this->load->view('backend/top')?>
<?php $this->load->view('backend/menu')?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Management System</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Log Activity</li>
          </ol>
        </div>

        <div class="col-md-12 form-group">
          <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
            <i class="fa fa-calendar"></i>
          </button> Period:
            <div class="modal fade" id="modal-default">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Default Modal</h4>
                    <button type="button" class="close" data-dismiss="modal">
                      <span aria-hidden="true">&times;</span></button>
                  </div>
                  <div class="modal-body">
                    <?php $attributes = array('class'=>'form-horizontal','role'=>'form');
                    echo form_open_multipart('aspanel/divisi_tambahkan',$attributes); ?>
										<div class="form-group">
											<label for="dateFrom" class="col-sm-4 control-label">Date From</label>
											<div class="form-group col-sm-6">
												<input type="date" class="form-control" name="dateFrom" id="dateFrom" autocomplete="off" aria-invalid="false">
											</div>
										</div>
										<div class="form-group">
											<label for="dateTo" class="col-sm-4 control-label">Date To</label>
                      <div class="form-group col-sm-6">
												<input type="date" class="form-control" name="dateTo" id="dateTo" autocomplete="off">
											</div>
										</div>
                    <button class="btn btn-primary btn-md" type="submit" title="Submit"><i class="fa fa-save"></i> Submit</button>
									<?php echo form_close(); ?>
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
        </div>

      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <span>Log Activity</span>
            </div>
            <div class="card-body">
              <table id="log_history" class="table table-responsive-xl col-12 table-bordered table-striped p-0">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Modul</th>
                  <th>Username</th>
                  <th>Status</th>
                  <th>Waktu</th>
                  <th>Alamat IP</th>
                  <th>Platform</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                foreach ($record as $row){
                ?>
                <tr>
                  <td><?=$no++?></td>
                  <td><?=$row['log_activity_modul']?></td>
                  <td><?=$row['username']?></td>
                  <td><?=$row['log_activity_status']?></td>
                  <td><?=$row['log_activity_waktu']?></td>
                  <td><?=$row['log_activity_ip']?></td>
                  <td><?=$row['log_activity_platform']?></td>

                </tr>
              <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
    </section>
</div>

<?php $this->load->view('backend/bottom')?>
