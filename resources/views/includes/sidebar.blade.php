<nav id="sidebar" class="sidebar-container">
    <div class="custom-menu">
      <button type="button" id="sidebarCollapse" class="btn btn-primary">
        <i class="fa fa-bars"></i>
        <span class="sr-only">Toggle Menu</span>
    </button>
  </div>
	<div class="p-4">
		<div class="row mb-5 justify-content-center align-items-center">
			<img src="{{ asset('storage/app/mulawin.png') }}" alt="" width="60" height="65">
			<div class="col">
				<h6><strong>{{ Auth::user()->name }}</strong></h6>
				<small>{{ Auth::user()->email }}</small>
			</div>
		</div>
      <ul class="list-unstyled components mb-5">
			<li class="{{ request()->is('/') ? 'active' : '' }}">
				<a href="/"><span class="fa fa-home mr-3"></span> Home</a>
			</li>
			{{-- <li class="{{ request()->is('player-events') ? 'active' : '' }}">
				<a href="/player-events"><i class="fas fa-flag mr-3"></i> Player Events</a>
			</li> --}}
			<li class="{{ request()->is('tournaments') ? 'active' : '' }}">
				<a href="/tournaments"><i class="fas fa-poll-h mr-3"></i> Tournaments</a>
			</li>
			<li class="{{ request()->is('my-pigeons') ? 'active' : '' }}">
				<a href="/my-pigeons"><i class="fas fa-dove mr-3"></i> My Pigeons</a>
			</li>
			<li class="{{ request()->is('coordinates') ? 'active' : '' }}">
				<a href="/coordinates"><i class="fas fa-thumbtack mr-3"></i> View Coordinates</a>
			</li>
			<li class="{{ request()->is('generate-qrcode') ? 'active' : '' }}">
				<a href="/generate-qrcode"><i class="fas fa-qrcode"></i> Generate QR Code</a>
			</li>
			<li>
				<a href="#" class="nav-link" onclick="document.getElementById('logout__form').submit()">
					<p><i class="fas fa-sign-out-alt mr-3"></i>Logout</p>
					<form action="{{ route('logout') }}" method="POST" id="logout__form">
						@csrf
					</form>
              	</a>
			</li>
      </ul>

      <div class="footer">
		<p>Copyright &copy;
			<script>document.write(new Date().getFullYear());</script> All rights reserved
		</p>
      </div>

  </div>
</nav>