<section class="content-header">
    <h1>
        Ambil Antrian
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-users"></i> Ambil Antrian</a></li>
    </ol>
</section>


<section class="content">
<div class="row">
        <div class="col-lg-12">
            <div class="box box-widget">
                <div class="box-body">
                    <div class="agenda">
                        <center><h1>NOMER ANTRIAN ANDA</h1></center>
                        <HR></HR>
                        <center><h1><span id="" style="font-size:100pt">0</span></h1></center>
                    </div>
                
                   <table width="100%">
                        <tr>
                            <td style="vertical-align:top">
                                <label for="date">Tanggal</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="date" id="date" value="<?=date('Y-m-d')?>" class="form-control" readonly>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top; width:30%">
                                <label for="date">Nama</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" id="user" value="Pengunjung" class="form-control" readonly>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top">
                                <label for="date">Keperluan</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <select name="member" class="form-control">
                                        <option value="">Silahakan pilih</option>
                                        <?php foreach($loket as $l => $data){
                                            echo '<option value="'.$data->loket_id.'">'.$data->keterangan.'</option>';
                                        } ?>
                                    </select>
                                </div>
                            </td>
                        </tr>
                   </table>
                   <button type="submit" name="login" class="btn btn-primary btn-block btn-flat"><i class="fa fa-print"></i>&nbsp;   PRINT</button>
                </div>
            </div>
        </div>
    </div>
</section>