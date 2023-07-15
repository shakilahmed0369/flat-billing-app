@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Flat List</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <tr>
                        <td><label>Please Select Flat</label></td>
                        <td>
                            <select name="" id="select-flat" class="form-control">
                                <option value="">---Select---</option>
                                @foreach ($flats as $flat)
                                    <option value="{{ $flat->id }}">{{ $flat->flat_name }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                </div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('admin.flat.store') }}" method="POST">
                        <div class="card card-primary">
                            <div class="card-body">
                                @csrf
                                <table>
                                    <tbody>
                                        <tr>
                                            <td><label>Flat Name</label></td>
                                            <td><input id="flat_name" type="text" class="form-control" name="flat_name"
                                                    value=""></td>
                                        </tr>
                                        <tr>
                                            <td><label>Flat Bill</label></td>
                                            <td>
                                                <input id="flat_bill" type="text" class="form-control" name="flat_bill"
                                                    value="">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>

                                                <label>Gass Bill</label>
                                            </td>
                                            <td>
                                                <input id="gass_bill" type="text" class="form-control" name="gass_bill"
                                                    value="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>

                                                <label>Garage Bill</label>
                                            </td>
                                            <td>

                                                <input id="garage_bill" type="text" class="form-control"
                                                    name="garage_bill" value="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Maid Bill</label>

                                            </td>
                                            <td>
                                                <input id="maid_bill" type="text" class="form-control" name="maid_bill"
                                                    value="">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Rubbish Bill</label>

                                            </td>
                                            <td>
                                                <input id="rubbish_bill" type="text" class="form-control"
                                                    name="rubbish_bill" value="">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <label>Previous Month Unit</label>

                                            </td>
                                            <td>
                                                <select name="" class="form-control" id="previous_month_unit">
                                                    <option value="">---Select---</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Current Month Unit</label>

                                            </td>
                                            <td>
                                                <input id="current_month_unit" name="current_month_unit" type="text"
                                                    class="form-control" value="">
                                            </td>
                                        <tr>
                                            <td>
                                                <label>Per Unit Cost</label>
                                            </td>
                                            <td>
                                                <input id="per_unit_cost" type="text" class="form-control"
                                                    name="per_unit_cost" value="">
                                            </td>
                                        </tr>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <table>
                                <form action="" id="unit_calculate_form">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <label>Flat Name</label>

                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id="cal_flat_name"
                                                    name="cal_flat_name" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Previous Unit</label>

                                            </td>
                                            <td>
                                                <input id="cal_prev_unit" name="cal_prev_unit" type="text"
                                                    class="form-control" value="">
                                            </td>
                                        <tr>
                                            <td>
                                                <label>Current Unit</label>
                                            </td>
                                            <td>
                                                <input id="cal_current_unit" type="text" class="form-control"
                                                    name="cal_current_unit" value="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Extra Days</label>
                                            </td>
                                            <td>
                                                <input id="cal_extra_day" type="text" class="form-control"
                                                    name="cal_extra_day" value="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Estimate Units</label>
                                            </td>
                                            <td>
                                                <input id="cal_estimate_unit" type="text" class="form-control"
                                                    name="cal_estimate_unit" value="">
                                            </td>
                                        </tr>
                                        <tr>

                                            <td>
                                            </td>
                                            <td>
                                                <button type="submit" class="btn btn-danger">calculate</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </form>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('#select-flat').on('change', function() {
                let id = $(this).val();
                $.ajax({
                    method: 'POST',
                    url: "{{ route('admin.get-flats') }}",
                    data: {
                        id: id
                    },
                    success: function(response) {
                        $('#flat_name').val(response.flat.flat_name);
                        $('#flat_bill').val(response.flat.flat_bill);
                        $('#per_unit_cost').val(response.flat.per_unit_cost);
                        $('#gass_bill').val(response.flat.gass_bill);
                        $('#garage_bill').val(response.flat.garage_bill);
                        $('#maid_bill').val(response.flat.maid_bill);
                        $('#rubbish_bill').val(response.flat.rubbish_bill);

                        $('#cal_flat_name').val(response.flat.flat_name);

                        response.previous_bill.forEach(unit => {
                            $('#previous_month_unit').append(
                                `<option value='${unit.current_month_unit}'>${unit.current_month_unit} -> [${unit.date}]</option>`
                            )
                        });
                    },
                    error: function(error) {
                        console.log(error)
                    }
                })
            })

            $('#unit_calculate_form').on('submit', function(e) {
                e.preventDefault();

                let form = $(this).serialize()

                $.ajax({
                    method: 'get',
                    url: "{{ route('admin.estimate-unit') }}",
                    data: form,
                    success: function(response) {

                    },
                    error: function(response) {
                        console.error(response);
                    }
                })

            })
        })
    </script>
@endpush
