@extends('layouts.donatur')

@section('title', 'Campaign Saya')

@section('content')
<section>
  <div class="dashboard">
    <div class="container">
      <div class="col-md-3">
        <a href="#" class="thumbnail">
          @if(Auth::user()->activated != '0')
          <img src="{{ Auth::user()->foto }}" alt="background-user">
          @else
          <img src="{{asset('storage/'. Auth::user()->foto) }}" alt="background-user">
          @endif
        </a>
        <div class="list-group">
          <a href="{{url('/donatur/home')}}" class="list-group-item">Overview</a>
          <a href="{{ route('campaigns.index') }}" class="list-group-item active">Campaign</a>
          <a href="{{route('edit.profile')}}" class="list-group-item">Edit Profil</a>
          <a href="{{ route('logout') }}" class="list-group-item" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        </div>
      </div>
      <div class="col-md-9">
        <div style="display:flex; justify-content: space-between; align-items: center; border-bottom: 3px solid #01579b; padding-bottom: 1rem; margin-bottom: 2rem;">
          <h2>Campaign Saya</h2>
          <a href="{{ route('campaigns.create') }}" class="btn btn-primary" style="height: 36px;">Buat Campaign</a>
        </div>
        <div class="table-responsive" style="background-color: white; padding: 2rem 2.5rem; border-radius: 0.5rem; box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);">
          <table class="table table-striped table-bordered data display">
            <thead>
              <tr>
                <th>#</th>
                <th>Nama Kegiatan</th>
                <th>Link</th>
                <th>Kategori</th>
                <th>Target</th>
                <th>Donasi Terkumpul</th>
                <th>Berakhir</th>
                <th>Sisa Hari</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($campaigns as $campaign)
              <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>
                  <a href="{{ route('campaigns.show', $campaign->id) }}">
                    <div class="font-bold">{{ $campaign->nama_kegiatan }}</div>
                  </a>
                </td>
                <td> <a href="{{ url('proker',$campaign->url)}}" target="_blank">{{$campaign->url}}</a></td>
                <td>{{ optional($campaign->kategori)->nama }}</td>
                <td>Rp {{ number_format($campaign->target, 0, '.', ',') }}</td>
                <td>Rp {{ number_format($campaign->actual_earn, 0, '.', ',') }}</td>
                <td>{{ $campaign->target_date }}</td>
                <td>{{ optional($campaign->target_date)->diffInDays() }} Hari</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
@stop