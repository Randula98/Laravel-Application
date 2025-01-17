<!-- Created by RandulaM on 17-01-2025 -->

<x-app-web-layout>
    <x-slot name='title'>
        Add Customer
    </x-slot>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                @if(session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0 d-flex justify-content-between align-items-center">
                            Add Customer
                            <a href='{{ url('customers') }}' class='btn btn-light btn-sm text-primary'>Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <!-- Customer Add Form -->
                        <form action="{{ url('customers/create') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="p_name" class="form-label fw-bold">Name</label>
                                <input 
                                    type="text" 
                                    name="p_name" 
                                    id="p_name" 
                                    class="form-control border-primary" 
                                    value="{{ old('p_name') }}" 
                                    placeholder="Enter full name"
                                    required
                                />
                                @error('p_name')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="p_address" class="form-label fw-bold">Address</label>
                                <textarea 
                                    name="p_address" 
                                    id="p_address" 
                                    class="form-control border-primary" 
                                    rows="3" 
                                    placeholder="Enter address"
                                    required>{{ old('p_address') }}</textarea>
                                @error('p_address')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="p_dob" class="form-label fw-bold">Date of Birth</label>
                                <input 
                                    type="date" 
                                    name="p_dob" 
                                    id="p_dob" 
                                    class="form-control border-primary" 
                                    value="{{ old('p_dob') }}" 
                                    required
                                />
                                @error('p_dob')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="p_mobile" class="form-label fw-bold">Mobile</label>
                                <input 
                                    type="text" 
                                    name="p_mobile" 
                                    id="p_mobile" 
                                    class="form-control border-primary" 
                                    value="{{ old('p_mobile') }}" 
                                    placeholder="Enter mobile number"
                                    required
                                />
                                @error('p_mobile')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="d-grid">
                                <button type='submit' class='btn btn-primary btn-lg'>Save</button>
                            </div>
                        </form>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</x-app-web-layout>
