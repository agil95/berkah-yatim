@extends('layouts.global')
@section('title') Detail donatur @endsection
@section('content')

<div class="box">
	<h2 align="center">Detail donatur</h2>
	<div class="box-body">

	<div class="card">
		<div class="card-body">
			<label><b>Photo </b></label><br>
			<img src="{{asset('storage/' . $user->foto)}}"
			width="160px"><br>
			<label><b>Name </b></label><br>
			{{$user->name}}
			<br><br>
			<label><b>Email</b></label><br>
			{{$user->email}}
			<br><br>
			<label><b>Donasi Sebanyak (Paid)</b></label><br>
			{{ $user->donasis->count()}}
			<br><br>
			<label><b>Total Donasi (Paid)</b></label><br>
			Rp. {{ format_uang($user->amount->sum('jumlah')) }}
			<br><br>
			<label><b>Phone </b></label><br>
			{{$user->nohp}}
			<br><br>
			<label><b>Bio </b></label><br>
			{{$user->alamat}}
			<br><br>
			<label><b>Status </b></label><br>
			@if($user->status == 'active')
					<span class="label label-success" style="font-size: 13px;"><i class="fa fa-check-circle-o"> Donatur aktif </i></span>
				@else
				<span class="label label-danger" style="font-size: 13px;"><i class="fa fa-check-circle-o"> Tidak aktif </i></span>
			@endif
		</div>
		<br>
		<h2>List Donasi dari Fundriser</h2>			
		<div class="box" style="margin-top: 15px;">
			<div class="box-body">
				<table id="example1" class="table table-bordered table-striped" style="width: 100%">
					<thead>
						<tr>
							<td>No</td>
							<th>Invoice</th>
							<th>Nama Pengirim</th>
							<th>Email</th>
							<th>Program</th>
							<th>Tanggal</th>
							<th>No Hp</th>
							<th>Via Bayar</th>
							<th>Jumlah Donasi</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						@foreach($fundrisers as $key => $donasis)
						<tr>
							<td>{{++$key }}</td>
							<td>{{$donasis->invoice}}</td>
							<td>{{$donasis->nama}}</td>
							<td>{{$donasis->email}}</td>
							<td>{{$donasis->url}}</td>
							<td>{{$donasis->updated_at}}</td>
							<td>{{$donasis->nohp}}</td>
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

		<h2> List Donasi Donatur</h2>			
		<div class="box" style="margin-top: 15px;">
			<div class="box-body">
				<table class="table table-bordered table-striped donasiuser" style="width: 100%">
					<thead>
						<tr>
							<th>No.</th>
							<th>Invoice</th>
							<th>Nama Pengirim</th>
							<th>Email</th>
							<th>Program</th>
							<th>Tanggal</th>
							<th>No Hp</th>
							<th>Via Bayar</th>
							<th>Jumlah Donasi</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						@foreach($donasi as $donasis)
						<tr>
							<td></td>
							<td>{{$donasis->invoice}}</td>
							<td>{{$donasis->nama}}</td>
							<td>{{$donasis->email}}</td>
							<td>{{$donasis->url}}</td>
							<td>{{$donasis->updated_at}}</td>
							<td>{{$donasis->nohp}}</td>
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
</div>
@endsection