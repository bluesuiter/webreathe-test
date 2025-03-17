@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Module Information</h5>

        <!-- Custom Styled Validation -->
        <table class="table table-stripped">
            <tr>
                <td class="fw-bold">Module name</td>
                <td>{{$module->name}}</td>
            </tr>
            <tr>
                <td class="fw-bold">Serial No.</td>
                <td>{{$module->sr_no}}</td>
            </tr>
            <tr>
                <td class="fw-bold">MTBF (hours)</td>
                <td>{{$module->mtbf}}</td>
            </tr>
            <tr>
                <td class="fw-bold">Min. operating temp. (Celsius)</td>
                <td>{{$module->min_operating_temp}}</td>
            </tr>
            <tr>
                <td class="fw-bold">Max. operating temp. (Celsius)</td>
                <td>{{$module->max_operating_temp}}</td>
            </tr>
            <tr>
                <td class="fw-bold">Is Installed?</td>
                <td>{{$module->installed_fl === 1 ? 'True' : 'False'}}</td>
            </tr>
        </table>
    </div>
</div>

@endsection