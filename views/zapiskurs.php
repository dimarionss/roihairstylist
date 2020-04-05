<div class="rendered-form">
    <h2 class="h4">Курсы</h2>
        <section class="ftco-section testimony-section bg-light kurslider">
            <div class="container">
                <div class="row justify-content-center mb-5 pb-5">
                    <div class="col-md-7 text-center heading-section ftco-animate">
                        <h3 class="mb-4">Мои учиницы</h3>
                    </div>
                </div>
                <div class="row ftco-animate">
                    <div class="col-md-12">
                        <div class="carousel-testimony owl-carousel ftco-owl">
                            <div class="item text-center">
                                <div class="testimony-wrap p-4 pb-5">
                                    <div class="text">
                                        <a href="../images/work-1.jpg" data-toggle="lightbox" data-gallery="example-gallery"><img src="../images/work-1.jpg"></a>
                                        <p class="name">Dennis Green</p>
                                        <span class="position">Marketing Manager</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item text-center">
                                <div class="testimony-wrap p-4 pb-5">

                                    <div class="text">
                                        <a href="../images/work-1.jpg" data-toggle="lightbox" data-gallery="example-gallery"><img src="../images/work-1.jpg"></a>
                                        <p class="name">Dennis Green</p>
                                        <span class="position">Interface Стилист-парикмахер</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item text-center">
                                <div class="testimony-wrap p-4 pb-5">

                                    <div class="text">
                                        <a href="../images/work-1.jpg" data-toggle="lightbox" data-gallery="example-gallery"><img src="../images/work-1.jpg"></a>
                                        <p class="name">Dennis Green</p>
                                        <span class="position">UI Стилист-парикмахер</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item text-center">
                                <div class="testimony-wrap p-4 pb-5">

                                    <div class="text">
                                        <a href="../images/work-1.jpg" data-toggle="lightbox" data-gallery="example-gallery"><img src="../images/work-1.jpg"></a>
                                        <p class="name">Dennis Green</p>
                                        <span class="position">Web Developer</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item text-center">
                                <div class="testimony-wrap p-4 pb-5">
                                    <a href="../images/work-1.jpg" data-toggle="lightbox" data-gallery="example-gallery"><img src="../images/work-1.jpg"></a>
                                    <div class="text">
                                        <p class="name">Dennis Green</p>
                                        <span class="position">System Analytics</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<form action="/zayavkakurs" id="zayavkakurs" method="post" name="zayavkakurs">
    <h2 class="h4">Заявка на курсы</h2>
    <div class="form-row">
        <div class="formbuilder-text form-group field-mail col"><label for="mail" class="formbuilder-text-label"><span
                >Почта (обязательно)</span></label><input
                    type="text" placeholder="Email@gmail.com" class="form-control" name="email" access="false"
                    id="mail">
        </div>
        <div class="formbuilder-text form-group field-name col"><label for="name" class="formbuilder-text-label"><span
                >Имя (обязательно)</span></label><input
                    type="text" placeholder="Введите имя" class="form-control" name="name" access="false"
                    id="name">
        </div>
    </div>

    <div class="form-row">
        <div class="formbuilder-text form-group field-Instagram col"><label for="Instagram"
                                                                            class="formbuilder-text-label"><span
                >Ник Instagram</span></label><input
                    type="text" placeholder="@nikimsatgram" class="form-control" name="Instagram" access="false"
                    id="Instagram"></div>
        <div class="formbuilder-text form-group field-number col"><label for="number" class="formbuilder-text-label"><span
                >Номер телефона (обязательно)</span></label><input
                    type="text" placeholder="093-233-00-00" class="form-control" name="phone" access="false"
                    id="number"></div>
    </div>
        <div class="row">
            <div class="checkbox_block col">
                <div class="formbuilder-checkbox"><input class='option-input checkbox' name="checkbox_kurs1"
                                                         access="false" id="checkbox-0"
                                                         value="Базовый экспресс-курс по причёскам" type="checkbox"
                                                         checked="checked"><label for="checkbox-0">Базовый экспресс-курс по причёскам</label><a href="../images/kurs_3.jpg" data-toggle="lightbox" data-gallery="example-gallery"><img src="../images/kurs_3.jpg"></a></div>
            </div>
                <div class="checkbox_block col">
                <div class="formbuilder-checkbox"><input class='option-input checkbox' name="checkbox_kurs2"
                                                         access="false" id="checkbox-1"
                                                         value="Свадебные прически" type="checkbox"><label
                            for="checkbox-1">Свадебные прически</label><a href="../images/kurs_2.jpg" data-toggle="lightbox" data-gallery="example-gallery"><img src="../images/kurs_2.jpg"></a></div>
                </div>
                <div class="checkbox_block col">
                <div class="formbuilder-checkbox"><input class='option-input checkbox' name="checkbox_kurs3"
                                                         access="false" id="checkbox-2"
                                                         value="Прически для себя" type="checkbox"><label
                            for="checkbox-2">Прически для себя</label><a href="../images/kurs_1.jpg" data-toggle="lightbox" data-gallery="example-gallery"><img src="../images/kurs_1.jpg"></a></div>
            </div>
        </div>
    <? if ((!$user->loged)) { ?>
    <div class="form-row">
        <div class="col">
            <label for="exampleInputPassword1">Придумайте пароль для сайта</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
        </div>
    </div>
            <?}?>
        <div class="formbuilder-button form-group field-button">
            <input id="zayavkakurs" name="zayavkakurs" form="zayavkakurs" type="submit" value="Отправить"
                   class="btn-zajawa">
        </div>

</form>
</div>
