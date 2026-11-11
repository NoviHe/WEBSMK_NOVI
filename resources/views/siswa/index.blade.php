@extends('layouts.master')
@section('title','Data Siswa')
@section('content')
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						@if(session('sukses'))
						<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<i class="fa fa-check-circle"></i> {{session('sukses')}}
						</div>
						@endif

						@if($errors->any())
						<div class="alert alert-danger alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>Terjadi kesalahan input:</strong>
							<ul style="margin-top: 5px; margin-bottom: 0;">
								@foreach($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
						@endif

						<div class="panel-heading">
							<h3 class="panel-title">Data Siswa</h3>
							<div class="right">
								<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle"></i> Tambah Siswa</button>
							</div>	
						</div>
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table table-hover">
									<thead>
										<tr>
											<th>FOTO</th>
											<th>NIS</th>
											<th>NAMA SISWA</th>
											<th>L/P</th>
											<th>KELAS</th>
											<th>JURUSAN</th>
											<th>AKSI</th>
										</tr>
									</thead>
									<tbody>
										@forelse($data_siswa as $siswa)
										<tr>
											<td>
												<img src="{{$siswa->getAvatar()}}" alt="avatar" class="img-circle" width="35" height="35" style="object-fit: cover;">
											</td>
											<td>{{$siswa->nis}}</td>
											<td><a href="/siswa/{{$siswa->id}}/profile"><strong>{{$siswa->nama_siswa}}</strong></a></td>
											<td>{{$siswa->jenis_kelamin}}</td>
											<td>{{$siswa->kelas}}</td>
											<td>{{$siswa->komp_keahlian}}</td>
											<td>
												<a href="/siswa/{{$siswa->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
												<form action="/siswa/{{$siswa->id}}" method="POST" style="display:inline-block;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data siswa ini?')">
													{{ csrf_field() }}
													{{ method_field('DELETE') }}
													<button type="submit" class="btn btn-danger btn-sm">Delete</button>
												</form>
											</td>
										</tr>
										@empty
										<tr>
											<td colspan="7" class="text-center text-muted">Belum ada data siswa.</td>
										</tr>
										@endforelse
									</tbody>
								</table>
							</div>
							<div class="pull-right">
								{{ $data_siswa->appends(request()->input())->links() }}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal Tambah Siswa -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h4>
      </div>
      <form action="/siswa/create" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
        	{{csrf_field()}}
		  <div class="form-group">
		    <label for="nis">NIS</label>
		    <input name="nis" type="text" class="form-control" id="nis" placeholder="Nomor Induk Siswa" value="{{old('nis')}}" required>
		  </div>
		  <div class="form-group">
		    <label for="nama_siswa">Nama Siswa</label>
		    <input name="nama_siswa" type="text" class="form-control" id="nama_siswa" placeholder="Nama Lengkap Siswa" value="{{old('nama_siswa')}}" required>
		  </div>
		  <div class="form-group">
		    <label for="jenis_kelamin">Jenis Kelamin</label>
		    <select name="jenis_kelamin" class="form-control" id="jenis_kelamin" required>
		      <option value="L" {{old('jenis_kelamin') == 'L' ? 'selected' : ''}}>Laki Laki</option>
		      <option value="P" {{old('jenis_kelamin') == 'P' ? 'selected' : ''}}>Perempuan</option>
		    </select>
		  </div>
		  <div class="form-group">
		    <label for="kelas">Kelas</label>
		    <input name="kelas" type="text" class="form-control" id="kelas" placeholder="Contoh: X RPL 1" value="{{old('kelas')}}" required>
		  </div>
		  <div class="form-group">
		    <label for="komp_keahlian">Kompetensi Keahlian / Jurusan</label>
		    <input name="komp_keahlian" type="text" class="form-control" id="komp_keahlian" placeholder="Contoh: Rekayasa Perangkat Lunak" value="{{old('komp_keahlian')}}" required>
		  </div>
		  <div class="form-group">
		    <label for="avatar">Foto Profil (Avatar)</label>
		    <input type="file" name="avatar" class="form-control-file" id="avatar" accept="image/*">
		    <p class="help-block text-muted">Format: JPG, JPEG, PNG. Maksimal 2MB.</p>
		  </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
@stop
