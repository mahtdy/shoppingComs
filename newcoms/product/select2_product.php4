<?



$action=$_POST['action'];
$id=$_POST['id'];








if ($action='select2_ok') {

    ?>


    <!---->
    <div id="show_seo_div">
        <div class="col-md-12">
            <div class="col-md-12">
                <label class="control-label">عنوان دسته بندی</label>
    <input type="text">
    </div>
    <div class="form-group" id="cate_tag">

    <label class="control-label">زیر مجموعه دسته بندی</label>
    <p class="fdesc" style="width: 100px;"><span class="flaticon-information51"></span><span>متن راهنما</span></p>
    <div class="form-group" style="display: flex;">
        <select id="meta_label" multiple name="meta_label[]" class="select2 " type="text" style="width:90%">
            <? $query = "SELECT a.id , a.name as namev , b.name namec FROM new_product_delicated_cat a , new_modules_cat b WHERE a.cat_id=b.id";
            $result = $coms_conect->query($query);
            while ($RS1 = $result->fetch_assoc()) {
                ?>
                <option <?
                if (($label[0]) > "" && in_array($RS1['id'], $label)) echo 'selected'; ?>
                        value="<?= $RS1['id'] ?>"><?= $RS1['namev'] . ' از ' . $RS1['namec'] ?></option>
            <?
            } ?>
        </select>
        <?
        if ($_SESSION["can_add"] == 1) { ?>

        <?
        } ?>
    </div>
            </div>
        </div>
    </div>

    <?
}
    ?>