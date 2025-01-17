<!-- Created by RandulaM on 17-01-2025 -->
 
<x-app-web-layout>
    <x-slot name="title">
        Customer Details
    </x-slot>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0 d-flex justify-content-between align-items-center">
                            Customer Details
                            <a href="{{ url('customers') }}" class="btn btn-light btn-sm text-primary">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <!-- Table to Populate Single Customer Object -->
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $customer->id }}</td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $customer->p_name }}</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>{{ $customer->p_address }}</td>
                                </tr>
                                <tr>
                                    <th>Date of Birth</th>
                                    <td>{{ $customer->p_dob }}</td>
                                </tr>
                                <tr>
                                    <th>Mobile</th>
                                    <td>{{ $customer->p_mobile }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-web-layout>
