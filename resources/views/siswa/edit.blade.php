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
							<h3 class="panel-title">Edit Data Siswa</h3>
						</div>
						<div class="panel-body">
							<form action="/siswa/{{$siswa->id}}/update" method="POST" enctype="multipart/form-data">
					        	{{csrf_field()}}
							  <div class="form-group">
							    <label for="exampleInputEmail1">NIS</label>
							    <input name="nis" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NIS" value="{{$siswa->nis}}">
							  </div>
							  <div class="form-group">
							    <label for="exampleInputEmail1">Nama Siswa</label>
							    <input name="nama_siswa" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Siswa" value="{{$siswa->nama_siswa}}">
							  </div>
							  <div class="form-group">
							    <label for="exampleFormControlSelect1">Jenis Kelamin</label>
							    <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
							      <option value="L" @if($siswa->jenis_kelamin == 'L') selected @endif>Laki Laki</option>
							      <option value="P" @if($siswa->jenis_kelamin == 'P') selected @endif>Perempuan</option>
							    </select>
							  </div>
							  <div class="form-group">
							    <label for="exampleInputEmail1">Kelas</label>
							    <input name="kelas" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Kelas" value="{{$siswa->kelas}}">
							  </div>
							  <div class="form-group">
							    <label for="exampleInputEmail1">Jurusan</label>
							    <input name="komp_keahlian" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Jurusan" value="{{$siswa->komp_keahlian}}">
							  </div>
							  <div class="form-group">
								<label for="exampleFormControlFile1">Avatar</label>
								<input type="file" name="avatar" class="form-control-file" id="exampleFormControlFile1">
							  </div>
							  <div class="form-group">
								<button type="submit" class="btn btn-warning">Update</button>
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