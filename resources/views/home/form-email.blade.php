@extends('home.layouts.main-home')
@section('title', 'Website Contoh')
@section('content')

<main id="main">
	<section class="breadcrumbs">
		<div class="container">
			<h2>Form Pemesanan</h2>
		</div>
	</section><!-- End Breadcrumbs -->
	<section id="contact" class="contact">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h3>Form </h3>
					<form method="post" action="/kirim">
						@csrf
						<div class="form-group">
							<label>Nama Lengkap</label>
							<input class="form-control" type="text" name="nama">
						</div>
						<div class="form-group">
							<label>Phone</label>
							<input class="form-control" type="text" name="phone">
						</div>
						<div class="form-group">
							<label>Alamat Email Saya</label>
							<input class="form-control" type="text" name="email">
						</div>
						<div class="form-group">
							<label>Message</label>
							<textarea class="form-control" name="message" rows="4"></textarea>
						</div>
						<div class="mt-2 text-right">
							<button type="submit" class="btn btn-primary">Kirim</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section><!-- End Contact Section -->

</main><!-- End #main -->

@endsection