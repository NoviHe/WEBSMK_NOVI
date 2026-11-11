@extends('layouts.master')
@section('title','Edit Data Siswa')
@section('content')
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Edit Data Siswa: <strong>{{$siswa->nama_siswa}}</strong></h3>
						</div>
						<div class="panel-body">
							@if($errors->any())
							<div class="alert alert-danger alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
								<strong>Terjadi kesalahan input:</strong>
								<ul style="margin-top: 5px; margin-bottom: 0;">
									@foreach($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
							@endif

							<form action="/siswa/{{$siswa->id}}/update" method="POST" enctype="multipart/form-data">
					        	{{csrf_field()}}
							  <div class="form-group">
							    <label for="nis">NIS</label>
							    <input name="nis" type="text" class="form-control" id="nis" placeholder="NIS" value="{{old('nis', $siswa->nis)}}" required>
							  </div>
							  <div class="form-group">
							    <label for="nama_siswa">Nama Siswa</label>
							    <input name="nama_siswa" type="text" class="form-control" id="nama_siswa" placeholder="Nama Siswa" value="{{old('nama_siswa', $siswa->nama_siswa)}}" required>
							  </div>
							  <div class="form-group">
							    <label for="jenis_kelamin">Jenis Kelamin</label>
							    <select name="jenis_kelamin" class="form-control" id="jenis_kelamin" required>
							      <option value="L" {{old('jenis_kelamin', $siswa->jenis_kelamin) == 'L' ? 'selected' : ''}}>Laki Laki</option>
							      <option value="P" {{old('jenis_kelamin', $siswa->jenis_kelamin) == 'P' ? 'selected' : ''}}>Perempuan</option>
							    </select>
							  </div>
							  <div class="form-group">
							    <label for="kelas">Kelas</label>
							    <input name="kelas" type="text" class="form-control" id="kelas" placeholder="Kelas" value="{{old('kelas', $siswa->kelas)}}" required>
							  </div>
							  <div class="form-group">
							    <label for="komp_keahlian">Jurusan / Kompetensi Keahlian</label>
							    <input name="komp_keahlian" type="text" class="form-control" id="komp_keahlian" placeholder="Jurusan" value="{{old('komp_keahlian', $siswa->komp_keahlian)}}" required>
							  </div>
							  <div class="form-group">
								<label for="avatar">Foto Profil (Avatar)</label>
								<div style="margin-bottom: 10px;">
									<img src="{{$siswa->getAvatar()}}" alt="Avatar" class="img-thumbnail" width="90" height="90" style="object-fit: cover;">
								</div>
								<input type="file" name="avatar" class="form-control-file" id="avatar" accept="image/*">
								<p class="help-block text-muted">Format: JPG, JPEG, PNG. Maksimal 2MB. Kosongkan jika tidak ingin mengubah foto.</p>
							  </div>
							  <div class="form-group">
								<button type="submit" class="btn btn-warning"><i class="fa fa-save"></i> Perbarui Data</button>
								<a href="/siswa" class="btn btn-default">Kembali</a>
							  </div>
						    </form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
