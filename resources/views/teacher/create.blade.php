@extends('layouts.master')

@section('title','Teacher')

@section('content')

<section id="basic-form-layouts">
	<div class="row">
		<div class="row match-height">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title" id="basic-layout-form-center">Teacher</h4>
						<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
						<div class="heading-elements">
							<ul class="list-inline mb-0">
								<li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
								<li><a data-action="reload"><i class="icon-reload"></i></a></li>
								<li><a data-action="expand"><i class="icon-expand2"></i></a></li>
								<li><a data-action="close"><i class="icon-cross2"></i></a></li>
							</ul>
						</div>
					</div>
					<div class="card-body collapse in">
						<div class="card-block">


							<form class="form" action="{{route('store_teacher')}}" method="post">
								<div class="row">
									<div class="col-md-6 offset-md-3">
										<div class="form-body">
											<div class="form-group">
												<label for="name">Name</label>
												<input type="text" id="name" class="form-control" placeholder="name" name="name">
											</div>

											<div class="form-group">
												<label for="description">Designation</label>
												<input type="text" id="designation" class="form-control" placeholder=" enter your designation" name="designation">
											</div>

											<div class="form-group">
												<label for="email">Email</label>
												<input type="text" id="email" class="form-control" placeholder=" enter your email" name="email">
											</div>


										</div>
									</div>
								</div>
								<input type="hidden" name="_token" value="{{csrf_token()}}">

								<div class="form-actions center">
									<button type="button" class="btn btn-warning mr-1">
										<i class="icon-cross2"></i> Cancel
									</button>
									<button type="submit" class="btn btn-primary">
										<i class="icon-check2"></i> Save
									</button>
								</div>
							</form>	

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


@endsection