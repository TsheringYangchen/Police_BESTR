
@extends('front.layouts.master1')
@section('content')
<br>
<main class="py-4">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header font-weight-bold">Change Your Old Password</div>
					<div class="card-body">
						<form method="POST" action="#">
							{{ csrf_field() }}

							<div class="form-group row">
								<label for="password" class="col-md-4 col-form-label text-md-right">Old Password*</label>
								<div class="col-md-6">
									<input type="password" class="form-control " name="old_password">
                                </div>
							</div>
							<div class="form-group row">
								<label for="password-confirm" class="col-md-4 col-form-label text-md-right">New Password*</label>
								<div class="col-md-6">
									<input type="password" class="form-control" name="new_password">
                                </div>
							</div>
                            <div class="form-group row">
								<label for="repeat_password" class="col-md-4 col-form-label text-md-right">Repeat New Password*</label>
								<div class="col-md-6">
									<input type="password" class="form-control" name="repeat_password">
                                </div>
							</div>
							<div class="form-group row mb-0">
								<div class="col-md-12 offset-md-4">
									<button type="submit" name="submit" class="btn btn-primary"> Save Changes</button>
									<button type="submit" name="submit" class="btn btn-danger mx-3"> Cancel </button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</main> 
@endsection