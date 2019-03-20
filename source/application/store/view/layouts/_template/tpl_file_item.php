<script id="tpl-file-item" type="text/template">
    {{ each list }}
    <div class="file-item">
        <img src="{{ $value.file_path }}">
        <input type="hidden" name="{{ name }}[{{ $value.file_id }}][id]" value="{{ $value.file_id }}">
        <input type="text" name="{{ name }}[{{ $value.file_id }}][title]" placeholder="填写标题" value="">
        <input type="text" name="{{ name }}[{{ $value.file_id }}][project_id]" placeholder="填写标题" value="">
        <i class="iconfont icon-shanchu file-item-delete"></i>
    </div>
    {{ /each }}
</script> 