<div style="margin: 30px;">
    <span id="english-word"></span>&nbsp;<span id="polish-word" style="color: red;"></span>

    <input type="text" id="answer" />
    <button type="submit" id="check">Sprawdź</button>
    <button type="submit" id="next">Dalej</button>

    <div id="info">Koniec</div>
</div>

<table>
    <?php $i = 1; ?>
    <?php foreach ($wordsData as $word): ?>
        <tr>
            <td><?= $i; ?></td>
            <td class="answer"></td>
        </tr>
        <?php $i++; ?>
    <?php endforeach; ?>
</table>

<?= $this->Html->script('//code.jquery.com/jquery-1.12.0.min.js', array('inline' => false)); ?>
<script>
    $(function () {
        var words = <?= json_encode($wordsData); ?>;

        var hintShown = false;


        $('#info').hide();
        $('#next').hide();
        next(words);
        $('#check').on('click', function (event) {
            hintShown = true;
            event.preventDefault();
            var item = null;

            $('.answer').each(function () {
                if ($(this).text().length < 1) {
                    item = $(this);
                    return false;
                }
            });

            if (item != null) {
                var polishWord = $('#polish-word').text();
                var splittedWords = polishWord.split(/[,;]/);

                var isGood = false;
                splittedWords.forEach(function (element) {
                    if (element.trim() == $('#answer').val()) {
                        isGood = true;
                    }
                });

                if (isGood) {
                    item.text('dobrze');
                } else {
                    item.text('źle');
                }
            }

            $('#polish-word').show();
            $('#check').hide();
            $('#next').show();
        });


        $(document).on('keydown', function (event) {
            if (event.keyCode == 13) {
                if (hintShown) {
                    hintShown = false;
                    $('#next').trigger('click');
                } else {
                    hintShown = false;
                    $('#check').trigger('click');
                }

            }
        });

        $('#next').on('click', function (event) {
            event.preventDefault();
            $('#check').show();
            $('#next').hide();
            next(words);
            $('#answer').val('')
        });
    });

    var next = function (words) {
        if (words.length < 1) {
            $('#info').show();
        } else {
            var item = words.splice(-1, 1);

            $('#english-word').text(item[0].english);
            $('#polish-word').hide().text(item[0].polish);
        }
    };
</script>