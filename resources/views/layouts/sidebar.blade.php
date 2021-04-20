<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="{{url('/home')}}" class="brand-link">
      <img src="{{ asset('/img/3.png') }}" alt="Absenplus Logo" class="brand-image img-circle"
           style="opacity: .8">
      <span class="brand-text font-weight-bold">ABSENPLUS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">    
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="{{ asset(Auth::user()->karyawan->foto) }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block"> 
                @if (Auth::guest())
                <p>User</p>
                @else
                    <p>{{ Auth::user()->name}}<br>
                    {{ Auth::user()->created_at}}</p>
                @endif</a>
            </div>
        </div>
        <!-- /Siderbar -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview"data-accordion="false">
                @include('layouts.menu')
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

<script>
  $('ul').Treeview(options)
</script>
