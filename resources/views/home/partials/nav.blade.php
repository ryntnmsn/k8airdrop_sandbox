
<div class="bg-custom-dark px-5 py-2 fw-bold rounded-pill" >
    <div class="row header">

        <nav class="navbar navbar-expand-lg">
          <div class="container-fluid">
            <a class="navbar-brand" href="/"><img src="{{url('images/logo/k8-airdrop-logo.png')}}" alt="" style="width:200px"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-grow-0" id="navbarNav">
              <ul class="navbar-nav">
                  <li class="nav-item me-2">
                    <a class="text-custom-secondary nav-link {{(request()->is('/promo/results')) ? 'active-menu' : '' }}" aria-current="page" href="/">{{__('Home')}}</a>
                  </li>
                  <li class="nav-item me-2">
                    <a class="text-custom-secondary nav-link" href="#">{{__('K8 Forum')}}</a>
                  </li>
                  <li class="nav-item me-2">
                    <a class="text-custom-secondary nav-link" href="/promo/results">{{__('Results')}}</a>
                  </li>
              </ul>
            </div>
          </div>
        </nav>
    </div>
</div>
