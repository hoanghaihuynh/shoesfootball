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
                    <img src="https://img.freepik.com/free-photo/football-background-grass-with-shoes_23-2147832118.jpg?t=st=1734691787~exp=1734695387~hmac=2c5a1d355cb3de732ef3f0a899882af2543ce7730261d3f1a3f99d97422760f6&w=996" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="https://img.freepik.com/free-photo/view-football-shoes_23-2150885778.jpg?t=st=1734691867~exp=1734695467~hmac=a6665e46ba08536b71e0a26a8b086dfcbe7059158c89246544f205aa3261489c&w=996" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://img.freepik.com/free-photo/soccer-shoes-field_23-2150888267.jpg?t=st=1734691922~exp=1734695522~hmac=c571e76271a4781563a22b6032621b0341200d63f1935bf2bc8d5fb01ce0ac24&w=996" class="d-block w-100" alt="...">
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