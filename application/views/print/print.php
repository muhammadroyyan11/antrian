
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="box">
				<div class="loket">
					Nomer Antrian Anda
				</div>
				<div class="agenda">
					<h1 id="nomer"><?php echo $antrian->row('nomer'); 
					if($antrian->row('nomer') < 1){
						$antri=1;
					}
					else{
						$antri=$antrian->row('nomer')+1;
					}
					?>
					</h1>
					<br>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">print(); location="<?php echo site_url('antrian'); ?>"</script>