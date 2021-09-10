@extends('admin.master.layout')
@section('title')
	Dashboard
@endsection
@section('content')
        {{-- Start data-analysis section --}}
		<section class="data-analysis">
			<div class="box">
				<div class="data">
					<h1 class="quantity">{{ count($formations) }}</h1>
					<p>Formations</p>
				</div>
				<div class="data-icon">
                    <i class="fas fa-chalkboard-teacher"></i>
				</div>
			</div>
			<div class="box">
				<div class="data">
					<h1 class="quantity">{{ count($courses) }}</h1>
					<p>Cours</p>
				</div>
				<div class="data-icon">
					<i class="fas fa-graduation-cap"></i>
				</div>
			</div>
			<div class="box">
				<div class="data">
					<h1 class="quantity">{{ count($countEvents) }}</h1>
					<p>Evénements</p>
				</div>
				<div class="data-icon">
					<i class="far fa-calendar-alt"></i>
				</div>
			</div>
			<div class="box">
				<div class="data">
					<h1 class="quantity">{{ count($countMembres) }}</h1>
					<p>Membres</p>
				</div>
				<div class="data-icon">
					<i class="fas fa-users"></i>
				</div>
			</div>
		</section>
		{{-- End data-analysis section --}}
		
		<div class="row mt-4" style="margin-left: 0">
			<div class="col-md-8">
				<div class="main-users">
					<div class="users card">
						<div class="table-header card-header">
							<h3>Derniers évènements</h3>
							<a href="{{ route('admin.events') }}"><i class="far fa-calendar-alt"></i> Plus d'événements</a>
						</div>
						<div class="uk-overflow-auto card-body">
							<table class="uk-table uk-table-divider uk-table-hover" >
								<thead>
									<tr>
										<th>Evénement</th>
										<th>Date</th>
										<th>Heure</th>
										<th>voire</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($events as $event)
										<tr>
											<td>{{ Str::limit($event->theme, 40) }}</td>
											<td>{{ $event->date }}</td>
											<td>{{ $event->heure }}</td>
											<td>
												<a href="#" uk-toggle="target: #modal-close-default-view-event-{{ $event->id }}"><i class="far fa-eye"></i></a>

												<div id="modal-close-default-view-event-{{ $event->id }}" uk-modal>
													<div class="uk-modal-dialog uk-modal-body">
														<button class="uk-modal-close-default" type="button" uk-close></button>
														<div>
															<div class="inputs-group">
																<div class="row mb-2">
																	<div class="col">
																		<label for="theme" class="mb-1">Evénement</label>
																		<input class="uk-input " type="text" placeholder="Evénement" id="theme" value="{{ $event->theme }}" disabled>
																	</div>
																</div>
																<div class="row mb-2">
																	<div class="col-md-6">
																		<div class="form-group mb-2">
																			<label for="Animateur" class="mb-1">Animateur</label>
																			<input class="uk-input" type="text" placeholder="Animateur" id="Animateur" value="{{ $event->animateur }}" disabled>
																		</div>
																		<div class="form-group mb-2">
																			<label for="Date" class="mb-1">Date</label>
																			<input class="uk-input " type="date" placeholder="Date" id="Date" value="{{ $event->date }}" disabled>
																		</div>
																		<div class="form-group mb-2">
																			<label for="Heure" class="mb-1">Heure</label>
																			<input class="uk-input" type="time" placeholder="Heure" id="Heure" value="{{ $event->heure }}" disabled>
																		</div>
																		<div class="form-group">
																			<label for="Lieu" class="mb-1">Lieu</label>
																			<input class="uk-input" type="text" placeholder="Lieu" id="Lieu" value="{{ $event->lieu }}" disabled>
																		</div>
																	</div>
																	<div class="col-md-6">
																		<label for="Affiche-img" class="mb-2">Affiche</label>
																		<img src="{{ asset('uploads/events/'. $event->affiche ) }}" alt="event" id="Affiche-img" class="img-affiche">
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 team-dashbord mt-small-4">
				<div class="main-users">
					<div class="users card">
						<div class="table-header card-header">
							<h3>Membres</h3>
							<a href="{{ route('admin.team') }}"><i class="fas fa-users"></i> Plus de Membres</a>
						</div>
						<div class="uk-overflow-auto card-body">
							<table class="uk-table uk-table-divider uk-table-hover" >
								<thead>
									<tr>
										<th>Nom Complet</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($membres as $membre)
										<tr>
											<td>{{ $membre->nom . ' ' . $membre->prenom }}</td>
											<td>
												<a href="mailto:{{ $membre->email }}"><i class="far fa-paper-plane"></i></a>
												<a href="#" uk-toggle="target: #modal-close-default-view-{{ $membre->id }}"><i class="far fa-eye"></i></a>

												<div id="modal-close-default-view-{{ $membre->id }}" uk-modal>
													<div class="uk-modal-dialog uk-modal-body">
														<button class="uk-modal-close-default" type="button" uk-close></button>
														<div>
															<div class="inputs-group">
																<div class="row mb-2">
																	<div class="col-md-6">
																		<label for="nom" class="mb-1">NOM</label>
																		<input class="uk-input " type="text" placeholder="Nom" id="nom" value="{{ $membre->nom }}" disabled>
																	</div>
																	<div class="col-md-6">
																		<label for="prenom" class="mb-1">PRÉNOM</label>
																		<input class="uk-input" type="text" placeholder="Prénom" value="{{ $membre->prenom }}" id="prenom" disabled>
																	</div>
																	
																</div>
																<div class="row mb-2">
																	<div class="col-md-6">
																		<label for="email" class="mb-1">E-MAIL</label>
																		<input class="uk-input" type="email" placeholder="E-MAIL" value="{{ $membre->email }}" id="email" disabled>
																	</div>
																	<div class="col-md-6">
																		<label for="phone" class="mb-1">Téléphone</label>
																		<input class="uk-input" type="tel" placeholder="Téléphone" value="{{ $membre->phone }}" id="phone" name="phone" disabled>
																	</div>
																</div>
																<div class="row mb-2">
																	<div class="col-md-6">
																		<label for="filiere" class="mb-1">FILIÈRE</label>
																		<input class="uk-input" type="text" placeholder="FILIÈRE" value="{{ $membre->filiere }}" id="filiere" disabled>
																	</div>
																	<div class="col-md-6">
																		<label for="role" class="mb-1">ROLE</label>
																		<input class="uk-input" type="text" placeholder="Role" value="{{ $membre->role }}" id="role" disabled>
																	</div>
																</div>
																<div class="row">
																	<div class="col-md-6">
																		<label for="photo" class="mb-1">Photo</label>
																		@if ($membre->photo)
																			<img src="{{ asset('uploads/team/'. $membre->photo) }}" alt="{{ $membre->nom . ' ' .  $membre->prenom}}" class="card-img-top" id="photo">
																		@else
																			<img src="https://ui-avatars.com/api/?background=0D8ABC&color=fff&name={{ $membre->nom . '+' .  $membre->prenom}}&size=240" alt="{{ $membre->nom . ' ' .  $membre->prenom}}" class="card-img-top" id="photo">
																		@endif
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</td>
										</tr> 
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

@endsection

