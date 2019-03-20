<!--编辑器: 搜索-->
<script id="tpl_editor_search" type="text/template">
    <form class="am-form tpl-form-line-form" data-itemid="{{ id }}">
        <div class="am-form-group">
            <label class="am-u-sm-3 am-form-label am-text-xs">提示文字 </label>
            <div class="am-u-sm-9 am-u-end">
                <input class="tpl-form-input" type="text" name="searchStyle"
                       data-bind="params.placeholder" value="{{ params.placeholder }}">
            </div>
        </div>
        <div class="am-form-group">
            <label class="am-u-sm-3 am-form-label am-text-xs">搜索框样式 </label>
            <div class="am-u-sm-9 am-u-end">
                <label class="am-radio-inline">
                    <input data-bind="style.searchStyle" type="radio" name="searchStyle"
                           value="" {{ style.searchStyle=== '' ? 'checked' : '' }}> 方形
                </label>
                <label class="am-radio-inline">
                    <input data-bind="style.searchStyle" type="radio" name="searchStyle"
                           value="radius" {{ style.searchStyle=== 'radius' ? 'checked' : '' }}> 圆角
                </label>
                <label class="am-radio-inline">
                    <input data-bind="style.searchStyle" type="radio" name="searchStyle"
                           value="round" {{ style.searchStyle=== 'round' ? 'checked' : '' }}> 圆弧
                </label>
            </div>
        </div>
        <div class="am-form-group">
            <label class="am-u-sm-3 am-form-label am-text-xs">文字对齐 </label>
            <div class="am-u-sm-9 am-u-end">
                <label class="am-radio-inline">
                    <input data-bind="style.textAlign" type="radio" name="textAlign"
                           value="left" {{ style.textAlign=== 'left' ? 'checked' : '' }}>
                    居左
                </label>
                <label class="am-radio-inline">
                    <input data-bind="style.textAlign" type="radio" name="textAlign"
                           value="center" {{ style.textAlign=== 'center' ? 'checked' : '' }}>
                    居中
                </label>
                <label class="am-radio-inline">
                    <input data-bind="style.textAlign" type="radio" name="textAlign"
                           value="right" {{ style.textAlign=== 'right' ? 'checked' : '' }}>
                    居右
                </label>
            </div>
        </div>
    </form>
</script>

<!--编辑器: banner-->
<script id="tpl_editor_banner" type="text/template">
    <form class="am-form tpl-form-line-form" data-itemid="{{ id }}">
        <div class="form-items">BANNER</div>     
        <div class="form-items">
            {{each data}}
            <div class="item" data-key="{{ $index }}">
                <div class="container">
                    <div class="item-image"><img src="{{ $value.imgUrl }}" alt=""></div>
                    <div class="item-form am-form-file">
                        <div class="input-group">
                            <input type="text" name="imgName" data-bind="data.{{ $index }}.imgName"
                                   value="{{ $value.imgName }}" placeholder="请选择图片" readonly>
                            <span class="input-group-addon">选择图片</span>
                            <input type="hidden" name="imgUrl" data-bind="data.{{ $index }}.imgUrl"
                                   value="{{ $value.imgUrl }}">
                        </div>
                        <div class="input-group" style="margin-top:10px;">
                            <input type="text" name="linkUrl" data-bind="data.{{ $index }}.linkUrl"
                                   value="{{ $value.linkUrl }}"
                                   placeholder="请输入链接地址    例：page/index/index">
                            <!-- <span class="input-group-addon">选择链接</span> -->
                        </div>
                    </div>
                </div>
                <i class="iconfont icon-shanchu item-delete"></i>

            </div>
            {{/each}}
        </div>
        <div class="form-item-add">
            <i class="fa fa-plus"></i> 添加一个
        </div>
    </form>
</script>


<!-- 编辑器：nav -->
<script id="tpl_editor_nav" type="text/template">
    <form class="am-form tpl-form-line-form" data-itemid="{{ id }}">  
        <div class="form-items">导航3块</div>           
        <div class="form-items">
            {{each data}}
            <div class="item" data-key="{{ $index }}">
                <div class="container">
                    <div class="item-image"><img src="{{ $value.imgUrl }}" alt=""></div>
                    <div class="item-form am-form-file">
                        <div class="input-group">
                            <label class="am-u-sm-3 am-form-label am-text-xs">cover颜色 </label>
                            <div class="am-u-sm-9 am-u-end">
                                <input style="width:100%;" type="color" name="coverColor"
                                    data-bind="data.{{ $index }}.coverColor" value="{{ $value.coverColor }}">
                            </div>  
                        </div> 
                        <div class="input-group">
                        <label class="am-u-sm-3 am-form-label am-text-xs">文章ID </label>
                            <div class="am-u-sm-9 am-u-end">
                                <input class="" type="text" name="artId"
                                    data-bind="data.{{ $index }}.artId" value="{{ $value.artId }}">
                            </div>     
                            <label class="am-u-sm-3 am-form-label am-text-xs">透明度 </label>
                            <div class="am-u-sm-9 am-u-end">
                                <input type="text" name="opacity" data-bind="data.{{ $index }}.opacity"
                                        value="{{ $value.opacity }}"
                                        placeholder="请输入0.1~1">   
                            </div>                          
                        </div>                                  
                        <div class="input-group">
                        <label class="am-u-sm-3 am-form-label am-text-xs">标题</label>
                            <div class="am-u-sm-9 am-u-end">
                                <input type="text" name="title" data-bind="data.{{ $index }}.title"
                                        value="{{ $value.title }}"
                                        placeholder="">   
                            </div>     
                            <label class="am-u-sm-3 am-form-label am-text-xs">title</label>
                            <div class="am-u-sm-9 am-u-end">
                                <input type="text" name="en" data-bind="data.{{ $index }}.en"
                                        value="{{ $value.en }}"
                                        placeholder="">   
                            </div>                 
                        </div>             
                        <div class="input-group">
                            <input type="text" name="imgName" data-bind="data.{{ $index }}.imgName"
                                   value="{{ $value.imgName }}" placeholder="请选择图片" readonly>
                            <span class="input-group-addon">选择图片</span>
                            <input type="hidden" name="imgUrl" data-bind="data.{{ $index }}.imgUrl"
                                   value="{{ $value.imgUrl }}">
                        </div>                                                                                                                                        
                    </div>
                </div>
                <!-- <i class="iconfont icon-shanchu item-delete"></i> -->

            </div>
            {{/each}}
        </div>       
    </form>
</script>



<!-- 编辑器：projects -->
<script id="tpl_editor_projects" type="text/template">
    <form class="am-form tpl-form-line-form" data-itemid="{{ id }}">     
        <div class="form-items">项目介绍</div>      
        <div class="form-items">
            {{each data}}
            <div class="item" data-key="{{ $index }}">
                <div class="container">
                    <div class="item-image"><img src="{{ $value.imgUrl }}" alt=""></div>
                    <div class="item-form am-form-file">                       
                        <div class="input-group">
                        <label class="am-u-sm-3 am-form-label am-text-xs">项目ID </label>
                            <div class="am-u-sm-9 am-u-end">
                                <input class="" type="text" name="project_id"
                                    data-bind="data.{{ $index }}.project_id" value="{{ $value.project_id }}">
                            </div>                                                        
                        </div>                                  
                        <div class="input-group">
                        <label class="am-u-sm-3 am-form-label am-text-xs">显示描述</label>
                            <div class="am-u-sm-9 am-u-end">
                                <input type="text" name="content" data-bind="data.{{ $index }}.content"
                                        value="{{ $value.content }}"
                                        placeholder="">   
                            </div>                                                
                        </div>             
                        <div class="input-group">
                            <input type="text" name="imgName" data-bind="data.{{ $index }}.imgName"
                                   value="{{ $value.imgName }}" placeholder="请选择图片" readonly>
                            <span class="input-group-addon">选择图片</span>
                            <input type="hidden" name="imgUrl" data-bind="data.{{ $index }}.imgUrl"
                                   value="{{ $value.imgUrl }}">
                        </div>                                                                                                                                        
                    </div>
                </div>
                <!-- <i class="iconfont icon-shanchu item-delete"></i> -->

            </div>
            {{/each}}
        </div>      
    </form>
</script>


<!-- 编辑器：news -->
<script id="tpl_editor_news" type="text/template">
    <form class="am-form tpl-form-line-form" data-itemid="{{ id }}">     
        <div class="form-items">新闻组件</div>   
        <div class="form-items">
            {{each data}}
            <div class="item" data-key="{{ $index }}">
                <div class="container">
                    <div class="item-image"><img src="{{ $value.imgUrl }}" alt=""></div>
                    <div class="item-form am-form-file">                       
                        <div class="input-group">
                        <label class="am-u-sm-3 am-form-label am-text-xs">新闻ID </label>
                            <div class="am-u-sm-9 am-u-end">
                                <input class="" type="text" name="newId"
                                    data-bind="data.{{ $index }}.newId" value="{{ $value.newId }}">
                            </div>                                                        
                        </div>                                  
                        <div class="input-group">
                            <label class="am-u-sm-3 am-form-label am-text-xs">标题</label>
                            <div class="am-u-sm-9 am-u-end">
                                <input type="text" name="title" data-bind="data.{{ $index }}.title"
                                        value="{{ $value.title }}"
                                        placeholder="">   
                            </div>                                                
                        </div>
                        <div class="input-group">
                            <label class="am-u-sm-3 am-form-label am-text-xs">显示描述</label>
                            <div class="am-u-sm-9 am-u-end">
                                <input type="text" name="content" data-bind="data.{{ $index }}.content"
                                        value="{{ $value.content }}"
                                        placeholder="">                                        
                            </div>                                                
                        </div>
                    </div>
                </div>
                <!-- <i class="iconfont icon-shanchu item-delete"></i> -->

            </div>
            {{/each}}
        </div>       
    </form>
</script>




<!-- 编辑器：news -->
<script id="tpl_editor_company" type="text/template">
    <form class="am-form tpl-form-line-form" data-itemid="{{ id }}">     
        <div class="form-items">友情公司跳转</div>   
        <div class="form-items">
            {{each data}}
            <div class="item" data-key="{{ $index }}">
                <div class="container">                    
                    <div class="item-form am-form-file">                       
                        <div class="input-group">
                        <label class="am-u-sm-3 am-form-label am-text-xs">名称</label>
                            <div class="am-u-sm-9 am-u-end">
                                <input class="" type="text" name="name"
                                    data-bind="data.{{ $index }}.name" value="{{ $value.name }}">
                            </div>                                                        
                        </div>                                  
                        <div class="input-group">
                            <label class="am-u-sm-3 am-form-label am-text-xs">跳转地址(加上http://)</label>
                            <div class="am-u-sm-9 am-u-end">
                                <input type="text" name="jumpUrl" data-bind="data.{{ $index }}.jumpUrl"
                                        value="{{ $value.jumpUrl }}"
                                        placeholder="">   
                            </div>                                                
                        </div>                        
                    </div>
                </div>
                <i class="iconfont icon-shanchu item-delete"></i>

            </div>
            {{/each}}
        </div>   
        <div class="form-item-add">
            <i class="fa fa-plus"></i> 添加一个
        </div>    
    </form>
</script> 