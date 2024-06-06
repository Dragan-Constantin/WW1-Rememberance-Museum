<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Events</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-download fa-sm text-white-50"></i> New Event
    </a>
</div>

<!-- Content Row -->
<div class="row">

    <!-- DataTales Example -->
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Events Information</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th style="min-width: 120px;">Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Trip</td>
                                <td>2024-06-01</td>
                                <td>2024-06-03</td>
                                <td>
                                    <select class="form-control">
                                        <option value="Open" selected>Open</option>
                                        <option value="Full">Full</option>
                                    </select>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="#" class="btn btn-warning btn-sm mr-2">Change Status</a>
                                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Event 1</td>
                                <td>2024-06-01</td>
                                <td>2024-06-03</td>
                                <td>
                                    <select class="form-control">
                                        <option value="Open" selected>Open</option>
                                        <option value="Full">Full</option>
                                    </select>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="#" class="btn btn-warning btn-sm mr-2">Change Status</a>
                                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            <!-- Les autres lignes du tableau vont ici -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>