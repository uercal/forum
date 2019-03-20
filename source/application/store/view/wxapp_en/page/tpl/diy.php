<!-- diy元素: 搜索栏 -->
<script id="tpl_diy_search" type="text/template">
    <div class="drag" id="diy-{{ id }}" data-itemid="{{ id }}">
        <div class="diy-search" style="background: {{ style.background }}; padding-top:{{ style.paddingTop  }}px; ">
            <div class="inner left {{ style.searchStyle }}" style="background: {{ style.inputBackground }};">
                <div class="search-input" style="text-align: {{ style.textAlign }}; color: {{ style.inputColor }};">
                    <i class="search-icon iconfont icon-ss-search"></i>
                    <span>{{ params.placeholder }}</span>
                </div>
            </div>
        </div>
        <div class="btn-edit-del">
            <div class="btn-edit">编辑</div>
            <div class="btn-del">删除</div>
        </div>
    </div>
</script>

<!-- diy元素: banner -->
<script id="tpl_diy_banner" type="text/template">
    <div class="drag" id="diy-{{ id }}" data-itemid="{{ id }}">
        <div class="diy-banner">
            {{each data}}
                <img src="{{ $value.imgUrl }}">
            {{/each}}
            <div class="dots center {{ style.btnShape }}">
                {{each data}}
                    <span style="background: {{ style.btnColor }};"></span>
                {{/each}}
            </div>
        </div>
        <div class="btn-edit-del">
            <!-- <div class="btn-edit">编辑</div>
            <div class="btn-del">删除</div> -->
        </div>
    </div>
</script>


<!-- diy元素：nav -->
<script id="tpl_diy_nav" type="text/template">
    <div class="drag" id="diy-{{ id }}" data-itemid="{{ id }}">
        <div class="diy-nav" style="display:flex;padding:10px;height:80px;justify-content:space-between;">
            {{each data}}
                <img src="{{ $value.imgUrl }}" style="width:30%;height:100%;">                                                
            {{/each}}            
        </div>
        <!-- <div class="btn-edit-del">
            <div class="btn-edit">编辑</div>
            <div class="btn-del">删除</div>
        </div> -->
    </div>
</script>


<!-- diy元素：peojects -->
<script id="tpl_diy_projects" type="text/template">
    <div class="drag" id="diy-{{ id }}" data-itemid="{{ id }}">
        <div class="diy-pro" style="display:flex;padding:20px;height:200px;justify-content:space-between;">
            {{each data}}
                <img src="{{ $value.imgUrl }}" style="width:20%;height:100%;object-fit:cover;">                                                
            {{/each}}            
        </div>
        <!-- <div class="btn-edit-del">
            <div class="btn-edit">编辑</div>
            <div class="btn-del">删除</div>
        </div> -->
    </div>
</script>



<!-- diy元素：news -->
<script id="tpl_diy_news" type="text/template">
    <div class="drag" id="diy-{{ id }}" data-itemid="{{ id }}">
        <div class="diy-news" style="display:flex;padding:20px;height:120px;justify-content:space-between;">
            {{each data}}
                <img src="{{ $value.imgUrl }}" style="width:20%;height:100%;object-fit:cover;">                                                
            {{/each}}            
        </div>
        <!-- <div class="btn-edit-del">
            <div class="btn-edit">编辑</div>
            <div class="btn-del">删除</div>
        </div> -->
    </div>
</script>



<!-- diy元素:company -->
<script id="tpl_diy_company" type="text/template">
    <div class="drag" id="diy-{{ id }}" data-itemid="{{ id }}">
        <div class="diy-company" style="display:flex;align-items:flex-end;flex-direction:column;">
            {{each data}}                
                <span style="padding-right:10px;font-size:10px;">{{ $value.name }}</span>                                
            {{/each}}            
        </div>      
    </div>
</script> 