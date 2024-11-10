@extends('layouts.app')

@section('title', 'Home')

@section('content')

<!-- Services Section (Swiper 버전) -->
<section id="services" class="py-20 bg-white">
    <div class="container mx-auto text-center">
        <h2 class="text-3xl font-bold mb-8">We Offer Best Services</h2>
        <div class="swiper-container mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide bg-white shadow-md rounded-lg p-6">
                    <img src="https://images.pexels.com/photos/157920/woman-face-curly-hair-157920.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Service 1" class="mx-auto" style="max-width: 100%; height: auto;">
                    <h3 class="text-xl font-bold mt-4">Guided Tours</h3>
                    <p class="mt-2 text-gray-600">Short description of the service goes here.</p>
                </div>
                <div class="swiper-slide bg-white shadow-md rounded-lg p-6">
                    <img src="https://images.pexels.com/photos/415829/pexels-photo-415829.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Service 2" class="mx-auto" style="max-width: 100%; height: auto;">
                    <h3 class="text-xl font-bold mt-4">Best Flight Options</h3>
                    <p class="mt-2 text-gray-600">Short description of the service goes here.</p>
                </div>
                <div class="swiper-slide bg-white shadow-md rounded-lg p-6">
                    <img src="https://images.pexels.com/photos/458718/pexels-photo-458718.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Service 3" class="mx-auto" style="max-width: 100%; height: auto;">
                    <h3 class="text-xl font-bold mt-4">Religious Tours</h3>
                    <p class="mt-2 text-gray-600">Short description of the service goes here.</p>
                </div>
                <div class="swiper-slide bg-white shadow-md rounded-lg p-6">
                    <img src="https://images.pexels.com/photos/3808998/pexels-photo-3808998.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Service 4" class="mx-auto" style="max-width: 100%; height: auto;">
                    <h3 class="text-xl font-bold mt-4">Medical Insurance</h3>
                    <p class="mt-2 text-gray-600">Short description of the service goes here.</p>
                </div>
            </div>
            <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</section>



<!-- 인스타 -->
<section class="bg-white py-6">
    <div id="instagram-profile"></div>
    <div class="container mx-auto text-center">
        <div id="instafeed" class="grid grid-cols-3 gap-4"></div>
    </div>
</section>


<section class="faq-section py-6">
    <h2 class="faq-title">Frequently Asked Questions</h2>
    <ul class="faq-list">
        <li class="faq-item">
            <button class="faq-toggle" aria-expanded="false">Can I use more than one syrup at a time to target different issues? <span class="toggle-icon">+</span></button>
            <div class="faq-answer">
                <p>The best way to use these syrups to combat different problems is to apply one on your scalp that best suits its needs & then another on your lengths. If your scalp/hair has multiple issues, we recommend alternating the syrups, not mixing.</p>
            </div>
        </li>
        <!-- 다른 FAQ 항목 추가 -->
        <li class="faq-item">
            <button class="faq-toggle" aria-expanded="false">Can I use more than one syrup at a time to target different issues? <span class="toggle-icon">+</span></button>
            <div class="faq-answer">
                <p>The best way to use these syrups to combat different problems is to apply one on your scalp that best suits its needs & then another on your lengths. If your scalp/hair has multiple issues, we recommend alternating the syrups, not mixing.</p>
            </div>
        </li>
    </ul>
</section>


<!-- Hero Section -->
<section id="home" class="relative h-screen">
    <div class="absolute inset-0 bg-gradient-to-r from-yellow-300 via-yellow-200 to-yellow-100 opacity-100"></div>

    <div class="container mx-auto text-center relative z-10 flex flex-col justify-center h-full">
        <p class="text-xs md:text-sm lg:text-lg uppercase tracking-wider mb-6"> K-style, a global sensation.</p>
        <h1 class="text-3xl md:text-5xl lg:text-6xl font-bold mb-6">We invite you to experience Korean style.</h1>
        
        <!-- Reservation Link -->
        <a href="/reservation" class="bg-yellow-400 text-white text-lg px-4 py-3 rounded-lg hover:bg-yellow-200 inline-block">Reservation</a>
    </div>
</section>

<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<script src="https://cdn.jsdelivr.net/npm/instafeed.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script type="text/javascript">
    //Swiper JS 초기화
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 4, // 슬라이드를 4개로 설정
        loop: true, // 무한 루프
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        breakpoints: {
            320: {
                slidesPerView: 1, // 모바일에서는 1개의 슬라이드
                spaceBetween: 10
            },
            768: {
                slidesPerView: 2, // 태블릿에서는 2개의 슬라이드
                spaceBetween: 20
            },
            1024: {
                slidesPerView: 4, // 1024px 이상에서는 4개의 슬라이드
                spaceBetween: 30
            }
        }
    });


    document.querySelectorAll('.faq-toggle').forEach(button => {
        button.addEventListener('click', () => {
            const expanded = button.getAttribute('aria-expanded') === 'true';
            button.setAttribute('aria-expanded', !expanded);
            const answer = button.nextElementSibling;

            if (!expanded) {
                answer.style.maxHeight = answer.scrollHeight + "px";
                button.querySelector('.toggle-icon').textContent = '-';
            } else {
                answer.style.maxHeight = null;
                button.querySelector('.toggle-icon').textContent = '+';
            }
        });
    });

const feed = new Instafeed({
    accessToken: 'IGQWRPXzBXNVplR2pEcnQzTnhfNW8tWmlnMDVPVmR1ZAnZAHMzdBU012TmtmcjhlTEtlUU5oZAkttTzAyZAVhQYWNHSzdvVy12NFFVX2VBaVo0SmZAiQ3JwTThpNlJ5dlpqZAWNMWkYyMHV0Q3Q3Q01nakR3MWFGVEVpQVUZD',
    limit: 15,  // 가져올 사진의 수
    target: 'instafeed',
    template: '<a href="@{{link}}" target="_blank"><img src="@{{image}}" alt="@{{caption}}" title="@{{caption}}" /></a>'
});
feed.run();
fetch('https://graph.instagram.com/me?fields=id,username,account_type,media_count,followers_count,follows_count,profile_picture_url&access_token=IGQWRPXzBXNVplR2pEcnQzTnhfNW8tWmlnMDVPVmR1ZAnZAHMzdBU012TmtmcjhlTEtlUU5oZAkttTzAyZAVhQYWNHSzdvVy12NFFVX2VBaVo0SmZAiQ3JwTThpNlJ5dlpqZAWNMWkYyMHV0Q3Q3Q01nakR3MWFGVEVpQVUZD')
.then(response => response.json())
.then(data => {
    console.log(data);
    // 데이터 처리 및 페이지에 표시
    const profileHtml = `
        <div class="instagram-profile">
            <img src="${data.profile_picture_url}" class="profile-pic">
            <div class="profile-info">
                <p class="username">@${data.username}</p>
                <div class="stats mr-2">
                    <span class="posts">${data.media_count} posts</span>
                    <span class="followers">${data.followers_count} followers</span>
                    <span class="following">${data.follows_count} following</span>
                </div>
            </div>
            <button class="follow-btn">Follow</button>
        </div>
    `;


    // 대상 요소에 HTML 삽입
    document.getElementById('instagram-profile').innerHTML = profileHtml;
})
.catch(error => console.error('Error fetching data:', error));


document.querySelectorAll('.faq-toggle').forEach(button => {
    button.addEventListener('click', () => {
        const expanded = button.getAttribute('aria-expanded') === 'true' || false;
        button.setAttribute('aria-expanded', !expanded);
        const answer = button.nextElementSibling;
        const icon = button.querySelector('.toggle-icon');
        
        if (expanded) {
            answer.style.maxHeight = 0;
            icon.textContent = '+';
        } else {
            answer.style.maxHeight = answer.scrollHeight + 'px';
            icon.textContent = '-';
        }
    });
});

</script>

<style>
section {
    border-bottom: 1px solid #eee;
    min-height: 500px; /* Adjust the height as needed */
}

#instafeed, #instafeed a, #instafeed img {
    margin: 0;
    padding: 0;
    border: none;
}

#instafeed {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    grid-gap: 0;
}

#instafeed a {
    display: block;
    overflow: hidden;
    position: relative;
}

#instafeed img {
    width: 310px;
    height: 310px;
    object-fit: cover;
}

#instafeed a:hover img {
    transform: scale(1.05);
}

@media (max-width: 768px) {
    #instafeed {
        grid-template-columns: repeat(2, 1fr); /* 중간 크기 화면에서는 2열 */
    }
}

@media (max-width: 480px) {
    #instafeed {
        grid-template-columns: 1fr; /* 작은 화면에서는 1열 */
    }
}
.instagram-profile {
    display: flex;
    justify-content: center; /* 가운데 정렬 */
    align-items: center;
    padding: 20px;
    background-color: #fff; /* 배경색 */
    border-radius: 8px; /* 모서리 둥글게 */
    box-shadow: 0 4px 8px rgba(0,0,0,0.1); /* 그림자 효과 */
    max-width: 600px; /* 최대 너비 설정 */
    margin: 20px auto; /* 자동 마진으로 중앙 배치 */
}

.profile-pic {
    width: 80px; /* 프로필 이미지 크기 */
    height: 80px;
    border-radius: 50%; /* 원형 이미지 */
    margin-right: 20px; /* 이미지와 정보 사이 마진 */
}

.profile-info {
    text-align: left; /* 텍스트 왼쪽 정렬 */
}

.username {
    font-size: 20px; /* 사용자 이름 폰트 크기 */
    font-weight: bold;
    margin-bottom: 10px; /* 사용자 이름과 통계 사이의 여백 */
}

.stats {
    font-size: 16px; /* 통계 폰트 크기 */
    color: #666; /* 텍스트 색상 */
}

.follow-btn {
    padding: 10px 20px;
    background-color: #0095f6; /* Instagram 파란색 */
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer; /* 버튼 위에 마우스 오버시 포인터 모양 */
    margin-top: 10px; /* 버튼과 통계 사이 여백 */
}

/* FAQ Section Styling */
.faq-section {
    max-width: 1000px;
    margin: 0 auto;
    padding: 20px;
}

.faq-title {
    font-size: 24px;
    text-align: center;
    margin-bottom: 20px;
}

.faq-list {
    list-style: none;
    padding: 0;
}

.faq-item {
    border-top: 1px solid #ccc;
    padding: 10px 0;
}

.faq-toggle {
    background: none;
    border: none;
    width: 100%;
    text-align: left;
    padding: 10px;
    font-size: 18px;
    cursor: pointer;
}

.toggle-icon {
    float: right;
}

.faq-answer {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease-out;
    padding: 0 10px;
}

.faq-answer p {
    margin-top: 10px;
}

</style>
@endsection