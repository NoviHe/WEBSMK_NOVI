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
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
							<i class="fa fa-check-circle"></i> {{session('sukses')}}
						</div>
						@endif
						<div class="panel-heading">
							<h3 class="panel-title">Data Siswa</h3>
							<div class="right">
								<button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle"></i></button>
							</div>	
						</div>
						<div class="panel-body">
							<table class="table table-hover">
								<thead>
									<tr>
										<th>NIS</th>
										<th>NAMA SISWA</th>
										<th>L/P</th>
										<th>KELAS</th>
										<th>JURUSAN</th>
										<th>AKSI</th>
									</tr>
								</thead>
								<tbody>
									@foreach($data_siswa as $siswa)
									<tr>
										<td>{{$siswa->nis}}</td>
										<td><a href="/siswa/{{$siswa->id}}/profile">{{$siswa->nama_siswa}}</a></td>
										<td>{{$siswa->jenis_kelamin}}</td>
										<td>{{$siswa->kelas}}</td>
										<td>{{$siswa->komp_keahlian}}</td>
										<td>
											<a href="/siswa/{{$siswa->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
											<a href="/siswa/{{$siswa->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Mau di hapus!')">Delete</a>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/siswa/create" method="POST">
        	{{csrf_field()}}
		  <div class="form-group">
		    <label for="exampleInputEmail1">NIS</label>
		    <input name="nis" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NIS">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Nama Siswa</label>
		    <input name="nama_siswa" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Siswa">
		  </div>
		  <div class="form-group">
		    <label for="exampleFormControlSelect1">Jenis Kelamin</label>
		    <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
		      <option value="L">Laki Laki</option>
		      <option value="P">Perempuan</option>
		    </select>
		  </div>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Kelas</label>
		    <input name="kelas" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Kelas">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Jurusan</label>
		    <input name="komp_keahlian" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Jurusan">
		  </div>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      </div>
    </div>
  </div>



@stop
