<!-- Created by RandulaM on 17-01-2025 -->
 
<x-app-web-layout>
    <x-slot name='title'>
        Customers
    </x-slot>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0 d-flex justify-content-between align-items-center">
                            Customers
                            <!-- Customer Add Page Redirect Button -->
                            <a href='{{ url('customers/create') }}' class='btn btn-light btn-sm text-primary'>Add Customer</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <!-- Search & Filter Form -->
                        <form action="{{ url('customers') }}" method="GET" class="mb-4">
                            <div class="row g-3">
                                <!-- Search Input -->
                                <div class="col-4">
                                    <label for="search" class="form-label">Search by Name or Mobile</label>
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        id="search"
                                        name="search" 
                                        value="{{ request('search') }}" 
                                        placeholder="Search by Name or Mobile"
                                    />
                                </div>

                                <!-- Start Date Input -->
                                <div class="col-3">
                                    <label for="dob_start" class="form-label">Start Date</label>
                                    <input 
                                        type="date" 
                                        class="form-control" 
                                        id="dob_start"
                                        name="dob_start" 
                                        value="{{ request('dob_start') }}"
                                    />
                                </div>

                                <!-- End Date Input -->
                                <div class="col-3">
                                    <label for="dob_end" class="form-label">End Date</label>
                                    <input 
                                        type="date" 
                                        class="form-control" 
                                        id="dob_end"
                                        name="dob_end" 
                                        value="{{ request('dob_end') }}"
                                    />
                                </div>

                                <!-- Search and Reset Buttons -->
                                <div class="col-2 text-end">
                                <button class="btn btn-primary mt-4" type="submit">
                                    <i class="bi bi-search fs-6"></i> Search
                                </button>
                                <a href="{{ url('customers') }}" class="btn btn-secondary mt-4">
                                    <i class="bi bi-arrow-clockwise fs-6"></i> Reset Filters
                                </a>
                                </div>
                            </div>
                        </form>

                        <!-- Toggle View All or Paginate -->
                        <form action="{{ url('customers') }}" method="GET" class="mb-4">
                            <div class="form-check">
                                <input 
                                    class="form-check-input" 
                                    type="checkbox" 
                                    name="view_all" 
                                    id="view_all" 
                                    value="1" 
                                    {{ request('view_all') ? 'checked' : '' }}
                                    onchange="this.form.submit()"
                                />
                                <label class="form-check-label" for="view_all">
                                    View All
                                </label>
                            </div>
                        </form>

                        <!-- Customers Table -->
                        <table class="table table-hover table-striped align-middle">
                            <thead class="table-primary">
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Date of Birth</th>
                                    <th>Mobile</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($customers as $customer)
                                <tr>
                                    <td class="text-center fw-bold">{{$customer->id}}</td>
                                    <td>{{$customer->p_name}}</td>
                                    <td>{{$customer->p_address}}</td>
                                    <td>{{$customer->p_dob}}</td>
                                    <td>{{$customer->p_mobile}}</td>
                                    <td class="text-center">
                                        <!-- Customer Edit Button -->
                                        <a href="{{url('customers/'.$customer->id.'/edit')}}" class="btn btn-success btn-sm mx-1">
                                            <i class="bi bi-pencil-square fs-6"></i> Edit
                                        </a>
                                        <!-- Customer Delete Button -->
                                        <a href="{{url('customers/'.$customer->id.'/delete')}}" 
                                            class="btn btn-danger btn-sm mx-1"
                                            onclick="return confirm('Are you sure you want to delete this customer?')"
                                            >
                                            <i class="bi bi-trash fs-6"></i> Delete
                                        </a>
                                        <!-- Customer View Button -->
                                        <a href="{{url('customers/'.$customer->id.'/show')}}" class="btn btn-info btn-sm mx-1">
                                            <i class="bi bi-eye fs-6"></i> View
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Pagination Links -->
                        @if(!$view_all)
                        <div class="d-flex justify-content-center mt-4">
                            {{ $customers->links() }}
                        </div>
                        @endif
                    </div>
                </div> 
            </div>
        </div>
    </div>
</x-app-web-layout>
