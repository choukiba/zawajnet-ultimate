@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-10 bg-white p-6 rounded-lg shadow" dir="rtl">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">الملف الشخصي للعضو</h2>

    <div class="space-y-4 text-gray-700 text-base">
        <p><strong>الاسم:</strong> {{ $member->name }}</p>
        <p><strong>الجنس:</strong> {{ $member->gender }}</p>
        <p><strong>الدولة:</strong> {{ $member->country }}</p>
        <p><strong>العمر:</strong> {{ $member->age }}</p>

        @if ($member->marital_status)
            <p><strong>الحالة الاجتماعية:</strong> {{ $member->marital_status }}</p>
        @endif

        @if ($member->marriage_type)
            <p><strong>نوع الزواج المطلوب:</strong> {{ $member->marriage_type }}</p>
        @endif

        @if ($member->city)
            <p><strong>المدينة:</strong> {{ $member->city }}</p>
        @endif

        @if ($member->has_children)
            <p><strong>هل لديه أطفال؟</strong> نعم (عدد الأطفال: {{ $member->children_count }})</p>
        @endif

        @if ($member->height)
            <p><strong>الطول:</strong> {{ $member->height }}</p>
        @endif

        @if ($member->weight)
            <p><strong>الوزن:</strong> {{ $member->weight }}</p>
        @endif

        @if ($member->skin_color)
            <p><strong>لون البشرة:</strong> {{ $member->skin_color }}</p>
        @endif

        @if ($member->hair_color)
            <p><strong>لون الشعر:</strong> {{ $member->hair_color }}</p>
        @endif

        @if ($member->education_level)
            <p><strong>المستوى الدراسي:</strong> {{ $member->education_level }}</p>
        @endif

        @if ($member->job_status)
            <p><strong>الحالة المهنية:</strong> {{ $member->job_status }}</p>
        @endif

        @if ($member->monthly_income)
            <p><strong>الدخل الشهري:</strong> {{ $member->monthly_income }} دج</p>
        @endif

        @if ($member->native_language)
            <p><strong>اللغة الأم:</strong> {{ $member->native_language }}</p>
        @endif

        @if ($member->other_languages)
            <p><strong>لغات أخرى:</strong> {{ implode(', ', json_decode($member->other_languages, true) ?? []) }}</p>
        @endif

        @if ($member->about_yourself)
            <p><strong>عرف بنفسك:</strong> {{ $member->about_yourself }}</p>
        @endif

        @if ($member->about_partner)
            <p><strong>تكلم حول شريكك:</strong> {{ $member->about_partner }}</p>
        @endif
    </div>

    @if (Auth::check() && Auth::id() === $member->id)
        <div class="mt-6 text-sm text-gray-500">
            <strong>نسبة اكتمال الملف:</strong> {{ $completion ?? '0' }}%
            @if($completion < 50)
                <div class="text-red-600 mt-1">⚠️ يجب إكمال الملف بنسبة 50٪ لاستخدام البحث المتقدم</div>
            @endif
        </div>
    @endif
</div>
@endsection
