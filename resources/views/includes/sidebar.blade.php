<nav id="sidebar" class="active">
    <div class="custom-menu">
      <button type="button" id="sidebarCollapse" class="btn btn-primary">
        <i class="fa fa-bars"></i>
        <span class="sr-only">Toggle Menu</span>
    </button>
  </div>
	<div class="p-4">
		<h1>
			<a href="index.html" class="logo">{{ config('app.name') }}</a>
		</h1>
		<div class="row">
			<div class="col">
				<h6>ID: <strong>#{{ Auth::user()->id }}</strong></h6>
				<h6>Primary: <strong>#{{ Auth::user()->id }}</strong></h6>
			</div>
		</div>
      <ul class="list-unstyled components mb-5">
			<li class="{{ request()->is('/') ? 'active' : '' }}">
				<a href="#"><span class="fa fa-home mr-3"></span> Dashboard</a>
			</li>
			<li class="{{ request()->is('player-events') ? 'active' : '' }}">
				<a href="/player-events"><i class="fas fa-flag mr-3"></i> Player Events</a>
			</li>
			<li class="{{ request()->is('tournaments') ? 'active' : '' }}">
				<a href="/tournaments"><i class="fas fa-poll-h mr-3"></i> Tournaments</a>
			</li>
			<li class="{{ request()->is('my-pigeons') ? 'active' : '' }}">
				<a href="/my-pigeons"><i class="fas fa-dove mr-3"></i> My Pigeons</a>
			</li>
			<li class="{{ request()->is('coordinates') ? 'active' : '' }}">
				<a href="/coordinates"><i class="fas fa-thumbtack mr-3"></i> View Coordinates</a>
			</li>
      </ul>

      <div class="mb-5">
			<h3 class="h6 mb-3">Subscribe for newsletter</h3>
			<form action="#" class="subscribe-form">
				<div class="form-group d-flex">
					<div class="icon">
						<span class="icon-paper-plane"></span>
					</div>
					<input type="text" class="form-control" placeholder="Enter Email Address">
				</div>
			</form>
        </div>

      <div class="footer">
		<p>Copyright &copy;
			<script>document.write(new Date().getFullYear());</script> All rights reserved
		</p>
      </div>

  </div>
</nav>