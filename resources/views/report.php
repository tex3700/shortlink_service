
<?php foreach ($reports as $report): ?>
    <div class="report-section">
        <section class="urls-rep">
            <p>Полученная ссылка: <?= $localHost.'/?s='.$report['short_url'] ?></p>
            <p>Оригинальный URL: <?= $report['original_url'] ?></p>
        </section>
        <section class="count-url">
            <p>Количество переходов: <?= $report['follow_url'] ?></p>
        </section>
    </div>
<?php endforeach; ?>