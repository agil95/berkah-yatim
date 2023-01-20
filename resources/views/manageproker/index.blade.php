@extends('layouts.global')
@section('title') List Campaign @endsection
@section('content')

	<div class="row">
		<div class="container col-sm-12">
		<div class="col-md-12">
			@if(session('status'))
			<div class="alert alert-success">
				{{session('status')}}
			</div>
			@elseif(session('gagal'))
		<div class="alert alert-danger">
			{{session('gagal')}}
		</div>
			@endif
			<h2>List Campaign
				<div class="pull-right">
					<a
					href="{{route('manage-campaign.create')}}"
					class="btn btn-success"
					><i class="glyphicon glyphicon-plus"></i> Tambah campaign</a>
				</div>
			</h2>
				<div class="box">
					<!-- /.box-header -->
					<div class="box-body">
						<table class="table display table-bordered table-stripped" id="example1" style="width: 100%">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama</th>
									<th>Tag</th>
									<th>Tgl</th>
									<th>Tgl Target</th>
									<th>Kategori</th>
									<th>Target</th>
									<th>Saldo</th>
									{{-- <th>Penting</th>
									<th>Pilihan</th> --}}
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($proker as $prokers)
								<tr>
									<td>{{$prokers->urutan}}</td>
									<td>{{$prokers->nama_kegiatan}}</td>
									<td>{{$prokers->tag}}</td>
									<td>{{$prokers->created_at->format('Y-m-d')}}</td>
									<td>{{$prokers->target_date->format('Y-m-d')}}</td>
									<td>{{$prokers->kategori['nama']}}</td>
									<td>Rp. {{format_uang($prokers->target)}}</td>
									<td>Rp. {{format_uang($prokers->actual_earn)}}</td>
									{{-- <td>
									@if ($prokers->is_urgent==0) 
                                        <a class="btn btn-xs btn-info" href="{{ url('admin/prokerurgent', [$prokers->id,1]) }}"><i class="glyphicon glyphicon-edit"></i> Active</a>
                                    @else
                                        <a class="btn btn-xs btn-danger" href="{{ url('admin/prokerurgent', [$prokers->id,0]) }}"><i class="glyphicon glyphicon-edit"></i> Unactive</a>
                                    @endif
									</td>
									<td>
										@if ($prokers->is_pilihan==0) 
											<a class="btn btn-xs btn-info" href="{{ url('admin/prokerpilihan', [$prokers->id,1]) }}"><i class="glyphicon glyphicon-edit"></i> Active</a>
										@else
											<a class="btn btn-xs btn-danger" href="{{ url('admin/prokerpilihan', [$prokers->id,0]) }}"><i class="glyphicon glyphicon-edit"></i> Unactive</a>
										@endif
										</td> --}}
									<td>
										@if ($prokers->status==0) 
											<a class="btn btn-xs btn-info" href="{{ url('admin/prokerstatus', [$prokers->id,1]) }}" onclick="if(confirm('Change status to active? Are you sure?')) { return true } else {return false };"><i class="glyphicon glyphicon-edit"></i> Unactive</a>
										@else
											<a class="btn btn-xs btn-danger" href="{{ url('admin/prokerstatus', [$prokers->id,0]) }}" onclick="if(confirm('Change status to unactive? Are you sure?')) { return true } else {return false };"><i class="glyphicon glyphicon-edit"></i> Active</a>
										@endif
										</td>	
		
									<td>
										<a href="{{route('manage-campaign.edit', ['id' => $prokers->id])}}" class="btn btn-xs btn-primary"> <i class="glyphicon glyphicon-edit"></i> Edit </a>
										<a href="{{route('manage-campaign.show', ['id' => $prokers->id])}}" class="btn btn-xs btn-warning"> <i class="glyphicon glyphicon-eye-open"></i> View </a>
										@if(Auth::user()->role_id==1)
										<form action="{{ route('manage-campaign.destroy', ['id' => $prokers->id]) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
											<input type="hidden" name="_method" value="DELETE">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
										</form> 
									@endif
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
	@endsection