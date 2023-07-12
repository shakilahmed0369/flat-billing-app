@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Flat List</h1>
        </div>

        <div class="section-body">
            <div class="card card-primary">
                <div class="card-body">
                    <form action="{{ route('admin.flat.update', $flat->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Flat Name</label>
                            <input type="text" class="form-control" name="flat_name" value="{{ $flat->flat_name }}">
                        </div>
                        <div class="form-group">
                            <label>Flat Bill</label>
                            <input type="text" class="form-control" name="flat_bill" value="{{ $flat->flat_bill }}">
                        </div>
                        <div class="form-group">
                            <label>Per Unit Cost</label>
                            <input type="text" class="form-control" name="per_unit_cost" value="{{ $flat->per_unit_cost }}">
                        </div>
                        <div class="form-group">
                            <label>Gass Bill</label>
                            <input type="text" class="form-control" name="gass_bill" value="{{ $flat->gass_bill }}">
                        </div>
                        <div class="form-group">
                            <label>Garage Bill</label>
                            <input type="text" class="form-control" name="garage_bill" value="{{ $flat->garage_bill }}">
                        </div>
                        <div class="form-group">
                            <label>Maid Bill</label>
                            <input type="text" class="form-control" name="maid_bill" value="{{ $flat->maid_bill }}">
                        </div>
                        <div class="form-group">
                            <label>Rubbish Bill</label>
                            <input type="text" class="form-control" name="rubbish_bill" value="{{ $flat->rubbish_bill }}">
                        </div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
