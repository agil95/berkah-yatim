@extends('layouts.global')
@section('title') Daftar Donasi @endsection
@section('content')
<!-- jQuery 3 -->
<script src="{{url('bower_components/jquery/dist/jquery.min.js')}}"></script>
<script>
	$(document).ready(function() {
	  $('.open-status-dialog').on("click", function () {
		$('#invoice').val($(this).data('id'));
		$("#status").val($(this).data('status')).change();
	  });

	});
</script>

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

			@php
			$no = 1;
			@endphp
			<!-- /.col -->
			<div class="modal fade" id="modal-default">
				<div class="modal-dialog">
					<form action="{{ route('donasi-update-payment')}}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<h4 class="modal-title">Edit Status Pembayaran</h4>
						</div>
						<div class="modal-body">                                
							<div class="form-group">
								<label>No</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-code"></i>
										</div>
										<input type="text" class="form-control"  id ="invoice" name="invoice" readonly>
									</div>
									</div>
									<!-- /.form group -->				
									<!-- phone mask -->
									<div class="form-group">
										<label>Status:</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-code"></i>
											</div>
												<select class="form-control" id="status" name="status" required>
													<option value="verified">verified</option>
													<option value="pending">pending</option>
													<option value="cancel">cancel</option>
													<option value="expired">expired</option>
													<option value="success">paid</option>
												</select>
										</div>
										<!-- /.input group -->
									</div>
									<!-- /.form group -->																
							<!-- /.box -->
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-primary">Save changes</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				</form>
					<!-- /.modal-dialog -->
				</div>
				<!-- /.modal -->

			<h2>List Donasi</h2>			
			<div class="box" style="margin-top: 15px;">
				<div class="box-body">
					<table id="example1" class="table  display table-bordered table-striped" style="width: 100%">
						<thead>
							<tr>
								<th>No.</th>
								<th>Invoice</th>
								<th>Nama Pengirim</th>
								<th>Program</th>
								<th>Tanggal</th>
								<th>Email</th>
								<th>Via Bayar</th>
								<th>Jumlah Donasi</th>
								<th>Status</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach($donasi as $donasis)
							<tr>
								<td>{{$no++}}</td>
								<td>{{$donasis->invoice}}</td>
								<td>{{$donasis->nama}}</td>
								<td>{{$donasis->url}}</td>
								<td>{{$donasis->updated_at}}</td>
								<td>{{$donasis->email}}</td>
								<td>{{$donasis->type}}</td>
								<td class="text-right">Rp. {{format_uang($donasis->jumlah)}}</td>
								<td>@if($donasis->status == 'sampai' || $donasis->status=="settlement" ||  $donasis->status=="success")
									<span class="label label-success" style="font-size: 13px;"><i class="fa fa-check-circle-o"> {{ $donasis->status}}</i></span>
									@elseif($donasis->status == 'verified')
									<span class="label label-success" style="font-size: 13px;"><i class="fa fa-check"> {{ $donasis->status}}</i> </span>
									@elseif($donasis->status == 'pending')
									<span class="label label-warning" style="font-size: 13px;"><i class="fa fa-spinner"> {{ $donasis->status}}</i> </span>
									@else
									<span class="label label-danger" style="font-size: 13px;"><i class="fa fa-spinner"> {{ $donasis->status}}</i> </span>
									@endif
								</td>
								<td>
									<button type="button" class="btn btn-xs btn-primary open-status-dialog" data-status="{{$donasis->status}}" data-id="{{$donasis->invoice}}" data-toggle="modal" data-target="#modal-default"> <i class="glyphicon glyphicon-edit"></i> Edit Status</button>
								</td>
							</tr>
							@endforeach

						</tbody>
						<tfoot>
							<tr>
							</tr>
						</tfoot>
					</table>
					</div>
				</div>			
				</div>
			</div>

		</div>
	</div>
</div>
@endsection
	