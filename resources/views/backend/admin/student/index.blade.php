@extends('backend.layouts.master')
@section('title', __('all_student'))
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="header-top d-flex justify-content-between align-items-center mb-12">
                    <h3 class="section-title">{{__('student_list') }}</h3>
                    @if(hasPermission('students.create'))
                        <div class="oftions-content-right">
                            <a href="{{ route('students.create') }}"
                               class="d-flex align-items-center btn sg-btn-primary gap-2">
                                <i class="las la-plus"></i>
                                <span>{{__('add') }} {{__('student') }}</span>
                            </a>
                        </div>
                    @endif
                </div>
                <div class="default-tab-list table-responsive default-tab-list-v2  bg-white redious-border p-20 p-sm-30">
                    <div class="default-list-table yajra-dataTable">
                        {{ $dataTable->table() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@include('backend.common.delete-script')
@include('backend.common.change-status-script')
@push('js')
    {{ $dataTable->scripts() }}
@endpush
