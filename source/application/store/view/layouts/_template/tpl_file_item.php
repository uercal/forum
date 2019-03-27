<script id="tpl-file-item" type="text/template">
    {{ each list }}
    <div class="file-item">
        <img src="{{ $value.file_path }}">
        <input type="hidden" name="{{ name }}[{{ $value.file_id }}]" value="{{ $value.file_id }}">
        <i class="iconfont icon-shanchu file-item-delete"></i>
    </div>
    {{ /each }}
</script>


<script id="tpl-file-item-attachment" type="text/template">
    {{ each list }}
    <div>
        <input type="hidden" name="{{ name }}[{{ $value.file_id }}]" value="{{ $value.file_id }}">
        <a href="{{ $value.file_path }}" style="margin-right:10px;">
            {{ $value.origin_name }}
        </a>
        <i class="iconfont icon-shanchu file-item-delete"></i>
    </div>
    {{ /each }}
</script> 