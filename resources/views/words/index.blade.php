@extends('frontend')

@section('content')
    <div id="wordsView">
        <ul class="collection" v-repeat="words">
            <li class="collection-item avatar">
                <i class="mdi-file-folder circle"></i>
                <span class="title">@{{ word }}</span>
                <p>@{{pronunciation}} <br>
                    Second Line
                </p>
                <a href="#!" class="secondary-content"><i class="mdi-action-grade"></i></a>
            </li>
        </ul>
    </div>
@endsection
