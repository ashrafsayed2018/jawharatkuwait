@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-b from-gray-50 to-white">
    <!-- Hero Section -->
    <div class="container mx-auto px-4 py-16 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">من نحن</h1>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
            جوهرة الكويت للضيافة والمناسبات هي وجهتكم الأولى لتنظيم وتجهيز كافة أنواع المناسبات في الكويت. 
            نحن نفخر بتقديم خدمات متكاملة تجمع بين الأصالة والعصرية، مع الالتزام بأعلى معايير الجودة والاحترافية 
            لضمان نجاح مناسباتكم وراحة ضيوفكم.
        </p>
    </div>

    <!-- Vision & Mission -->
    <div class="container mx-auto px-4 pb-16">
        <div class="grid md:grid-cols-2 gap-8 mb-16">
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center mb-6 text-primary">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">رؤيتنا</h3>
                <p class="text-gray-600 leading-relaxed">
                    أن نكون الخيار الأول والمرجع الأساسي في مجال خدمات الضيافة وتجهيز المناسبات في الكويت، 
                    من خلال تقديم حلول مبتكرة وخدمات استثنائية تفوق توقعات عملائنا.
                </p>
            </div>
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center mb-6 text-primary">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">رسالتنا</h3>
                <p class="text-gray-600 leading-relaxed">
                    تقديم خدمات ضيافة راقية وشاملة تلبي كافة الأذواق والميزانيات، مع التركيز على الدقة في المواعيد، 
                    والجودة في التنفيذ، والاحترافية في التعامل لإسعاد عملائنا وضيوفهم.
                </p>
            </div>
        </div>
    </div>

    <!-- Detailed Services Section -->
    <div class="container mx-auto px-4 pb-24">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">خدماتنا بالتفصيل</h2>
            <div class="w-24 h-1 bg-primary mx-auto rounded-full"></div>
        </div>

        @php($services = \App\Helpers\ServiceHelper::getFallbackServices())
        
        <div class="space-y-12">
            @foreach($services as $index => $service)
                <div class="flex flex-col {{ $index % 2 == 0 ? 'md:flex-row' : 'md:flex-row-reverse' }} gap-8 items-center bg-white rounded-3xl overflow-hidden shadow-sm border border-gray-100 p-6 md:p-8 hover:shadow-md transition-shadow duration-300">
                    <!-- Image -->
                    <div class="w-full md:w-1/2">
                        <div class="aspect-video rounded-2xl overflow-hidden relative group">
                            <img src="{{ asset($service['image']) }}" 
                                 alt="{{ $service['title'] }}" 
                                 class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                        </div>
                    </div>
                    
                    <!-- Content -->
                    <div class="w-full md:w-1/2 text-right">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">{{ $service['title'] }}</h3>
                        <p class="text-lg text-gray-600 leading-relaxed mb-6">
                            {{ $service['long_description'] }}
                        </p>
                        
                        @php($slug = \Illuminate\Support\Str::arabicSlug($service['title']))
                        <a href="{{ route('services.show', $slug) }}" 
                           class="inline-flex items-center gap-2 text-primary font-bold hover:gap-3 transition-all duration-300">
                            <span>للمزيد من التفاصيل</span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
