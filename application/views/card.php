<center>
    <p>
    <h1>Silahkan Mengambil Antrian Sesuai Dengan Kebutuhan</h1>
    </p>
</center>
<hr>

<section class="content">

    <!-- Info boxes -->
    <?php foreach ($antrianloket as $a => $data) { ?>
        <input type="hidden" name="" id="nomer" value="<?php echo $data->no_antrian_loket; 
        if($data->no_antrian_loket < 1){
            $antri=0;
        }
        else{
            $antri=$data->no_antrian_loket;
        }
        ?>">
    <?php } ?>
<!-- 
    <?php foreach ($antrianloket as $z => $data) { ?>
        <input type="text" name="no_antrian_loket" value="<?php echo $data->no_antrian_loket?>" class="form-control">
    <?php } ?>
    <?php foreach ($antrian as $a => $data) { ?>
        <input type="text" name="no_antrian" value="<?php echo $data->no_antrian ?>">
    <?php } ?> -->
    <!-- <?php foreach ($antrianl as $a => $data) { ?>
        <input type="text" name="no_antrian_loket" value="<?= $data->no_antrian_loket ?>" disabled="" class="form-control">
    <?php } ?> -->
    <div class="row">
        <?php foreach ($loket as $l => $data) { ?>
            <div class="col-lg-3 col-xs-6" a>
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <input type="hidden" name="no_antrian_loket" value="<?= $data->loket_id ?>" disabled="" class="form-control">
                        <b>
                            <h3><?= $data->name ?></h3>

                            <p><?= $data->keterangan ?></p>
                        </b>
                    </div>
                    <div class="icon">
                        <a href="<?php echo site_url('ambil/saveAntrian/' . $data->loket_id. '/' .$antri); ?>"><i class="fa fa-print"></i></a>
                    </div>
                    <a href="<?php echo site_url('ambil/saveAntrian/' . $data->loket_id); ?>" class="small-box-footer">
                        Ambil Antrian <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
                <!-- <input type="text" name="loket" value="<?php echo $data->loket_id ?>" disabled="" class="form-control"> -->

            </div>
            <!-- /.col -->
        <?php } ?>
    </div>
    <!-- /.row -->
</section>
<script type="text/javascript">
	function nomer(){
		var antri = parseInt(document.getElementById('nomer').innerHTML)+1;
		document.getElementById("nomer").innerHTML=antri;
	}
</script>