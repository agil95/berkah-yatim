<div class="col-md-3">
  <a href="#" class="thumbnail">
    <img src="{{ Auth::user()->profilePicture() }}" alt="background-user">
  </a>
  <div class="list-group">
    <a href="{{url('/donatur/home')}}" class="list-group-item {{ $active == 'overview' ? 'active' : '' }}">
      Overview
    </a>
    {{--
      <a href="{{route('donasi.donatur')}}" class="list-group-item {{ $active == 'donasi-sekarang' ? 'active' : '' }}">
        Donasi Sekarang
      </a>
     --}}
    <a href="{{ route('campaigns.index') }}" class="list-group-item">
      Campaign
    </a>
    <a href="{{route('donasi.penyaluran') }}" class="list-group-item {{ $active == 'penyaluran' ? 'active' : '' }}">
      Penyaluran
    </a>
    <a href="{{route('edit.profile')}}" class="list-group-item {{ $active == 'edit-profile' ? 'active' : '' }}">
      Edit Profil
    </a>
    <a href="{{route('edit.password')}}" class="list-group-item {{ $active == 'edit-password' ? 'active' : '' }}">
      Ubah Password
    </a>
    {{-- <a href="{{route('daftar.donatur')}}" class="list-group-item">Lihat daftar donatur</a> --}}
    {{-- <a href="{{route('daftar.mitra')}}" class="list-group-item">Lihat daftar mitra Berkah Yatim</a> --}}
    <a href="{{ route('logout') }}" class="list-group-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
      {{ __('Logout') }}
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
    {{-- <a data-toggle="modal" data-target="#confirm-absen" class="list-group-item" style="cursor:pointer;">Berhenti jadi donatur</a> --}}
    </div>
</div>