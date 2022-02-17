    <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <div class="row">
        <div class="col-md-8">
         
            <br> <br> <br>
            <h1 class="display-4 text-white">Selamat Datang di PT kereta API DAOP IV</h1>
            <h1 class="lead text-white">Anda dapat melakukan pemesanan Tiket Kereta API online dengan mudah</h1>
        </div>
        <div class="col-md-4">
        <form action="<?= base_url('cariTiket') ?>" method="POST">
            <div class="form-group">
            <label>Stasiun Asal</label>
           <select name="asal" class="form-control">

             <?php foreach ($stasiun as $st): ?>
            <option value="<?= $st->id ?>"><?= $st->nama_stasiun ?></option>
	    					<?php endforeach ?>
           </select>
           </div>
          
            <div class="form-group">
            <label>Stasiun Tujuan</label>
           <select name="tujuan" class="form-control">
            <?php foreach ($stasiun as $st): ?>
	    						<option value="<?= $st->id ?>"><?= $st->nama_stasiun ?></option>
	    					<?php endforeach ?>
	    
           </select>
           </div>
          <div class="form-group">
            <label>Tanggal Berangkat</label>
           <input type="date" nama="tanggal" class="form-control">
           </div>

            <div class="form-group">
           <label >Jumlah Penumpang</label>
	    				<select name="jumlah" class="form-control">
	    					<?php for ($i=1; $i <=4 ; $i++): ?>
	    						<option value="<?= $i ?>"><?= $i ?> Penumpang</option>
	    					<?php endfor; ?>
	    				</select>
           </div>

           <button class="btn btn-dark btn-block">Cari Tiket</button>
        </form>
        </div>
    </div>
  </div>
</div>
    </div>
	</div>
	<div class="container">
		<hr>
		<?php if (!isset($tiket)): ?>
			
		<?php else: ?>
			
		<div class="table-responsive">
			<table class="table table-hover table-bordered">
				<thead class="bg-dark text-white text-center">
            <tr>
              <th>No</th>
              <th>Nama Kereta</th>
              <th>Tanggal Berangkat</th>
              <th>Tanggal Sampai</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody class="text-center">

            <?php $no = 1; ?>
            <?php foreach ($tiket as $tk): ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $tk->nama_kereta ?></td>
              <td><?php $date = date_create($tk->tgl_berangkat); echo date_format($date, "d-m-Y h:i:s");  ?></td>
              <td><?php $date = date_create($tk->tgl_sampai); echo date_format($date, "d-m-Y h:i:s"); ?></td>
              <td>
                <a class="btn btn-dark" href="<?= base_url('pesan/'.$tk->id.'?p='.$penumpang) ?>">Pesan</a>
              </td>
            </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>

      <?php endif; ?>

    </div>
          