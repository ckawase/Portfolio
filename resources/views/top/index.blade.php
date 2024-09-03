<x-layout>
    <x-slot:title>Profile | Chihiro Kawase</x-slot>
    <x-slot:pageTitle></x-slot>

    <div class="flex flex-col lg:flex-row mx-auto container lg:order-1">
        <div class="lg:w-[40%] p-2 order-2  my-12">
            <h1 class="text-center font-semibold text-4xl">川瀬智裕</h1>
            <h2 class="text-3xl font-semibold mt-16">Skills</h2>
            <dl>
                <dt class="font-semibold text-2xl mt-4">Frontend</dt>
                <dd>
                    HTML, CSS, JavaScript, Tailwind CSS
                </dd>
                <dt class="font-semibold text-2xl mt-4">Backend</dt>
                <dd>
                    PHP, Python, MySQL, Laravel
                </dd>
                <dt class="font-semibold text-2xl mt-4">Tools</dt>
                <dd>
                    Git, Docker, AWS
                </dd>
            </dl>
        </div>
        <div id="slides" class="overflow-hidden lg:w-[60%] h-auto order-1 lg:order-2">
            <div class="flex transition-transform duration-1000 ease-in-out">
                <img src="{{asset('images/top/top1.JPG')}}" class="w-full h-auto flex-shrink-0" alt="Slide 1">
                <img src="{{asset('images/top/top2.JPG')}}" class="w-full h-auto flex-shrink-0" alt="Slide 2">
                <img src="{{asset('images/top/top3.JPG')}}" class="w-full h-auto flex-shrink-0" alt="Slide 3">
                <img src="{{asset('images/top/top4.JPG')}}" class="w-full h-auto flex-shrink-0" alt="Slide 4">
                <img src="{{asset('images/top/top5.JPG')}}" class="w-full h-auto flex-shrink-0" alt="Slide 5">
            </div>
        </div>
    </div>

    <script>
        const slides = document.querySelector('#slides .flex');
        const slideElements = slides.children;
        const totalSlides = slideElements.length;
        let currentIndex = 0;

        function showNextSlide() {
            currentIndex = (currentIndex + 1) % totalSlides;
            const offset = -100 * currentIndex;
            slides.style.transform = `translateX(${offset}%)`;
        }

        setInterval(showNextSlide, 5000);
    </script>
</x-layout>
