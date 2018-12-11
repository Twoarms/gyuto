@extends('layouts.app')

@section('title', "Dashboard - Mes Evènements")

@section('content')
  <article class="card">
    <h2 class="card-header">Evènement {{$event->title }}</h2>
    <div class="card-body">
      <h4 class="card-title">
        Titre
      </h4>
      <p class="card-text">
        {{$event->title}}
      </p>
      <h4 class="card-title">
        Date de début
      </h4>
      <p class="card-text">
        {{$event->dateFrom}}
      </p>
      <h4 class="card-title">
        Date de la fin
      </h4>
      <p class="card-text">
        {{$event->dateEnd}}
      </p>
      <h4 class="card-title">
        Heure de début
      </h4>
      <p class="card-text">
        {{$event->timeStart}}
      </p>
      <h4 class="card-title">
        Heure de la fin
      </h4>
      <p class="card-text">
        {{$event->timeEnd}}
      </p>
      <h4 class="card-title">
        N° de la rue
      </h4>
      <p class="card-text">
        {{$event->numberStreet}}
      </p>
      <h4 class="card-title">
        Rue
      </h4>
      <p class="card-text">
        {{$event->nameStreet}}
      </p>
      <h4 class="card-title">
        Code Postal
      </h4>
      <p class="card-text">
        {{$event->zipCode}}
      </p>
      <h4 class="card-title">
        Ville
      </h4>
      <p class="card-text">
        {{$event->city}}
      </p>
      <h4 class="card-title">
        Pays
      </h4>
      <p class="card-text">
        {{$event->country}}
      </p>
      <h4 class="card-title">
        Description Fr
      </h4>
      <p class="card-text">
        {{$event->descriptionFr}}
      </p>
      <h4 class="card-title">
        Description EN
      </h4>
      <p class="card-text">
        {{$event->descriptionEn}}
      </p>
    </div>
  </article>
@endsection