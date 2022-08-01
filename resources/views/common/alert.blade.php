@if (session()->has('success'))

  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="bi bi-check-circle me-1"></i>
        {{session('success')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
  </div>

@elseif (session()->has('error'))

<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <i class="bi bi-exclamation-octagon me-1"></i>
        {{session('error')}}!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
  </div>
  
@endif

  