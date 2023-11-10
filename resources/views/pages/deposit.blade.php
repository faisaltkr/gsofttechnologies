@extends('layouts.app')

@section('title','Deposit')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('pages.notifications')
                
                <div class="card">
                    <div class="card-header">
                    <h3 class="card-title mt-1">{{ __('Deposit Money') }}</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('deposits.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="" class="mb-2">Amount</label>
                                <input type="number" placeholder="Enter amount to deposit" name="amount" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ old('amount') }}" required autocomplete="amount" autofocus placeholder="Enter amount">
                                @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <input type="hidden" name="type" value="credit">
                            <div class="form-group mt-4 mb-3">
                                <button type="submit" class="btn btn-primary w-100">Deposit</button>
                            </div>
                        </form>
                    </div>
                </div>
                 

                {{-- <div class="card">
                    <div class="card-title">
                        <h4>{{ __('Deposit Money') }}</h4>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Amount</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
