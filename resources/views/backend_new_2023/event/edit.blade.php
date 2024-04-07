@extends('layouts.backend_new_2023.master')
@section('title')
    Edit Event {{ $event->title }}
@endsection
@section('css')
    <link href="{{ URL::asset('backend_new/libs/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form id="upload-form" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <h4 class="card-title">@yield('title')</h4>
                        <hr>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="title" value="{{ $event->title }}"
                                    placeholder="Title">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <textarea name="description" class="form-control editor" cols="30" rows="5">{{ $event->description }}</textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">Schedule Event</label>
                            <div class="col-md-9">
                                <div class="repeater">
                                    <div data-repeater-list="group_schedule">
                                        @foreach (json_decode($event->schedules) as $schedules)
                                        <div data-repeater-item class="row mb-3">
                                            <div class="col-4">
                                                <input type="text" name="day" value="{{ $schedules->day }}" class="form-control" placeholder="Day"
                                                    id="">
                                            </div>
                                            <div class="col-4">
                                                <input type="datetime-local" name="time" value="{{ $schedules->time }}" class="form-control"
                                                    placeholder="Time" id="">
                                            </div>
                                            <div class="col-1">
                                                <button data-repeater-delete type="button" class="btn btn-danger"><i
                                                        class="fa fa-times"></i></button>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <button data-repeater-create type="button" class="btn btn-success mt-3 mt-lg-0"><i
                                            class="fa fa-plus"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Cover Image</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="cover_image">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">Images</label>
                            <div class="col-md-9">
                                <div class="repeater">
                                    <div data-repeater-list="group_images">
                                        <div data-repeater-item class="row mb-3">
                                            <div class="col-11">
                                                <input type="file" name="image" class="form-control" id="">
                                            </div>
                                            <div class="col-1">
                                                <button data-repeater-delete type="button" class="btn btn-danger"><i
                                                        class="fa fa-times"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <button data-repeater-create type="button" class="btn btn-success mt-3 mt-lg-0"><i
                                            class="fa fa-plus"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Location Event</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="location" placeholder="Location" value="{{ $event->location }}">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('backend_new/libs/jquery-repeater/jquery-repeater.min.js') }}"></script>
    <script src="{{ URL::asset('backend_new/libs/ckeditor/ckeditor.min.js') }}"></script>
    <script src="{{ URL::asset('backend_new/libs/toastr/toastr.min.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        ClassicEditor
            .create(document.querySelector('.editor'))
            .catch(error => {
                console.error(error);
            });
        $('.repeater').repeater({
            show: function show() {
                $(this).slideDown();
            },
            hide: function hide(deleteElement) {
                if (confirm('Are you sure you want to delete this element?')) {
                    $(this).slideUp(deleteElement);
                }
            },
            ready: function ready(setIndexes) {}
        });
        $('#upload-form').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $.ajax({
                type:'POST',
                url: "{{ route('b.events.update',['id' => $event->id]) }}",
                data: formData,
                contentType: false,
                processData: false,
                success: (result) => {
                    if(result.success != false){
                        toastr["success"](result.message_content);
                        toastr.options = {
                            "closeButton": false,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": 300,
                            "hideDuration": 1000,
                            "timeOut": 5000,
                            "extendedTimeOut": 1000,
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                        $('.modalloading').modal('show');
                        setInterval(() => {
                            window.location="{{ route('b.events.detail',['id' => $event->id]) }}";
                        }, 3000);
                    }else{
                        toastr["error"](result.error);
                        toastr.options = {
                            "closeButton": false,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": 300,
                            "hideDuration": 1000,
                            "timeOut": 5000,
                            "extendedTimeOut": 1000,
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                    }
                },
                error: function (request, status, error) {
                    toastr["error"](error);
                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": 300,
                        "hideDuration": 1000,
                        "timeOut": 5000,
                        "extendedTimeOut": 1000,
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                }
            });
        });
    </script>
@endsection
