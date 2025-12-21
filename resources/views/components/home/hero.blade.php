<section class="relative overflow-hidden min-h-screen flex items-center" style="padding-top: 80px;">
    @php($heroImage = ($siteSettings->logo_path ?? null) ? $siteSettings->logo_path : asset('images/جوهرة الكويت خدمة ضيافة رجالي/جوهرة الكويت خدمة ضيافة رجالي.webp'))
    
    <!-- Background Image with Parallax Effect -->
    <div class="absolute inset-0 hero-bg">
        <img src="{{ $heroImage }}" 
             alt="جوهرة الكويت" 
             class="absolute inset-0 w-full h-full object-cover scale-110 transition-transform duration-1000">
        
        <!-- Modern Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-br from-black/70 via-black/50 to-primary/30"></div>
        
        <!-- Animated Gradient Accent -->
        <div class="absolute inset-0 bg-gradient-to-tr from-primary/20 via-transparent to-green-600/20 animate-gradient"></div>
        
        <!-- Decorative Elements -->
        <div class="absolute top-20 right-20 w-72 h-72 bg-primary/10 rounded-full blur-3xl animate-pulse-slow"></div>
        <div class="absolute bottom-20 left-20 w-96 h-96 bg-green-600/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay: 1s;"></div>
    </div>

    <!-- Content Container -->
    <div class="container mx-auto px-4 py-20 relative z-10">
        <div class="max-w-4xl mx-auto text-center">
            
            <!-- Badge -->
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-white text-sm font-medium mb-6 animate-fade-in-down">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                </span>
                أفضل خدمات الضيافة في الكويت
            </div>

            <!-- Main Heading with Gradient -->
            <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold tracking-tight mb-6 animate-fade-in-up">
                <span class="inline-block bg-gradient-to-r from-white via-green-50 to-green-100 bg-clip-text text-transparent drop-shadow-lg">
                    جوهرة الكويت
                </span>
                <br>
                <span class="inline-block bg-gradient-to-r from-primary via-green-400 to-green-500 bg-clip-text text-transparent">
                    للمناسبات والضيافة
                </span>
            </h1>

            <!-- Subtitle with Glass Effect -->
            <p class="text-lg md:text-xl text-white/90 mb-10 max-w-2xl mx-auto leading-relaxed animate-fade-in" style="animation-delay: 0.2s;">
                <span class="inline-block px-6 py-3 rounded-2xl bg-white/10 backdrop-blur-md border border-white/20 shadow-xl">
                    تنظيم كامل للمناسبات الخاصة والعامة مع فريق محترف وتجهيزات فاخرة
                </span>
            </p>

            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 animate-fade-in" style="animation-delay: 0.4s;">
                @php($whatsapp = $siteSettings->whatsapp_number ?? '96550850173')
                
                <!-- Primary CTA -->
                <a href="https://wa.me/{{ $whatsapp }}" 
                   target="_blank"
                   class="group relative inline-flex items-center gap-3 px-8 py-4 rounded-2xl font-bold text-lg overflow-hidden transition-all duration-300 hover:scale-105 hover:shadow-2xl">
                    <!-- Animated Background -->
                    <span class="absolute inset-0 bg-gradient-to-r from-primary via-green-500 to-green-600"></span>
                    <span class="absolute inset-0 bg-gradient-to-r from-green-600 via-primary to-green-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                    
                    <!-- Icon -->
                    <svg class="relative z-10 w-6 h-6 text-white transition-transform duration-300 group-hover:rotate-12" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                    </svg>
                    
                    <!-- Text -->
                    <span class="relative z-10 text-white">احجز الآن</span>
                    
                    <!-- Arrow -->
                    <svg class="relative z-10 w-5 h-5 text-white transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </a>

                <!-- Secondary CTA -->
                <a href="{{ route('services.index') }}" 
                   class="group relative inline-flex items-center gap-3 px-8 py-4 rounded-2xl font-bold text-lg overflow-hidden transition-all duration-300 hover:scale-105">
                    <!-- Glass Background -->
                    <span class="absolute inset-0 bg-white/10 backdrop-blur-md border-2 border-white/30"></span>
                    <span class="absolute inset-0 bg-white/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                    
                    <!-- Text -->
                    <span class="relative z-10 text-white">استكشف الخدمات</span>
                    
                    <!-- Icon -->
                    <svg class="relative z-10 w-5 h-5 text-white transition-transform duration-300 group-hover:translate-y-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </a>
            </div>

            <!-- Trust Indicators -->
            <div class="mt-16 flex flex-wrap items-center justify-center gap-8 text-white/80 text-sm animate-fade-in" style="animation-delay: 0.6s;">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span>فريق محترف</span>
                </div>
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span>خدمة 24/7</span>
                </div>
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span>أسعار تنافسية</span>
                </div>
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span>جودة مضمونة</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
        <svg class="w-6 h-6 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
        </svg>
    </div>
</section>

<style>
/* Custom Animations */
@keyframes fade-in-down {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fade-in-up {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fade-in {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

@keyframes gradient {
    0%, 100% {
        opacity: 0.3;
    }
    50% {
        opacity: 0.6;
    }
}

@keyframes pulse-slow {
    0%, 100% {
        opacity: 0.3;
        transform: scale(1);
    }
    50% {
        opacity: 0.5;
        transform: scale(1.1);
    }
}

.animate-fade-in-down {
    animation: fade-in-down 0.8s ease-out forwards;
}

.animate-fade-in-up {
    animation: fade-in-up 0.8s ease-out forwards;
}

.animate-fade-in {
    animation: fade-in 0.8s ease-out forwards;
}

.animate-gradient {
    animation: gradient 4s ease-in-out infinite;
}

.animate-pulse-slow {
    animation: pulse-slow 6s ease-in-out infinite;
}

/* Parallax Effect */
.hero-bg img {
    transition: transform 0.1s ease-out;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    // Parallax effect for hero background
    const heroSection = document.querySelector('.hero-bg img');
    
    if (heroSection) {
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const rate = scrolled * 0.5;
            heroSection.style.transform = `translateY(${rate}px) scale(1.1)`;
        });
    }
});
</script>
