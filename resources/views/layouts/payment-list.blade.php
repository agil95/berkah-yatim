@if($instans->count()>0)
<div class="payment-title">
  Pembayaran Instan (Cepat & Mudah)
</div>
<div class="payment-list">
  @foreach($instans as $va)
  <a href="#" class="payment-item" data-type="{{$va->bank}}" data-label="{{$va->branch}}" data-image="{{  asset('storage/'.$va->dokumentasi) }}">
    <img src="{{ asset('storage/'.$va->dokumentasi) }}" alt="gopay" class="payment-item__img">
    <p class="payment-item__text">{{$va->branch}}</p>
  </a>
@endforeach
</div>
@endif
@if($vas->count()>0)
<div class="payment-title">
  Virtual Account (Verifikasi Otomatis)
</div>
<div class="payment-list">
  @foreach($vas as $va)
  <a href="#" class="payment-item" data-type="{{$va->bank}}" data-label="{{$va->branch}}" data-image="{{  asset('storage/'.$va->dokumentasi) }}">
    <img src="{{ asset('storage/'.$va->dokumentasi) }}" alt="gopay" class="payment-item__img">
    <p class="payment-item__text">{{$va->branch}}</p>
  </a>
  @endforeach
</div>
@endif
@if($rekenings->count()>0)
<div class="payment-title">
  Transfer Bank (Verifikasi Manual 1x24jam)
</div>
<div class="payment-list">
  @foreach($rekenings as $va)
  <a href="#" class="payment-item" data-type="{{$va->bank}}" data-label="{{$va->branch}}" data-image="{{  asset('storage/'.$va->dokumentasi) }}">
    <img src="{{ asset('storage/'.$va->dokumentasi) }}" alt="gopay" class="payment-item__img">
    <p class="payment-item__text">{{$va->branch}}</p>
  </a>
  @endforeach
</div>
@endif