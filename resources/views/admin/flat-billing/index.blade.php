@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Flat Billing's</h1>
        </div>

        <div class="section-body">
            <a href="{{ route('admin.flat-billings.create') }}" class="btn btn-primary">Create</a>
            <div class="card">
                <div class="card-body">
                    {{ $dataTable->table() }}
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
