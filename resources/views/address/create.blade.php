@extends('layouts.app') {{-- استبدله بـ 'home' إذا كان هذا هو القالب المستخدم --}}

@section('content')
<div class="container">
    <h2>إضافة عنوان جديد</h2>

    <form action="{{ route('address.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="country_id">الدولة</label>
            <select name="country_id" id="country_id" class="form-control" required>
                <option value="">اختر الدولة</option>
                <option value="5">مصر</option>
                <option value="1">السعودية</option>
            </select>
        </div>

        <div class="form-group mt-3">
            <label for="state_id">المحافظة</label>
            <select name="state_id" id="state_id" class="form-control" required>
                <option value="">اختر المحافظة</option>
            </select>
        </div>

        <div class="form-group mt-3">
            <label for="address">العنوان التفصيلي</label>
            <input type="text" name="address" class="form-control" placeholder="اكتب عنوانك بالتفصيل" required>
        </div>

        <button type="submit" class="btn btn-success mt-4">حفظ</button>
    </form>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('#country_id').on('change', function () {
        var countryID = $(this).val();
        if (countryID) {
            $.get("/get-states/" + countryID, function (data) {
                $('#state_id').empty().append('<option value="">اختر المحافظة</option>');
                $.each(data, function (key, state) {
                    $('#state_id').append('<option value="' + state.id + '">' + state.name_ar + '</option>');
                });
            });
        } else {
            $('#state_id').html('<option value="">اختر الدولة أولاً</option>');
        }
    });
</script>
@endsection
