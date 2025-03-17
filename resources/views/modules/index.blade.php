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
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($modules as $key => $module)
                            <tr data-index="{{ $key }}">
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $module->name }}</td>
                                <td>{{ $module->mtbf }}</td>
                                <td><span class="lh-1 fs-4 text-{{ $module->installed_fl === 1 ? 'success' : 'danger' }}">&#9679;</span></td>
                                <td>{{ $module->created_at->format('Y-m-d') }}</td>
                                <td>
                                    <a href="{{ route('modules.edit', $module->id) }}"><i class='bx bxs-pencil'></i></a>
                                    <!-- <a href="{{ route('modules.destroy', $module->id) }}" onclick="return confirm('Are you sure you want to delete this module?')"><i class='bx bxs-trash'></i></a> -->
                                    <a href="{{ route('modules.show', $module->id) }}"><i class='bx bxs-book-open'></i></a>
                                    <!-- More actions here -->
                                </td>
                                </td>
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



<script>
    jQuery(document).ready(function($) {
        $.ajax({
            url: "http://127.0.0.1:8000/api/module-activity/store",
            dataType: "json",
            method: "post",
            data: {
                sr_no: "POU7898657RHS",
                temprature: 25,
                activity_id: 1,
                status: "completed",
                timestamp: "2023-01-01 12:00:00",
            },

            success: function(data) {
                $("p").text(data.name);
            },
        });
    });
</script>
@endsection