@extends('layouts.master')

@section('title','Task')

@section('content')

<section id="basic-form-layouts">
	<div class="row">
		<div class="row match-height">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title" id="basic-layout-form-center">Mail</h4>
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


							<form class="form" action="{{route('store_task')}}" method="post">
								<div class="row">
									<div class="col-md-6 offset-md-3">
										<div class="form-body">
											<div class="form-group">
												<label for="title">Title</label>
												<input type="text" id="title" class="form-control" placeholder="title" name="title">
											</div>

											<div class="form-group">
												<label for="description">Description</label>
												<input type="text" id="description" class="form-control" placeholder="description" name="description">
											</div>

											<div class="form-group">
												<label for="date">Date</label>
												<input type="date" id="date" class="form-control" placeholder="date" name="date">
											</div>

											<div class="form-group">
												<label for="start_time">Start Time</label>
												<input type="time" id="start_time" class="form-control" placeholder="start time" name="start_time">
											</div>

											<div class="form-group">
												<label for="end_time">End Time</label>
												<input type="time" id="end_time" class="form-control" name="end_time" placeholder="end time">
											</div>

											<div class="form-group">
												<label for="notify_before">Notification</label>
												<select id="notify_before" name="notify_before" class="form-control" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="notification">
													<option value="15">15 min</option>
													<option value="30">30 min</option>
													<option value="60">1 Hour</option>
													<option value="120">2 Hour</option>
													<option value="180">3 Hour</option>
												</select>
											</div>

											<div class="form-group">
												<label for="notify_before">Teacher</label>
												<select id="teacher_id" name="teacher_id" class="form-control" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="notification">
													 @foreach($teachers as $teacher)
                                                     <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                                      @endforeach
	
										
												</select>

												 @if($errors->has('teacher_id'))
					                                <p style="margin-top: 5px;" class="text-danger">{{ $errors->first('teacher_id') }}</p>
					                            @endif
											</div>


											<div class="form-group">
												<label>Existing Customer</label>
												<div class="input-group">
													<label class="display-inline-block custom-control custom-radio ml-1">
														<input type="radio" name="customer1" class="custom-control-input">
														<span class="custom-control-indicator"></span>
														<span class="custom-control-description ml-0">Yes</span>
													</label>
													<label class="display-inline-block custom-control custom-radio">
														<input type="radio" name="customer1" checked class="custom-control-input">
														<span class="custom-control-indicator"></span>
														<span class="custom-control-description ml-0">No</span>
													</label>
												</div>
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