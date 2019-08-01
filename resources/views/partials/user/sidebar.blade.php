<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="#">
                    <i class="fas fa-tachometer-alt"></i>
                    Dashboard <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('occupants.index') }}">
                    <i class="fas fa-users"></i>
                    Occupants
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('rent.index') }}">
                    <i class="fas fa-money-check-alt"></i>
                    Rent
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-file-pdf"></i>
                    Files
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-chart-bar"></i>
                    Reports
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.logs') }}">
                    <i class="far fa-file-code"></i>
                    Logs
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-cogs"></i>
                    Settings
                </a>
            </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Houses</span>
            <a class="d-flex align-items-center text-muted" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#createHouseModal">
              <i class="fas fa-plus-circle"></i>
            </a>
        </h6>
        <ul class="nav flex-column mb-2">
            
            @if($houses->count())
                @foreach($houses as $house)
                   <li class="nav-item">
                       <a class="nav-link" href="{{ route('houses.show', $house->id) }}">
                           <i class="fas fa-angle-right"></i> {{ $house->name }}
                       </a>
                   </li> 
                @endforeach
            @else
                <li class="nav-item">
                    <p class="text-center">
                        Create Your First House By Clicking The <i class="fas fa-plus-circle"></i> Above!
                    </p>
                </li>
            @endif
        </ul>
    </div>
</nav>