<div class="header-top">
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container-fluid">
            <div class="brand-box d-flex">
                <a class="navbar-brand" href="#">
                    <img src="{{asset('tp_dashboard/images/bdLogo.png')}}" alt="" />
                </a>
                <a class="navbar-brand" href="#">
                    <img src="{{asset('tp_dashboard/images/logo.svg')}}" alt="" />
                </a>
            </div>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link border-primary mr-3" href="{{url('/')}}"> Sorting Position </a>
                        {{-- <a class="nav-link border-primary mr-3" href="#" id="sortable_btn"> Sorting Position </a> --}}
                    </li>
                    <li class="nav-item">
                        <a class="nav-link home-btn" href="{{url('/')}}">Back to Home </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>