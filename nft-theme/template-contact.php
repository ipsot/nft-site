<?php

//Template name: Контакты

get_header();
?>


    <main class="container-fluid justify-content-center ">
        <div class="container">

            <div class="py-5 text-center">
                <h2>Контактная информация</h2>
            </div>

            <div class="row g-5">
                <div class="col-md-7 col-lg-8">
                    <form class="needs-validation" novalidate="">
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="firstName" class="form-label">Имя</label>
                                <input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
                            </div>

                            <div class="col-sm-6">
                                <label for="lastName" class="form-label">Фамилия</label>
                                <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
                            </div>

                            <div class="col-12">
                                <label for="username" class="form-label">Ник</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text">@</span>
                                    <input type="text" class="form-control" id="username" placeholder="Username" required="">
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="you@example.com">
                            </div>

                            <div class="col-12">
                                <label for="address" class="form-label">Адрес</label>
                                <input type="text" class="form-control" id="address" placeholder="1234 Main St" required="">
                            </div>

                            <div class="col-md-5 py-2">
                                <label for="country" class="form-label">Страна</label>
                                <select class="form-select" id="country" required="">
                                    <option value="">Выберите...</option>
                                    <option>United States</option>
                                </select>
                            </div>
        </div>


    </main>


<?php
get_footer();
//get_sidebar();
?>