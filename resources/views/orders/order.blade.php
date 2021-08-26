@extends('layout.main')
@section('content')
    <h1> Order No {{ $order->order_id  }}</h1>
    <div class="row">
        <div class="col s12 m5">
            <div class="card-panel">
                <p>
                    <b>IG user : </b><a
                        href="{{ \App\Helpers\InstagramUrlHelper::prepareUrl($order->ig_username, false) }}">{{ $order->ig_username }}</a>
                </p>
                <p><b>Status :</b> {{ $status->status }}</p>
                <p>
                    <b>Followers :</b>{{ $status->startCount ?? 0 }} out of {{ $status->remains }}
                </p>
            </div>
        </div>
    </div>
@endsection
