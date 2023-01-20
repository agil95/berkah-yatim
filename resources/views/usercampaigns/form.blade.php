<div class="form-group">
  <label for="type">Kategori</label>
  <select name="type" id="type" class="form-control" name="type" required>
    @if (!$campaign->type)
    <option selected disabled>Pilih Kategori Campaign</option>
    @endif
    @foreach ($categories as $item)
    <option value="{{ $item->id }}" {{ $campaign->type == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
    @endforeach
  </select>
</div>
<div class="form-group">
  <label for="nama_kegiatan">Nama Campaign</label>
  <input type="text" id="nama_kegiatan" name="nama_kegiatan" class="form-control" value="{{ old('nama_kegiatan', $campaign->nama_kegiatan) }}" required>
</div>
<div class="form-group">
  <label for="tag">Tagline</label>
  <input type="text" id="tag" name="tag" class="form-control" value="{{ old('tag', $campaign->tag) }}" required>
</div>
<div class="form-group">
  <label for="deskripsi">Deskripsi Campaign</label>
  <textarea name="deskripsi" id="deskripsi" class="form-control" rows="5" required>{{ old('deskripsi', $campaign->deskripsi) }}</textarea>
</div>
<div class="row" style="width: auto;">
  <div class="col-md-6">
    <div class="form-group">
      <label for="target">Target Donasi</label>
      <div class="input-group" style="margin-top: 0;">
        <span class="input-group-addon">Rp</span>
        <input type="number" min="0" id="target" name="target" class="form-control" value="{{ old('target', $campaign->target) }}" required>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label for="target_date">Batas Waktu</label>
      <input type="date" id="target_date" name="target_date" class="form-control" value="{{ old('target_date', optional($campaign->target_date)->format('Y-m-d')) }}" placeholder="{{ date('Y-m-d') }}" required>
    </div>
  </div>
</div>
<div class="form-group">
  @php $exists = \Storage::disk('public')->exists($campaign->dokumentasi); @endphp
  @if ($exists)
  <img src="{{ asset('storage/' . $campaign->dokumentasi) }}" alt="{{ $campaign->nama_kegiatan }}" class="img-responsive" style="margin-bottom: 2rem;">
  @endif
  <label for="dokumentasi">Foto Campaign</label>
  <input type="file" id="dokumentasi" name="dokumentasi" class="form-control" {{ !$exists ? 'required' : '' }}>
</div>