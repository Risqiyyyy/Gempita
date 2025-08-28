@extends('backend.master.app')
@section('content')
<style>
    .select-search-full {
    height: auto;
    max-height: 150px;
    overflow-y: auto;
}
</style>
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <div class="page-pretitle">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                               <h1 class="mb-0 d-inline-block fs-6 lh-1">Report</h1>
                           </li>
                        </ol>
                    </nav>
 
                </div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                </div>
            </div>
        </div>
    </div>
 </div>
    <div class="page-body page-content">
        <div class="container-xl">
            <form method="GET" action="{{ route('dashboard.exportReport') }}">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            Export Reports
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-5">
                            <div class="row g-3">
                                <div class="col">
                                    <label for="startDate" class="form-label">Start Date</label>
                                    <input type="date" id="startDate" name="start_date" class="form-control"
                                        placeholder="Pilih Tanggal Awal" required>
                                </div>
                                <div class="col">
                                    <label for="endDate" class="form-label">End Date</label>
                                    <input type="date" id="endDate" name="end_date" class="form-control"
                                        placeholder="Pilih Tanggal Akhir" required>
                                </div>
                            </div>
                            <div class="row g-3 mt-3">
                                <div class="col">
                                    <label for="userList" class="form-label">Select User</label>
                                    <select class="select-search-full form-select" data-placeholder="Select author"
                                            data-allow-clear="true" id="author_id" name="author_id[]" multiple>
                                        <option value="" disabled>Select author</option>
                                        <option value="all">All</option>
                                        @foreach ($user as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary btn-sm">Filter</button>
                            </div>
                        </div>
                    </form>
                        <div class="container mt-5">
                            <div class="d-flex justify-content-between">
                                <h2>Generated Report</h2>
                                <p><em>From: <strong>{{ $start_date }}</strong> To: <strong>{{ $end_date }}</strong></em></p>
                            </div>
                            {{-- <label class="form-label">Report User (NamaUser)</label> --}}
                            <table class="table table-bordered mt-3">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Total Positgan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td>{{ $user->posts_count }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <form method="POST" action="{{ route('dashboard.exportPdf') }}">
                            @csrf
                            <input type="hidden" name="user" value="{{ $user_json }}">
                            <input type="hidden" name="start_date" value="{{ $start_date }}">
                            <input type="hidden" name="end_date" value="{{ $end_date }}">
                            <button type="submit" class="btn btn-primary mt-3">Export to PDF</button>
                        </form>                    
                    </div>
                </div>
        </div>
    </div>
@endsection
