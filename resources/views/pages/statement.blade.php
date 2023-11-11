@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center row-cards">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">
                        <h4>{{ __('Statement of account') }}</h4>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-vcenter card-table">
                        <thead>
                            <th class="text-muted">#</th>
                            <th class="text-muted">DATETIME</th>
                            <th class="text-muted">AMOUNT</th>
                            <th class="text-muted">TYPE</th>
                            <th class="text-muted">DETAILS</th>
                            <th class="text-muted">BALANCE</th>
                        </thead>
                        <tbody>
                            @php
                                $income = 0;
                            @endphp
                           @foreach ($statements as $k=> $item)
                           @php
                                if(request()->has('page') && request()->page!=1)
                                {
                                    $income = getLastRecord($item->id);
                                }
                               
                               $income += $item->credit;
                               $income -= $item->debit;
                           @endphp
                           <tr>
                                <td>{{ $statements->firstItem() + $k }}</td>
                                <td>{{ $item->created_at->format('d-m-Y h:i A') }}</td>
                                <td>{{ ($item->credit!="0.00") ? $item->credit : $item->debit }}</td>
                                <td>{{ ($item->credit!="0.00") ? 'Credit' : 'Debit' }}</td>
                                <td>{{ $item->comment }}</td>
                                <td>{{ number_format($income,2) }}</td>
                            </tr>
        
                           @endforeach
                        </tbody>
                        
                    </table>
                    
                </div>
                {!! $statements->links() !!}
            </div>
        </div>
    </div>
@endsection
