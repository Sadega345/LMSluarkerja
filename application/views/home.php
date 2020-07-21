<title>Home</title>
<h1>Tampilan Awal</h1>
<?php echo $this->session->flashdata("email_sent");  ?>
<a href="<?php echo base_url("Home/formemail"); ?>">Email Test</a>
<a href="<?php echo base_url('Home/tambah') ?>">Tambah data</a> <br>
<table border="1">
	<tr>
		<th>
			Nama
		</th>
		<th>
			Alamat
		</th>
		<th>
			Hp
		</th>
		<th>
			Aksi
		</th>
	</tr>
	<?php foreach ($dataSiswa as $siswa) { ?>
	<tr>
		<td><?php echo $siswa->nama; ?> </td>
		<td><?php echo $siswa->alamat; ?></td>
		<td><?php echo $siswa->no_hp; ?></td>
		<td>
			<a href="<?php echo base_url('Home/edit') ?>/<?php echo $siswa->id ?>">Edit</a>
			<a href="<?php echo base_url('Home/delete') ?>/<?php echo $siswa->id ?>">Hapus</a>
		</td>
	</tr>
	<?php } ?>
</table>