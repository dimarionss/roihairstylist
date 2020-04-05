<form action="/zayavka" id="zayavka" method="post" name="zayavka">
    <div class="rendered-form">
        <h2 class="h4">Форма заявки</h2>
        <div class="form-row">
        <div class="formbuilder-text form-group field-mail col"><label for="mail" class="formbuilder-text-label"><span
                >Почта (обязательно)</span></label><input
                    type="text" placeholder="Email@gmail.com" class="form-control" name="email" access="false" id="mail">
        </div>
        <div class="formbuilder-text form-group field-name  col"><label for="name" class="formbuilder-text-label"><span
                >Имя (обязательно)</span></label><input
                    type="text" placeholder="Введите имя" class="form-control" name="name" access="false" id="name">
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
        <div class="form-row">
        <div class="formbuilder-date form-group field-date col-md-4"><label for="date" class="formbuilder-date-label">Желаемая
                дата записи</label><input type="date" class="form-control" name="zayavdate" access="false" id="date"></div>
        </div>
        <div class="formbuilder-checkbox-group form-group field-checkbox">
            <label for="checkbox"
                   class="formbuilder-checkbox-group-label"><span>Выбор услуги (обязательно)</span></label>

            <div class="checkbox-group form-row">
                <div class="checkbox_block col">
                    <div class="formbuilder-checkbox"><input class='option-input checkbox' name="checkbox_1"
                                                             access="false" id="checkbox-0"
                                                             value="ВЫПУСКНАЯ ПРИЧЕСКА" type="checkbox"
                                                             checked="checked"><label for="checkbox-0">ВЫПУСКНАЯ
                            ПРИЧЕСКА</label></div>
                    <div class="formbuilder-checkbox"><input class='option-input checkbox' name="checkbox_2"
                                                             access="false" id="checkbox-1"
                                                             value="СВАДЕБНАЯ ПРИЧЕСКА" type="checkbox"><label
                                for="checkbox-1">СВАДЕБНАЯ ПРИЧЕСКА</label></div>
                    <div class="formbuilder-checkbox"><input class='option-input checkbox' name="checkbox_3"
                                                             access="false" id="checkbox-2"
                                                             value="ВЕЧЕРНЯЯ ПРИЧЕСКА" type="checkbox"><label
                                for="checkbox-2">ВЕЧЕРНЯЯ ПРИЧЕСКА</label></div>
                    <div class="formbuilder-checkbox"><input class='option-input checkbox' name="checkbox_4"
                                                             access="false" id="checkbox-3"
                                                             value="ПЛЕТЕНИЕ" type="checkbox"><label for="checkbox-3">ПЛЕТЕНИЕ</label>
                    </div>
                </div>
                <div class="checkbox_block col">
                    <div class="formbuilder-checkbox"><input class='option-input checkbox' name="checkbox_5"
                                                             access="false" id="checkbox-4"
                                                             value="АФРОКУДРИ" type="checkbox"><label for="checkbox-4">АФРОКУДРИ</label>
                    </div>
                    <div class="formbuilder-checkbox"><input class='option-input checkbox' name="checkbox_6"
                                                             access="false" id="checkbox-5"
                                                             value="СТРИЖКИ" type="checkbox"><label
                                for="checkbox-5">СТРИЖКИ</label></div>
                    <div class="formbuilder-checkbox"><input class='option-input checkbox' name="checkbox_7"
                                                             access="false" id="checkbox-6"
                                                             value="ПОЛИРОВКА" type="checkbox"><label for="checkbox-6">ПОЛИРОВКА</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="formbuilder-text2 form-group field-textvopros1">
            <label for="textvopros1" class="formbuilder-text-label">
                <p>Ответьте на вопрос: "Во сколько Вам нужно быть готовой?" <br> (Для причесок Выпускная / Свадебная /
                    Вечерняя, плетение, афрокудри)<br></p>
            </label><input type="text" placeholder="Введите текст" class="form-control" name="zayavtextvopros1"
                           access="false" id="textvopros1">
        </div>
        <div class="formbuilder-text2 form-group field-textvopros2">
            <label for="textvopros2" class="formbuilder-text-label">
                <p>Ответьте на вопрос: "В какой половине дня Вам будет удобно?" <br> (Для полировки / стрижки)</p>

            </label><input type="text" placeholder="Введите текст" class="form-control" name="zayavtextvopros2"
                           access="false" id="textvopros2"></div>

        <div class="clearfix"></div>
        <? if ((!$user->loged)) { ?>
        <div class="form-row">
            <div class="col">
            <label for="exampleInputPassword1">Придумайте пароль для сайта</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
            </div>
        </div>
        <?}?>
        <div class="formbuilder-button form-group field-button">
            <input id="zayavka" name="zayavka" form="zayavka" type="submit" value="Отправить"
                   class="btn-zajawa">
        </div>

    </div>
</form>
