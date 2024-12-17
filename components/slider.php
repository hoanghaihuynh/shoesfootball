<?php
require_once('./config/database.php');
?>

<style>
    @media screen and (max-width: 768px) {
        .slider-container {
            margin-top: 10px;
        }
    }

    .slider-container {
        /* max-width: 1200px; */
        /* Điều chỉnh chiều rộng tối đa */
        margin: 10px auto;
        /* Căn giữa carousel */
        position: relative;
        /* Cần thiết để z-index hoạt động */
        z-index: 0;
    }

    .carousel-inner img {
        height: 500px;
        /* Chiều cao hợp lý, tùy chỉnh theo nhu cầu */
        object-fit: cover;
        /* Giữ hình ảnh phù hợp mà không bị méo */
    }

    h2 {
        margin-top: 40px;
        margin-bottom: 40px;
    }
</style>

<section>
    <div class="slider-container container">
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                    <img src="../img/slides/pexels-gonzalo-acuna-166058093-10923070.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="../img/slides/pexels-kampus-8941622.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../img/slides/pexels-rethaferguson-3621104.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <h2 class="container">Sản phẩm của chúng tôi</h2>
</section>