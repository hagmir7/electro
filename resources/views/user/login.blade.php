@extends('../layout/layout')


@section('content')

<div class="container py-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-5 card  py-4 px-2">
            <h1 class="h2 text-center">تسجيل الدخول</h1>
            <form action="{{ route('login.store') }}?next={{ request()->query('next') }}" method="POST" >
                @csrf
                @error('email')
                    <div class="p-1 alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="email">البريد الإلكتروني</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control fs-3 my-2" placeholder="البريد  الإلكتروني...">
                <label for="password">كلمة المرور</label>
                <input type="password" name="password" id="password" class="form-control fs-3 mt-2" placeholder="كلمة المرور...">
                <button class="btn btn-primary mt-4 fs-5 w-100">دخول</button>
                <a href="{{ route('register') }}" class="btn btn-outline-primary mt-4 fs-4 w-100">إنشاء حساب جديد</a>
            </form>
        </div>
    </div>
</div>


@endSection
