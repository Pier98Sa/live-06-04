@extends('admin.layouts.base')

@section('content')
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-12">

           
              <h1>Modifica user</h1>
              
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

              <form method="POST" action="{{ route('admin.user.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @if ($user->avatar)
                  <h3>Immagine attuale</h3>
                  <img src="{{route('admin.user.getMyAvatar')}}" alt="">
                @endif

                <div class="form-group">
                  <label for="image">Carica nuovo avatar</label>
                  <input class="form-control" type="file" name="image" id="image">
                </div>

                <div class="form-group">
                  <label for="name">Nome e cognome</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{old('name', $user->name)}}">
                </div>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="email" value="{{old('email', $user->email)}}">
                </div>

                <div class="card p-3">
                    <h1>La tua nuova password - lascia in bianco per non aggiornare</h1>
                    <div class="form-group ">
                        <label for="new_password">Nuova Password</label>
                        <input type="password" class="form-control" id="new_password" name="new_password">
                    </div>

                    <div class="form-group ">
                        <label for="new_password_confirmation">Conferma Nuova  Password</label>
                        <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation">
                    </div>
                </div>
                

                <button type="submit" class="btn btn-primary">Salva</button>
              </form>

          </div>
      </div>
  </div>
@endsection