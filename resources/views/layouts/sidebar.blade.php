@php
  $access = [];

  if (count(session('accessible_menus'))) {
    foreach (session('accessible_menus') as $item) {
      $access[] = $item;
    }
  }
  
  $menus = \App\Menu::with('submenus')
    ->where('parent_id', null)
    ->get();
@endphp

<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{asset('storage/' . $foto)}}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p> {{ Auth::user()->name }}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">

        @foreach ($menus as $menu)
          
          @php
            $tree = count($menu->submenus) ? 'treeview' : '';
            $active = Request::path() == $menu->url ? 'active' : '';

            if ($tree) {
              foreach ($menu->submenus as $submenu) {
                if (Request::path() == $submenu->url)
                  $active = 'active';
              }
            }
          @endphp
          
          @if (in_array($menu->id, $access))
              
            <li class="{{ $tree }} {{ $active }}">

              <a href="{{ $menu->url ? url($menu->url) : '#' }}">
                <i class="{{ $menu->icon }}"></i> <span>{{ $menu->name }}</span>
                @if ($tree)
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                @endif
              </a>

              @if ($tree)
                <ul class="treeview-menu">
                  @foreach ($menu->submenus as $submenu)
                    @if (in_array($submenu->id, $access))
                      <li class="{{ Request::path() == $submenu->url ? 'active' : '' }}">
                        <a href="{{ url($submenu->url) }}">
                          <i class="{{ $submenu->icon }}"></i>
                          <span>{{ $submenu->name }}</span>
                        </a>
                      </li>
                    @endif
                  @endforeach
                </ul>
              @endif

            </li>

          @endif

        @endforeach

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>