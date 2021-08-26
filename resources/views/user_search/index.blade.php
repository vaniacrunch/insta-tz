@extends('layout.main')
@section('content')
    <div class="row">
        <div class="col s12">
            <div class="card-panel">
                <form action="{{ route('user_search.find') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col s9">
                            <div class="row">
                                <div class="input-field">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input
                                        placeholder="Sth like generous_samurai"
                                        id="instagram_url"
                                        type="text"
                                        class="validate"
                                        name="instagram_url">
                                    <label for="instagram_url">Instagram page url or nickname</label>
                                </div>
                            </div>

                        </div>
                        <div class="col">
                            <button class="btn waves-effect waves-light" type="submit" name="action">Send
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if(isset($user))
        <div class="row">
            <div class="col s12">
                <div class="card-panel">
                    <div class="row">
                        <div class="col s7 m7">
                            <div class="card" style="display: flex">
                                <div class="card-image">
                                    <img src="{{ $user->picture }}" alt="{{ $user->username }}" style="width: 400px;">
                                    <span class="card-title">{{ $user->username }}</span>
                                </div>
                                <div class="card-content">
                                    <p><b>ID : </b> {{ $user->id }}</p>
                                    <p><b>Followers : </b> {{ $user->followers }}</p>
                                    <p><b>Followings : </b> {{ $user->followings }}</p>
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('orders.create') }}" method="POST">
                            @csrf
                            <input type="hidden" name="ig_username" value="{{ $user->username }}">
                            <div class="col s5">
                                <div class="input-field col s12">
                                    <select id="service_select" name="service" required>
                                        <option value="" disabled selected>Choose your option</option>
                                        @foreach($services as $service)
                                            <option value="{{ $service->service }}">{{ $service->name }}
                                                ({{ $service->rate }} руб for {{ $service->min }})
                                            </option>
                                        @endforeach
                                    </select>
                                    <label>Select service</label>
                                    <div class="input-field">
                                        <input
                                            required
                                            placeholder="Sth like 123"
                                            id="followers_amount"
                                            type="number"
                                            class="validate"
                                            name="followers_amount">
                                        <label for="followers_amount">Amount of followers</label>
                                    </div>
                                    <div class="col right">
                                        <button class="btn waves-effect waves-light" type="submit" name="action">Send
                                            <i class="material-icons right">send</i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    @endif
@endsection
@section('local_scripts')
    <script>
        $(document).ready(function () {
            $('#service_select').formSelect();
        });
    </script>
@endsection
