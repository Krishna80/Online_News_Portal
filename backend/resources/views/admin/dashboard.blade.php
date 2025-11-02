@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <h2 class="fw-bold mb-4">Welcome, {{ Auth::guard('admin')->user()->fullname }} 👋</h2>

    <div class="row g-4">
        <!-- Articles Card -->
        <div class="col-md-4">
            <div class="dashboard-card hover-card">
                <div class="icon-circle bg-primary text-white">
                    <i class="bi bi-newspaper fs-2"></i>
                </div>
                <h5 class="mt-3">Articles</h5>
                <a href="{{ route('articles.index') }}" class="btn btn-primary mt-2">Manage</a>
            </div>
        </div>

        <!-- Categories Card -->
        <div class="col-md-4">
            <div class="dashboard-card hover-card">
                <div class="icon-circle bg-success text-white">
                    <i class="bi bi-tags fs-2"></i>
                </div>
                <h5 class="mt-3">Categories</h5>
                <a href="{{ route('categories.index') }}" class="btn btn-success mt-2">Manage</a>
            </div>
        </div>

        <!-- Admin Info Card -->
        <div class="col-md-4">
            <div class="dashboard-card hover-card">
                <div class="icon-circle bg-info text-white">
                    <i class="bi bi-person fs-2"></i>
                </div>
                <h5 class="mt-3">Admin Info</h5>
                <p class="text-muted mb-0">{{ Auth::guard('admin')->user()->email }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
