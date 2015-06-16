@extends('frontend')

@section('content')
    <div class="row">
        <div class="col s12 m4 offset-m4">
            <div class="card ">
                <form method="POST" action="/auth/login">
                    <div class="card-content ">
                        {!! csrf_field() !!}
                        <div class="input-field ">
                            <i class="mdi-action-face-unlock prefix"></i>
                            <input id="icon_prefix" type="text" class="validate" type="email" name="email"
                                   value="{{ old('email') }}">
                            <label for="icon_prefix">Email</label>
                        </div>
                        <div class="input-field ">
                            <i class="mdi-hardware-security prefix"></i>
                            <input id="icon_prefix" type="password" class="validate" input type="password"
                                   name="password"
                                   id="password">
                            <label for="icon_prefix">Password</label>
                        </div>

                    </div>
                    <div class="card-action">
                        <div>
                            <button class="btn btn-block waves-effect waves-light" type="submit" name="action">Submit
                                <i class="mdi-content-send right"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
