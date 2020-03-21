<form action="/" method="post" >
    <p><?=$string['selectlanguage']?></p>
    <div>
        <input type="radio" id="lang1"
               name="language" value="en" <?=check('en');?>>
        <label for="lang1" ><?=$string['english']?></label>
    </div>
    <div>
        <input type="radio" id="lang2"
               name="language" value="ru" <?=check('ru');?>>
        <label for="lang2"><?=$string['russian']?></label>
    </div>
    <p>
        <button type="submit"><?=$string['submit']?></button>
    </p>
</form>

<p>
    <button><?=$string['buttonUp'];?></button>
    <button><?=$string['buttonLeft'];?></button>
    <button><?=$string['buttonRight'];?></button>
    <button><?=$string['buttonDown'];?></button>
</p>
