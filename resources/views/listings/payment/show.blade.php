@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Pay for your listing') }}</div>

                <div class="card-body">
                    @if($listing->cost() == 0)
                        <form action="#" method="post">
                            <p>There's nothing for you to pay</p>
                            <button type="submit" class="btn btn-outline-primary">Complete</button>

                            @csrf
                            @method('patch')
                        </form>
                    @else
                        <p>Total cost: ${{ number_format($listing->cost(), 2)}}</p>
                        <payment></payment>

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
