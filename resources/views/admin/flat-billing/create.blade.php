@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Flat List</h1>
        </div>

        <div class="section-body">
            <form action="{{ route('admin.flat.store') }}" method="POST">
                <div class="card card-primary col-md-6">
                    <div class="card-body">
                        @csrf
                        <table>
                            <tbody>
                                <tr>
                                    <td><label>Flat Name</label></td>
                                    <td><input type="text" class="form-control" name="flat_name"
                                            value="{{ old('flat_name') }}"></td>
                                </tr>
                                <tr>
                                    <td><label>Flat Bill</label></td>
                                    <td>
                                        <input type="text" class="form-control" name="flat_bill"
                                            value="{{ old('flat_bill') }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Per Unit Cost</label>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="per_unit_cost"
                                            value="{{ old('per_unit_cost') }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>

                                        <label>Gass Bill</label>
                                    </td>
                                    <td>

                                        <input type="text" class="form-control" name="gass_bill"
                                            value="{{ old('gass_bill') }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>

                                        <label>Garage Bill</label>
                                    </td>
                                    <td>

                                        <input type="text" class="form-control" name="garage_bill"
                                            value="{{ old('garage_bill') }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Maid Bill</label>

                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="maid_bill" value="{{ old('maid_bill') }}">

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Rubbish Bill</label>

                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="rubbish_bill" value="{{ old('rubbish_bill') }}">
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
