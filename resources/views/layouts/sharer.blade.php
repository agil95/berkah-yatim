<div class="by-bottomsheet-header">
  <h3 class="text--subtitle">{{ isset($share_title) ? $share_title : 'Dukung campaign ini dengan share' }}</h3>
  <button class="by-bottomsheet__btn-close">&times;</button>
</div>
<div class="by-bottomsheet-share" data-proker-name="{{ isset($proker_name) ? $proker_name : 'Berkah Yatim' }}">
  <div class="by-bottomsheet-share-item" data-target="whatsapp">
    <img src="{{ asset('dist/img/ico-whatsapp.svg') }}" alt="share whatsapp">
    <p class="text--subsubttitle">WhatsApp</p>
  </div>
  <div class="by-bottomsheet-share-item" data-target="fb">
    <img src="{{ asset('dist/img/ico-fb.svg') }}" alt="share facebook">
    <p class="text--subsubttitle">Facebook</p>
  </div>
  <div class="by-bottomsheet-share-item" data-target="copy">
    <img src="{{ asset('dist/img/ico-copy.svg') }}" alt="copy url">
    <p class="text--subsubttitle">Copy url</p>
  </div>
</div>
