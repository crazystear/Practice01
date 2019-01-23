<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<style>
.typecho-option-submit{
    position: fixed !important;
    bottom: 10px !important;
    right: 30px !important;
}
.typecho-option-submit li{
    display: inline;
    margin-right: 5px;
}
</style>
<script type="text/javascript" src="https://cdn.staticfile.org/jquery/2.2.1/jquery.min.js"></script>
<script type="text/javascript">
function backData() {
    var newLocal= localStorage.backupData;
    if (newLocal!= "" && newLocal!= undefined) {
        var jsonData = JSON.parse(newLocal);
        var data = jsonData;
        for(var i in data){
            switch (data[i].type) {
                case "text":
                    $('#'+document.getElementsByName(data[i].name)[0].id).val(data[i].value);
                    break;
                case "textarea":
                    $('#'+document.getElementsByName(data[i].name)[0].id).val(data[i].val);
                    break;
                case "checkbox":
                    switch (data[i].checked) {
                        case 'true':
                            document.getElementById(data[i].id).checked = true;
                            break;
                        case 'false':
                            document.getElementById(data[i].id).checked = false;
                            break;
                    }
                    break;

                case "radio":
                    switch (data[i].checked) {
                        case 'true':
                            $('#'+data[i].id).prop("checked","checked");
                            break;
                        case 'false':
                            $('#'+data[i].id).removeAttr("checked");
                    }
                    break;
            }
        }
    }
}
function backupData() {
    var json = [];
    var inputs = $("input");
    var textareas = $("textarea");
    for (i = 0, len = inputs.length; i < len; i++) {
        var j = {};
        var input = inputs[i];
        j.name = input.name;
        j.type = input.type;
        j.id = input.id;
        switch (input.type){
            case "text":
                j.value = input.value;
                break;

            case "radio":
                j.checked = ''+input.checked+'';
                break;

            case "checkbox":
                j.checked = ''+input.checked+'';
                break;
            default:
        }
        json.push(j);
    }
    for (i = 0, len = textareas.length; i < len; i++) {
        var j = {};
        var textarea = textareas[i];
        j.name = textarea.name;
        j.type = 'textarea';
        j.id = textarea.id;
        j.val = $('#'+textarea.id).val();

        json.push(j);
    }
    var dataUp = JSON.stringify(json);
    localStorage.backupData = dataUp;
    alert("主题设置参数已备份！若需要恢复，请使用相同浏览器点击本页右下方的恢复按钮进行恢复！");
}
jQuery(function(){
    $(".typecho-option-submit").append("<li><button type=\"button\" class=\"btn primary\" onclick=\"backupData()\">备份</button></li><li><button type=\"button\" class=\"btn primary\" onclick=\"backData()\">恢复</button></li>");
});
</script>
