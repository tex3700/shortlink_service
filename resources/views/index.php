<!DOCTYPE html>
<html lang="ru">

<?php include "head.php" ?>

    <body>
        <div class="container">
            <div class="form-container">
                <h2 class="form-heading">Сокращение cсылок</h2>
                <p class="subheading">
                    На этой странице вы можете сделать из длинной и сложной ссылки простую.
                    Такие ссылки удобнее использовать в ваших записях и сообщениях.
                </p>
                <form id="urlForm">
                    <label for="url">Ввод URL:</label>
                    <input type="text" id="url" name="url" required>
                    <button type="submit" class="sub-btn">Сократить URL</button>
                </form>

                <div id="shortUrl"></div>
                <a href="/?controller=index&action=logout">Выйти</a>
            </div>
        </div>

        <div class="report-container">
            <?php include "report.php" ?>
        </div>

        <script src="/resources/shortlink.js"></script>
    </body>
</html>
