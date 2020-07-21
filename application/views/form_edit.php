<title>Form Tambah</title>
<a href="<?php echo base_url('Home') ?>">Kembali</a>
<form action="<?php echo base_url('Home/proses_update') ?>" method="post">
	<input type="hidden" name="id" value="<?php echo $siswa->id ?>">
	<table>
		<tr>
			<td>
				Nama :
			</td>
			<td>
				<input type="text" name="nama" placeholder="Masukan Nama" value="<?php echo $siswa->nama ?>">
			</td>
		</tr>
		<tr>
			<td>
				No Hp : 
			</td>
			<td>
				<input type="text" name="hp" placeholder="Nomor Handphone" value="<?php echo $siswa->no_hp ?>">
			</td>
		</tr>
		<tr>
			<td>
				Alamat : 
			</td>
			<td>
				<textarea rows="5" name="alamat" > <?php echo $siswa->alamat ?></textarea>
			</td>
		</tr>
		<tr>
			<td>
				<button>Simpan</button>	
			</td>
			
		</tr>
	</table>
</form>