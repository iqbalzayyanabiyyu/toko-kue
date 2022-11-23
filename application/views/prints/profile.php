<style>
	@media print {
		.no_print {
			display: none;	
		}
		body {
			font-size: 2.2rem;
		}
	}
</style>
<div class="container-fluid ">
	<div class="row justify-content-center mt-2">
		<div class="col-6">
			<a onclick="window.print();" class="no_print btn btn-success"><i class="fas fa-fw fa-print"></i></a>
		</div>
	</div>
	<div class="row justify-content-center mt-4">
		<div class="col-10">
			<div class="card bg-danger p-3 rounded text-white mb-3">
			  <div class="row no-gutters rounded">
			    <div class="col-lg-12">
			      <div class="card-body my-auto">
		       		<div class="row">
		      			<div class="col-md-4 ml-5">Username</div>
		      			<div class="col-xs-1"> : </div>
		      			<div class="col text-break"><?= $userProfile['username']; ?></div>
		       		</div>
		      		<div class="row">
		      			<div class="col-md-4 ml-5">Nama User</div>
		      			<div class="col-xs-1"> : </div>
		      			<div class="col text-break"><?= ucwords(strtolower($userProfile['nama_user'])); ?></div>
		       		</div>
		       		<div class="row">
		      			<div class="col-md-4 ml-5">Jabatan</div>
		      			<div class="col-xs-1"> : </div>
		      			<div class="col text-break"><?= $userProfile['jabatan']; ?></div>
		       		</div>
		       		<div class="row">
		      			<div class="col-md-4 ml-5">Pada Outlet</div>
		      			<div class="col-xs-1"> : </div>
		      			<div class="col text-break"><?= $userProfile['nama_outlet']; ?></div>
		       		</div>
			      </div>
			    </div>
			  </div>
			</div>
		</div>
	</div>
</div>
<script>
	window.print();
</script>