@extends('layouts.app')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Modules</h5>
                    <!-- Table with stripped rows -->
                    <table class="table dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>MTBF</th>
                                <th>Installed</th>
                                <th>Created On</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($modules as $key => $module)
                            <tr data-index="{{ $key }}">
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $module->name }}</td>
                                <td>{{ $module->mtbf }}</td>
                                <td><span class="lh-1 fs-4 text-{{ $module->installed_fl === 1 ? 'success' : 'danger' }}">&#9679;</span></td>
                                <td>2016-05-25</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- End Table with stripped rows -->
            </div>
        </div>
    </div>
</section>
@endsection