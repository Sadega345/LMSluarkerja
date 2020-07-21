<title>Form Tambah</title>
<a href="<?php echo base_url('Home') ?>">Kembali</a>
<form action="<?php echo base_url('Home/proses_tambah') ?>" method="post">
	<table>
		<tr>
			<td>
				Nama :
			</td>
			<td>
				<input type="text" name="nama" placeholder="Masukan Nama">
			</td>
		</tr>
		<tr>
			<td>
				No Hp : 
			</td>
			<td>
				<input type="text" name="hp" placeholder="Nomor Handphone">
			</td>
		</tr>
		<tr>
			<td>
				Alamat : 
			</td>
			<td>
				<textarea rows="5" name="alamat"></textarea>
			</td>
		</tr>
		<tr>
			<td>
				<button>Simpan</button>	
			</td>
			
		</tr>
	</table>
</form>