<div class="row justify-content-center">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-body">
				<div class="row align-items-center">
					<div class="col-8">
						<h4 class="text-c-yellow"><?= $data['longitude']; ?></h4>
					</div>
					<div class="col-4 text-right">
						<i class="fas fa-map-marked-alt"></i>
					</div>
				</div>
			</div>
			<div class="card-footer bg-c-yellow">
				<div class="row align-items-center">
					<div class="col-9">
						<h6 class="text-light m-b-0">Longitude</h6>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-body">
				<div class="row align-items-center">
					<div class="col-8">
						<h4 class="text-c-green"><?= $data['latitude']; ?></h4>
					</div>
					<div class="col-4 text-right">
						<i class="fas fa-map-marked-alt"></i>
					</div>
				</div>
			</div>
			<div class="card-footer bg-c-green">
				<div class="row align-items-center">
					<div class="col-9">
						<h6 class="text-light m-b-0">Latitude</h6>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row justify-content-center">
	<div class="col-lg-12">
		<a href="<?= "http://maps.google.com/maps?q=" . $data['longitude'] . "," . $data['latitude']; ?>">
			<div class="card">
				<div class="card-body">
					<div class="row align-items-center">
						<div class="col-8">
							<h4 class="text-c-blue"><?= "http://maps.google.com/maps?q=" . $data['longitude'] . "," . $data['latitude']; ?></h4>
						</div>
						<div class="col-4 text-right">
							<i class="fas fa-location-arrow"></i>
						</div>
					</div>
				</div>
				<div class="card-footer bg-c-blue">
					<div class="row align-items-center">
						<div class="col-9">
							<h6 class="text-light m-b-0">Pantau Lokasi</h6>
						</div>
					</div>
				</div>
			</div>
		</a>
	</div>
</div>
