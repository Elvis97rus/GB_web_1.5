<!--New_Student Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="/engine/modal.php" method="post">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Добавить нового студента</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
<!--                ------->

                <input name="name" type="text" class="m-3 form-control" placeholder="Имя пользователя" >
                <input name="age" type="text" class="m-3 form-control" placeholder="Возраст студента">
                <input name="lang" type="text" class="m-3 form-control" placeholder="Изучаемый язык">

<!--                ------>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button  class="btn btn-primary " type="submit">Добавить студента</button>

            </form>

            </div>
        </div>
    </div>
</div>
<!--FEEDBACK Modal -->
<div class="modal fade" id="feedback" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="/engine/feedbackModal.php" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Добавить новый отзыв</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!--                ------->
                    <input name="feedback_user" type="text" class="m-3 form-control" placeholder="Имя пользователя">
                    <textarea name="feedback_body" class="m-3 form-control" placeholder="Текст отзыва"></textarea>
                    <!--                ------>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button  class="btn btn-primary " type="submit">Добавить отзыв</button>
            </form>
        </div>
    </div>
</div>
</div>

<!-- ADMIN Modal -->
<div class="modal" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form enctype="multipart/form-data" action="/engine/addProductModal.php" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Добавить новый товар</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!--                ------->

                    <input name="good_name" type="text" class="m-3 form-control" placeholder="Название товара" >
                    <textarea name="good_description" class="m-3 form-control" placeholder="Описание товара"></textarea>
                    <input name="good_price" type="text" class="m-3 form-control" placeholder="Цена к отображению">
                    <input name="is_active" type="text" class="m-3 form-control" placeholder="В наличии?(0/1)">
                    Укажите адрес расположения картинки на сервере (/public/img/имя_файла.расширение)
                    <input name="img_address" type="text" class="m-3 form-control" placeholder="Папка с картинкой">
                    <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
                    Загрузите картинку в формате jpeg,png,gif
                    <input name="picture" type="file" class="m-3 form-control" value="Выберите файл">
                    <!--                ------>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button  class="btn btn-primary " type="submit">Добавить товар</button>
            </form>
        </div>
    </div>
</div>
</div>
<!--Authorise Modal -->
<div class="modal fade" id="#" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="/engine/modal.php" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Добавить нового студента</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!--                ------->
                    <input name="name" type="text" class="m-3 form-control" placeholder="Имя пользователя" >
                    <input name="age" type="text" class="m-3 form-control" placeholder="Возраст студента">
                    <input name="lang" type="text" class="m-3 form-control" placeholder="Изучаемый язык">
                    <!--                ------>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button  class="btn btn-primary " type="submit">Добавить студента</button>
            </form>
        </div>
    </div>
</div>
</div>