<section class="content-header">
    <h1>Dashboard
        <small>Dinas Kependudukan dan Pencatatan Sipil</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>

<section class="content">

    <!-- Info boxes -->
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-desktop"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><b>Jumlah Loket</b></span>
              <span class="info-box-number"><?=$this->fungsi->count_loket();?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><b>Jumlah User</b></span>
              <span class="info-box-number"><?=$this->fungsi->count_user();?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

</section>