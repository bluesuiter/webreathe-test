<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Users</h5>
                    <!-- Table with stripped rows -->
                    <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                        <div class="datatable-top">
                            <div class="datatable-dropdown">
                                <label>
                                    <select class="datatable-selector">
                                        <option value="25" selected="">25</option>
                                        <option value="50">50</option>
                                        <option value="75">75</option>
                                        <option value="100">100</option>
                                    </select> entries per page
                                </label>
                            </div>
                            <div class="datatable-search">
                                <input class="datatable-input" placeholder="Search..." type="search" title="Search within table">
                            </div>
                        </div>
                        <div class="datatable-container">
                            <table class="table datatable datatable-table">
                                <thead>
                                    <tr>
                                        <th data-sortable="true" style="width: 7.446808510638298%;"><button class="datatable-sorter">#</button></th>
                                        <th data-sortable="true" style="width: 26.329787234042552%;"><button class="datatable-sorter">Name</button></th>
                                        <th data-sortable="true" style="width: 35.505319148936174%;"><button class="datatable-sorter">Active</button></th>
                                        <th data-sortable="true" style="width: 19.9468085106383%;"><button class="datatable-sorter">Created</button></th>
                                        <th data-sortable="true" style="width: 10.77127659574468%;"><button class="datatable-sorter">Action</button></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $key => $user)
                                    <tr data-index="{{ $key }}">
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ ($user->active_fl === 1 ? 'True' : 'False') }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="datatable-bottom">
                            <div class="datatable-info">Showing 1 to 5 of 5 entries</div>
                            <nav class="datatable-pagination">
                                <ul class="datatable-pagination-list"></ul>
                            </nav>
                        </div>
                    </div>
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
    </div>
</section>