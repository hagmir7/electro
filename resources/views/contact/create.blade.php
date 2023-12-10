@extends('layout.layout')


@section('content')
<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center d-flex justify-content-center">
            <div class="col-lg-6" data-wow-delay="0.1s">
                <h1 class="h3">تواصـــل معنــا</h1>
                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <label for="full_name">الإسم الكامل</label>
                    <input type="text" name="full_name" class="form-control mb-2 fs-4">
                    @error('full_name') <span class="text-danger">{{$message}}</span> <br>@enderror

                    <label for="email">البريد الإلكتروني</label>
                    <input type="text" name="email" class="form-control mb-2 fs-4">
                    @error('email') <span class="text-danger">{{$message}}</span> <br>@enderror

                    <label for="name">الرسالة</label>
                    <textarea name="message" id="" cols="30" rows="4" class="form-control mb-3 fs-4"></textarea>
                    @error('message') <span class="text-danger">{{ $message }}</span> <br>@enderror
                    <button class="btn btn-primary w-100">إرسال</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- About End -->
@endsection
