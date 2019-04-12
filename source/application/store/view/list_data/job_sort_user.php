<link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">
<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <form id="my-form" class="am-form tpl-form-line-form" enctype="multipart/form-data" method="post">
                    <div class="widget-body" id="app">
                        <fieldset>
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl"><?= $model['name'] ?>类别选项</div>
                            </div>

                            <div class="am-form-group" style="display:flex;">
                                <label class="am-form-label form-require">是否开启文章类别 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <label class="am-radio-inline">
                                        <input type="radio" name="is_exist" value="0" data-am-ucheck :checked="is_exist==0" @click="chg(0)">
                                        否
                                    </label>
                                    <label class="am-radio-inline">
                                        <input type="radio" name="is_exist" value="1" data-am-ucheck :checked="is_exist==1" @click="chg(1)">
                                        是
                                    </label>
                                </div>
                            </div>
                            <table class="am-table" v-show="is_exist==1" style="display:none;">
                                <thead>
                                    <tr>
                                        <th>类别名称</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(item,index) in data" :key="index">
                                        <td>{{ item.name }}</td>
                                        <td>
                                            <div class="tpl-table-black-operation">
                                                <a href="javascript:;" @click="del(index)" class="item-delete tpl-table-black-operation-del">
                                                    <i class="am-icon-trash"></i> 删除
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="tpl-table-black-operation" v-show="is_exist==1" style="display:none;">

                                <input type="text" v-model="addValue" class="am-form-field" style="border: 1px solid #ccc;border-radius:10px;width:30%;margin-bottom:10px;" placeholder="">

                                <a href="javascript:;" class="item-delete tpl-table-black-operation" @click="addItem">
                                    <i class="am-icon-plus"></i> 新增
                                </a>

                            </div>

                            <div class="am-form-group">
                                <div class="am-u-sm-9 am-u-sm-push-3 am-margin-top-lg">
                                    <button type="submit" class="j-submit am-btn am-btn-secondary">提交
                                    </button>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- 先引入 Vue -->
<script src="https://unpkg.com/vue/dist/vue.js"></script>
<!-- 引入组件库 -->
<script>
    var jsonData = JSON.parse('<?= json_encode($data) ?>');

    window.vue = new Vue({
        el: '#app',
        data: function() {
            return {
                data: jsonData.data,
                is_exist: jsonData.is_exist,
                addValue: ''
            }
        },
        methods: {
            chg: function(val) {
                this.is_exist = val;
                console.log(val);
            },
            addItem: function() {
                var item = {
                    name: this.addValue
                };
                this.data.push(item);
            },
            del: function(index) {
                this.data.splice(index, 1);
            }
        },
        mounted: function() {
            console.log(jsonData);
        }

    })


    $(function() {
        $('#my-form').superForm({
            // form data
            buildData: function() {
                return {
                    data: {
                        data: window.vue.data,
                        is_exist: window.vue.is_exist
                    }
                };
            },
            // 自定义验证
            validation: function() {
                return true;
            }
        });
    })
</script>