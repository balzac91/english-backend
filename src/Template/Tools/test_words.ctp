<div style="margin: 30px;">
    <h3><span id="english-word"></span>&nbsp;<span id="polish-word" style="color: red;"></span></h3>

    <div class="input-group">
        <input type="text" id="answer" class="form-control"/>
      <span class="input-group-btn">
        <button type="submit" id="check" class="btn btn-primary">Sprawdź</button>
        <button type="submit" id="next" class="btn btn-primary">Dalej</button>
      </span>
    </div>

    <br/>

    <span id="word-id" style="display:none;"></span>

    <div id="translation-box">
        Zaproponuj tłumaczenie:
        <div class="input-group">
            <input type="text" id="translation" class="form-control"/>
          <span class="input-group-btn">
            <button id="send" class="btn btn-primary">Wyślij</button>
          </span>
        </div>
    </div>

    <div id="info">Koniec</div>
</div>

<table style="margin-left: 40px;" class="table">
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

        $('#send').on('click', function (event) {
            var wordId = $('#word-id').text();
            var translation = $('#translation').val();

            if (wordId && translation) {
                $.ajax({
                    url: '/tools/propose_translation',
                    method: 'POST',
                    data: {
                        word_id: wordId,
                        english: translation
                    },
                    complete: function (response) {
                        console.log(response);
                    }
                });
            }
        });

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
            $('#translation-box').show();
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
            $('#answer').val('');
            $('#translation-box').val('');
        });
    });

    var next = function (words) {
        if (words.length < 1) {
            $('#info').show();
        } else {
            var item = words.splice(-1, 1);

            $('#word-id').text(item[0].id);
            $('#english-word').text(item[0].english);
            $('#polish-word').hide().text(item[0].polish);
            $('#translation-box').hide();
        }
    };
</script>