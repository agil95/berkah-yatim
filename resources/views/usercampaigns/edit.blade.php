@extends('layouts.donatur')

@section('title', 'Edit Campaign')

@section('content')
<section>
  <div class="dashboard">
    <div class="container">
      <div class="col-md-8 col-md-offset-2">
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $e)
            <li>{{ $e }}</li>
            @endforeach
          </ul>
        </div>
        @endif
        <h2 style="margin-bottom: 2rem;">Buat Campaign</h2>
        <div style="background-color: white; padding: 2rem 2.5rem; border-radius: 0.5rem; box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);">
          <form action="{{ route('campaigns.update', $campaign->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            @include('usercampaigns.form', ['campaign' => $campaign])
            <div>
              <a href="{{ route('campaigns.index') }}" class="btn btn-default">Cancel</a>
              <button type="submit" class="btn btn-primary pull-right">Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@stop

@section('script')
<script>
  $(document).ready(function () {
    CKEDITOR.replace('deskripsi');
  })
</script>
@stop