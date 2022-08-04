<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{route('admin')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-heading"><hr></li>
      <li class="nav-item">
        <a class="nav-link " href="{{ route('post.index') }}">
          <i class="bi bi-grid"></i>
          <span>Post</span>
        </a>
      </li><!-- End Dashboard Nav -->

      @can('IsAdmin')
        <li class="nav-item">
          <a class="nav-link " href="{{ route('category.index') }}">
            <i class="bi bi-grid"></i>
            <span>Category</span>
          </a>
        </li><!-- End Dashboard Nav -->
      @endcan
      
      <li class="nav-item">
        <a class="nav-link " href="{{ route('tag.index') }}">
          <i class="bi bi-grid"></i>
          <span>Tag</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-heading">Application ..</li>

      @can('IsAdmin')
        
        <li class="nav-item">
          <a class="nav-link " href="{{route('team.index')}}">
            <i class="bi bi-grid"></i>
            <span>Team</span>
          </a>
        </li><!-- End Dashboard Nav -->
        <li class="nav-item">
          <a class="nav-link " href="{{ route('setting.index')}}">
            <i class="bi bi-grid"></i>
            <span>Setting</span>
          </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
          <a class="nav-link " href="{{ route('user.index')}}">
            <i class="bi bi-grid"></i>
            <span>Users</span>
          </a>
        </li><!-- End Dashboard Nav -->
      
      @endcan


      <li class="nav-item">
        <a class="nav-link " href="{{ route('profile.index')}}">
          <i class="bi bi-grid"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-heading"></li>


      <li class="nav-item">
        <a class="nav-link " href="{{ route('logout')}}">
          <i class="bi bi-grid text-danger"></i>
          <span class="text-danger">Logout</span>
        </a>
      </li><!-- End Dashboard Nav -->

    </ul>

  </aside>
