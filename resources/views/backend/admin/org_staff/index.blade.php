@extends('backend.layouts.master')
@section('title', __('org_staff'))
@section('content')
    <!-- Organisation Details -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="header-top d-flex justify-content-between align-items-center">
                    <h3 class="section-title">{{ __('Organization Details') }}</h3>
                    <div class="oftions-content-right mb-12">
                        <a href="{{ route('organizations.staff.create', $organization->id) }}"
                            class="d-flex align-items-center btn sg-btn-primary gap-2">
                            <i class="las la-plus"></i>
                            <span>{{ __('add') }} {{ __('staff') }}</span>
                        </a>
                    </div>
                </div>
                <div
                    class="default-tab-list table-responsive default-tab-list-v2 activeItem-bd-md bg-white redious-border p-20 p-sm-30">

                    @include('backend.admin.organization.topber')
                    <!-- End Organisation Details Tab -->
                    <div class="default-list-table yajra-dataTable">
                        {{ $dataTable->table() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Main Content Wrapper -->
@endsection
@include('backend.common.delete-script')
@include('backend.common.change-status-script')
@push('js')
    {{ $dataTable->scripts() }}
@endpush
