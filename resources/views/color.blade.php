@extends('layouts.app')

@section('title', 'Image Gallery')

@section('content')
<section class="image-gallery py-8 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-4 gap-4">
            <div class="image-item">
                <img src="https://chahongsalon.com/wp-content/uploads/2023/10/5-scaled.jpg" alt="Gallery Image" class="w-full h-auto">
            </div>
            <div class="image-item">
                <img src="https://chahongsalon.com/wp-content/uploads/2023/10/5-scaled.jpg" alt="Gallery Image" class="w-full h-auto">
            </div>
            <div class="image-item">
                <img src="https://chahongsalon.com/wp-content/uploads/2023/10/5-scaled.jpg" alt="Gallery Image" class="w-full h-auto">
            </div>
            <div class="image-item">
                <img src="https://chahongsalon.com/wp-content/uploads/2023/10/5-scaled.jpg" alt="Gallery Image" class="w-full h-auto">
            </div>
            <div class="image-item">
                <img src="https://chahongsalon.com/wp-content/uploads/2023/10/5-scaled.jpg" alt="Gallery Image" class="w-full h-auto">
            </div>
            <div class="image-item">
                <img src="https://chahongsalon.com/wp-content/uploads/2023/10/5-scaled.jpg" alt="Gallery Image" class="w-full h-auto">
            </div>
            <div class="image-item">
                <img src="https://chahongsalon.com/wp-content/uploads/2023/10/5-scaled.jpg" alt="Gallery Image" class="w-full h-auto">
            </div>
            <div class="image-item">
                <img src="https://chahongsalon.com/wp-content/uploads/2023/10/5-scaled.jpg" alt="Gallery Image" class="w-full h-auto">
            </div>
            <div class="image-item">
                <img src="https://chahongsalon.com/wp-content/uploads/2023/10/5-scaled.jpg" alt="Gallery Image" class="w-full h-auto">
            </div>
            <div class="image-item">
                <img src="https://chahongsalon.com/wp-content/uploads/2023/10/5-scaled.jpg" alt="Gallery Image" class="w-full h-auto">
            </div>
            <div class="image-item">
                <img src="https://chahongsalon.com/wp-content/uploads/2023/10/5-scaled.jpg" alt="Gallery Image" class="w-full h-auto">
            </div>
            <div class="image-item">
                <img src="https://chahongsalon.com/wp-content/uploads/2023/10/5-scaled.jpg" alt="Gallery Image" class="w-full h-auto">
            </div>
            <div class="image-item">
                <img src="https://chahongsalon.com/wp-content/uploads/2023/10/5-scaled.jpg" alt="Gallery Image" class="w-full h-auto">
            </div>
            <div class="image-item">
                <img src="https://chahongsalon.com/wp-content/uploads/2023/10/5-scaled.jpg" alt="Gallery Image" class="w-full h-auto">
            </div>
            <div class="image-item">
                <img src="https://chahongsalon.com/wp-content/uploads/2023/10/5-scaled.jpg" alt="Gallery Image" class="w-full h-auto">
            </div>
            <div class="image-item">
                <img src="https://chahongsalon.com/wp-content/uploads/2023/10/5-scaled.jpg" alt="Gallery Image" class="w-full h-auto">
            </div>
            <div class="image-item">
                <img src="https://chahongsalon.com/wp-content/uploads/2023/10/5-scaled.jpg" alt="Gallery Image" class="w-full h-auto">
            </div>
            <div class="image-item">
                <img src="https://chahongsalon.com/wp-content/uploads/2023/10/5-scaled.jpg" alt="Gallery Image" class="w-full h-auto">
            </div>
            <div class="image-item">
                <img src="https://chahongsalon.com/wp-content/uploads/2023/10/5-scaled.jpg" alt="Gallery Image" class="w-full h-auto">
            </div>
            <div class="image-item">
                <img src="https://chahongsalon.com/wp-content/uploads/2023/10/5-scaled.jpg" alt="Gallery Image" class="w-full h-auto">
            </div>
            <div class="image-item">
                <img src="https://chahongsalon.com/wp-content/uploads/2023/10/5-scaled.jpg" alt="Gallery Image" class="w-full h-auto">
            </div>
            <div class="image-item">
                <img src="https://chahongsalon.com/wp-content/uploads/2023/10/5-scaled.jpg" alt="Gallery Image" class="w-full h-auto">
            </div>
        </div>
    </div>
</section>





<style>
.image-gallery {
    padding: 20px 0;
}

.image-gallery .image-item img {
    width: 100%; /* 이미지 너비를 컨테이너에 맞춤 */
    height: auto; /* 이미지의 원래 비율을 유지 */
    border-radius: 8px; /* 이미지 모서리 둥글게 처리 */
    box-shadow: 0 2px 5px rgba(0,0,0,0.1); /* 이미지에 그림자 추가 */
}

@media (max-width: 768px) {
    .image-gallery .grid {
        grid-template-columns: repeat(2, 1fr); /* 모바일 화면에서는 2열로 표시 */
    }
}

@media (max-width: 480px) {
    .image-gallery .grid {
        grid-template-columns: 1fr; /* 가장 작은 화면에서는 1열로 표시 */
    }
}
</style>



@endsection