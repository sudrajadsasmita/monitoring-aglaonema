<div class="row">
	<div class="col-lg-3">
		<div class="card">
			<div class="card-body">
				<div class="row align-items-center">
					<div class="col-8">
						<h4 class="text-c-yellow"><?= $data['humidity']; ?></h4>
					</div>
					<div class="col-4 text-right">
						<i class="fas fa-tint f-28"></i>
					</div>
				</div>
			</div>
			<div class="card-footer bg-c-yellow">
				<div class="row align-items-center">
					<div class="col-9">
						<h6 class="text-light m-b-0">Kelembaban</h6>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3">
		<div class="card">
			<div class="card-body">
				<div class="row align-items-center">
					<div class="col-8">
						<h4 class="text-c-green"><?= $data['temperature']; ?></h4>
					</div>
					<div class="col-4 text-right">
						<i class="fas fa-thermometer-half f-28"></i>
					</div>
				</div>
			</div>
			<div class="card-footer bg-c-green">
				<div class="row align-items-center">
					<div class="col-9">
						<h6 class="text-light m-b-0">Suhu</h6>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3">
		<div class="card">
			<div class="card-body">
				<div class="row align-items-center">
					<div class="col-8">
						<h4 class="text-c-red"><?= $data['lux'] ?></h4>
					</div>
					<div class="col-4 text-right">
						<i class="far fa-sun f-28"></i>
					</div>
				</div>
			</div>
			<div class="card-footer bg-c-red">
				<div class="row align-items-center">
					<div class="col-9">
						<h6 class="text-light m-b-0">Intensitas Cahaya</h6>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3">
		<div class="card">
			<div class="card-body">
				<div class="row align-items-center">
					<div class="col-8">
						<h4 class="text-c-blue"><?= $data['ph']; ?></h4>
					</div>
					<div class="col-4 text-right">
						<i class="fas fa-water f-28"></i>
					</div>
				</div>
			</div>
			<div class="card-footer bg-c-blue">
				<div class="row align-items-center">
					<div class="col-9">
						<h6 class="text-light m-b-0">PH</h6>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- page statustic card end -->
