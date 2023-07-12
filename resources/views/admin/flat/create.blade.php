@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Flat List</h1>
        </div>

        <div class="section-body">
            <div class="card card-primary">
                <div class="card-body">
                    <form action="{{ route('admin.flat.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Flat Name</label>
                            <input type="text" class="form-control" name="flat_name" value="{{ old('flat_name') }}">
                        </div>
                        <div class="form-group">
                            <label>Flat Bill</label>
                            <input type="text" class="form-control" name="flat_bill" value="{{ old('flat_bill') }}">
                        </div>
                        <div class="form-group">
                            <label>Per Unit Cost</label>
                            <input type="text" class="form-control" name="per_unit_cost" value="{{ old('per_unit_cost') }}">
                        </div>
                        <div class="form-group">
                            <label>Gass Bill</label>
                            <input type="text" class="form-control" name="gass_bill" value="{{ old('gass_bill') }}">
                        </div>
                        <div class="form-group">
                            <label>Garage Bill</label>
                            <input type="text" class="form-control" name="garage_bill" value="{{ old('garage_bill') }}">
                        </div>
                        <div class="form-group">
                            <label>Maid Bill</label>
                            <input type="text" class="form-control" name="maid_bill" value="{{ old('maid_bill') }}">
                        </div>
                        <div class="form-group">
                            <label>Rubbish Bill</label>
                            <input type="text" class="form-control" name="rubbish_bill" value="{{ old('rubbish_bill') }}">
                        </div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
