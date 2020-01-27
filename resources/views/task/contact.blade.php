@extends('layouts.master')

@section('title','Task')

@section('content')

<section id="basic-form-layouts">
	<div class="row">
		<div class="row match-height">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title" id="basic-layout-form-center">Contact</h4>
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


							<form action="{{ route('page_index')}}" method="post">
				
			<div class="form-group">
				<label for="exampleInputEmail">Email</label>
				<input type="email" name="email" class="form-control">
				@if(count($errors)>0)
					<label style="color: red">{{ $errors->first('email')}}</label>

				@endif
				
			</div>

			<div class="form-group">
				<label for="exampleInputPassword1">Subject</label>
				<input type="text" name="subject" class="form-control">

			</div>

				<div class="form-group">
				<label for="exampleInputPassword1">Message</label>
				<textarea class="form-control" name="message" rows="3"></textarea>

			</div>
			<input type="hidden" name="_token" value="{{csrf_token()}}">

			<button type="submit" class="btn btn-lg btn-success">Send Message</button>



			</form>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


@endsection