@extends('layouts.donatur')

@section('title', $campaign->nama_kegiatan)

@section('content')
<section>
  <div class="dashboard">
    <div class="container">
      <div style="display: flex; justify-content: space-between; align-items: center;" >
        <h2 style="margin-bottom: 1rem;">{{ $campaign->nama_kegiatan }}</h2>
        <div class="btn-group">
          <a href="{{ route('campaigns.edit', $campaign->id) }}" class="btn btn-sm btn-warning">Edit</a>
          <button type="button" data-toggle="modal" data-target="#deleteModal" class="btn btn-sm btn-danger">Hapus</button>
        </div>
      </div>
      <h4 style="margin-bottom: 2rem; color: gray;">{{ $campaign->tag }}</h4>
      <div class="row" style="padding-top: 0;">
        <div class="col-md-3" style="margin-right: auto; margin-left: auto;">
          <img src="{{ asset('storage/' . $campaign->dokumentasi) }}" alt="{{ $campaign->nama_kegiatan }}" class="img-responsive">
        </div>
        <div class="col-md-9">
          <div style="background-color: white; padding: 2rem 2.5rem; border-radius: 0.5rem; box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06); margin-bottom: 2rem;">
            <table class="table">
              <tr>
                <th>Kategori</th>
                <td>:</td>
                <td>{{ optional($campaign->kategori)->nama }}</td>
              </tr>
              <tr class="info">
                <th>Target</th>
                <td>:</td>
                <td>Rp {{ number_format($campaign->target, 2, ',', '.') }}</i></td>
              </tr>
              <tr class="info">
                <th>Donasi Terkumpul</th>
                <td>:</td>
                <td>Rp {{ number_format($campaign->actual_earn, 2, ',', '.') }} <span>({{ $campaign->percent }}%)</span></td>
              </tr>
              <tr class="info">
                <th>Ditutup pada</th>
                <td>:</td>
                <td>{{ optional($campaign->target_date)->format('Y-m-d') }} <span>({{ optional($campaign->target_date)->diffInDays() }} hari lagi)</span></td>
              </tr>
              <tr>
                <th>Dibuat pada</th>
                <td>:</td>
                <td>{{ $campaign->created_at }} <span>({{ optional($campaign->created_at)->diffForHumans() }})</span></td>
              </tr>
            </table>
          </div>
          <div style="background-color: white; padding: 2rem 2.5rem; border-radius: 0.5rem; box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06); margin-bottom: 2rem;">
            <h4 style="margin-bottom: 1rem; border-bottom: 1px solid rgba(0, 0, 0, 0.1); padding-bottom: 1rem;">Deskripsi</h4>
            {!! $campaign->deskripsi !!}
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<div id="deleteModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <form action="{{ route('campaigns.destroy', $campaign->id) }}" method="POST">
        @method('DELETE')
        @csrf
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Hapus Campaign</h4>
        </div>
        <div class="modal-body">
          <p>Apakah Anda yakin untuk menghapus Campaign ini?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-danger">Hapus</button>
        </div>
      </form>
    </div>
  </div>
</div>
@stop
