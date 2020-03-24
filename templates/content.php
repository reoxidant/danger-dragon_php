<form action="/" method="post" >
    <div class="header"><?=$string['selectlanguage']?></div>
    <div class="form-items">
        <div class="form-item form-item-1">
            <input type="radio" id="lang1"
                   name="language" value="en" <?=check('en', 'en');?>>
            <label for="lang1" ><?=$string['english']?></label>
        </div>
        <div class="form-item form-item-2">
            <input type="radio" id="lang2"
                   name="language" value="ru" <?=check('ru', 'en');?>>
            <label for="lang2"><?=$string['russian']?></label>
        </div>
    </div>
    <div>
        <button type="submit"><?=$string['submit']?></button>
    </div>
</form>