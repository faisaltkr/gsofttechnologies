@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center row-cards">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">
                        <h4>{{ __('Welcome') }} {{ auth()->user()->name }}</h4>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-vcenter card-table">
                        <tbody>
                            <tr>
                                <td class="text-muted">YOUR ID</td>
                                <td>{{ auth()->user()->email }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">YOUR BALANCE</td>
                                <td>{{ auth()->user()->account_balance ?? '0.00' }} INR</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
