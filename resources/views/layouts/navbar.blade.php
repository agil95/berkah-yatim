@if (isset($page_title))
{{-- $primary controls type of navbar. If true, render primary color navbar without back btn --}}
<header class="by-navbar {{ $primary ? 'by-navbar--primary' : 'by-navbar--page' }}">
  <div class="by-container">
    <nav class="by-nav">
      @if (!isset($primary) || !$primary)
        @if (isset($back_link) && $back_link)
        <a href="{{ $back_link }}" class="by-nav__back">
          <img src="{{ asset('dist/img/ico-arrow-left.svg') }}" alt="back">
        </a>
        @else
        <div class="by-nav__back">
          <img src="{{ asset('dist/img/ico-arrow-left.svg') }}" alt="back">
        </div>
        @endif
      @endif
      <h2 class="by-nav__page-title">{{ $page_title }}</h2>
      @if (isset($action_link) && isset($action_text))
      <a href="{{ $action_link }}" class="by-nav__action text--subtitle text--semibold">{{ $action_text }}</a>
      @endif
    </nav>
  </div>
</header>
@else
<header class="by-navbar">
  <div class="by-container">
    <nav class="by-nav">
      <a href="/" class="by-nav__logo">
        <img src="{{ asset('dist/img/img-logo-berkahyatim.png') }}" alt="logo">
      </a>
      <div class="by-nav__search">
        <a href="{{ route('searchpage') }}">Cari program untuk berbagi</a>
      </div>
    </nav>
  </div>
</header>
@endif
