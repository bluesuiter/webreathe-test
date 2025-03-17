@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Custom Styled Validation</h5>

        <!-- Custom Styled Validation -->
        <form class="g-3 needs-validation" method="post" action="{{ route("modules.store") }}" novalidate="">
            @csrf
            <div class="row">
                <div class="col form-group mb-2">
                    @include('elements.form-fields', ['type' => 'text', 'name' => 'name', 'label' => 'Module name', 'required' => true])
                </div>

                <div class="col form-group mb-2">
                    @include('elements.form-fields', ['type' => 'text', 'name' => 'sr_no', 'label' => 'Serial No.', 'required' => true])
                </div>

                <div class="col form-group mb-2">
                    @include('elements.form-fields', ['type' => 'number', 'name' => 'mtbf', 'label' => 'MTBF (hours)', 'attributes' => ['min=0'], 'required' => true])
                </div>
            </div>
            <div class="row">
                <div class="col form-group mb-2">
                    @include('elements.form-fields', ['type' => 'number', 'name' => 'min_operating_temp', 'label' => 'Min. operating temp. (Celsius)', 'required' => true])
                </div>

                <div class="col form-group mb-2">
                    @include('elements.form-fields', ['type' => 'number', 'name' => 'max_operating_temp', 'label' => 'Max. operating temp. (Celsius)', 'required' => true, 'attributes' => ['min=0']])
                </div>

                <div class="col form-group mb-2">
                    @include('elements.form-fields', ['type' => 'checkbox', 'name' => 'installed_fl', 'valueLabel' => 'True/False', 'label' => 'Is Installed?'])
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Add new</button>
            </div>
        </form><!-- End Custom Styled Validation -->

    </div>
</div>

@endsection